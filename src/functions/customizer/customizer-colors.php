<?php

// link: https://make.wordpress.org/themes/2019/12/30/new-color-alpha-package-available/
use \WPTRT\Customize\Control\ColorAlpha;

/**
 * Sanitize colors.
 *
 * @since 1.0.0
 * @param string $value The color.
 * @return string
 */
function my_custom_sanitization_callback( $value ) {
  // This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
  $pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
  \preg_match( $pattern, $value, $matches );
  // Return the 1st match found.
  if ( isset( $matches[0] ) ) {
    if ( is_string( $matches[0] ) ) {
      return $matches[0];
    }
    if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
      return $matches[0][0];
    }
  }
  // If no match was found, return an empty string.
  return '';
}

/**
 * REGISTER CUSTOMIZER COLOR OPTIONS
 **/

function theme_customize_register_colors( $wp_customize ) {

  $wp_customize->register_control_type( '\WPTRT\Customize\Control\ColorAlpha' );

  //Disable Default Color Section
  $wp_customize->remove_panel('colors');

  //Remove Default Color Options
  $wp_customize->remove_control('background_color');
  $wp_customize->remove_control('header_textcolor');


  /**
   * Create Color Options Section
   **/

  $wp_customize->add_section( 'color_options' , array(
    'title'      => __( 'Color Options', 'dream' ),
    'priority'   => 10,
  ) );


  /**
   * Base Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_base_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_base_colors', array(
    'label' => 'Base Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define base color palette.'
  ) ) );

  // Primary color
  $wp_customize->add_setting( 'primary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control(  new ColorAlpha( $wp_customize, 'primary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Primary color', 'dream' ),
  ) ) );

  // Secondary color
  $wp_customize->add_setting( 'secondary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'secondary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Secondary color', 'dream' ),
  ) ) );

  // Tertiary color
  $wp_customize->add_setting( 'tertiary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'tertiary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Tertiary color', 'dream' ),
  ) ) );

  // Quarternary color
  $wp_customize->add_setting( 'quarternary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'quarternary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Quarternary color', 'dream' ),
  ) ) );

  // Quinary color
  $wp_customize->add_setting( 'quinary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'quinary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Quinary color', 'dream' ),
  ) ) );

  // Senary color
  $wp_customize->add_setting( 'senary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'senary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Senary color', 'dream' ),
  ) ) );

  // Septenary color
  $wp_customize->add_setting( 'septenary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'septenary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Septenary color', 'dream' ),
  ) ) );

  // Octonary color
  $wp_customize->add_setting( 'octonary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'octonary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Octonary color', 'dream' ),
  ) ) );

  // Nonary color
  $wp_customize->add_setting( 'nonary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nonary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nonary color', 'dream' ),
  ) ) );

  // Denary color
  $wp_customize->add_setting( 'denary_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'denary_color', array(
    'section' => 'color_options',
    'label'   => __( 'Denary color', 'dream' ),
  ) ) );


  /**
   * Body Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_body_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_body_colors', array(
    'label' => 'Body Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define body colors.'
  ) ) );

  // Background color
  $wp_customize->add_setting( 'bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control(  new ColorAlpha( $wp_customize, 'bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Background color', 'dream' ),
  ) ) );

  // Text color
  $wp_customize->add_setting( 'text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Text color', 'dream' ),
  ) ) );


  /**
   * Header Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_colors', array(
    'label' => 'Header Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define header colors.'
  ) ) );

  // Header background color
  $wp_customize->add_setting( 'header_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header background color', 'dream' ),
  ) ) );

  // Header border top color
  $wp_customize->add_setting( 'header_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header border top color', 'dream' ),
  ) ) );

  // Header border bottom color
  $wp_customize->add_setting( 'header_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header border bottom color', 'dream' ),
  ) ) );

  // Header border left color
  $wp_customize->add_setting( 'header_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header border left color', 'dream' ),
  ) ) );

  // Header border right color
  $wp_customize->add_setting( 'header_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header border right color', 'dream' ),
  ) ) );

  // Header Text color
  $wp_customize->add_setting( 'header_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control(  new ColorAlpha( $wp_customize, 'header_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header text color', 'dream' ),
  ) ) );

  // Header link color
  $wp_customize->add_setting( 'header_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header link color', 'dream' ),
  ) ) );

  // Header link hover color
  $wp_customize->add_setting( 'header_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header link hover color', 'dream' ),
  ) ) );

  // Header box shadow color
  $wp_customize->add_setting( 'header_box_shadow_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_box_shadow_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header box shadow color', 'dream' ),
  ) ) );

  /**
   * Header Branding Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_branding_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_branding_colors', array(
    'label' => 'Header Branding Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define header branding colors.'
  ) ) );

  // Header branding color
  $wp_customize->add_setting( 'header_branding_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_branding_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header branding color', 'dream' ),
  ) ) );

  // Header branding hover color
  $wp_customize->add_setting( 'header_branding_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_branding_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header branding hover color', 'dream' ),
  ) ) );


  /**
   * Navbar Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_colors', array(
    'label' => 'Nav Bar Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define navigation bar colors.'
  ) ) );

  // Nav toggle color
  $wp_customize->add_setting( 'nav_toggle_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_toggle_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav toggle color', 'dream' ),
  ) ) );

  // Nav toggle active color
  $wp_customize->add_setting( 'nav_toggle_active_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_toggle_active_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav toggle active color', 'dream' ),
  ) ) );

  // Nav background color
  $wp_customize->add_setting( 'nav_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav background color', 'dream' ),
  ) ) );

  // Nav mobile background color
  $wp_customize->add_setting( 'nav_bg_mobile_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_bg_mobile_color', array(
    'section' => 'color_options',
    'label'   => __( 'Mobile nav background color', 'dream' ),
  ) ) );

  // Nav border top color
  $wp_customize->add_setting( 'nav_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav border top color', 'dream' ),
  ) ) );

  // Nav border bottom color
  $wp_customize->add_setting( 'nav_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav border bottom color', 'dream' ),
  ) ) );

  // Nav border left color
  $wp_customize->add_setting( 'nav_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav border left color', 'dream' ),
  ) ) );

  // Nav border right color
  $wp_customize->add_setting( 'nav_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Nav border right color', 'dream' ),
  ) ) );

  // Nav mobile border top color
  $wp_customize->add_setting( 'nav_mobile_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_mobile_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Mobile nav border top color', 'dream' ),
  ) ) );

  // Nav mobile border bottom color
  $wp_customize->add_setting( 'nav_mobile_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_mobile_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Mobile nav border bottom color', 'dream' ),
  ) ) );

  // Nav mobile border left color
  $wp_customize->add_setting( 'nav_mobile_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_mobile_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Mobile nav border left color', 'dream' ),
  ) ) );


  // Nav mobile border right color
  $wp_customize->add_setting( 'nav_mobile_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'nav_mobile_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Mobile nav border right color', 'dream' ),
  ) ) );


  /**
   * Primary Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_primary_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_primary_nav_colors', array(
    'label' => 'Primary Nav Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define primary navigation menu colors.'
  ) ) );

  // Primary nav link color
  $wp_customize->add_setting( 'primary_nav_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'primary_nav_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Primary nav link color', 'dream' ),
  ) ) );

  // Primary nav link hover color
  $wp_customize->add_setting( 'primary_nav_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'primary_nav_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Primary nav link hover color', 'dream' ),
  ) ) );

  // Primary nav link decoration color
  $wp_customize->add_setting( 'primary_nav_link_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'primary_nav_link_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Primary nav link decoration color', 'dream' ),
  ) ) );

  // Primary nav link decoration hover color
  $wp_customize->add_setting( 'primary_nav_link_decoration_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'primary_nav_link_decoration_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Primary nav link decoration hover color', 'dream' ),
  ) ) );


  /**
   * Secondary Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_secondary_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_secondary_nav_colors', array(
    'label' => 'Secondary Nav Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define secondary navigation menu colors.'
  ) ) );

  // Secondary nav link color
  $wp_customize->add_setting( 'secondary_nav_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'secondary_nav_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Secondary nav link color', 'dream' ),
  ) ) );

  // Secondary nav link hover color
  $wp_customize->add_setting( 'secondary_nav_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'secondary_nav_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Secondary nav link hover color', 'dream' ),
  ) ) );

  // Secondary nav link decoration color
  $wp_customize->add_setting( 'secondary_nav_link_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'secondary_nav_link_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Secondary nav link decoration color', 'dream' ),
  ) ) );

  // Secondary nav link decoration hover color
  $wp_customize->add_setting( 'secondary_nav_link_decoration_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'secondary_nav_link_decoration_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Secondary nav link decoration hover color', 'dream' ),
  ) ) );


  /**
   * Header CTA Button Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_colors', array(
    'label' => 'Header CTA Button Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define header CTA button colors.'
  ) ) );

  // Header CTA button color
  $wp_customize->add_setting( 'header_cta_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button color', 'dream' ),
  ) ) );

  // Header CTA button hover color
  $wp_customize->add_setting( 'header_cta_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button hover color', 'dream' ),
  ) ) );

  // Header CTA button text color
  $wp_customize->add_setting( 'header_cta_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button text color', 'dream' ),
  ) ) );

  // Header CTA button text hover color
  $wp_customize->add_setting( 'header_cta_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button text hover color', 'dream' ),
  ) ) );

  // Header CTA button border top color
  $wp_customize->add_setting( 'header_cta_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border top color', 'dream' ),
  ) ) );

  // Header CTA button border bottom color
  $wp_customize->add_setting( 'header_cta_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border bottom color', 'dream' ),
  ) ) );

  // Header CTA button border left color
  $wp_customize->add_setting( 'header_cta_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border left color', 'dream' ),
  ) ) );

  // Header CTA button border right color
  $wp_customize->add_setting( 'header_cta_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border right color', 'dream' ),
  ) ) );

  // Header CTA button border top hover color
  $wp_customize->add_setting( 'header_cta_border_top_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_top_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border top hover color', 'dream' ),
  ) ) );

  // Header CTA button border bottom hover color
  $wp_customize->add_setting( 'header_cta_border_bottom_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_bottom_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border bottom hover color', 'dream' ),
  ) ) );

  // Header CTA button border left hover color
  $wp_customize->add_setting( 'header_cta_border_left_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_left_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border left hover color', 'dream' ),
  ) ) );

  // Header CTA button border right hover color
  $wp_customize->add_setting( 'header_cta_border_right_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_cta_border_right_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header CTA button border right hover color', 'dream' ),
  ) ) );


  /**
   * Header Mobile CTA Button Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_mobile_cta_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_mobile_cta_colors', array(
    'label' => 'Header Mobile CTA Button Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define header mobile CTA button colors.'
  ) ) );

  // Header mobile CTA button color
  $wp_customize->add_setting( 'header_mobile_cta_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button color', 'dream' ),
  ) ) );

  // Header mobile CTA button hover color
  $wp_customize->add_setting( 'header_mobile_cta_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button hover color', 'dream' ),
  ) ) );

  // Header mobile CTA button text color
  $wp_customize->add_setting( 'header_mobile_cta_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button text color', 'dream' ),
  ) ) );

  // Header mobile CTA button text hover color
  $wp_customize->add_setting( 'header_mobile_cta_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button text hover color', 'dream' ),
  ) ) );

  // Header mobile CTA button border top color
  $wp_customize->add_setting( 'header_mobile_cta_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border top color', 'dream' ),
  ) ) );

  // Header mobile CTA button border bottom color
  $wp_customize->add_setting( 'header_mobile_cta_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border bottom color', 'dream' ),
  ) ) );

  // Header mobile CTA button border left color
  $wp_customize->add_setting( 'header_mobile_cta_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border left color', 'dream' ),
  ) ) );

  // Header mobile CTA button border right color
  $wp_customize->add_setting( 'header_mobile_cta_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border right color', 'dream' ),
  ) ) );

  // Header mobile CTA button border top hover color
  $wp_customize->add_setting( 'header_mobile_cta_border_top_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_top_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border top hover color', 'dream' ),
  ) ) );

  // Header mobile CTA button border bottom hover color
  $wp_customize->add_setting( 'header_mobile_cta_border_bottom_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_bottom_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border bottom hover color', 'dream' ),
  ) ) );

  // Header mobile CTA button border left hover color
  $wp_customize->add_setting( 'header_mobile_cta_border_left_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_left_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border left hover color', 'dream' ),
  ) ) );

  // Header mobile CTA button border right hover color
  $wp_customize->add_setting( 'header_mobile_cta_border_right_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_mobile_cta_border_right_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header mobile CTA button border right hover color', 'dream' ),
  ) ) );


  /**
   * Header Search Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search', array(
    'label' => 'Header Search Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define header search form colors.'
  ) ) );

  // Header search input background color
  $wp_customize->add_setting( 'header_search_input_background_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_input_background_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search input background color', 'dream' ),
  ) ) );

  // Header search input background hover color
  $wp_customize->add_setting( 'header_search_input_background_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_input_background_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search input background hover color', 'dream' ),
  ) ) );

  // Header search input border color
  $wp_customize->add_setting( 'header_search_input_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_input_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search input border color', 'dream' ),
  ) ) );

  // Header search input border hover color
  $wp_customize->add_setting( 'header_search_input_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_input_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search input border hover color', 'dream' ),
  ) ) );

  // Header search button color
  $wp_customize->add_setting( 'header_search_button_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button color', 'dream' ),
  ) ) );

  // Header search button hover color
  $wp_customize->add_setting( 'header_search_button_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button hover color', 'dream' ),
  ) ) );

  // Header search button text color
  $wp_customize->add_setting( 'header_search_button_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button text color', 'dream' ),
  ) ) );

  // Header search button text hover color
  $wp_customize->add_setting( 'header_search_button_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button text hover color', 'dream' ),
  ) ) );

  // Header search button border top color
  $wp_customize->add_setting( 'header_search_button_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border top color', 'dream' ),
  ) ) );

  // Header search button border bottom color
  $wp_customize->add_setting( 'header_search_button_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border bottom color', 'dream' ),
  ) ) );

  // Header search button border left color
  $wp_customize->add_setting( 'header_search_button_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border left color', 'dream' ),
  ) ) );

  // Header search button border right color
  $wp_customize->add_setting( 'header_search_button_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border right color', 'dream' ),
  ) ) );

  // Header search button border top hover color
  $wp_customize->add_setting( 'header_search_button_border_top_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_top_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border top hover color', 'dream' ),
  ) ) );

  // Header search button border bottom hover color
  $wp_customize->add_setting( 'header_search_button_border_bottom_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_bottom_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border bottom hover color', 'dream' ),
  ) ) );

  // Header search button border left hover color
  $wp_customize->add_setting( 'header_search_button_border_left_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_left_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border left hover color', 'dream' ),
  ) ) );

  // Header search button border right hover color
  $wp_customize->add_setting( 'header_search_button_border_right_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_search_button_border_right_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header search button border right hover color', 'dream' ),
  ) ) );


  /**
   * Header social Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_colors', array(
    'label' => 'Header social Nav Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define header social navigation colors.'
  ) ) );

  // Header social nav background color
  $wp_customize->add_setting( 'header_social_nav_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav background color', 'dream' ),
  ) ) );

  // Header social nav item color
  $wp_customize->add_setting( 'header_social_nav_item_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_item_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav item color', 'dream' ),
  ) ) );

  // Header social nav item hover color
  $wp_customize->add_setting( 'header_social_nav_item_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_item_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav item hover color', 'dream' ),
  ) ) );

  // Header social nav item background color
  $wp_customize->add_setting( 'header_social_nav_item_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_item_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav item background color', 'dream' ),
  ) ) );

  // Header social nav item background hover color
  $wp_customize->add_setting( 'header_social_nav_item_bg_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_item_bg_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav item background hover color', 'dream' ),
  ) ) );

  // Header social nav item border color
  $wp_customize->add_setting( 'header_social_nav_item_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_item_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav item border color', 'dream' ),
  ) ) );

  // Header social nav item border hover color
  $wp_customize->add_setting( 'header_social_nav_item_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'header_social_nav_item_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Header social nav item border hover color', 'dream' ),
  ) ) );


  /**
   * Alert Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_alert_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_alert_colors', array(
    'label' => 'Alert Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define alert colors.'
  ) ) );

  // Alert background color
  $wp_customize->add_setting( 'alert_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert background color', 'dream' ),
  ) ) );

  // Alert text color
  $wp_customize->add_setting( 'alert_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert text color', 'dream' ),
  ) ) );

  // Alert link color
  $wp_customize->add_setting( 'alert_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert link color', 'dream' ),
  ) ) );

  // Alert link decoration color
  $wp_customize->add_setting( 'alert_link_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_link_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert link decoration color', 'dream' ),
  ) ) );

  // Alert link hover color
  $wp_customize->add_setting( 'alert_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert link hover color', 'dream' ),
  ) ) );

  // Alert link decoration hover color
  $wp_customize->add_setting( 'alert_link_decoration_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_link_decoration_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert link decoration hover color', 'dream' ),
  ) ) );

  // Alert text shadow color
  $wp_customize->add_setting( 'alert_text_shadow_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'alert_text_shadow_color', array(
    'section' => 'color_options',
    'label'   => __( 'Alert text shadow color', 'dream' ),
  ) ) );


  /**
   * Footer Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_colors', array(
    'label' => 'Footer Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer colors.'
  ) ) );

  // Footer background color
  $wp_customize->add_setting( 'footer_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer background color', 'dream' ),
  ) ) );

  // Footer Text color
  $wp_customize->add_setting( 'footer_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control(  new ColorAlpha( $wp_customize, 'footer_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer text color', 'dream' ),
  ) ) );

  // Footer link color
  $wp_customize->add_setting( 'footer_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer link color', 'dream' ),
  ) ) );

  // Footer link hover color
  $wp_customize->add_setting( 'footer_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer link hover color', 'dream' ),
  ) ) );


  // Footer border top color
  $wp_customize->add_setting( 'footer_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer border top color', 'dream' ),
  ) ) );

  // Footer border bottom color
  $wp_customize->add_setting( 'footer_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer border bottom color', 'dream' ),
  ) ) );

  // Footer border left color
  $wp_customize->add_setting( 'footer_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer border left color', 'dream' ),
  ) ) );

  // Footer border right color
  $wp_customize->add_setting( 'footer_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer border right color', 'dream' ),
  ) ) );

  // Footer box shadow color
  $wp_customize->add_setting( 'footer_box_shadow_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_box_shadow_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer box shadow color', 'dream' ),
  ) ) );


  /**
   * Footer Branding Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_branding_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_branding_colors', array(
    'label' => 'Footer Branding Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer branding colors.'
  ) ) );

  // Footer branding color
  $wp_customize->add_setting( 'footer_branding_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_branding_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer branding color', 'dream' ),
  ) ) );

  // Footer branding hover color
  $wp_customize->add_setting( 'footer_branding_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_branding_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer branding hover color', 'dream' ),
  ) ) );


  /**
   * Footer CTA Button Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_colors', array(
    'label' => 'Footer CTA Button Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer CTA button colors.'
  ) ) );

  // Footer CTA button color
  $wp_customize->add_setting( 'footer_cta_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button color', 'dream' ),
  ) ) );

  // Footer CTA button hover color
  $wp_customize->add_setting( 'footer_cta_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button hover color', 'dream' ),
  ) ) );

  // Footer CTA button text color
  $wp_customize->add_setting( 'footer_cta_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button text color', 'dream' ),
  ) ) );

  // Footer CTA button text hover color
  $wp_customize->add_setting( 'footer_cta_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button text hover color', 'dream' ),
  ) ) );

  // Footer CTA button border top color
  $wp_customize->add_setting( 'footer_cta_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border top color', 'dream' ),
  ) ) );

  // Footer CTA button border bottom color
  $wp_customize->add_setting( 'footer_cta_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border bottom color', 'dream' ),
  ) ) );

  // Footer CTA button border left color
  $wp_customize->add_setting( 'footer_cta_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border left color', 'dream' ),
  ) ) );

  // Footer CTA button border right color
  $wp_customize->add_setting( 'footer_cta_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border right color', 'dream' ),
  ) ) );

  // Footer CTA button border top hover color
  $wp_customize->add_setting( 'footer_cta_border_top_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_top_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border top hover color', 'dream' ),
  ) ) );

  // Footer CTA button border bottom hover color
  $wp_customize->add_setting( 'footer_cta_border_bottom_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_bottom_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border bottom hover color', 'dream' ),
  ) ) );

  // Footer CTA button border left hover color
  $wp_customize->add_setting( 'footer_cta_border_left_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_left_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border left hover color', 'dream' ),
  ) ) );

  // Footer CTA button border right hover color
  $wp_customize->add_setting( 'footer_cta_border_right_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_cta_border_right_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer CTA button border right hover color', 'dream' ),
  ) ) );


  /**
   * Footer Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_nav_colors', array(
    'label' => 'Footer Nav Menu Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer navigation menu colors.'
  ) ) );

  // Footer nav link color
  $wp_customize->add_setting( 'footer_nav_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_nav_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer nav link color', 'dream' ),
  ) ) );

  // Footer nav link hover color
  $wp_customize->add_setting( 'footer_nav_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_nav_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer nav link hover color', 'dream' ),
  ) ) );

  // Footer nav link decoration color
  $wp_customize->add_setting( 'footer_nav_link_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_nav_link_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer nav link decoration color', 'dream' ),
  ) ) );

  // Footer nav link decoration hover color
  $wp_customize->add_setting( 'footer_nav_link_decoration_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_nav_link_decoration_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer nav link decoration hover color', 'dream' ),
  ) ) );


  /**
   * Utility Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_utility_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_utility_nav_colors', array(
    'label' => 'Footer Utility Nav Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer utility navigation colors.'
  ) ) );

  // Utility nav link color
  $wp_customize->add_setting( 'utility_nav_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'utility_nav_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Utility nav link color', 'dream' ),
  ) ) );

  // Utility nav link hover color
  $wp_customize->add_setting( 'utility_nav_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'utility_nav_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Utility nav link hover color', 'dream' ),
  ) ) );

  // Utility nav link decoration color
  $wp_customize->add_setting( 'utility_nav_link_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'utility_nav_link_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Utility nav link decoration color', 'dream' ),
  ) ) );

  // Utility nav link decoration hover color
  $wp_customize->add_setting( 'utility_nav_link_decoration_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'utility_nav_link_decoration_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Utility nav link decoration hover color', 'dream' ),
  ) ) );


  /**
   * Footer social Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_colors', array(
    'label' => 'Footer social Nav Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer social navigation colors.'
  ) ) );

  // Footer social nav background color
  $wp_customize->add_setting( 'footer_social_nav_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav background color', 'dream' ),
  ) ) );

  // Footer social nav item color
  $wp_customize->add_setting( 'footer_social_nav_item_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_item_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav item color', 'dream' ),
  ) ) );

  // Footer social nav item hover color
  $wp_customize->add_setting( 'footer_social_nav_item_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_item_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav item hover color', 'dream' ),
  ) ) );

  // Footer social nav item background color
  $wp_customize->add_setting( 'footer_social_nav_item_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_item_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav item background color', 'dream' ),
  ) ) );

  // Footer social nav item background hover color
  $wp_customize->add_setting( 'footer_social_nav_item_bg_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_item_bg_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav item background hover color', 'dream' ),
  ) ) );

  // Footer social nav item border color
  $wp_customize->add_setting( 'footer_social_nav_item_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_item_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav item border color', 'dream' ),
  ) ) );

  // Footer social nav item border hover color
  $wp_customize->add_setting( 'footer_social_nav_item_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_social_nav_item_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer social nav item border hover color', 'dream' ),
  ) ) );


  /**
   * Footer Search Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search', array(
    'label' => 'Footer Search Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer search form colors.'
  ) ) );

  // Footer search input background color
  $wp_customize->add_setting( 'footer_search_input_background_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_input_background_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search input background color', 'dream' ),
  ) ) );

  // Footer search input background hover color
  $wp_customize->add_setting( 'footer_search_input_background_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_input_background_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search input background hover color', 'dream' ),
  ) ) );

  // Footer search input border color
  $wp_customize->add_setting( 'footer_search_input_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_input_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search input border color', 'dream' ),
  ) ) );

  // Footer search input border hover color
  $wp_customize->add_setting( 'footer_search_input_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_input_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search input border hover color', 'dream' ),
  ) ) );

  // Footer search button color
  $wp_customize->add_setting( 'footer_search_button_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button color', 'dream' ),
  ) ) );

  // Footer search button hover color
  $wp_customize->add_setting( 'footer_search_button_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button hover color', 'dream' ),
  ) ) );

  // Footer search button text color
  $wp_customize->add_setting( 'footer_search_button_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button text color', 'dream' ),
  ) ) );

  // Footer search button text hover color
  $wp_customize->add_setting( 'footer_search_button_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button text hover color', 'dream' ),
  ) ) );

  // Footer search button border top color
  $wp_customize->add_setting( 'footer_search_button_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border top color', 'dream' ),
  ) ) );

  // Footer search button border bottom color
  $wp_customize->add_setting( 'footer_search_button_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border bottom color', 'dream' ),
  ) ) );

  // Footer search button border left color
  $wp_customize->add_setting( 'footer_search_button_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border left color', 'dream' ),
  ) ) );

  // Footer search button border right color
  $wp_customize->add_setting( 'footer_search_button_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border right color', 'dream' ),
  ) ) );

  // Footer search button border top hover color
  $wp_customize->add_setting( 'footer_search_button_border_top_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_top_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border top hover color', 'dream' ),
  ) ) );

  // Footer search button border bottom hover color
  $wp_customize->add_setting( 'footer_search_button_border_bottom_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_bottom_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border bottom hover color', 'dream' ),
  ) ) );

  // Footer search button border left hover color
  $wp_customize->add_setting( 'footer_search_button_border_left_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_left_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border left hover color', 'dream' ),
  ) ) );

  // Footer search button border right hover color
  $wp_customize->add_setting( 'footer_search_button_border_right_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_search_button_border_right_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer search button border right hover color', 'dream' ),
  ) ) );


  /**
   * Footer Contact Info
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_contact_info_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_contact_info_colors', array(
    'label' => 'Footer Contact Info Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer contact info colors.'
  ) ) );

  // Footer contact info color
  $wp_customize->add_setting( 'footer_contact_info_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_contact_info_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer contact info color', 'dream' ),
  ) ) );

  // Footer contact info link color
  $wp_customize->add_setting( 'footer_contact_info_link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_contact_info_link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer contact info link color', 'dream' ),
  ) ) );

  // Footer contact info link hover color
  $wp_customize->add_setting( 'footer_contact_info_link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_contact_info_link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer contact info link hover color', 'dream' ),
  ) ) );


  /**
   * Footer Disclaimer
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_disclaimer_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_disclaimer_colors', array(
    'label' => 'Footer Disclaimer Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer disclaimer colors.'
  ) ) );

  // Footer disclaimer color
  $wp_customize->add_setting( 'footer_disclaimer_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_disclaimer_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer disclaimer color', 'dream' ),
  ) ) );


  /**
   * Footer Attribution
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_colors', array(
    'label' => 'Footer Attribution Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define footer attribution colors.'
  ) ) );

  // Footer attribution color
  $wp_customize->add_setting( 'footer_attribution_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_attribution_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer attribution color', 'dream' ),
  ) ) );

  // Footer attribution border top color
  $wp_customize->add_setting( 'footer_attribution_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_attribution_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer attribution border top color', 'dream' ),
  ) ) );

  // Footer attribution border bottom color
  $wp_customize->add_setting( 'footer_attribution_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_attribution_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer attribution border bottom color', 'dream' ),
  ) ) );

  // Footer attribution border left color
  $wp_customize->add_setting( 'footer_attribution_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_attribution_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer attribution border left color', 'dream' ),
  ) ) );

  // Footer attribution border right color
  $wp_customize->add_setting( 'footer_attribution_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_attribution_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer attribution border right color', 'dream' ),
  ) ) );


  /**
   * Footer Copyright
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_copyrigh_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_copyrigh_colors', array(
    'label' => 'Copyright Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define copyright colors.'
  ) ) );

  // Footer copyright color
  $wp_customize->add_setting( 'footer_copyright_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'footer_copyright_color', array(
    'section' => 'color_options',
    'label'   => __( 'Footer copyright color', 'dream' ),
  ) ) );


  /**
   * Social Nav Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_colors', array(
    'label' => 'Social Nav Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define social navigation colors.'
  ) ) );

  // Social nav background color
  $wp_customize->add_setting( 'social_nav_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav background color', 'dream' ),
  ) ) );

  // Social nav item color
  $wp_customize->add_setting( 'social_nav_item_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_item_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav item color', 'dream' ),
  ) ) );

  // Social nav item hover color
  $wp_customize->add_setting( 'social_nav_item_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_item_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav item hover color', 'dream' ),
  ) ) );

  // Social nav item background color
  $wp_customize->add_setting( 'social_nav_item_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_item_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav item background color', 'dream' ),
  ) ) );

  // Social nav item background hover color
  $wp_customize->add_setting( 'social_nav_item_bg_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_item_bg_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav item background hover color', 'dream' ),
  ) ) );

  // Social nav item border color
  $wp_customize->add_setting( 'social_nav_item_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_item_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav item border color', 'dream' ),
  ) ) );

  // Social nav item border hover color
  $wp_customize->add_setting( 'social_nav_item_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'social_nav_item_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Social nav item border hover color', 'dream' ),
  ) ) );


  /**
   * Link Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_link_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_link_colors', array(
    'label' => 'Link Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define link colors.'
  ) ) );

  // Link color
  $wp_customize->add_setting( 'link_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'link_color', array(
    'section' => 'color_options',
    'label'   => __( 'Link color', 'dream' ),
  ) ) );

  // link decoration color
  $wp_customize->add_setting( 'link_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'link_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Link decoration color', 'dream' ),
  ) ) );

  // Link hover color
  $wp_customize->add_setting( 'link_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'link_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Link hover color', 'dream' ),
  ) ) );

  // link hover decoration color
  $wp_customize->add_setting( 'link_hover_decoration_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'link_hover_decoration_color', array(
    'section' => 'color_options',
    'label'   => __( 'Link hover decoration color', 'dream' ),
  ) ) );


  /**
   * Button Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_colors', array(
    'label' => 'Button Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define button colors.'
  ) ) );

  // Button color
  $wp_customize->add_setting( 'button_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button color', 'dream' ),
  ) ) );

  // Button hover color
  $wp_customize->add_setting( 'button_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button hover color', 'dream' ),
  ) ) );

  // Button text color
  $wp_customize->add_setting( 'button_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button text color', 'dream' ),
  ) ) );

  // Button text hover color
  $wp_customize->add_setting( 'button_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button text hover color', 'dream' ),
  ) ) );

  // Button border top color
  $wp_customize->add_setting( 'button_border_top_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_top_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border top color', 'dream' ),
  ) ) );

  // Button border bottom color
  $wp_customize->add_setting( 'button_border_bottom_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_bottom_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border bottom color', 'dream' ),
  ) ) );

  // Button border left color
  $wp_customize->add_setting( 'button_border_left_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_left_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border left color', 'dream' ),
  ) ) );

  // Button border right color
  $wp_customize->add_setting( 'button_border_right_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_right_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border right color', 'dream' ),
  ) ) );

  // Button border top hover color
  $wp_customize->add_setting( 'button_border_top_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_top_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border top hover color', 'dream' ),
  ) ) );

  // Button border bottom hover color
  $wp_customize->add_setting( 'button_border_bottom_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_bottom_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border bottom hover color', 'dream' ),
  ) ) );

  // Button border left hover color
  $wp_customize->add_setting( 'button_border_left_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_left_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border left hover color', 'dream' ),
  ) ) );

  // Button border right hover color
  $wp_customize->add_setting( 'button_border_right_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_border_right_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button border right hover color', 'dream' ),
  ) ) );

  // Button box shadow color
  $wp_customize->add_setting( 'button_box_shadow_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_box_shadow_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button box shadow color', 'dream' ),
  ) ) );

  // Button box shadow hover color
  $wp_customize->add_setting( 'button_box_shadow_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_box_shadow_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button box shadow hover color', 'dream' ),
  ) ) );

  // Button text shadow color
  $wp_customize->add_setting( 'button_text_shadow_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_text_shadow_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button text shadow color', 'dream' ),
  ) ) );

  // Button text shadow hover color
  $wp_customize->add_setting( 'button_text_shadow_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'button_text_shadow_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Button text shadow hover color', 'dream' ),
  ) ) );


  /**
   * Inputs
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_input_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_input_colors', array(
    'label' => 'Input Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define input colors.'
  ) ) );

  // Input background color
  $wp_customize->add_setting( 'input_background_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'input_background_color', array(
    'section' => 'color_options',
    'label'   => __( 'Input background color', 'dream' ),
  ) ) );

  // Input background hover color
  $wp_customize->add_setting( 'input_background_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'input_background_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Input background hover color', 'dream' ),
  ) ) );

  // Input border color
  $wp_customize->add_setting( 'input_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'input_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Input border color', 'dream' ),
  ) ) );

  // Input border hover color
  $wp_customize->add_setting( 'input_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'input_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Input border hover color', 'dream' ),
  ) ) );


  /**
   * Bootstrap Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_bootstrap_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_bootstrap_colors', array(
    'label' => 'Bootstrap Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define bootstrap override colors.'
  ) ) );

  // Success color
  $wp_customize->add_setting( 'success_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'success_color', array(
    'section' => 'color_options',
    'label'   => __( 'Success color', 'dream' ),
  ) ) );

  // Info color
  $wp_customize->add_setting( 'info_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'info_color', array(
    'section' => 'color_options',
    'label'   => __( 'Info color', 'dream' ),
  ) ) );

  // Warning color
  $wp_customize->add_setting( 'warning_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'warning_color', array(
    'section' => 'color_options',
    'label'   => __( 'Warning color', 'dream' ),
  ) ) );

  // Danger color
  $wp_customize->add_setting( 'danger_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'danger_color', array(
    'section' => 'color_options',
    'label'   => __( 'Danger color', 'dream' ),
  ) ) );

  // Light color
  $wp_customize->add_setting( 'light_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'light_color', array(
    'section' => 'color_options',
    'label'   => __( 'Light color', 'dream' ),
  ) ) );

  // Dark color
  $wp_customize->add_setting( 'dark_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'dark_color', array(
    'section' => 'color_options',
    'label'   => __( 'Dark color', 'dream' ),
  ) ) );



  /**
   * Card Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_card_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_card_colors', array(
    'label' => 'Card Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define card colors.'
  ) ) );

  // Card background color
  $wp_customize->add_setting( 'card_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card background color', 'dream' ),
  ) ) );

  // Card background hover color
  $wp_customize->add_setting( 'card_bg_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_bg_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card background hover color', 'dream' ),
  ) ) );

  // Card border color
  $wp_customize->add_setting( 'card_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card border color', 'dream' ),
  ) ) );

  // Card border hover color
  $wp_customize->add_setting( 'card_border_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_border_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card border hover color', 'dream' ),
  ) ) );

  // Card label color
  $wp_customize->add_setting( 'card_label_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_label_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card label color', 'dream' ),
  ) ) );

  // Card label hover color
  $wp_customize->add_setting( 'card_label_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_label_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card label hover color', 'dream' ),
  ) ) );

  // Card title color
  $wp_customize->add_setting( 'card_title_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_title_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card title color', 'dream' ),
  ) ) );

  // Card title hover color
  $wp_customize->add_setting( 'card_title_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_title_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card title hover color', 'dream' ),
  ) ) );

  // Card subtitle color
  $wp_customize->add_setting( 'card_subtitle_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_subtitle_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card subtitle color', 'dream' ),
  ) ) );

  // Card subtitle hover color
  $wp_customize->add_setting( 'card_subtitle_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_subtitle_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card subtitle hover color', 'dream' ),
  ) ) );

  // Card text color
  $wp_customize->add_setting( 'card_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card text color', 'dream' ),
  ) ) );

  // Card text hover color
  $wp_customize->add_setting( 'card_text_hover_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'card_text_hover_color', array(
    'section' => 'color_options',
    'label'   => __( 'Card text hover color', 'dream' ),
  ) ) );




  /**
   * Modal Colors
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_modal_colors',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_modal_colors', array(
    'label' => 'Modal Colors',
    'section' => 'color_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define modal window colors.'
  ) ) );

  // Modal overlay color
  $wp_customize->add_setting( 'modal_overlay_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'modal_overlay_color', array(
    'section' => 'color_options',
    'label'   => __( 'Modal overlay color', 'dream' ),
  ) ) );

  // Modal background color
  $wp_customize->add_setting( 'modal_bg_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'modal_bg_color', array(
    'section' => 'color_options',
    'label'   => __( 'Modal background color', 'dream' ),
  ) ) );

  // Modal border color
  $wp_customize->add_setting( 'modal_border_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'modal_border_color', array(
    'section' => 'color_options',
    'label'   => __( 'Modal border color', 'dream' ),
  ) ) );

  // Modal title color
  $wp_customize->add_setting( 'modal_title_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'modal_title_color', array(
    'section' => 'color_options',
    'label'   => __( 'Modal title color', 'dream' ),
  ) ) );

  // Modal text color
  $wp_customize->add_setting( 'modal_text_color', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'my_custom_sanitization_callback'
  ) );

  $wp_customize->add_control( new ColorAlpha( $wp_customize, 'modal_text_color', array(
    'section' => 'color_options',
    'label'   => __( 'Modal text color', 'dream' ),
  ) ) );

}

add_action( 'customize_register', 'theme_customize_register_colors' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_colors() {
  ob_start();


  /**
   * Base Colors
   **/

  $primary_color = get_theme_mod( 'primary_color', '' );
  $secondary_color = get_theme_mod( 'secondary_color', '' );
  $tertiary_color = get_theme_mod( 'tertiary_color', '' );
  $quaternary_color = get_theme_mod( 'quaternary_color', '' );
  $quinary_color = get_theme_mod( 'quinary_color', '' );
  $senary_color = get_theme_mod( 'senary_color', '' );
  $septenary_color = get_theme_mod( 'septenary_color', '' );
  $octonary_color = get_theme_mod( 'octonary_color', '' );
  $nonary_color = get_theme_mod( 'nonary_color', '' );
  $denary_color = get_theme_mod( 'denary_color', '' );

  if ( !empty( $primary_color ) ) {
    ?>
    :root {
    --primary: <?php echo $primary_color; ?>;
    --bs-primary: <?php echo $primary_color; ?>;
    <?php list($r, $g, $b) = sscanf($primary_color, '#%02x%02x%02x'); ?>
    --bs-primary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_color ) ) {
    ?>
    :root {
    --secondary: <?php echo $secondary_color; ?>;
    --bs-secondary: <?php echo $secondary_color; ?>;
    <?php list($r, $g, $b) = sscanf($secondary_color, '#%02x%02x%02x'); ?>
    --bs-secondary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $tertiary_color ) ) {
    ?>
    :root {
    --tertiary: <?php echo $tertiary_color; ?>;
    --bs-tertiary: <?php echo $tertiary_color; ?>;
    <?php list($r, $g, $b) = sscanf($tertiary_color, '#%02x%02x%02x'); ?>
    --bs-tertiary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $quaternary_color ) ) {
    ?>
    :root {
    --quaternary: <?php echo $quaternary_color; ?>;
    --bs-quaternary: <?php echo $quaternary_color; ?>;
    <?php list($r, $g, $b) = sscanf($quaternary_color, '#%02x%02x%02x'); ?>
    --bs-quaternary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $quinary_color ) ) {
    ?>
    :root {
    --quinary: <?php echo $quinary_color; ?>;
    --bs-quinary: <?php echo $quinary_color; ?>;
    <?php list($r, $g, $b) = sscanf($quinary_color, '#%02x%02x%02x'); ?>
    --bs-quinary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $senary_color ) ) {
    ?>
    :root {
    --senary: <?php echo $senary_color; ?>;
    --bs-senary: <?php echo $senary_color; ?>;
    <?php list($r, $g, $b) = sscanf($senary_color, '#%02x%02x%02x'); ?>
    --bs-senary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $septenary_color ) ) {
    ?>
    :root {
    --septenary: <?php echo $septenary_color; ?>;
    --bs-septenary: <?php echo $septenary_color; ?>;
    <?php list($r, $g, $b) = sscanf($septenary_color, '#%02x%02x%02x'); ?>
    --bs-septenary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $octonary_color ) ) {
    ?>
    :root {
    --octonary: <?php echo $octonary_color; ?>;
    --bs-octonary: <?php echo $octonary_color; ?>;
    <?php list($r, $g, $b) = sscanf($octonary_color, '#%02x%02x%02x'); ?>
    --bs-octonary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $nonary_color ) ) {
    ?>
    :root {
    --nonary: <?php echo $nonary_color; ?>;
    --bs-nonary: <?php echo $nonary_color; ?>;
    <?php list($r, $g, $b) = sscanf($nonary_color, '#%02x%02x%02x'); ?>
    --bs-nonary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $denary_color ) ) {
    ?>
    :root {
    --denary: <?php echo $denary_color; ?>;
    --bs-denary: <?php echo $denary_color; ?>;
    <?php list($r, $g, $b) = sscanf($denary_color, '#%02x%02x%02x'); ?>
    --bs-denary-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }


  /**
   * Body Colors
   **/

  $bg_color = get_theme_mod( 'bg_color', '' );
  $text_color = get_theme_mod( 'text_color', '' );

  if ( !empty( $bg_color ) ) {
    ?>
    :root {
    --body-bg: <?php echo $bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $text_color ) ) {
    ?>
    :root {
    --body-text: <?php echo $text_color; ?>;
    }
    <?php
  }


  /**
   * Header Colors
   **/

  $header_bg_color = get_theme_mod( 'header_bg_color', '' );
  $header_border_top_color = get_theme_mod( 'header_border_top_color', '' );
  $header_border_bottom_color = get_theme_mod( 'header_border_bottom_color', '' );
  $header_border_left_color = get_theme_mod( 'header_border_left_color', '' );
  $header_border_right_color = get_theme_mod( 'header_border_right_color', '' );
  $header_text_color = get_theme_mod( 'header_text_color', '' );
  $header_link_color = get_theme_mod( 'header_link_color', '' );
  $header_link_hover_color = get_theme_mod( 'header_link_hover_color', '' );
  $header_box_shadow_color = get_theme_mod( 'header_box_shadow_color', '' );

  if ( !empty( $header_bg_color ) ) {
    ?>
    :root {
    --header-bg: <?php echo $header_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_top_color ) ) {
    ?>
    :root {
    --header-border-top-color: <?php echo $header_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_bottom_color ) ) {
    ?>
    :root {
    --header-border-bottom-color: <?php echo $header_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_left_color ) ) {
    ?>
    :root {
    --header-border-left-color: <?php echo $header_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_right_color ) ) {
    ?>
    :root {
    --header-border-right-color: <?php echo $header_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_text_color ) ) {
    ?>
    :root {
    --header-text: <?php echo $header_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_link_color ) ) {
    ?>
    :root {
    --header-link: <?php echo $header_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_link_hover_color ) ) {
    ?>
    :root {
    --header-link-hover: <?php echo $header_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_box_shadow_color ) ) {
    ?>
    :root {
    --header-box-shadow-color: <?php echo $header_box_shadow_color; ?>;
    }
    <?php
  }

  /**
   * Header Branding Colors
   **/

  $header_branding_color = get_theme_mod( 'header_branding_color', '' );
  $header_branding_hover_color = get_theme_mod( 'header_branding_hover_color', '' );

  if ( !empty( $header_branding_color ) ) {
    ?>
    :root {
    --branding-color: <?php echo $header_branding_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_branding_hover_color ) ) {
    ?>
    :root {
    --branding-hover-color: <?php echo $header_branding_hover_color; ?>;
    }
    <?php
  }


  /**
   * Navbar Colors
   **/

  $nav_toggle_color = get_theme_mod( 'nav_toggle_color', '' );
  $nav_toggle_active_color = get_theme_mod( 'nav_toggle_active_color', '' );
  $nav_bg_color = get_theme_mod( 'nav_bg_color', '' );
  $nav_bg_mobile_color = get_theme_mod( 'nav_bg_mobile_color', '' );
  $nav_border_top_color = get_theme_mod( 'nav_border_top_color', '' );
  $nav_border_bottom_color = get_theme_mod( 'nav_border_bottom_color', '' );
  $nav_border_left_color = get_theme_mod( 'nav_border_left_color', '' );
  $nav_border_right_color = get_theme_mod( 'nav_border_right_color', '' );
  $nav_mobile_border_top_color = get_theme_mod( 'nav_mobile_border_top_color', '' );
  $nav_mobile_border_bottom_color = get_theme_mod( 'nav_mobile_border_bottom_color', '' );
  $nav_mobile_border_left_color = get_theme_mod( 'nav_mobile_border_left_color', '' );
  $nav_mobile_border_right_color = get_theme_mod( 'nav_mobile_border_right_color', '' );

  if ( !empty( $nav_toggle_color ) ) {
    ?>
    :root {
    --nav-toggle-color: <?php echo $nav_toggle_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_toggle_active_color ) ) {
    ?>
    :root {
    --nav-toggle-active-color: <?php echo $nav_toggle_active_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_bg_color ) ) {
    ?>
    :root {
    --nav-bg: <?php echo $nav_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_bg_mobile_color ) ) {
    ?>
    :root {
    --nav-bg-mobile: <?php echo $nav_bg_mobile_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_border_top_color ) ) {
    ?>
    :root {
    --nav-border-top-color: <?php echo $nav_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_border_bottom_color ) ) {
    ?>
    :root {
    --nav-border-bottom-color: <?php echo $nav_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_border_left_color ) ) {
    ?>
    :root {
    --nav-border-left-color: <?php echo $nav_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_border_right_color ) ) {
    ?>
    :root {
    --nav-border-right-color: <?php echo $nav_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_mobile_border_top_color ) ) {
    ?>
    :root {
    --nav-mobile-border-top-color: <?php echo $nav_mobile_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_mobile_border_bottom_color ) ) {
    ?>
    :root {
    --nav-mobile-border-bottom-color: <?php echo $nav_mobile_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_mobile_border_left_color ) ) {
    ?>
    :root {
    --nav-mobile-border-left-color: <?php echo $nav_mobile_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $nav_mobile_border_right_color ) ) {
    ?>
    :root {
    --nav-mobile-border-right-color: <?php echo $nav_mobile_border_right_color; ?>;
    }
    <?php
  }


  /**
   * Primary Nav Colors
   **/

  $primary_nav_link_color = get_theme_mod( 'primary_nav_link_color', '' );
  $primary_nav_link_hover_color = get_theme_mod( 'primary_nav_link_hover_color', '' );
  $primary_nav_link_decoration_color = get_theme_mod( 'primary_nav_link_decoration_color', '' );
  $primary_nav_link_decoration_hover_color = get_theme_mod( 'primary_nav_link_decoration_hover_color', '' );

  if ( !empty( $primary_nav_link_color ) ) {
    ?>
    :root {
    --primary-nav-link-color: <?php echo $primary_nav_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_link_hover_color ) ) {
    ?>
    :root {
    --primary-nav-link-hover-color: <?php echo $primary_nav_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_link_decoration_color ) ) {
    ?>
    :root {
    --primary-nav-link-decoration-color: <?php echo $primary_nav_link_decoration_color; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_link_decoration_hover_color ) ) {
    ?>
    :root {
    --primary-nav-link-hover-decoration-color: <?php echo $primary_nav_link_decoration_hover_color; ?>;
    }
    <?php
  }


  /**
   * Secondary Nav Colors
   **/

  $secondary_nav_link_color = get_theme_mod( 'secondary_nav_link_color', '' );
  $secondary_nav_link_hover_color = get_theme_mod( 'secondary_nav_link_hover_color', '' );
  $secondary_nav_link_decoration_color = get_theme_mod( 'secondary_nav_link_decoration_color', '' );
  $secondary_nav_link_decoration_hover_color = get_theme_mod( 'secondary_nav_link_decoration_hover_color', '' );

  if ( !empty( $secondary_nav_link_color ) ) {
    ?>
    :root {
    --secondary-nav-link-color: <?php echo $secondary_nav_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_link_hover_color ) ) {
    ?>
    :root {
    --secondary-nav-link-hover-color: <?php echo $secondary_nav_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_link_decoration_color ) ) {
    ?>
    :root {
    --secondary-nav-link-decoration-color: <?php echo $secondary_nav_link_decoration_color; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_link_decoration_hover_color ) ) {
    ?>
    :root {
    --secondary-nav-link-hover-decoration-color: <?php echo $secondary_nav_link_decoration_hover_color; ?>;
    }
    <?php
  }

  /**
   * Header CTA Button Colors
   **/

  $header_cta_color = get_theme_mod( 'header_cta_color', '' );
  $header_cta_hover_color = get_theme_mod( 'header_cta_hover_color', '' );
  $header_cta_text_color = get_theme_mod( 'header_cta_text_color', '' );
  $header_cta_text_hover_color = get_theme_mod( 'header_cta_text_hover_color', '' );
  $header_cta_border_top_color = get_theme_mod( 'header_cta_border_top_color', '' );
  $header_cta_border_bottom_color = get_theme_mod( 'header_cta_border_bottom_color', '' );
  $header_cta_border_left_color = get_theme_mod( 'header_cta_border_left_color', '' );
  $header_cta_border_right_color = get_theme_mod( 'header_cta_border_right_color', '' );
  $header_cta_border_top_hover_color = get_theme_mod( 'header_cta_border_top_hover_color', '' );
  $header_cta_border_bottom_hover_color = get_theme_mod( 'header_cta_border_bottom_hover_color', '' );
  $header_cta_border_left_hover_color = get_theme_mod( 'header_cta_border_left_hover_color', '' );
  $header_cta_border_right_hover_color = get_theme_mod( 'header_cta_border_right_hover_color', '' );

  if ( !empty( $header_cta_color ) ) {
    ?>
    :root {
    --header-cta-bg: <?php echo $header_cta_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_hover_color ) ) {
    ?>
    :root {
    --header-cta-bg-hover: <?php echo $header_cta_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_text_color ) ) {
    ?>
    :root {
    --header-cta-text: <?php echo $header_cta_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_text_hover_color ) ) {
    ?>
    :root {
    --header-cta-text-hover: <?php echo $header_cta_text_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_top_color ) ) {
    ?>
    :root {
    --header-cta-border-top: <?php echo $header_cta_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_bottom_color ) ) {
    ?>
    :root {
    --header-cta-border-bottom: <?php echo $header_cta_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_left_color ) ) {
    ?>
    :root {
    --header-cta-border-left: <?php echo $header_cta_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_right_color ) ) {
    ?>
    :root {
    --header-cta-border-right: <?php echo $header_cta_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_top_hover_color ) ) {
    ?>
    :root {
    --header-cta-border-top-hover: <?php echo $header_cta_border_top_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_bottom_hover_color ) ) {
    ?>
    :root {
    --header-cta-border-bottom-hover: <?php echo $header_cta_border_bottom_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_left_hover_color ) ) {
    ?>
    :root {
    --header-cta-border-left-hover: <?php echo $header_cta_border_left_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_right_hover_color ) ) {
    ?>
    :root {
    --header-cta-border-right-hover: <?php echo $header_cta_border_right_hover_color; ?>;
    }
    <?php
  }


  /**
   * Header Mobile CTA Button Colors
   **/

  $header_mobile_cta_color = get_theme_mod( 'header_mobile_cta_color', '' );
  $header_mobile_cta_hover_color = get_theme_mod( 'header_mobile_cta_hover_color', '' );
  $header_mobile_cta_text_color = get_theme_mod( 'header_mobile_cta_text_color', '' );
  $header_mobile_cta_text_hover_color = get_theme_mod( 'header_mobile_cta_text_hover_color', '' );
  $header_mobile_cta_border_top_color = get_theme_mod( 'header_mobile_cta_border_top_color', '' );
  $header_mobile_cta_border_bottom_color = get_theme_mod( 'header_mobile_cta_border_bottom_color', '' );
  $header_mobile_cta_border_left_color = get_theme_mod( 'header_mobile_cta_border_left_color', '' );
  $header_mobile_cta_border_right_color = get_theme_mod( 'header_mobile_cta_border_right_color', '' );
  $header_mobile_cta_border_top_hover_color = get_theme_mod( 'header_mobile_cta_border_top_hover_color', '' );
  $header_mobile_cta_border_bottom_hover_color = get_theme_mod( 'header_mobile_cta_border_bottom_hover_color', '' );
  $header_mobile_cta_border_left_hover_color = get_theme_mod( 'header_mobile_cta_border_left_hover_color', '' );
  $header_mobile_cta_border_right_hover_color = get_theme_mod( 'header_mobile_cta_border_right_hover_color', '' );

  if ( !empty( $header_mobile_cta_color ) ) {
    ?>
    :root {
    --header-mobile-cta-bg: <?php echo $header_mobile_cta_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_hover_color ) ) {
    ?>
    :root {
    --header-mobile-cta-bg-hover: <?php echo $header_mobile_cta_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_text_color ) ) {
    ?>
    :root {
    --header-mobile-cta-text: <?php echo $header_mobile_cta_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_text_hover_color ) ) {
    ?>
    :root {
    --header-mobile-cta-text-hover: <?php echo $header_mobile_cta_text_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_top_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-top: <?php echo $header_mobile_cta_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_bottom_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-bottom: <?php echo $header_mobile_cta_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_left_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-left: <?php echo $header_mobile_cta_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_right_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-right: <?php echo $header_mobile_cta_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_top_hover_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-top-hover: <?php echo $header_mobile_cta_border_top_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_bottom_hover_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-bottom-hover: <?php echo $header_mobile_cta_border_bottom_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_left_hover_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-left-hover: <?php echo $header_mobile_cta_border_left_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_mobile_cta_border_right_hover_color ) ) {
    ?>
    :root {
    --header-mobile-cta-border-right-hover: <?php echo $header_mobile_cta_border_right_hover_color; ?>;
    }
    <?php
  }


  /**
   * Header Search Colors
   **/

  $header_search_input_background_color = get_theme_mod( 'header_search_input_background_color', '' );
  $header_search_input_background_hover_color = get_theme_mod( 'header_search_input_background_hover_color', '' );
  $header_search_input_border_color = get_theme_mod( 'header_search_input_border_color', '' );
  $header_search_input_border_hover_color = get_theme_mod( 'header_search_input_border_hover_color', '' );
  $header_search_button_color = get_theme_mod( 'header_search_button_color', '' );
  $header_search_button_hover_color = get_theme_mod( 'header_search_button_hover_color', '' );
  $header_search_button_text_color = get_theme_mod( 'header_search_button_text_color', '' );
  $header_search_button_text_hover_color = get_theme_mod( 'header_search_button_text_hover_color', '' );
  $header_search_button_border_top_color = get_theme_mod( 'header_search_button_border_top_color', '' );
  $header_search_button_border_bottom_color = get_theme_mod( 'header_search_button_border_bottom_color', '' );
  $header_search_button_border_left_color = get_theme_mod( 'header_search_button_border_left_color', '' );
  $header_search_button_border_right_color = get_theme_mod( 'header_search_button_border_right_color', '' );
  $header_search_button_border_top_hover_color = get_theme_mod( 'header_search_button_border_top_hover_color', '' );
  $header_search_button_border_bottom_hover_color = get_theme_mod( 'header_search_button_border_bottom_hover_color', '' );
  $header_search_button_border_left_hover_color = get_theme_mod( 'header_search_button_border_left_hover_color', '' );
  $header_search_button_border_right_hover_color = get_theme_mod( 'header_search_button_border_right_hover_color', '' );

  if ( !empty( $header_search_input_background_color ) ) {
    ?>
    :root {
    --header-search-input-background-color: <?php echo $header_search_input_background_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_input_background_hover_color ) ) {
    ?>
    :root {
    --header-search-input-hover-background-color: <?php echo $header_search_input_background_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_input_border_color ) ) {
    ?>
    :root {
    --header-search-input-border-color: <?php echo $header_search_input_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_input_border_hover_color ) ) {
    ?>
    :root {
    --header-search-input-hover-border-color: <?php echo $header_search_input_border_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_color ) ) {
    ?>
    :root {
    --header-search-submit-bg: <?php echo $header_search_button_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_hover_color ) ) {
    ?>
    :root {
    --header-search-submit-bg-hover: <?php echo $header_search_button_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_text_color ) ) {
    ?>
    :root {
    --header-search-submit-text: <?php echo $header_search_button_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_text_hover_color ) ) {
    ?>
    :root {
    --header-search-submit-text-hover: <?php echo $header_search_button_text_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_top_color ) ) {
    ?>
    :root {
    --header-search-submit-border-top: <?php echo $header_search_button_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_bottom_color ) ) {
    ?>
    :root {
    --header-search-submit-border-bottom: <?php echo $header_search_button_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_left_color ) ) {
    ?>
    :root {
    --header-search-submit-border-left: <?php echo $header_search_button_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_right_color ) ) {
    ?>
    :root {
    --header-search-submit-border-right: <?php echo $header_search_button_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_top_hover_color ) ) {
    ?>
    :root {
    --header-search-submit-border-top-hover: <?php echo $header_search_button_border_top_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_bottom_hover_color ) ) {
    ?>
    :root {
    --header-search-submit-border-bottom-hover: <?php echo $header_search_button_border_bottom_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_button_border_left_hover_color ) ) {
    ?>
    :root {
    --header-search-submit-border-left-hover: <?php echo $header_search_button_border_left_hover_color; ?>;
    }
    <?php
  }
  if ( !empty( $header_search_button_border_right_hover_color ) ) {
    ?>
    :root {
    --header-search-submit-border-right-hover: <?php echo $header_search_button_border_right_hover_color; ?>;
    }
    <?php
  }


  /**
   * Header Social Nav Colors
   **/

  $header_social_nav_bg_color = get_theme_mod( 'header_social_nav_bg_color', '' );
  $header_social_nav_item_color = get_theme_mod( 'header_social_nav_item_color', '' );
  $header_social_nav_item_hover_color = get_theme_mod( 'header_social_nav_item_hover_color', '' );
  $header_social_nav_item_bg_color = get_theme_mod( 'header_social_nav_item_bg_color', '' );
  $header_social_nav_item_bg_hover_color = get_theme_mod( 'header_social_nav_item_bg_hover_color', '' );
  $header_social_nav_item_border_color = get_theme_mod( 'header_social_nav_item_border_color', '' );
  $header_social_nav_item_border_hover_color = get_theme_mod( 'header_social_nav_item_border_hover_color', '' );

  if ( !empty( $header_social_nav_bg ) ) {
    ?>
    :root {
    --header-social-nav-bg: <?php echo $header_social_nav_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_color ) ) {
    ?>
    :root {
    --header-social-nav-item: <?php echo $header_social_nav_item_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_hover_color ) ) {
    ?>
    :root {
    --header-social-nav-item-hover: <?php echo $header_social_nav_item_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_bg_color ) ) {
    ?>
    :root {
    --header-social-nav-item-bg: <?php echo $header_social_nav_item_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_bg_hover_color ) ) {
    ?>
    :root {
    --header-social-nav-item-bg-hover: <?php echo $header_social_nav_item_bg_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_border_color ) ) {
    ?>
    :root {
    --header-social-nav-item-border-color: <?php echo $header_social_nav_item_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_border_hover_color ) ) {
    ?>
    :root {
    --header-social-nav-item-border-hover-color: <?php echo $header_social_nav_item_border_hover_color; ?>;
    }
    <?php
  }


  /**
   * Alert Colors
   **/

  $alert_bg_color = get_theme_mod( 'alert_bg_color', '' );
  $alert_text_color = get_theme_mod( 'alert_text_color', '' );
  $alert_link_color = get_theme_mod( 'alert_link_color', '' );
  $alert_link_decoration_color = get_theme_mod( 'alert_link_decoration_color', '' );
  $alert_link_hover_color = get_theme_mod( 'alert_link_hover_color', '' );
  $alert_link_decoration_hover_color = get_theme_mod( 'alert_link_decoration_hover_color', '' );
  $alert_text_shadow_color = get_theme_mod( 'alert_text_shadow_color', '' );

  if ( !empty( $alert_bg_color ) ) {
    ?>
    :root {
    --alert-bg: <?php echo $alert_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $alert_text_color ) ) {
    ?>
    :root {
    --alert-text: <?php echo $alert_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_color ) ) {
    ?>
    :root {
    --alert-link: <?php echo $alert_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_decoration_color ) ) {
    ?>
    :root {
    --alert-link-decoration-color: <?php echo $alert_link_decoration_color; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_hover_color ) ) {
    ?>
    :root {
    --alert-link-hover: <?php echo $alert_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_decoration_hover_color ) ) {
    ?>
    :root {
    --alert-link-hover-decoration-color: <?php echo $alert_link_decoration_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $alert_text_shadow_color ) ) {
    ?>
    :root {
    --alert-text-shadow-color: <?php echo $alert_text_shadow_color; ?>;
    }
    <?php
  }


  /**
   * Footer Colors
   **/

  $footer_bg_color = get_theme_mod( 'footer_bg_color', '' );
  $footer_text_color = get_theme_mod( 'footer_text_color', '' );
  $footer_link_color = get_theme_mod( 'footer_link_color', '' );
  $footer_link_hover_color = get_theme_mod( 'footer_link_hover_color', '' );
  $footer_border_top_color = get_theme_mod( 'footer_border_top_color', '' );
  $footer_border_bottom_color = get_theme_mod( 'footer_border_bottom_color', '' );
  $footer_border_left_color = get_theme_mod( 'footer_border_left_color', '' );
  $footer_border_right_color = get_theme_mod( 'footer_border_right_color', '' );
  $footer_box_shadow_color = get_theme_mod( 'footer_box_shadow_color', '' );

  if ( !empty( $footer_bg_color ) ) {
    ?>
    :root {
    --footer-bg: <?php echo $footer_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_text_color ) ) {
    ?>
    :root {
    --footer-text: <?php echo $footer_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_link_color ) ) {
    ?>
    :root {
    --footer-link: <?php echo $footer_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_link_hover_color ) ) {
    ?>
    :root {
    --footer-link-hover: <?php echo $footer_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_top_color ) ) {
    ?>
    :root {
    --footer-border-top-color: <?php echo $footer_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_bottom_color ) ) {
    ?>
    :root {
    --footer-border-bottom-color: <?php echo $footer_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_left_color ) ) {
    ?>
    :root {
    --footer-border-left-color: <?php echo $footer_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_right_color ) ) {
    ?>
    :root {
    --footer-border-right-color: <?php echo $footer_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_box_shadow_color ) ) {
    ?>
    :root {
    --footer-box-shadow-color: <?php echo $footer_box_shadow_color; ?>;
    }
    <?php
  }


  /**
   * Footer Branding Colors
   **/

  $footer_branding_color = get_theme_mod( 'footer_branding_color', '' );
  $footer_branding_hover_color = get_theme_mod( 'footer_branding_hover_color', '' );

  if ( !empty( $footer_branding_color ) ) {
    ?>
    :root {
    --footer-branding-color: <?php echo $footer_branding_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_branding_hover_color ) ) {
    ?>
    :root {
    --footer-branding-hover-color: <?php echo $footer_branding_hover_color; ?>;
    }
    <?php
  }


  /**
   * Footer CTA Button Colors
   **/

  $footer_cta_color = get_theme_mod( 'footer_cta_color', '' );
  $footer_cta_hover_color = get_theme_mod( 'footer_cta_hover_color', '' );
  $footer_cta_text_color = get_theme_mod( 'footer_cta_text_color', '' );
  $footer_cta_text_hover_color = get_theme_mod( 'footer_cta_text_hover_color', '' );
  $footer_cta_border_top_color = get_theme_mod( 'footer_cta_border_top_color', '' );
  $footer_cta_border_bottom_color = get_theme_mod( 'footer_cta_border_bottom_color', '' );
  $footer_cta_border_left_color = get_theme_mod( 'footer_cta_border_left_color', '' );
  $footer_cta_border_right_color = get_theme_mod( 'footer_cta_border_right_color', '' );
  $footer_cta_border_top_hover_color = get_theme_mod( 'footer_cta_border_top_hover_color', '' );
  $footer_cta_border_bottom_hover_color = get_theme_mod( 'footer_cta_border_bottom_hover_color', '' );
  $footer_cta_border_left_hover_color = get_theme_mod( 'footer_cta_border_left_hover_color', '' );
  $footer_cta_border_right_hover_color = get_theme_mod( 'footer_cta_border_right_hover_color', '' );

  if ( !empty( $footer_cta_color ) ) {
    ?>
    :root {
    --footer-cta-bg: <?php echo $footer_cta_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_hover_color ) ) {
    ?>
    :root {
    --footer-cta-bg-hover: <?php echo $footer_cta_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_text_color ) ) {
    ?>
    :root {
    --footer-cta-text: <?php echo $footer_cta_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_text_hover_color ) ) {
    ?>
    :root {
    --footer-cta-text-hover: <?php echo $footer_cta_text_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_top_color ) ) {
    ?>
    :root {
    --footer-cta-border-top: <?php echo $footer_cta_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_bottom_color ) ) {
    ?>
    :root {
    --footer-cta-border-bottom: <?php echo $footer_cta_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_left_color ) ) {
    ?>
    :root {
    --footer-cta-border-left: <?php echo $footer_cta_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_right_color ) ) {
    ?>
    :root {
    --footer-cta-border-right: <?php echo $footer_cta_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_top_hover_color ) ) {
    ?>
    :root {
    --footer-cta-border-top-hover: <?php echo $footer_cta_border_top_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_bottom_hover_color ) ) {
    ?>
    :root {
    --footer-cta-border-bottom-hover: <?php echo $footer_cta_border_bottom_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_left_hover_color ) ) {
    ?>
    :root {
    --footer-cta-border-left-hover: <?php echo $footer_cta_border_left_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_right_hover_color ) ) {
    ?>
    :root {
    --footer-cta-border-right-hover: <?php echo $footer_cta_border_right_hover_color; ?>;
    }
    <?php
  }


  /**
   * Footer Nav Colors
   **/

  $footer_nav_link_color = get_theme_mod( 'footer_nav_link_color', '' );
  $footer_nav_link_hover_color = get_theme_mod( 'footer_nav_link_hover_color', '' );
  $footer_nav_link_decoration_color = get_theme_mod( 'footer_nav_link_decoration_color', '' );
  $footer_nav_link_decoration_hover_color = get_theme_mod( 'footer_nav_link_decoration_hover_color', '' );

  if ( !empty( $footer_nav_link_color ) ) {
    ?>
    :root {
    --footer-nav-link-color: <?php echo $footer_nav_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_link_hover_color ) ) {
    ?>
    :root {
    --footer-nav-link-hover-color: <?php echo $footer_nav_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_link_decoration_color ) ) {
    ?>
    :root {
    --footer-nav-link-decoration-color: <?php echo $footer_nav_link_decoration_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_link_decoration_hover_color ) ) {
    ?>
    :root {
    --footer-nav-link-hover-decoration-color: <?php echo $footer_nav_link_decoration_hover_color; ?>;
    }
    <?php
  }


  /**
   * Utility Nav Colors
   **/

  $utility_nav_link_color = get_theme_mod( 'utility_nav_link_color', '' );
  $utility_nav_link_hover_color = get_theme_mod( 'utility_nav_link_hover_color', '' );
  $utility_nav_link_decoration_color = get_theme_mod( 'utility_nav_link_decoration_color', '' );
  $utility_nav_link_decoration_hover_color = get_theme_mod( 'utility_nav_link_decoration_hover_color', '' );

  if ( !empty( $utility_nav_link_color ) ) {
    ?>
    :root {
    --utility-nav-link-color: <?php echo $utility_nav_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_link_hover_color ) ) {
    ?>
    :root {
    --utility-nav-link-hover-color: <?php echo $utility_nav_link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_link_decoration_color ) ) {
    ?>
    :root {
    --utility-nav-link-decoration-color: <?php echo $utility_nav_link_decoration_color; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_link_decoration_hover_color ) ) {
    ?>
    :root {
    --utility-nav-link-hover-decoration-color: <?php echo $utility_nav_link_decoration_hover_color; ?>;
    }
    <?php
  }


  /**
   * Footer Social Nav Colors
   **/

  $footer_social_nav_bg_color = get_theme_mod( 'footer_social_nav_bg_color', '' );
  $footer_social_nav_item_color = get_theme_mod( 'footer_social_nav_item_color', '' );
  $footer_social_nav_item_hover_color = get_theme_mod( 'footer_social_nav_item_hover_color', '' );
  $footer_social_nav_item_bg_color = get_theme_mod( 'footer_social_nav_item_bg_color', '' );
  $footer_social_nav_item_bg_hover_color = get_theme_mod( 'footer_social_nav_item_bg_hover_color', '' );
  $footer_social_nav_item_border_color = get_theme_mod( 'footer_social_nav_item_border_color', '' );
  $footer_social_nav_item_border_hover_color = get_theme_mod( 'footer_social_nav_item_border_hover_color', '' );

  if ( !empty( $footer_social_nav_bg ) ) {
    ?>
    :root {
    --footer-social-nav-bg: <?php echo $footer_social_nav_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_color ) ) {
    ?>
    :root {
    --footer-social-nav-item: <?php echo $footer_social_nav_item_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_hover_color ) ) {
    ?>
    :root {
    --footer-social-nav-item-hover: <?php echo $footer_social_nav_item_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_bg_color ) ) {
    ?>
    :root {
    --footer-social-nav-item-bg: <?php echo $footer_social_nav_item_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_bg_hover_color ) ) {
    ?>
    :root {
    --footer-social-nav-item-bg-hover: <?php echo $footer_social_nav_item_bg_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_border_color ) ) {
    ?>
    :root {
    --footer-social-nav-item-border-color: <?php echo $footer_social_nav_item_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_border_hover_color ) ) {
    ?>
    :root {
    --footer-social-nav-item-border-hover-color: <?php echo $footer_social_nav_item_border_hover_color; ?>;
    }
    <?php
  }


  /**
   * Footer Search Colors
   **/

  $footer_search_input_background_color = get_theme_mod( 'footer_search_input_background_color', '' );
  $footer_search_input_background_hover_color = get_theme_mod( 'footer_search_input_background_hover_color', '' );
  $footer_search_input_border_color = get_theme_mod( 'footer_search_input_border_color', '' );
  $footer_search_input_border_hover_color = get_theme_mod( 'footer_search_input_border_hover_color', '' );
  $footer_search_button_color = get_theme_mod( 'footer_search_button_color', '' );
  $footer_search_button_hover_color = get_theme_mod( 'footer_search_button_hover_color', '' );
  $footer_search_button_text_color = get_theme_mod( 'footer_search_button_text_color', '' );
  $footer_search_button_text_hover_color = get_theme_mod( 'footer_search_button_text_hover_color', '' );
  $footer_search_button_border_top_color = get_theme_mod( 'footer_search_button_border_top_color', '' );
  $footer_search_button_border_bottom_color = get_theme_mod( 'footer_search_button_border_bottom_color', '' );
  $footer_search_button_border_left_color = get_theme_mod( 'footer_search_button_border_left_color', '' );
  $footer_search_button_border_right_color = get_theme_mod( 'footer_search_button_border_right_color', '' );
  $footer_search_button_border_top_hover_color = get_theme_mod( 'footer_search_button_border_top_hover_color', '' );
  $footer_search_button_border_bottom_hover_color = get_theme_mod( 'footer_search_button_border_bottom_hover_color', '' );
  $footer_search_button_border_left_hover_color = get_theme_mod( 'footer_search_button_border_left_hover_color', '' );
  $footer_search_button_border_right_hover_color = get_theme_mod( 'footer_search_button_border_right_hover_color', '' );

  if ( !empty( $footer_search_input_background_color ) ) {
    ?>
    :root {
    --footer-search-input-background-color: <?php echo $footer_search_input_background_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_input_background_hover_color ) ) {
    ?>
    :root {
    --footer-search-input-hover-background-color: <?php echo $footer_search_input_background_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_input_border_color ) ) {
    ?>
    :root {
    --footer-search-input-border-color: <?php echo $footer_search_input_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_input_border_hover_color ) ) {
    ?>
    :root {
    --footer-search-input-hover-border-color: <?php echo $footer_search_input_border_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_color ) ) {
    ?>
    :root {
    --footer-search-submit-bg: <?php echo $footer_search_button_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_hover_color ) ) {
    ?>
    :root {
    --footer-search-submit-bg-hover: <?php echo $footer_search_button_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_text_color ) ) {
    ?>
    :root {
    --footer-search-submit-text: <?php echo $footer_search_button_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_text_hover_color ) ) {
    ?>
    :root {
    --footer-search-submit-text-hover: <?php echo $footer_search_button_text_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_top_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-top: <?php echo $footer_search_button_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_bottom_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-bottom: <?php echo $footer_search_button_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_left_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-left: <?php echo $footer_search_button_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_right_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-right: <?php echo $footer_search_button_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_top_hover_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-top-hover: <?php echo $footer_search_button_border_top_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_bottom_hover_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-hover: <?php echo $footer_search_button_border_bottom_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_left_hover_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-left-hover: <?php echo $footer_search_button_border_left_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_button_border_right_hover_color ) ) {
    ?>
    :root {
    --footer-search-submit-border-right-hover: <?php echo $footer_search_button_border_right_hover_color; ?>;
    }
    <?php
  }

  /**
   * Footer Contact Info
   **/

  $footer_contact_info_color = get_theme_mod( 'footer_contact_info_color', '' );
  $footer_contact_info_link_color = get_theme_mod( 'footer_contact_info_link_color', '' );
  $footer_contact_info_link_hover_color = get_theme_mod( 'footer_contact_info_link_hover_color', '' );

  if ( !empty( $footer_contact_info_color ) ) {
    ?>
    :root {
    --footer-contact-info-color: <?php echo $footer_contact_info_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_link_color ) ) {
    ?>
    :root {
    --footer-contact-info-link-color: <?php echo $footer_contact_info_link_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_link_hover_color ) ) {
    ?>
    :root {
    --footer-contact-info-link-hover-color: <?php echo $footer_contact_info_link_hover_color; ?>;
    }
    <?php
  }


  /**
   * Footer Disclaimer
   **/

  $footer_disclaimer_color = get_theme_mod( 'footer_disclaimer_color', '' );

  if ( !empty( $footer_disclaimer_color ) ) {
    ?>
    :root {
    --footer-disclaimer-color: <?php echo $footer_disclaimer_color; ?>;
    }
    <?php
  }


  /**
   * Footer Attribution
   **/

  $footer_attribution_color = get_theme_mod( 'footer_attribution_color', '' );
  $footer_attribution_border_top_color = get_theme_mod( 'footer_attribution_border_top_color', '' );
  $footer_attribution_border_bottom_color = get_theme_mod( 'footer_attribution_border_bottom_color', '' );
  $footer_attribution_border_left_color = get_theme_mod( 'footer_attribution_border_left_color', '' );
  $footer_attribution_border_right_color = get_theme_mod( 'footer_attribution_border_right_color', '' );

  if ( !empty( $footer_attribution_color ) ) {
    ?>
    :root {
    --footer-attribution-color: <?php echo $footer_attribution_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_top_color ) ) {
    ?>
    :root {
    --footer-attribution-border-top: <?php echo $footer_attribution_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_bottom_color ) ) {
    ?>
    :root {
    --footer-attribution-border-bottom: <?php echo $footer_attribution_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_left_color ) ) {
    ?>
    :root {
    --footer-attribution-border-left: <?php echo $footer_attribution_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_right_color ) ) {
    ?>
    :root {
    --footer-attribution-border-right: <?php echo $footer_attribution_border_right_color; ?>;
    }
    <?php
  }


  /**
   * Footer Copyright
   **/

  $footer_copyright_color = get_theme_mod( 'footer_copyright_color', '' );

  if ( !empty( $footer_copyright_color ) ) {
    ?>
    :root {
    --footer-copyright-color: <?php echo $footer_copyright_color; ?>;
    }
    <?php
  }


  /**
   * Social Nav Colors
   **/

  $social_nav_bg_color = get_theme_mod( 'social_nav_bg_color', '' );
  $social_nav_item_color = get_theme_mod( 'social_nav_item_color', '' );
  $social_nav_item_hover_color = get_theme_mod( 'social_nav_item_hover_color', '' );
  $social_nav_item_bg_color = get_theme_mod( 'social_nav_item_bg_color', '' );
  $social_nav_item_bg_hover_color = get_theme_mod( 'social_nav_item_bg_hover_color', '' );
  $social_nav_item_border_color = get_theme_mod( 'social_nav_item_border_color', '' );
  $social_nav_item_border_hover_color = get_theme_mod( 'social_nav_item_border_hover_color', '' );

  if ( !empty( $social_nav_bg ) ) {
    ?>
    :root {
    --social-nav-bg: <?php echo $social_nav_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $social_nav_item_color ) ) {
    ?>
    :root {
    --social-nav-item: <?php echo $social_nav_item_color; ?>;
    }
    <?php
  }

  if ( !empty( $social_nav_item_hover_color ) ) {
    ?>
    :root {
    --social-nav-item-hover: <?php echo $social_nav_item_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $social_nav_item_bg_color ) ) {
    ?>
    :root {
    --social-nav-item-bg: <?php echo $social_nav_item_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $social_nav_item_bg_hover_color ) ) {
    ?>
    :root {
    --social-nav-item-bg-hover: <?php echo $social_nav_item_bg_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $social_nav_item_border_color ) ) {
    ?>
    :root {
    --social-nav-item-border-color: <?php echo $social_nav_item_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $social_nav_item_border_hover_color ) ) {
    ?>
    :root {
    --social-nav-item-border-hover-color: <?php echo $social_nav_item_border_hover_color; ?>;
    }
    <?php
  }


  /**
   * Link Colors
   **/

  $link_color = get_theme_mod( 'link_color', '' );
  $link_hover_color = get_theme_mod( 'link_hover_color', '' );
  $link_decoration_color = get_theme_mod( 'link_decoration_color', '' );
  $link_hover_decoration_color = get_theme_mod( 'link_hover_decoration_color', '' );

  if ( !empty( $link_color ) ) {
    ?>
    :root {
    --link: <?php echo $link_color; ?>;
    }
    <?php
  }

  if ( !empty( $link_hover_color ) ) {
    ?>
    :root {
    --link-hover: <?php echo $link_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $link_decoration_color ) ) {
    ?>
    :root {
    --link-decoration-color: <?php echo $link_decoration_color; ?>;
    }
    <?php
  }

  if ( !empty( $link_hover_decoration_color ) ) {
    ?>
    :root {
    --link-hover-decoration-color: <?php echo $link_hover_decoration_color; ?>;
    }
    <?php
  }


  /**
   * Button Colors
   **/

  $button_color = get_theme_mod( 'button_color', '' );
  $button_hover_color = get_theme_mod( 'button_hover_color', '' );
  $button_text_color = get_theme_mod( 'button_text_color', '' );
  $button_text_hover_color = get_theme_mod( 'button_text_hover_color', '' );
  $button_border_top_color = get_theme_mod( 'button_border_top_color', '' );
  $button_border_bottom_color = get_theme_mod( 'button_border_bottom_color', '' );
  $button_border_left_color = get_theme_mod( 'button_border_left_color', '' );
  $button_border_right_color = get_theme_mod( 'button_border_right_color', '' );
  $button_border_top_hover_color = get_theme_mod( 'button_border_top_hover_color', '' );
  $button_border_bottom_hover_color = get_theme_mod( 'button_border_bottom_hover_color', '' );
  $button_border_left_hover_color = get_theme_mod( 'button_border_left_hover_color', '' );
  $button_border_right_hover_color = get_theme_mod( 'button_border_right_hover_color', '' );
  $button_box_shadow_color = get_theme_mod( 'button_box_shadow_color', '' );
  $button_box_shadow_hover_color = get_theme_mod( 'button_box_shadow_hover_color', '' );
  $button_text_shadow_color = get_theme_mod( 'button_text_shadow_color', '' );
  $button_text_shadow_hover_color = get_theme_mod( 'button_text_shadow_hover_color', '' );

  if ( !empty( $button_color ) ) {
    ?>
    :root {
    --button-bg: <?php echo $button_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_hover_color ) ) {
    ?>
    :root {
    --button-bg-hover: <?php echo $button_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_text_color ) ) {
    ?>
    :root {
    --button-text: <?php echo $button_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_text_hover_color ) ) {
    ?>
    :root {
    --button-text-hover: <?php echo $button_text_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_top_color ) ) {
    ?>
    :root {
    --button-border-top: <?php echo $button_border_top_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_bottom_color ) ) {
    ?>
    :root {
    --button-border-bottom: <?php echo $button_border_bottom_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_left_color ) ) {
    ?>
    :root {
    --button-border-left: <?php echo $button_border_left_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_right_color ) ) {
    ?>
    :root {
    --button-border-right: <?php echo $button_border_right_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_top_hover_color ) ) {
    ?>
    :root {
    --button-border-top-hover: <?php echo $button_border_top_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_bottom_hover_color ) ) {
    ?>
    :root {
    --button-border-bottom-hover: <?php echo $button_border_bottom_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_left_hover_color ) ) {
    ?>
    :root {
    --button-border-left-hover: <?php echo $button_border_left_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_right_hover_color ) ) {
    ?>
    :root {
    --button-border-right-hover: <?php echo $button_border_right_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_box_shadow_color ) ) {
    ?>
    :root {
    --button-box-shadow-hover-color: <?php echo $button_box_shadow_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_box_shadow_hover_color ) ) {
    ?>
    :root {
    --button-box-shadow-hover-color: <?php echo $button_box_shadow_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_text_shadow_color ) ) {
    ?>
    :root {
    --button-text-shadow-hover-color: <?php echo $button_text_shadow_color; ?>;
    }
    <?php
  }

  if ( !empty( $button_text_shadow_hover_color ) ) {
    ?>
    :root {
    --button-text-shadow-hover-color: <?php echo $button_text_shadow_hover_color; ?>;
    }
    <?php
  }


  /**
   * Inputs
   **/

  $input_background_color = get_theme_mod( 'input_background_color', '' );
  $input_background_hover_color = get_theme_mod( 'input_background_hover_color', '' );
  $input_border_color = get_theme_mod( 'input_border_color', '' );
  $input_border_hover_color = get_theme_mod( 'input_border_hover_color', '' );

  if ( !empty( $input_background_color ) ) {
    ?>
    :root {
    --input-background-color: <?php echo $input_background_color; ?>;
    }
    <?php
  }

  if ( !empty( $input_background_hover_color ) ) {
    ?>
    :root {
    --input-hover-background-color: <?php echo $input_background_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $input_border_color ) ) {
    ?>
    :root {
    --input-border-color: <?php echo $input_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $input_border_hover_color ) ) {
    ?>
    :root {
    --input-hover-border-color: <?php echo $input_border_hover_color; ?>;
    }
    <?php
  }


  /**
   * Bootstrap Colors
   **/

  $success_color = get_theme_mod( 'success_color', '' );
  $info_color = get_theme_mod( 'info_color', '' );
  $warning_color = get_theme_mod( 'warning_color', '' );
  $danger_color = get_theme_mod( 'danger_color', '' );
  $light_color = get_theme_mod( 'light_color', '' );
  $dark_color = get_theme_mod( 'dark_color', '' );

  if ( !empty( $success_color ) ) {
    ?>
    :root {
    --success: <?php echo $success_color; ?>;
    --bs-success: <?php echo $success_color; ?>;
    <?php list($r, $g, $b) = sscanf($success_color, '#%02x%02x%02x'); ?>
    --bs-success-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $warning_color ) ) {
    ?>
    :root {
    --info: <?php echo $info_color; ?>;
    --bs-info: <?php echo $info_color; ?>;
    <?php list($r, $g, $b) = sscanf($info_color, '#%02x%02x%02x'); ?>
    --bs-info-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $warning_color ) ) {
    ?>
    :root {
    --warning: <?php echo $warning_color; ?>;
    --bs-warning: <?php echo $warning_color; ?>;
    <?php list($r, $g, $b) = sscanf($warning_color, '#%02x%02x%02x'); ?>
    --bs-warning-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $danger_color ) ) {
    ?>
    :root {
    --danger: <?php echo $danger_color; ?>;
    --bs-danger: <?php echo $danger_color; ?>;
    <?php list($r, $g, $b) = sscanf($danger_color, '#%02x%02x%02x'); ?>
    --bs-danger-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $light_color ) ) {
    ?>
    :root {
    --light: <?php echo $light_color; ?>;
    --bs-light: <?php echo $light_color; ?>;
    <?php list($r, $g, $b) = sscanf($light_color, '#%02x%02x%02x'); ?>
    --bs-light-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }

  if ( !empty( $dark_color ) ) {
    ?>
    :root {
    --dark: <?php echo $dark_color; ?>;
    --bs-dark: <?php echo $dark_color; ?>;
    <?php list($r, $g, $b) = sscanf($dark_color, '#%02x%02x%02x'); ?>
    --bs-dark-rgb: <?php echo "$r, $g, $b"; ?>;
    }
    <?php
  }



  /**
   * Card Colors
   **/

  $card_bg_color = get_theme_mod( 'card_bg_color', '' );
  $card_bg_hover_color = get_theme_mod( 'card_bg_hover_color', '' );
  $card_border_color = get_theme_mod( 'card_border_color', '' );
  $card_border_hover_color = get_theme_mod( 'card_border_hover_color', '' );
  $card_label_color = get_theme_mod( 'card_label_color', '' );
  $card_label_hover_color = get_theme_mod( 'card_label_hover_color', '' );
  $card_title_color = get_theme_mod( 'card_title_color', '' );
  $card_title_hover_color = get_theme_mod( 'card_title_hover_color', '' );
  $card_subtitle_color = get_theme_mod( 'card_subtitle_color', '' );
  $card_subtitle_hover_color = get_theme_mod( 'card_subtitle_hover_color', '' );
  $card_text_color = get_theme_mod( 'card_text_color', '' );
  $card_text_hover_color = get_theme_mod( 'card_text_hover_color', '' );

  if ( !empty( $card_bg_color ) ) {
    ?>
    :root {
    --card-bg: <?php echo $card_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_bg_hover_color ) ) {
    ?>
    :root {
    --card-hover-bg: <?php echo $card_bg_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_border_color ) ) {
    ?>
    :root {
    --card-border-color: <?php echo $card_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_border_hover_color ) ) {
    ?>
    :root {
    --card-hover-border-color: <?php echo $card_border_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_label_color ) ) {
    ?>
    :root {
    --card-label-color: <?php echo $card_label_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_label_hover_color ) ) {
    ?>
    :root {
    --card-hover-label-color: <?php echo $card_label_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_title_color ) ) {
    ?>
    :root {
    --card-title-color: <?php echo $card_title_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_title_hover_color ) ) {
    ?>
    :root {
    --card-hover-title-color: <?php echo $card_title_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_subtitle_color ) ) {
    ?>
    :root {
    --card-subtitle-color: <?php echo $card_subtitle_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_subtitle_hover_color ) ) {
    ?>
    :root {
    --card-hover-subtitle-color: <?php echo $card_subtitle_hover_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_text_color ) ) {
    ?>
    :root {
    --card-text-color: <?php echo $card_text_color; ?>;
    }
    <?php
  }

  if ( !empty( $card_text_hover_color ) ) {
    ?>
    :root {
    --card-hover-text-color: <?php echo $card_text_hover_color; ?>;
    }
    <?php
  }



  /**
   * Modal Colors
   **/

  $modal_overlay_color = get_theme_mod( 'modal_overlay_color', '' );
  $modal_bg_color = get_theme_mod( 'modal_bg_color', '' );
  $modal_border_color = get_theme_mod( 'modal_border_color', '' );
  $modal_title_color = get_theme_mod( 'modal_title_color', '' );
  $modal_text_color = get_theme_mod( 'modal_text_color', '' );

  if ( !empty( $modal_overlay_color ) ) {
    ?>
    :root {
    --modal-overlay-color: <?php echo $modal_overlay_color; ?>;
    }
    <?php
  }

  if ( !empty( $modal_bg_color ) ) {
    ?>
    :root {
    --modal-bg: <?php echo $modal_bg_color; ?>;
    }
    <?php
  }

  if ( !empty( $modal_border_color ) ) {
    ?>
    :root {
    --modal-border-color: <?php echo $modal_border_color; ?>;
    }
    <?php
  }

  if ( !empty( $modal_title_color ) ) {
    ?>
    :root {
    --modal-title-color: <?php echo $modal_title_color; ?>;
    }
    <?php
  }

  if ( !empty( $modal_text_color ) ) {
    ?>
    :root {
    --modal-text-color: <?php echo $modal_text_color; ?>;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}


/**
 * ADD TO CONTEXT
 **/

class customColors extends TimberSite {

  function __construct() {
    add_filter( 'timber/context', [$this, 'add_to_context'], 25 );
    parent::__construct();
  }


  // Add Global variable
  function add_to_context( $context ) {

    /**
     * Social Nav Icon Color
     **/

    $social_nav_item_color = get_theme_mod( 'social_nav_item_color', '' );

    if ( $social_nav_item_color ) {
      $context['social_icon_color'] = $social_nav_item_color;
    }


    /**
     * Header Social Nav Icon Color
     **/

    $header_social_nav_item_color = get_theme_mod( 'header_social_nav_item_color', '' );

    if ( $header_social_nav_item_color ) {
      $context['header_social_icon_color'] = $header_social_nav_item_color;
    }


    /**
     * Footer Social Nav Icon Color
     **/

    $footer_social_nav_item_color = get_theme_mod( 'footer_social_nav_item_color', '' );

    if ( $footer_social_nav_item_color ) {
      $context['footer_social_icon_color'] = $footer_social_nav_item_color;
    }

    return $context;
  }

}

new customColors();
