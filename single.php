<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('single');
$cached_html = dream_get_page_cache($cache_key, get_the_ID());

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	$context = Timber::context();
	$timber_post = Timber::query_post();
	$context['post'] = $timber_post;
	$context['form_action'] = esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) );

	// Add pre-calculated page styles
	if (isset($timber_post) && $timber_post) {
		$context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
	}

	$prev = get_adjacent_post(false, 6, true);
	$next = get_adjacent_post(false, 6, false);
	if ($prev) {
		$prevDate = $prev->post_date;
		$context['prevdate'] = date('F j, Y', strtotime($prevDate));
		$context['prevtitle'] = get_adjacent_post(false, 6, true)->post_title;
	}
	if ($next) {
		$nextDate =  $next->post_date;
		$context['nextdate'] = date('F j, Y', strtotime($nextDate));
		$context['nexttitle'] = get_adjacent_post(false, 6, false)->post_title;
	}

	if ( post_password_required( $timber_post->ID ) ) {
		Timber::render( 'pages/password.twig', $context );
	} else {
		Timber::render( array( 'pages/single-' . $timber_post->ID . '.twig', 'pages/single-' . $timber_post->post_type . '.twig', 'pages/single.twig' ), $context );
	}

	// Get the rendered HTML and cache it (unless password protected)
	$html = ob_get_clean();
	if (!post_password_required($timber_post->ID)) {
		dream_set_page_cache($cache_key, $html, $timber_post->ID);
	}
	echo $html;
}
