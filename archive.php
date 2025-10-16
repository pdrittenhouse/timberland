<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

// Try to get cached page
$cache_key = dream_generate_cache_key('archive');
$cached_html = dream_get_page_cache($cache_key);

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

	$templates = array( 'pages/archive.twig', 'pages/index.twig' );

	// Enqueue Bootstrap components used in pages/archive.twig
	enqueue_bootstrap_component('pagination');

	$context = Timber::context();

	$context['title'] = 'Archive';
	if ( is_day() ) {
		$context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
	} else if ( is_month() ) {
		$context['title'] = 'Archive: ' . get_the_date( 'M Y' );
	} else if ( is_year() ) {
		$context['title'] = 'Archive: ' . get_the_date( 'Y' );
	} else if ( is_tag() ) {
		$context['title'] = single_tag_title( '', false );
	} else if ( is_category() ) {
		$context['title'] = single_cat_title( '', false );
		array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
	} else if ( is_post_type_archive() ) {
		$context['title'] = post_type_archive_title( '', false );
		array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
	}

	$context['posts'] = new Timber\PostQuery();

	Timber::render( $templates, $context );

	// Get the rendered HTML and cache it
	$html = ob_get_clean();
	dream_set_page_cache($cache_key, $html);
	echo $html;
}
