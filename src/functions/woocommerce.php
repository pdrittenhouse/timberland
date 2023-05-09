<?php

/**
 * Add Woocommerce Support
 */
function theme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'theme_add_woocommerce_support' );


/**
 * Remove default related-products
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


/**
 * Set products loop context for tease-product.twig
 */
function timber_set_product( $post ) {
  global $product;

  if ( is_woocommerce() ) {
    $product = wc_get_product( $post->ID );
  }
}


/**
 * Remove woocommerce stylesheets
 */
// remove one by one
add_filter( 'woocommerce_enqueue_styles', 'wc_dequeue_styles' );
function wc_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
  unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
//  unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
  return $enqueue_styles;
}

// or remove all woocommerce stylesheets in one line
//add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Sorting Options
 */
add_filter( 'woocommerce_catalog_orderby', 'wc_rename_default_sorting_options' );

function wc_rename_default_sorting_options( $options ){

//  unset( $options[ 'menu_order' ] ); // remove
//  unset( $options[ 'popularity' ] ); // remove
//  unset( $options[ 'rating' ] ); // remove
//  unset( $options[ 'date' ] ); // remove
//  unset( $options[ 'price' ] ); // remove
//  unset( $options[ 'price-desc' ] ); // remove

  $options[ 'menu_order' ] = 'Sort'; // rename
//  $options[ 'popularity' ] = 'Sort by popularity'; // rename
//  $options[ 'rating' ] = 'Sort by average rating'; // rename
//  $options[ 'date' ] = 'Sort by newness'; // rename
//  $options[ 'price' ] = 'Sort by price: low to high'; // rename
//  $options[ 'price-desc' ] = 'Sort by price: high to low'; // rename

  return $options;
}

/**
 * Customize breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'woocommerce_breadcrumbs' );
function woocommerce_breadcrumbs() {
  return array(
    'delimiter'   => ' <span class="delimiter">&#47;</span> ',
    'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
    'wrap_after'  => '</nav>',
    'before' => '<span class="breadcrumb-item">',
    'after'  => '</span>',
//    'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
  );
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}


/**
 * Set single image size
 */
add_filter( 'woocommerce_get_image_size_single', function( $size ) {
  return array(
    'width'  => 600,
    'height' => 900,
    'crop'   => 0,
  );
} );


/**
 * Update cart button everytime the cart widget is updated
 */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
  ob_start();
  global $woocommerce;
  $context = [ 'woo' => $woocommerce ];

  Timber::render( 'woo/cart-button.twig', $context );

  // Must be the same button ID with the one we use in template
  $fragments['#cart-button'] = ob_get_clean();
  return $fragments;
} );


/**
 * Reorder single product summary
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 50 );


/**
 * Disable Free Shipping Bar for Woocommerce Bootstrap scripts
 */
function fsbwc_disable_scripts() {
  wp_dequeue_script('fme_wfsb_bootstrap_js');
}
add_action('wp_enqueue_scripts', 'fsbwc_disable_scripts', 100);


/**
 * Remove "Products tagged" from product tags breadcrumbs
 */
add_filter('woocommerce_get_breadcrumb', 'woocommerce_breadcrumbs_remove_text', 10);
function woocommerce_breadcrumbs_remove_text($crumbs) {

  // Check if we are in a product tag archive page
  if (is_product_tag()) {

    // Point to the last element of the breadcrumbs array, specifically the breadcrumb we are going to edit
    end($crumbs);

    // Get the text to edit (array key number 0)
    $last    = $crumbs[key($crumbs)][0];

    // Perform a regular expression to keep only what's between quotes (&ldquo; and &rdquo;)
    $replace = preg_replace('/[\s\S]+\&ldquo;([\s\S]+)\&rdquo;/', '$1', $last);

    // Register the new text to the breadcrumb array
    $crumbs[key($crumbs)][0] = $replace;

    // Reset the array pointer
    reset($crumbs);
  }

  // Return the filtered breadcrumbs array
  return $crumbs;
}
