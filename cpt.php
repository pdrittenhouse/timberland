<?php
/**
 * The template for displaying a custom post type.
 *
 * Include page template in src/templates/pages
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/#page-templates-within-the-template-hierarchy
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('cpt');
$cached_html = dream_get_page_cache($cache_key, get_the_ID());

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	global $paged;
	if (!isset($paged) || !$paged) {
		$paged = 1;
	}

	$context = Timber::context();

	$timber_post = new Timber\Post();
	$context['post'] = $timber_post;

	// Add pre-calculated page styles
	if (isset($timber_post) && $timber_post) {
		$context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
	}

	$args = array(
		'post_type' => 'CUSTOM-POST-TYPE-SLUG',
		'posts_per_page' => 10,
		'paged' => $paged,
		'order' => 'ASC',
		'orderby' => 'date'
	);

	$context['posts'] = new Timber\PostQuery($args);
	$context['form_action'] = esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) );
	$context['sidebar'] = Timber::get_sidebar('sidebar.php');

	// Enqueue Bootstrap components (pagination used if posts query has multiple pages)
	enqueue_bootstrap_component('pagination');

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
