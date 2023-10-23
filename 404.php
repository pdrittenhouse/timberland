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
$timber_post = Timber::get_post(get_page_by_path('error-404')->ID);
$context['post'] = $timber_post;
Timber::render( 'pages/404.twig', $context );
