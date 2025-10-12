<?php
/*
* Template Name: Simple Layout
* Description: A page template with a simple header and footer.
* Post Type: post, page
*/

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$context['form_action'] = esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) );

// Add pre-calculated page styles
if (isset($timber_post) && $timber_post) {
	$context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
}

if ( post_password_required( $timber_post->ID ) ) {
  Timber::render( 'pages/password.twig', $context );
} else {
  Timber::render('pages/page-template-simple.twig', $context);
}
