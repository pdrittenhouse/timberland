<?php
/*
* Template Name: Simple Layout
* Description: A page template with a simple header and footer.
* Post Type: post, page
*/

// Try to get cached page
$cache_key = dream_generate_cache_key('page-template-simple');
$cached_html = dream_get_page_cache($cache_key, get_the_ID());

if ($cached_html !== false) {
	echo $cached_html;
} else {
	// Start output buffering to capture the rendered HTML
	ob_start();

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

	// Get the rendered HTML and cache it (unless password protected)
	$html = ob_get_clean();
	if (!post_password_required($timber_post->ID)) {
		dream_set_page_cache($cache_key, $html, $timber_post->ID);
	}
	echo $html;
}
