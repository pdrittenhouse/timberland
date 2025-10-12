<?php

if ( ! class_exists( 'Timber' ) ) {
  echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';

  return;
}

$context            = Timber::context();
$context['sidebar'] = Timber::get_widgets( 'shop-sidebar' );

if ( is_singular( 'product' ) ) {
  $timber_post = Timber::get_post();
  $context['post'] = $timber_post;

  // Add pre-calculated page styles
  if (isset($timber_post) && $timber_post) {
    $context['page_styles'] = dream_calculate_page_styles($timber_post->ID);
  }
  $product            = wc_get_product( $context['post']->ID );
  $context['product'] = $product;

  // Get related products
  $related_limit               = wc_get_loop_prop( 'columns' );
  $related_ids                 = wc_get_related_products( $context['post']->id, $related_limit );
  $context['related_products'] =  Timber::get_posts( $related_ids );

  // Restore the context and loop back to the main query loop.
  wp_reset_postdata();

  Timber::render( 'woo/single-product.twig', $context );
} else {
  $posts = Timber::get_posts();
  $context['products'] = $posts;

  if ( is_product_category() ) {
    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
    $context['category'] = get_term( $term_id, 'product_cat' );
    $context['title'] = single_term_title( '', false );
  }

  // Enqueue Bootstrap components used in woo/archive.twig and woo/tease-product.twig
  enqueue_bootstrap_component('card');
  enqueue_bootstrap_component('modal');
  enqueue_bootstrap_component('close');

  Timber::render( 'woo/archive.twig', $context );
}
