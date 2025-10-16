<?php
/**
 * The template for displaying Author Archive pages
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('author');
$cached_html = dream_get_page_cache($cache_key);

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	global $wp_query;

	$context = Timber::context();
	$context['posts'] = new Timber\PostQuery();
	if ( isset( $wp_query->query_vars['author'] ) ) {
		$author            = new Timber\User( $wp_query->query_vars['author'] );
		$context['author'] = $author;
		$context['title']  = 'Author Archives: ' . $author->name();
	}

	Timber::render( array( 'pages/author.twig', 'pages/archive.twig' ), $context );

	// Get the rendered HTML and cache it
	$html = ob_get_clean();
	dream_set_page_cache($cache_key, $html);
	echo $html;
}
