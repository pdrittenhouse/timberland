<?php
/**
 * Performance Optimizations
 *
 * @package Timberland
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ============================================================================
 * 1. LAZY LOADING IMAGES
 * ============================================================================
 *
 * WordPress automatically adds loading="lazy" to all images since WP 5.5.
 * We're adding enhancements to optimize Largest Contentful Paint (LCP):
 * - Disable lazy loading for featured images on single posts/pages
 * - Add fetchpriority="high" to the first large image per page
 */

/**
 * Disable lazy loading for important above-the-fold images
 *
 * @param bool   $default     Default lazy loading behavior
 * @param string $tag_name    HTML tag name (img, iframe, etc.)
 * @param string $context     Context where the image is being loaded
 * @return bool
 */
function dream_disable_lazy_loading_for_important_images( $default, $tag_name, $context ) {
	// Don't lazy load featured images on single posts/pages (usually LCP element)
	if ( 'the_post_thumbnail' === $context && is_singular() ) {
		return false;
	}

	return $default;
}
add_filter( 'wp_lazy_loading_enabled', 'dream_disable_lazy_loading_for_important_images', 10, 3 );

/**
 * Add fetchpriority="high" to the first large image per page
 *
 * This tells the browser to prioritize downloading the hero/featured image,
 * which is typically the Largest Contentful Paint (LCP) element.
 *
 * @param array        $attr       Image attributes
 * @param WP_Post      $attachment Image attachment post
 * @param string|array $size       Image size
 * @return array
 */
function dream_add_fetchpriority_to_first_image( $attr, $attachment, $size ) {
	static $first_image = true;

	// Only apply to first large/full image on the page
	if ( $first_image && in_array( $size, array( 'large', 'full' ), true ) ) {
		$attr['fetchpriority'] = 'high';
		unset( $attr['loading'] ); // Remove lazy loading attribute
		$first_image = false;
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'dream_add_fetchpriority_to_first_image', 10, 3 );

/**
 * ============================================================================
 * 2. ASSET PRELOADING & PREFETCHING
 * ============================================================================
 *
 * Preload critical assets that are needed for the current page (high priority).
 * Prefetch assets that might be needed for the next page (low priority).
 *
 * Note: Pattern and Bootstrap component preloading is handled by their
 * respective loader classes (pattern-loader.php, bootstrap-loader.php).
 *
 * Current Behavior:
 * - Preloads first 3 patterns AND 3 Bootstrap components (most critical above-the-fold)
 * - Template patterns (header/footer) are prioritized first in preload order
 * - Content patterns follow after template patterns
 * - All preloaded assets load with "Highest" priority in browser
 * - Limited to 3 each to balance first-visit overhead vs repeat-visit benefit
 * - Total ~6-8 preload hints (best practice: stay under 10)
 *
 * Performance Tradeoff:
 * - First visit (cold cache): Small overhead from preload hints (~10-30ms)
 * - Repeat visits (warm cache): Significant improvement (~200-500ms faster LCP)
 * - Net positive for real users who visit multiple pages
 */

/**
 * Preload critical assets and prefetch next page
 *
 * This function outputs <link rel="preload"> and <link rel="prefetch"> tags
 * in the <head> to optimize asset loading.
 */
function dream_preload_critical_assets() {
	// 1. Preconnect to external domains (establishes connection early)
	echo "<link rel='preconnect' href='https://fonts.googleapis.com'>\n";
	echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>\n";

	// 2. Preload hero/featured image if available
	if ( is_singular() && has_post_thumbnail() ) {
		$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		if ( $thumb_url ) {
			echo "<link rel='preload' href='{$thumb_url}' as='image'>\n";
		}
	}

	// 3. Prefetch predicted next page
	$next_page_url = dream_predict_next_page_url();
	if ( $next_page_url ) {
		echo "<link rel='prefetch' href='{$next_page_url}'>\n";
	}
}
add_action( 'wp_head', 'dream_preload_critical_assets', 1 );

/**
 * Predict the next page URL based on current page context
 *
 * @return string|null Next page URL or null if can't predict
 */
function dream_predict_next_page_url() {
	// Homepage → About page (customize for your site)
	if ( is_front_page() ) {
		$about = get_page_by_path( 'about' );
		return $about ? get_permalink( $about->ID ) : null;
	}

	// Single post → First related post in same category
	if ( is_single() ) {
		$categories = wp_get_post_categories( get_the_ID() );
		if ( ! empty( $categories ) ) {
			$related = get_posts(
				array(
					'posts_per_page' => 1,
					'category__in'   => $categories,
					'post__not_in'   => array( get_the_ID() ),
				)
			);
			return ! empty( $related ) ? get_permalink( $related[0]->ID ) : null;
		}
	}

	// Archive → First post
	if ( is_archive() || is_home() ) {
		global $wp_query;
		if ( ! empty( $wp_query->posts[0] ) ) {
			return get_permalink( $wp_query->posts[0]->ID );
		}
	}

	return null;
}
