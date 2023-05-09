<?php

/**
 * REGISTER CUSTOMIZER FOOTER ATTRIBUTION OPTIONS
 **/

function theme_customize_register_footer_attribution( $wp_customize ) {


  /**
   * Create Footer Attribution Options Section
   **/

  $wp_customize->add_section( 'footer_attribution_options' , array(
    'title'      => __( 'Footer Attribution Style Options', 'dream' ),
    'priority'   => 90,
  ) );


  /**
   * Footer Attribution Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_width', array(
    'label' => 'Footer Attribution Width',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define \'default\' footer attribution width.'
  ) ) );

  // Footer Attribution Width Unit Selector
  $wp_customize->add_setting( 'unit_selector--footer_attribution_width',
    array(
      'default' => 'px',
      'transport'   => 'postMessage'
    )
  );

  $wp_customize->add_control( 'unit_selector--footer_attribution_width',
    array(
      'label' => __( 'Footer Attribution Width Unit' ),
      'description' => __( 'Select px, % or vw unit for footer attribution width.' ),
      'section' => 'navbar_options',
      'type' => 'radio',
      'choices' => array(
        'px' => __( 'px' ),
        'pct' => __( '%' ),
        'vw' => __( 'vw' )
      )
    )
  );

  // Footer Attribution Width Number Input
  $wp_customize->add_setting( 'number--footer_attribution_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'number--footer_attribution_width',
    array(
      'label' => __( 'Footer Attribution Width' ),
      'description' => __( 'Width for footer attribution. Use width left/right nav menu.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Width Range Input
  $wp_customize->add_setting( 'range--footer_attribution_width' , array(
    'default'     => 0,
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'range--footer_attribution_width', array(
    'label'	=>  'Footer Attribution Width',
    'description' => __( 'Width for footer attribution. Use width left/right nav menu.' ),
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'section' => 'navbar_options',
  ) ) );


  /**
   * Footer Attribution Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_margin', array(
    'label' => 'Footer Attribution Margin',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define margin for \'default\' footer attribution.'
  ) ) );

  // Footer Attribution Mobile Margin Top
  $wp_customize->add_setting( 'footer_attribution_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_mobile_margin_top',
    array(
      'label' => __( 'Footer Attribution Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the footer attribution top mobile margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Mobile Margin Bottom
  $wp_customize->add_setting( 'footer_attribution_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_mobile_margin_bottom',
    array(
      'label' => __( 'Footer Attribution Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer attribution bottom mobile margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Mobile Margin Left
  $wp_customize->add_setting( 'footer_attribution_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_mobile_margin_left',
    array(
      'label' => __( 'Footer Attribution Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the footer attribution left mobile margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Mobile Margin Right
  $wp_customize->add_setting( 'footer_attribution_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_mobile_margin_right',
    array(
      'label' => __( 'Footer Attribution Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the footer attribution right mobile margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Margin Top
  $wp_customize->add_setting( 'footer_attribution_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_margin_top',
    array(
      'label' => __( 'Footer Attribution Margin Top' ),
      'description' => __( 'Enter a px value for the footer attribution top margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Margin Bottom
  $wp_customize->add_setting( 'footer_attribution_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_margin_bottom',
    array(
      'label' => __( 'Footer Attribution Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer attribution bottom margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Margin Left
  $wp_customize->add_setting( 'footer_attribution_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_margin_left',
    array(
      'label' => __( 'Footer Attribution Margin Left' ),
      'description' => __( 'Enter a px value for the footer attribution left margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Margin Right
  $wp_customize->add_setting( 'footer_attribution_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_margin_right',
    array(
      'label' => __( 'Footer Attribution Margin Right' ),
      'description' => __( 'Enter a px value for the footer attribution right margin.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Attribution Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_padding', array(
    'label' => 'Footer Attribution Padding',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define padding for \'default\' footer attribution.'
  ) ) );

  // Footer Attribution Vertical Padding
  $wp_customize->add_setting( 'footer_attribution_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_vertical_padding',
    array(
      'label' => __( 'Footer Attribution Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Mobile Vertical Padding
  $wp_customize->add_setting( 'footer_attribution_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_mobile_vertical_padding',
    array(
      'label' => __( 'Footer Attribution Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Horizontal Padding
  $wp_customize->add_setting( 'footer_attribution_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_horizontal_padding',
    array(
      'label' => __( 'Footer Attribution Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Mobile Horizontal Padding
  $wp_customize->add_setting( 'footer_attribution_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_mobile_horizontal_padding',
    array(
      'label' => __( 'Footer Attribution Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Attribution Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_text', array(
    'label' => 'Footer Attribution Text',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for footer attribution.'
  ) ) );

  // Footer Attribution Font Size
  $wp_customize->add_setting( 'footer_attribution_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_font_size',
    array(
      'label' => __( 'Footer Attribution Font Size' ),
      'description' => __( 'Enter a px value for footer attribution font size.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Font Size Mobile
  $wp_customize->add_setting( 'footer_attribution_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_font_size_mobile',
    array(
      'label' => __( 'Footer Attribution Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer attribution font size.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Line Height Mobile
  $wp_customize->add_setting( 'footer_attribution_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_line_height_mobile',
    array(
      'label' => __( 'Footer Attribution Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer attribution line height.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Line Height
  $wp_customize->add_setting( 'footer_attribution_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_line_height',
    array(
      'label' => __( 'Footer Attribution Line Height' ),
      'description' => __( 'Enter a px value for footer attribution line height.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Font Weight
  $wp_customize->add_setting( 'footer_attribution_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_font_weight',
    array(
      'label' => __( 'Footer Attribution Font Weight' ),
      'description' => __( 'Select a font weight for footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        '100' => __( '100' ),
        '200' => __( '200' ),
        '300' => __( '300' ),
        '400' => __( '400' ),
        '500' => __( '500' ),
        '600' => __( '600' ),
        '700' => __( '700' ),
        '800' => __( '800' ),
        '900' => __( '900' )
      )
    )
  );

  // Footer Attribution Font Style
  $wp_customize->add_setting( 'footer_attribution_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_font_style',
    array(
      'label' => __( 'Footer Attribution Font Style' ),
      'description' => __( 'Select a font style for footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Attribution Text Transform
  $wp_customize->add_setting( 'footer_attribution_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_text_transform',
    array(
      'label' => __( 'Footer Attribution Text Transform' ),
      'description' => __( 'Select a transform style for footer attribution text.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'capitalize' => __( 'Capitalize' ),
        'lowercase' => __( 'Lowercase' ),
        'uppercase' => __( 'Uppercase' )
      )
    )
  );

  // Footer Attribution Letter Spacing
  $wp_customize->add_setting( 'footer_attribution_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_letter_spacing',
    array(
      'label' => __( 'Footer Attribution Letter Spacing' ),
      'description' => __( 'Enter a px value for footer attribution letter spacing.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Attribution Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_attribution_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Attribution Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer attribution letter spacing.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer Attribution Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_border_width', array(
    'label' => 'Footer Attribution Border Width',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border width for footer attribution.'
  ) ) );

  // Footer Attribution Border Top Width
  $wp_customize->add_setting( 'footer_attribution_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_top_width',
    array(
      'label' => __( 'Footer Attribution Top Border Width' ),
      'description' => __( 'Enter a px value for the footer attribution top border width.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Border Bottom Width
  $wp_customize->add_setting( 'footer_attribution_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_bottom_width',
    array(
      'label' => __( 'Footer Attribution Bottom Border Width' ),
      'description' => __( 'Enter a px value for the footer attribution bottom border width.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Border Left Width
  $wp_customize->add_setting( 'footer_attribution_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_left_width',
    array(
      'label' => __( 'Footer Attribution Left Border Width' ),
      'description' => __( 'Enter a px value for the footer attribution left border width.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Border Right Width
  $wp_customize->add_setting( 'footer_attribution_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_right_width',
    array(
      'label' => __( 'Footer Attribution Right Border Width' ),
      'description' => __( 'Enter a px value for the footer attribution right border width.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Attribution Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_border_style', array(
    'label' => 'Footer Attribution Border Style',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border style for footer attribution.'
  ) ) );

  // Footer Attribution Top Border Style
  $wp_customize->add_setting( 'footer_attribution_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_top_style',
    array(
      'label' => __( 'Footer Attribution Border Top Style' ),
      'description' => __( 'Select a top border style for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'hidden' => __( 'Hidden' ),
        'dotted' => __( 'Dotted' ),
        'dashed' => __( 'Dashed' ),
        'solid' => __( 'Solid' ),
        'double' => __( 'Double' ),
        'groove' => __( 'Groove' ),
        'ridge' => __( 'Ridge' ),
        'inset' => __( 'Inset' ),
        'outset' => __( 'Outset' )
      )
    )
  );

  // Footer Attribution Right Border Style
  $wp_customize->add_setting( 'footer_attribution_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_right_style',
    array(
      'label' => __( 'Footer Attribution Border Right Style' ),
      'description' => __( 'Select a right border style for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'hidden' => __( 'Hidden' ),
        'dotted' => __( 'Dotted' ),
        'dashed' => __( 'Dashed' ),
        'solid' => __( 'Solid' ),
        'double' => __( 'Double' ),
        'groove' => __( 'Groove' ),
        'ridge' => __( 'Ridge' ),
        'inset' => __( 'Inset' ),
        'outset' => __( 'Outset' )
      )
    )
  );

  // Footer Attribution Bottom Border Style
  $wp_customize->add_setting( 'footer_attribution_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_bottom_style',
    array(
      'label' => __( 'Footer Attribution Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'hidden' => __( 'Hidden' ),
        'dotted' => __( 'Dotted' ),
        'dashed' => __( 'Dashed' ),
        'solid' => __( 'Solid' ),
        'double' => __( 'Double' ),
        'groove' => __( 'Groove' ),
        'ridge' => __( 'Ridge' ),
        'inset' => __( 'Inset' ),
        'outset' => __( 'Outset' )
      )
    )
  );

  // Footer Attribution Left Border Style
  $wp_customize->add_setting( 'footer_attribution_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_left_style',
    array(
      'label' => __( 'Footer Attribution Border Left Style' ),
      'description' => __( 'Select a left border style for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'hidden' => __( 'Hidden' ),
        'dotted' => __( 'Dotted' ),
        'dashed' => __( 'Dashed' ),
        'solid' => __( 'Solid' ),
        'double' => __( 'Double' ),
        'groove' => __( 'Groove' ),
        'ridge' => __( 'Ridge' ),
        'inset' => __( 'Inset' ),
        'outset' => __( 'Outset' )
      )
    )
  );


  /**
   * Footer Attribution Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_attribution_border_radius',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_attribution_border_radius', array(
    'label' => 'Footer Attribution Border Radius',
    'section' => 'footer_attribution_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border radius for footer attribution.'
  ) ) );

  // Footer Attribution Top Left Border Radius
  $wp_customize->add_setting( 'footer_attribution_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_top_left_radius',
    array(
      'label' => __( 'Footer Attribution Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Top Right Border Radius
  $wp_customize->add_setting( 'footer_attribution_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_top_right_radius',
    array(
      'label' => __( 'Footer Attribution Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Bottom Left Border Radius
  $wp_customize->add_setting( 'footer_attribution_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_bottom_left_radius',
    array(
      'label' => __( 'Footer Attribution Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );

  // Footer Attribution Bottom Right Border Radius
  $wp_customize->add_setting( 'footer_attribution_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_attribution_border_bottom_right_radius',
    array(
      'label' => __( 'Footer Attribution Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for the footer attribution.' ),
      'section' => 'footer_attribution_options',
      'type' => 'number'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_footer_attribution' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_attribution() {
  ob_start();

  /**
   * Footer Attribution Width
   **/

  $footer_attribution_width_unit = get_theme_mod( 'unit_selector--footer_attribution_width', '' );
  $footer_attribution_width_number = get_theme_mod( 'number--footer_attribution_width', '' );
  $footer_attribution_width_range = get_theme_mod( 'range--footer_attribution_width', '' );

  if ( !empty( $footer_attribution_width_number ) and $footer_attribution_width_unit == 'px' ) {
    ?>
    :root {
    --footer-attribution-width: <?php echo $footer_attribution_width_number; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_attribution_width_range ) and $footer_attribution_width_unit == 'pct' ) {
    ?>
    :root {
    --footer-attribution-width: <?php echo $footer_attribution_width_range; ?>%;
    }
    <?php
  }

  if ( !empty( $footer_attribution_width_range ) and $footer_attribution_width_unit == 'vw' ) {
    ?>
    :root {
    --footer-attribution-width: <?php echo $footer_attribution_width_range; ?>vw;
    }
    <?php
  }


  /**
   * Footer Attribution Margin
   **/

  $footer_attribution_mobile_margin_top = get_theme_mod( 'footer_attribution_mobile_margin_top', '' );
  $footer_attribution_mobile_margin_bottom = get_theme_mod( 'footer_attribution_mobile_margin_bottom', '' );
  $footer_attribution_mobile_margin_left = get_theme_mod( 'footer_attribution_mobile_margin_left', '' );
  $footer_attribution_mobile_margin_right = get_theme_mod( 'footer_attribution_mobile_margin_right', '' );
  $footer_attribution_margin_top = get_theme_mod( 'footer_attribution_margin_top', '' );
  $footer_attribution_margin_bottom = get_theme_mod( 'footer_attribution_margin_bottom', '' );
  $footer_attribution_margin_left = get_theme_mod( 'footer_attribution_margin_left', '' );
  $footer_attribution_margin_right = get_theme_mod( 'footer_attribution_margin_right', '' );

  if ( isset( $footer_attribution_mobile_margin_top ) && $footer_attribution_mobile_margin_top != '' ) {
    ?>
    :root {
    --footer-attribution-margin-top-mobile: <?php echo $footer_attribution_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_mobile_margin_bottom ) && $footer_attribution_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --footer-attribution-margin-bottom-mobile: <?php echo $footer_attribution_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_mobile_margin_left ) && $footer_attribution_mobile_margin_left != '' ) {
    ?>
    :root {
    --footer-attribution-margin-left-mobile: <?php echo $footer_attribution_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_mobile_margin_right ) && $footer_attribution_mobile_margin_right != '' ) {
    ?>
    :root {
    --footer-attribution-margin-right-mobile: <?php echo $footer_attribution_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_margin_top ) && $footer_attribution_margin_top != '' ) {
    ?>
    :root {
    --footer-attribution-margin-top: <?php echo $footer_attribution_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_margin_bottom ) && $footer_attribution_margin_bottom != '' ) {
    ?>
    :root {
    --footer-attribution-margin-bottom: <?php echo $footer_attribution_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_margin_left ) && $footer_attribution_margin_left != '' ) {
    ?>
    :root {
    --footer-attribution-margin-left: <?php echo $footer_attribution_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_margin_right ) && $footer_attribution_margin_right != '' ) {
    ?>
    :root {
    --footer-attribution-margin-right: <?php echo $footer_attribution_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Footer Attribution Padding
   **/

  $footer_attribution_vertical_padding = get_theme_mod( 'footer_attribution_vertical_padding', '' );
  $footer_attribution_horizontal_padding = get_theme_mod( 'footer_attribution_horizontal_padding', '' );
  $footer_attribution_mobile_vertical_padding = get_theme_mod( 'footer_attribution_mobile_vertical_padding', '' );
  $footer_attribution_mobile_horizontal_padding = get_theme_mod( 'footer_attribution_mobile_horizontal_padding', '' );

  if ( isset( $footer_attribution_vertical_padding ) && $footer_attribution_vertical_padding != '' ) {
    ?>
    :root {
    --footer-attribution-vertical-padding: <?php echo $footer_attribution_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_horizontal_padding ) && $footer_attribution_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-attribution-horizontal-padding: <?php echo $footer_attribution_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_mobile_vertical_padding ) && $footer_attribution_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --footer-attribution-vertical-padding-mobile: <?php echo $footer_attribution_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_mobile_horizontal_padding ) && $footer_attribution_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-attribution-horizontal-padding-mobile: <?php echo $footer_attribution_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Footer Attribution Text
   **/

  $footer_attribution_font_size = get_theme_mod( 'footer_attribution_font_size', '' );
  $footer_attribution_font_size_mobile = get_theme_mod( 'footer_attribution_font_size_mobile', '' );
  $footer_attribution_line_height = get_theme_mod( 'footer_attribution_line_height', '' );
  $footer_attribution_line_height_mobile = get_theme_mod( 'footer_attribution_line_height_mobile', '' );
  $footer_attribution_font_weight = get_theme_mod( 'footer_attribution_font_weight', '' );
  $footer_attribution_font_style = get_theme_mod( 'footer_attribution_font_style', '' );
  $footer_attribution_text_transform = get_theme_mod( 'footer_attribution_text_transform', '' );
  $footer_attribution_letter_spacing = get_theme_mod( 'footer_attribution_letter_spacing', '' );
  $footer_attribution_letter_spacing_mobile = get_theme_mod( 'footer_attribution_letter_spacing_mobile', '' );

  if ( isset( $footer_attribution_font_size ) && $footer_attribution_font_size != '' ) {
    ?>
    :root {
    --footer-attribution-font-size: <?php echo $footer_attribution_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_font_size_mobile ) && $footer_attribution_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-attribution-font-size-mobile: <?php echo $footer_attribution_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_line_height ) && $footer_attribution_line_height != '' ) {
    ?>
    :root {
    --footer-attribution-line-height: <?php echo $footer_attribution_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_line_height_mobile ) && $footer_attribution_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-attribution-line-height-mobile: <?php echo $footer_attribution_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_attribution_font_weight ) ) {
    ?>
    :root {
    --footer-attribution-font-weight: <?php echo $footer_attribution_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_font_style ) ) {
    ?>
    :root {
    --footer-attribution-font-style: <?php echo $footer_attribution_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_text_transform ) ) {
    ?>
    :root {
    --footer-attribution-text-transform: <?php echo $footer_attribution_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_attribution_letter_spacing ) && $footer_attribution_letter_spacing != '' ) {
    ?>
    :root {
    --footer-attribution-letter-spacing: <?php echo $footer_attribution_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_letter_spacing_mobile ) && $footer_attribution_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-attribution-letter-spacing-mobile: <?php echo $footer_attribution_letter_spacing_mobile; ?>px;
    }
    <?php
  }


  /**
   * Footer Attribution Border Width
   **/

  $footer_attribution_border_top_width = get_theme_mod( 'footer_attribution_border_top_width', '' );
  $footer_attribution_border_bottom_width = get_theme_mod( 'footer_attribution_border_bottom_width', '' );
  $footer_attribution_border_left_width = get_theme_mod( 'footer_attribution_border_left_width', '' );
  $footer_attribution_border_right_width = get_theme_mod( 'footer_attribution_border_right_width', '' );

  if ( isset( $footer_attribution_border_top_width ) && $footer_attribution_border_top_width != '' ) {
    ?>
    :root {
    --footer-attribution-border-top-width: <?php echo $footer_attribution_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_border_bottom_width ) && $footer_attribution_border_bottom_width != '' ) {
    ?>
    :root {
    --footer-attribution-border-bottom-width: <?php echo $footer_attribution_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_border_left_width ) && $footer_attribution_border_left_width != '' ) {
    ?>
    :root {
    --footer-attribution-border-left-width: <?php echo $footer_attribution_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_border_right_width ) && $footer_attribution_border_right_width != '' ) {
    ?>
    :root {
    --footer-attribution-border-right-width: <?php echo $footer_attribution_border_right_width; ?>px;
    }
    <?php
  }


  /**
   * Footer Attribution Border Style
   **/

  $footer_attribution_border_top_style = get_theme_mod( 'footer_attribution_border_top_style', '' );
  $footer_attribution_border_right_style = get_theme_mod( 'footer_attribution_border_right_style', '' );
  $footer_attribution_border_bottom_style = get_theme_mod( 'footer_attribution_border_bottom_style', '' );
  $footer_attribution_border_left_style = get_theme_mod( 'footer_attribution_border_left_style', '' );

  if ( !empty( $footer_attribution_border_top_style ) ) {
    ?>
    :root {
    --footer-attribution-border-top-style: <?php echo $footer_attribution_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_right_style ) ) {
    ?>
    :root {
    --footer-attribution-border-right-style: <?php echo $footer_attribution_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_bottom_style ) ) {
    ?>
    :root {
    --footer-attribution-border-bottom-style: <?php echo $footer_attribution_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_attribution_border_left_style ) ) {
    ?>
    :root {
    --footer-attribution-border-left-style: <?php echo $footer_attribution_border_left_style; ?>;
    }
    <?php
  }


  /**
   * Footer Attribution Border Radius
   **/

  $footer_attribution_border_top_left_radius = get_theme_mod( 'footer_attribution_border_top_left_radius', '' );
  $footer_attribution_border_top_right_radius = get_theme_mod( 'footer_attribution_border_top_right_radius', '' );
  $footer_attribution_border_bottom_left_radius = get_theme_mod( 'footer_attribution_border_bottom_left_radius', '' );
  $footer_attribution_border_bottom_right_radius = get_theme_mod( 'footer_attribution_border_bottom_right_radius', '' );

  if ( isset( $footer_attribution_border_top_left_radius ) && $footer_attribution_border_top_left_radius != '' ) {
    ?>
    :root {
    --footer-attribution-border-top-left-radius: <?php echo $footer_attribution_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_border_top_right_radius ) && $footer_attribution_border_top_right_radius != '' ) {
    ?>
    :root {
    --footer-attribution-border-top-right-radius: <?php echo $footer_attribution_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_border_bottom_left_radius ) && $footer_attribution_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --footer-attribution-border-bottom-left-radius: <?php echo $footer_attribution_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_attribution_border_bottom_right_radius ) && $footer_attribution_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --footer-attribution-border-bottom-right-radius: <?php echo $footer_attribution_border_bottom_right_radius; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
