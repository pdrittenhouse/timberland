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
