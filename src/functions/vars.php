<?php

// @link https://wptips.dev/global-var-n-filters-in-timber/

class customVars extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    parent::__construct();
  }

  // Add Global variable
  function add_to_context( $context ) {
    // Site's settings like site.title
    $context['site'] = $this;
    $context['home_url'] = home_url();

    // Menu - Timber stored it as an array so you can loop it and write custom markup
    $context['nav'] = new TimberMenu( 'main-nav' );

    // Link to the image inside your theme
    // Example:   <img src="{{ images }}/logo.svg">
    $context['paths'] = [
      'assets' => get_template_directory_uri() . '/dist/wp',
      'scripts' => get_template_directory_uri() . '/dist/wp/css',
      'styles' => get_template_directory_uri() . '/dist/wp/js',
      'images' => get_template_directory_uri() . '/dist/wp/img',
      'fonts' => get_template_directory_uri() . '/dist/wp/fonts',
      'patternlab' => get_template_directory_uri() . '/dist/pl'
    ];

    // Widgets - for post widget, no need to be global
    // $context['footer_widgets'] = Timber::get_widgets( 'footer_widgets' );

    // Add sidebar to context
    $context['sidebar'] = Timber::get_sidebar('sidebar.php');

    // Add sidebar_class to context
    $sidebar_class = 'sidebar-active ';
    if (is_active_sidebar('primary_sidebar') || is_active_sidebar('secondary_sidebar') || is_active_sidebar('tertiary_sidebar')) {
      $context['sidebar_class'] = 'sidebar-active';
    }

    // Add header widget area to context
    $context['header_widget_area'] = Timber::get_widgets('header_widget_area');

    // Add footer widget area to context
    $context['footer_widget_area'] = Timber::get_widgets('footer_widget_area');

    // ACF Options Page, if you have one
    if( function_exists( 'acf_add_options_page' )) {
      $context['options'] = get_fields( 'options' );
    }

    // WooCommerce, if installed
    if( class_exists('WooCommerce') ) {
      global $woocommerce;
      $context['woo'] = $woocommerce;
    }

    return $context;
  }

}

new customVars(); // call the class
