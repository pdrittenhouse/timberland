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
