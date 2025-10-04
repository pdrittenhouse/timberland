<?php

/**
 * REGISTER CUSTOMIZER HEADER OPTIONS
 **/

function theme_customize_register_header_layout( $wp_customize ) {


  /**
   * Create Header Layout Options Section
   **/

  $wp_customize->add_section( 'header_layout_options' , array(
    'title'      => __( 'Header Layout Options', 'dream' ),
    'priority'   => 46,
  ) );

  /**
   * Header Display Elements
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_display_elements',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_display_elements', array(
    'label' => 'Header Display Elements',
    'section' => 'header_layout_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Select which header elements to show/hide.'
  ) ) );

  // Show Mobile Button
  $wp_customize->add_setting( 'show_mobile_cta_button',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'show_mobile_cta_button',
    array(
      'label' => __( 'Show Mobile Button' ),
      'description' => __( 'Select to display mobile CTA button in header.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Hide Primary Nav
  $wp_customize->add_setting( 'hide_primary_nav',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_primary_nav',
    array(
      'label' => __( 'Hide Primary Nav' ),
      'description' => __( 'Select to hide primary navigation menu on mobile/desktop.' ),
      'section' => 'header_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Secondary Nav
  $wp_customize->add_setting( 'hide_secondary_nav',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_secondary_nav',
    array(
      'label' => __( 'Hide Secondary Nav' ),
      'description' => __( 'Select to hide secondary navigation menu on mobile/desktop.' ),
      'section' => 'header_layout_options',
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
  $wp_customize->add_setting( 'hide_social_nav',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_social_nav',
    array(
      'label' => __( 'Hide Social Nav' ),
      'description' => __( 'Select to hide social navigation menu on mobile/desktop.' ),
      'section' => 'header_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Header CTA
  $wp_customize->add_setting( 'hide_header_cta',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_header_cta',
    array(
      'label' => __( 'Hide Header CTA' ),
      'description' => __( 'Select to hide header CTA button on mobile/desktop.' ),
      'section' => 'header_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Hide Header Search
  $wp_customize->add_setting( 'hide_header_search',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'hide_header_search',
    array(
      'label' => __( 'Hide Header Search' ),
      'description' => __( 'Select to hide header search form on mobile/desktop.' ),
      'section' => 'header_layout_options',
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
   * Header Options
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_options',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_options', array(
    'label' => 'Header Options',
    'section' => 'header_layout_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define layout options for header.'
  ) ) );

  // Full Width Header
  $wp_customize->add_setting( 'full_width_header',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'full_width_header',
    array(
      'label' => __( 'Full Width Header' ),
      'description' => __( 'Span header container the full width of the viewport.' ),
      'section' => 'header_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'mobile' => __( 'Mobile' ),
        'desktop' => __( 'Desktop' ),
        'both' => __( 'Both' )
      )
    )
  );

  // Center Header Content
  $wp_customize->add_setting( 'center_header_content',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'center_header_content',
    array(
      'label' => __( 'Center Header Content' ),
      'description' => __( 'Select to center align mobile header content.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Desktop Logo Right
  $wp_customize->add_setting( 'desktop_logo_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'desktop_logo_right',
    array(
      'label' => __( 'Desktop Logo Right' ),
      'description' => __( 'Select to display logo on right and header content on left on desktop.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Align Mobile Button
  $wp_customize->add_setting( 'align_mobile_cta_button',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'align_mobile_cta_button',
    array(
      'label' => __( 'Align Mobile Button' ),
      'description' => __( 'Select to align mobile CTA button with logo. Only works with absolutely positioned mobile nav menu if mobile CTA button shown.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Full Height Mobile Button
  $wp_customize->add_setting( 'full_height_mobile_cta_button',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'full_height_mobile_cta_button',
    array(
      'label' => __( 'Full Height Mobile Button' ),
      'description' => __( 'Sets mobile CTA button height to the full height of the header. Only works with aligned mobile CTA button.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );


  /**
   * Nav Toggle Options
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_nav_toggle',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_nav_toggle', array(
    'label' => 'Nav Toggle Options',
    'section' => 'header_layout_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define layout options for mobile navigation toggle.'
  ) ) );

  // Relative to Container
  $wp_customize->add_setting( 'nav_toggle_relative_to_container',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'nav_toggle_relative_to_container',
    array(
      'label' => __( 'Relative to Container' ),
      'description' => __( 'Select if nav toggle position should be relative to the header container.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Center Nav Toggle
  $wp_customize->add_setting( 'center_nav_toggle',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'center_nav_toggle',
    array(
      'label' => __( 'Center Nav Toggle' ),
      'description' => __( 'Select to vertically center mobile nav toggle.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Inline Mobile Nav Toggle
  $wp_customize->add_setting( 'inline_mobile_nav_toggle',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'inline_mobile_nav_toggle',
    array(
      'label' => __( 'Inline Mobile Nav Toggle' ),
      'description' => __( 'Select to display the mobile nav toggle button inline with the mobile CTA button. Only works with absolutely positioned mobile nav menu if mobile CTA button is aligned.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Reverse Mobile Buttons
  $wp_customize->add_setting( 'reverse_mobile_buttons',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'reverse_mobile_buttons',
    array(
      'label' => __( 'Reverse Mobile Buttons' ),
      'description' => __( 'Select to reverse the order of the mobile nav toggle button and mobile CTA button. Only works with absolutely positioned mobile nav menu if the nav toggle is displayed inline.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );


  /**
   * Mobile Nav Menu Options
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_mobile_nav_menu',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_mobile_nav_menu', array(
    'label' => 'Mobile Nav Menu Options',
    'section' => 'header_layout_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define layout options for mobile navigation menu.'
  ) ) );

  // Mobile Nav Menu Position
  $wp_customize->add_setting( 'mobile_nav_menu_position',
    array(
      'default' => 'default',
      'transport'   => 'refresh'
    )
  );

  $wp_customize->add_control( 'mobile_nav_menu_position',
    array(
      'label' => __( 'Mobile Nav Menu Position' ),
      'description' => __( 'Absolutely position mobile nav menu.' ),
      'section' => 'header_layout_options',
      'type' => 'radio',
      'choices' => array(
        'default' => __( 'Default' ),
        'top' => __( 'Top' ),
        'bottom' => __( 'Bottom' ),
        'left' => __( 'Left' ),
        'right' => __( 'Right' ),
        'overlay' => __( 'Overlay' )
      )
    )
  );

  // Align to Content
  $wp_customize->add_setting( 'align_nav_to_content',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'align_nav_to_content',
    array(
      'label' => __( 'Align to Content' ),
      'description' => __( 'Adds padding to align left/right absolutely positioned menu content to body content content. Does not work with absolutely centered mobile nav content.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Full Screen
  $wp_customize->add_setting( 'full_screen_nav',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'full_screen_nav',
    array(
      'label' => __( 'Full Screen' ),
      'description' => __( 'Select to display absolutely positioned mobile navigation menu as full-screen.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );

  // Center Mobile Nav Content
  $wp_customize->add_setting( 'center_mobile_nav_content',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'center_mobile_nav_content',
    array(
      'label' => __( 'Center Mobile Nav Content' ),
      'description' => __( 'Select to absolutely center mobile navigation menu content in absolutely positioned mobile navigation menus. Only works with full-screen mobile nav menu.' ),
      'section' => 'header_layout_options',
      'type' => 'checkbox'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_header_layout' );


/**
 * ADD TO CONTEXT
 **/

class headerLayout extends TimberSite {

  function __construct() {
    add_filter( 'timber/context', [$this, 'add_to_context'], 25 );
    parent::__construct();
  }

  /**
   * Nav Toggle Options
   **/

  // Add Global variable
  function add_to_context( $context ) {

    /**
     * Header Display Elements
     **/

    $show_mobile_cta_button = get_theme_mod( 'show_mobile_cta_button', '' );
    $hide_primary_nav = get_theme_mod( 'hide_primary_nav', '' );
    $hide_secondary_nav = get_theme_mod( 'hide_secondary_nav', '' );
    $hide_social_nav = get_theme_mod( 'hide_social_nav', '' );
    $hide_header_cta = get_theme_mod( 'hide_header_cta', '' );
    $hide_header_search = get_theme_mod( 'hide_header_search', '' );

    if ( $show_mobile_cta_button ) {
      $context['show_button'] = $show_mobile_cta_button;
    }

    if ( $hide_primary_nav ) {
      $context['hide_primary_nav'] = $hide_primary_nav;
    }

    if ( $hide_secondary_nav ) {
      $context['hide_secondary_nav'] = $hide_secondary_nav;
    }

    if ( $hide_social_nav ) {
      $context['hide_social_nav'] = $hide_social_nav;
    }

    if ( $hide_header_cta ) {
      $context['hide_header_cta'] = $hide_header_cta;
    }

    if ( $hide_header_search ) {
      $context['hide_header_search'] = $hide_header_search;
    }



    /**
     * Header Options
     **/
    $full_width_header = get_theme_mod( 'full_width_header', '' );
    $center_header_content = get_theme_mod( 'center_header_content', '' );
    $desktop_logo_right = get_theme_mod( 'desktop_logo_right', '' );
    $align_mobile_cta_button = get_theme_mod( 'align_mobile_cta_button', '' );
    $full_height_mobile_cta_button = get_theme_mod( 'full_height_mobile_cta_button', '' );

    if ( $full_width_header ) {
      $context['full_width'] = $full_width_header;
    }

    if ( $center_header_content ) {
      $context['center_header'] = $center_header_content;
    }

    if ( $desktop_logo_right ) {
      $context['logo_right'] = $desktop_logo_right;
    }

    if ( $align_mobile_cta_button ) {
      $context['align_button'] = $align_mobile_cta_button;
    }

    if ( $full_height_mobile_cta_button ) {
      $context['full_height_cta'] = $full_height_mobile_cta_button;
    }


    /**
     * Nav Toggle Options
     **/

    $nav_toggle_relative_to_container = get_theme_mod( 'nav_toggle_relative_to_container', '' );
    $center_nav_toggle = get_theme_mod( 'center_nav_toggle', '' );
    $inline_mobile_nav_toggle = get_theme_mod( 'inline_mobile_nav_toggle', '' );
    $reverse_mobile_buttons = get_theme_mod( 'reverse_mobile_buttons', '' );

    if ( $nav_toggle_relative_to_container ) {
      $context['toggle_container_relative'] = $nav_toggle_relative_to_container;
    }

    if ( $center_nav_toggle ) {
      $context['toggle_center'] = $center_nav_toggle;
    }

    if ( $inline_mobile_nav_toggle ) {
      $context['inline_toggle'] = $inline_mobile_nav_toggle;
    }

    if ( $reverse_mobile_buttons ) {
      $context['reverse_buttons'] = $reverse_mobile_buttons;
    }


    /**
     * Mobile Nav Menu Options
     **/

    $mobile_nav_menu_position = get_theme_mod( 'mobile_nav_menu_position', '' );
    $align_nav_to_content = get_theme_mod( 'align_nav_to_content', '' );
    $full_screen_nav = get_theme_mod( 'full_screen_nav', '' );
    $center_mobile_nav_content = get_theme_mod( 'center_mobile_nav_content', '' );

    if ( $mobile_nav_menu_position ) {
      $context['menu_position'] = $mobile_nav_menu_position;
    }

    if ( $align_nav_to_content ) {
      $context['align_to_content'] = $align_nav_to_content;
    }

    if ( $full_screen_nav ) {
      $context['full_screen'] = $full_screen_nav;
    }

    if ( $center_mobile_nav_content ) {
      $context['center_mobile_nav'] = $center_mobile_nav_content;
    }

    return $context;
  }

}

new headerLayout();
