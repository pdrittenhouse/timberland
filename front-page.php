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

$context = Timber::context();
//$timber_post = new Timber\Post();
//$context['post'] = $timber_post;
//$context['context'] = $context;
//
//global $post;
//
//Timber::render( 'front-page.twig', $context );

if (get_option('show_on_front ') == 'posts') {
  $timber_post = new Timber\PostQuery();
  $context['posts'] = $timber_post;
  $context['post'] = get_post($frontpage_id = get_option( 'page_on_front' ));
  $template = 'pages/index.twig';
} else {
  $timber_post = new Timber\Post();
  $context['post'] = $timber_post;
  $context['context'] = $context;
  $template = 'pages/front-page.twig';
}

$context['context'] = $context;


global $post;

Timber::render( $template, $context );
