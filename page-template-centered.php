<?php
/*
* Template Name: Centered Logo Header Layout
* Description: A page template with a centered logo header.
*/

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$context['form_action'] = esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) );

if ( post_password_required( $timber_post->ID ) ) {
  Timber::render( 'pages/password.twig', $context );
} else {
  Timber::render('pages/page-template-stacked.twig', $context);
}
