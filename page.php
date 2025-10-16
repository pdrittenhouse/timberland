<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('page');
$cached_html = dream_get_page_cache($cache_key, get_the_ID());

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	$context = Timber::context();
	$timber_post = new Timber\Post();
	$context['post'] = $timber_post;
	$context['form_action'] = esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) );

	// Add pre-calculated page styles
	if (isset($timber_post) && $timber_post) {
		$context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
	}

	if ( post_password_required( $timber_post->ID ) ) {
		Timber::render( 'pages/password.twig', $context );
	} else {
		Timber::render( array( 'pages/page-' . $timber_post->post_name . '.twig', 'pages/page.twig' ), $context );
	}

	// Get the rendered HTML and cache it (unless password protected)
	$html = ob_get_clean();
	if (!post_password_required($timber_post->ID)) {
		dream_set_page_cache($cache_key, $html, $timber_post->ID);
	}
	echo $html;
}
