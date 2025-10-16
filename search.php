<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('search');
$cached_html = dream_get_page_cache($cache_key);

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	$templates = array( 'pages/search.twig', 'pages/archive.twig', 'pages/index.twig' );

	// Enqueue Bootstrap components used in pages/search.twig
	enqueue_bootstrap_component('pagination');

	$context = Timber::context();
	if (get_search_query()) {
		$context['title'] = 'Search results for ' . get_search_query();
	} else {
		$context['title'] = 'Search results';
	}
	$context['posts'] = new Timber\PostQuery();

	Timber::render( $templates, $context );

	// Get the rendered HTML and cache it
	$html = ob_get_clean();
	dream_set_page_cache($cache_key, $html);
	echo $html;
}
