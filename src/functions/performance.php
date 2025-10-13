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
