<?php

// @link https://wptips.dev/global-var-n-filters-in-timber/

class customVars extends TimberSite {

  function __construct() {
    add_filter( 'timber/context', [$this, 'add_to_context'], 10 );
    parent::__construct();
  }

  // Add Global variable
  function add_to_context( $context ) {
    // Site's settings like site.title
    // $context['site'] = $this;
    $context['home_url'] = home_url();

    // Menu - Timber stored it as an array so you can loop it and write custom markup
    $context['nav'] = new TimberMenu( 'main-nav' );

    // Add paths to context
    // Note: Shared with block context via StarterSite::get_theme_paths()
    // Example:   <img src="{{ images }}/logo.svg">
    $context['paths'] = StarterSite::get_theme_paths();

    // Widgets - for post widget, no need to be global
    // $context['footer_widgets'] = Timber::get_widgets( 'footer_widgets' );

    // Sidebar Widget Area Context
    global $wp_registered_sidebars;
    $exclude = ['header_widget_area', 'footer_widget_area'];
    $has_active_sidebar = false;

    foreach ($wp_registered_sidebars as $sidebar_id => $sidebar) {
      if (!in_array($sidebar_id, $exclude) && is_active_sidebar($sidebar_id)) {
        $has_active_sidebar = true;
        break;
      }
    }

    if ($has_active_sidebar) {
      // Add sidebar to context
      $context['sidebar'] = Timber::get_sidebar('sidebar.php');
      // Add sidebar_class to context
      $context['sidebar_class'] = 'sidebar-active';
    }

    // Header Widget Area Context
    if (is_active_sidebar('header_widget_area')) {
      // Add header widget area to context
      $context['header_widget_area'] = Timber::get_widgets('header_widget_area');
    }

    // Footer Widget Area Context
    if (is_active_sidebar('footer_widget_area')) {
      // Add footer widget area to context
      $context['footer_widget_area'] = Timber::get_widgets('footer_widget_area');
    }

    // ACF Options Page, if you have one
    // Options context set in fields.php. Uncomment this if there are issues with options context vars
    // if( function_exists( 'acf_add_options_page' )) {
    //   $context['options'] = get_fields( 'options' );
    // }

    // WooCommerce, if installed
    if( class_exists('WooCommerce') ) {
      global $woocommerce;
      $context['woo'] = $woocommerce;
    }

    return $context;
  }

}

new customVars(); // call the class
