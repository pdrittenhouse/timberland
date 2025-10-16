<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('index');
$cached_html = dream_get_page_cache($cache_key);

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	$context = Timber::context();
	$context['posts'] = new Timber\PostQuery();
	$timber_post = new Timber\Post();
	$context['post'] = $timber_post;
	$templates = array( 'pages/index.twig' );

	// Add pre-calculated page styles
	if (isset($timber_post) && $timber_post && isset($timber_post->ID)) {
		$context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
	}

	// Enqueue Bootstrap components used in pages/index.twig
	enqueue_bootstrap_component('pagination');

	if ( is_home() ) {
		array_unshift( $templates, 'pages/index.twig' );
	}

	if ( is_front_page() ) {
		array_unshift( $templates, 'pages/front-page.twig');
	}

	Timber::render( $templates, $context );

	// Get the rendered HTML and cache it
	$html = ob_get_clean();
	dream_set_page_cache($cache_key, $html);
	echo $html;
}
