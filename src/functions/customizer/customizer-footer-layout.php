<?php

/**
 * REGISTER CUSTOMIZER FOOTER OPTIONS
 **/

function theme_customize_register_footer_layout( $wp_customize ) {


  /**
   * Create Footer Layout Options Section
   **/

  $wp_customize->add_section( 'footer_layout_options' , array(
    'title'      => __( 'Footer Layout Options', 'dream' ),
    'priority'   => 80,
  ) );

  /**
   * Footer Display Elements
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_display_elements',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_display_elements', array(
    'label' => 'Footer Display Elements',
    'section' => 'footer_layout_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Select which footer elements to show/hide.'
  ) ) );

  // Hide Footer Branding
  $wp_customize->add_setting( 'hide_footer_brand',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_brand',
    array(
      'label' => __( 'Hide Footer Branding' ),
      'description' => __( 'Select to hide footer logo, site name and tagline on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer CTA
  $wp_customize->add_setting( 'hide_footer_cta',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_cta',
    array(
      'label' => __( 'Hide Footer CTA' ),
      'description' => __( 'Select to hide footer CTA button on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer Nav
  $wp_customize->add_setting( 'hide_footer_nav',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_nav',
    array(
      'label' => __( 'Hide Footer Nav' ),
      'description' => __( 'Select to hide footer navigation menu on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Social Nav
  $wp_customize->add_setting( 'hide_footer_social_nav',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_social_nav',
    array(
      'label' => __( 'Hide Social Nav' ),
      'description' => __( 'Select to hide footer social navigation menu on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer Search
  $wp_customize->add_setting( 'hide_footer_search',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_search',
    array(
      'label' => __( 'Hide Footer Search' ),
      'description' => __( 'Select to hide footer search form on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer Contact Info
  $wp_customize->add_setting( 'hide_footer_contact_info',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_contact_info',
    array(
      'label' => __( 'Hide Footer Contact Info' ),
      'description' => __( 'Select to hide footer contact info list on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer Disclaimer
  $wp_customize->add_setting( 'hide_footer_disclaimer',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_disclaimer',
    array(
      'label' => __( 'Hide Footer Disclaimer' ),
      'description' => __( 'Select to hide footer disclaimer text on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer Attribution
  $wp_customize->add_setting( 'hide_footer_attribution',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_attribution',
    array(
      'label' => __( 'Hide Footer Attribution' ),
      'description' => __( 'Select to hide footer attribution on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Utility Nav
  $wp_customize->add_setting( 'hide_footer_utility_nav',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_utility_nav',
    array(
      'label' => __( 'Hide Utility Nav' ),
      'description' => __( 'Select to hide footer utility navigation menu on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Footer Copyright
  $wp_customize->add_setting( 'hide_footer_copyright',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_footer_copyright',
    array(
      'label' => __( 'Hide Footer Copyright' ),
      'description' => __( 'Select to hide footer copyright on mobile/desktop.' ),
      'section' => 'footer_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );


  /**
   * Footer Two Column Display
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_two_col',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_two_col', array(
    'label' => 'Footer 2 Column Layout',
    'section' => 'footer_layout_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define 2 column layout options for footer.'
  ) ) );

  // Two Column Layout
  $wp_customize->add_setting( 'footer_two_column_layout',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_two_column_layout',
    array(
      'label' => __( 'Two Column Layout' ),
      'description' => __( 'Select to display footer content in 2 columns.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );

  // Reverse Columns
  $wp_customize->add_setting( 'footer_reverse_column_layout',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_reverse_column_layout',
    array(
      'label' => __( 'Reverse Columns' ),
      'description' => __( 'Select to reverse left/right columns in 2 column layout.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );

  // Reverse Columns
  $wp_customize->add_setting( 'footer_reverse_meta_columns',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_reverse_meta_columns',
    array(
      'label' => __( 'Reverse Meta Columns' ),
      'description' => __( 'Select to reverse copyright & footer utility menu columns in 2 column layout.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );


  /**
   * Footer Copyright Options
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_copyright',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_copyright', array(
    'label' => 'Footer Copyright Options',
    'section' => 'footer_layout_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Select display options for footer copyright.'
  ) ) );

  // Hide Footer Copyright Label
  $wp_customize->add_setting( 'hide_footer_copyright_label',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'hide_footer_copyright_label',
    array(
      'label' => __( 'Hide Footer Copyright Label' ),
      'description' => __( 'Select to hide footer copyright label.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );

  // Hide Footer Copyright Icon
  $wp_customize->add_setting( 'hide_footer_copyright_icon',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'hide_footer_copyright_icon',
    array(
      'label' => __( 'Hide Footer Copyright Icon' ),
      'description' => __( 'Select to hide footer copyright icon.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );

  // Hide Footer Copyright Year
  $wp_customize->add_setting( 'hide_footer_copyright_year',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'hide_footer_copyright_year',
    array(
      'label' => __( 'Hide Footer Copyright Year' ),
      'description' => __( 'Select to hide footer copyright year.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );

  // Hide Footer Copyright Site Name
  $wp_customize->add_setting( 'hide_footer_copyright_site_name',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'hide_footer_copyright_site_name',
    array(
      'label' => __( 'Hide Footer Copyright Site Name' ),
      'description' => __( 'Select to hide footer copyright site name.' ),
      'section' => 'footer_layout_options',
      'type' => 'checkbox'
    )
  );




}

add_action( 'customize_register', 'theme_customize_register_footer_layout' );


/**
 * ADD TO CONTEXT
 **/

class footerLayout extends TimberSite {

  function __construct() {
    add_filter( 'timber/context', [$this, 'add_to_context'], 25 );
    parent::__construct();
  }


  // Add Global variable
  function add_to_context( $context ) {

    /**
     * Footer Display Elements
     **/

    $hide_footer_brand = get_theme_mod( 'hide_footer_brand', '' );
    $hide_footer_cta = get_theme_mod( 'hide_footer_cta', '' );
    $hide_footer_nav = get_theme_mod( 'hide_footer_nav', '' );
    $hide_footer_social_nav = get_theme_mod( 'hide_footer_social_nav', '' );
    $hide_footer_search = get_theme_mod( 'hide_footer_search', '' );
    $hide_footer_contact_info = get_theme_mod( 'hide_footer_contact_info', '' );
    $hide_footer_disclaimer = get_theme_mod( 'hide_footer_disclaimer', '' );
    $hide_footer_attribution = get_theme_mod( 'hide_footer_attribution', '' );
    $hide_footer_utility_nav = get_theme_mod( 'hide_footer_utility_nav', '' );
    $hide_footer_copyright = get_theme_mod( 'hide_footer_copyright', '' );

    if ( $hide_footer_brand ) {
      $context['hide_footer_brand'] = $hide_footer_brand;
    }

    if ( $hide_footer_cta ) {
      $context['hide_footer_cta'] = $hide_footer_cta;
    }

    if ( $hide_footer_nav ) {
      $context['hide_footer_nav'] = $hide_footer_nav;
    }

    if ( $hide_footer_social_nav ) {
      $context['hide_footer_social_nav'] = $hide_footer_social_nav;
    }

    if ( $hide_footer_search ) {
      $context['hide_footer_search'] = $hide_footer_search;
    }

    if ( $hide_footer_contact_info ) {
      $context['hide_footer_contact_info'] = $hide_footer_contact_info;
    }

    if ( $hide_footer_disclaimer ) {
      $context['hide_footer_disclaimer'] = $hide_footer_disclaimer;
    }

    if ( $hide_footer_attribution ) {
      $context['hide_footer_attribution'] = $hide_footer_attribution;
    }

    if ( $hide_footer_utility_nav ) {
      $context['hide_footer_utility_nav'] = $hide_footer_utility_nav;
    }

    if ( $hide_footer_copyright ) {
      $context['hide_footer_copyright'] = $hide_footer_copyright;
    }


    /**
     * Footer Two Column Display
     **/

    $footer_two_column_layout = get_theme_mod( 'footer_two_column_layout', '' );
    $footer_reverse_column_layout = get_theme_mod( 'footer_reverse_column_layout', '' );
    $footer_reverse_meta_columns = get_theme_mod( 'footer_reverse_meta_columns', '' );

    if ( $footer_two_column_layout ) {
      $context['footer_two_cols'] = $footer_two_column_layout;
    }

    if ( $footer_reverse_column_layout ) {
      $context['footer_reverse_cols'] = $footer_reverse_column_layout;
    }

    if ( $footer_reverse_meta_columns ) {
      $context['footer_reverse_meta'] = $footer_reverse_meta_columns;
    }


    /**
     * Footer Copyright Options
     **/

    $hide_footer_copyright_label = get_theme_mod( 'hide_footer_copyright_label', '' );
    $hide_footer_copyright_icon = get_theme_mod( 'hide_footer_copyright_icon', '' );
    $hide_footer_copyright_year = get_theme_mod( 'hide_footer_copyright_year', '' );
    $hide_footer_copyright_site_name = get_theme_mod( 'hide_footer_copyright_site_name', '' );

    if ( $hide_footer_copyright_label ) {
      $context['hide_copyright_label'] = $hide_footer_copyright_label;
    }

    if ( $hide_footer_copyright_icon ) {
      $context['hide_copyright_icon'] = $hide_footer_copyright_icon;
    }

    if ( $hide_footer_copyright_year ) {
      $context['hide_copyright_year'] = $hide_footer_copyright_year;
    }

    if ( $hide_footer_copyright_site_name ) {
      $context['hide_copyright_name'] = $hide_footer_copyright_site_name;
    }


    return $context;
  }

}

new footerLayout();
