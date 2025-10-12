<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
if (get_page_by_path('error-404')) {
  $timber_post = Timber::get_post(get_page_by_path('error-404')->ID);
  $context['post'] = $timber_post;

  // Add pre-calculated page styles
  if (isset($timber_post) && $timber_post) {
    $context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
  }
}
Timber::render( 'pages/404.twig', $context );
