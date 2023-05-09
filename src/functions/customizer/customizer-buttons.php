<?php

/**
 * REGISTER CUSTOMIZER BUTTON OPTIONS
 **/

function theme_customize_register_buttons( $wp_customize ) {


  /**
   * Create Button Options Section
   **/

  $wp_customize->add_section( 'button_options' , array(
    'title'      => __( 'Button Style Options', 'dream' ),
    'priority'   => 12,
  ) );

  //  ///////////////////////////////////////
//  /// Button Top Left Border Radius
//  ///////////////////////////////////////
//
//  // Button Top Left Border Radius Unit Selector
//  $wp_customize->add_setting( 'unit_selector--button_top_left_border_radius',
//    array(
//      'default' => 'px',
//      'transport'   => 'postMessage'
//    )
//  );
//
//  $wp_customize->add_control( 'unit_selector--button_top_left_border_radius',
//    array(
//      'label' => __( 'Button Top Left Border Radius Unit' ),
//      'description' => __( 'Select px or % unit for button top left border radius.' ),
//      'section' => 'button_options',
//      'type' => 'radio',
//      'choices' => array(
//        'px' => __( 'px' ),
//        'pct' => __( '%' )
//      )
//    )
//  );
//
//  // Button Top Left Border Radius Number Input
//  $wp_customize->add_setting( 'number--button_top_left_border_radius',
//    array(
//      'default' => '',
//      'transport' => 'refresh',
//    )
//  );
//
//  $wp_customize->add_control( 'number--button_top_left_border_radius',
//    array(
//      'label' => __( 'Button Top Left Border Radius' ),
//      'description' => __( 'Top left border radius for buttons.' ),
//      'section' => 'button_options',
//      'type' => 'number'
//    )
//  );
//
//  // Button Top Left Border Radius Range Input
//  $wp_customize->add_setting( 'range--button_top_left_border_radius' , array(
//    'default'     => 0,
//    'transport'   => 'refresh',
//  ) );
//
//  $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'range--button_top_left_border_radius', array(
//    'label'	=>  'Button Top Left Border Radius',
//    'description' => __( 'Top left border radius for buttons.' ),
//    'min' => 0,
//    'max' => 100,
//    'step' => 1,
//    'section' => 'button_options',
//  ) ) );


  /**
   * Button Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_text', array(
    'label' => 'Button Text',
    'section' => 'button_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define text styling for \'default\' button.'
  ) ) );

  // Button Font Size
  $wp_customize->add_setting( 'button_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_font_size',
    array(
      'label' => __( 'Button Font Size' ),
      'description' => __( 'Enter a px value for button font size.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Font Size
  $wp_customize->add_setting( 'button_font_size_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_font_size_hover',
    array(
      'label' => __( 'Button Hover Font Size' ),
      'description' => __( 'Enter a px value for button hover state font size.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Line Height
  $wp_customize->add_setting( 'button_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_line_height',
    array(
      'label' => __( 'Button Line Height' ),
      'description' => __( 'Enter a px value for button line height.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Line Height
  $wp_customize->add_setting( 'button_line_height_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_line_height_hover',
    array(
      'label' => __( 'Button Line Height Hover' ),
      'description' => __( 'Enter a px value for button hover state line heights.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Font Weight
  $wp_customize->add_setting( 'button_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_font_weight',
    array(
      'label' => __( 'Button Font Weight' ),
      'description' => __( 'Select a font weight for buttons.' ),
      'section' => 'button_options',
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

  // Button Hover Font Weight
  $wp_customize->add_setting( 'button_font_weight_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_font_weight_hover',
    array(
      'label' => __( 'Button Hover Font Weight' ),
      'description' => __( 'Select a font weight for button hover states.' ),
      'section' => 'button_options',
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

  // Button Font Style
  $wp_customize->add_setting( 'button_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_font_style',
    array(
      'label' => __( 'Button Font Style' ),
      'description' => __( 'Select a font style for buttons.' ),
      'section' => 'button_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Button Hover Font Style
  $wp_customize->add_setting( 'button_font_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_font_style_hover',
    array(
      'label' => __( 'Button Hover Font Style' ),
      'description' => __( 'Select a font style for button hover states.' ),
      'section' => 'button_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Button Text Transform
  $wp_customize->add_setting( 'button_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_transform',
    array(
      'label' => __( 'Button Text Transform' ),
      'description' => __( 'Select a transform style for button text.' ),
      'section' => 'button_options',
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

  // Button Hover Text Transform
  $wp_customize->add_setting( 'button_text_transform_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_transform_hover',
    array(
      'label' => __( 'Button Hover Text Transform' ),
      'description' => __( 'Select a transform style for button hover state text.' ),
      'section' => 'button_options',
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

  // Button Letter Spacing
  $wp_customize->add_setting( 'button_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_letter_spacing',
    array(
      'label' => __( 'Button Letter Spacing' ),
      'description' => __( 'Enter a px value for button letter spacing.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Hover Letter Spacing
  $wp_customize->add_setting( 'button_letter_spacing_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_letter_spacing_hover',
    array(
      'label' => __( 'Button Hover Letter Spacing' ),
      'description' => __( 'Enter a px value for button hover state letter spacing.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Button Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_padding', array(
    'label' => 'Button Padding',
    'section' => 'button_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define padding for \'default\' button style.'
  ) ) );

  // Button Vertical Padding
  $wp_customize->add_setting( 'button_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_vertical_padding',
    array(
      'label' => __( 'Button Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Vertical Padding
  $wp_customize->add_setting( 'button_vertical_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_vertical_padding_hover',
    array(
      'label' => __( 'Button Hover Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Horizontal Padding
  $wp_customize->add_setting( 'button_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_horizontal_padding',
    array(
      'label' => __( 'Button Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Horizontal Padding
  $wp_customize->add_setting( 'button_horizontal_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_horizontal_padding_hover',
    array(
      'label' => __( 'Button Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );


  /**
   * Button Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_border_width', array(
    'label' => 'Button Border Width',
    'section' => 'button_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border width for \'default\' button style.'
  ) ) );

  // Button Top Border Width
  $wp_customize->add_setting( 'button_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_width',
    array(
      'label' => __( 'Button Border Top Width' ),
      'description' => __( 'Enter a px value for top border width for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Top Border Width
  $wp_customize->add_setting( 'button_border_top_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_width_hover',
    array(
      'label' => __( 'Button Border Hover Top Width' ),
      'description' => __( 'Enter a px value for top border width for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Right Border Width
  $wp_customize->add_setting( 'button_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_right_width',
    array(
      'label' => __( 'Button Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Right Border Width
  $wp_customize->add_setting( 'button_border_right_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_right_width_hover',
    array(
      'label' => __( 'Button Hover Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Bottom Border Width
  $wp_customize->add_setting( 'button_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_width',
    array(
      'label' => __( 'Button Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Bottom Border Width
  $wp_customize->add_setting( 'button_border_bottom_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_width_hover',
    array(
      'label' => __( 'Button Hover Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Left Border Width
  $wp_customize->add_setting( 'button_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_left_width',
    array(
      'label' => __( 'Button Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Left Border Width
  $wp_customize->add_setting( 'button_border_left_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_left_width_hover',
    array(
      'label' => __( 'Button Hover Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );


  /**
   * Button Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
      'default' => '',
      'type' => 'customtext_control_button_border_radius',
      'transport' => 'refresh',
    ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_control_button_border_radius', array(
      'label' => 'Button Border Radius',
      'section' => 'button_options',
      'settings' => 'customtext',
      'extra' =>'Define border radius for \'default\' button style.',
      'divider' => true
    ) ) );

  // Button Top Left Border Radius
  $wp_customize->add_setting( 'button_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_left_radius',
    array(
      'label' => __( 'Button Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Top Left Border Radius
  $wp_customize->add_setting( 'button_border_top_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_left_radius_hover',
    array(
      'label' => __( 'Button Hover Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Top Right Border Radius
  $wp_customize->add_setting( 'button_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_right_radius',
    array(
      'label' => __( 'Button Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Top Right Border Radius
  $wp_customize->add_setting( 'button_border_top_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_right_radius_hover',
    array(
      'label' => __( 'Button Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Bottom Left Border Radius
  $wp_customize->add_setting( 'button_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_left_radius',
    array(
      'label' => __( 'Button Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Bottom Left Border Radius
  $wp_customize->add_setting( 'button_border_bottom_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_left_radius_hover',
    array(
      'label' => __( 'Button Hover Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Bottom Right Border Radius
  $wp_customize->add_setting( 'button_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_right_radius',
    array(
      'label' => __( 'Button Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for buttons.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );

  // Button Hover Bottom Right Border Radius
  $wp_customize->add_setting( 'button_border_bottom_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_right_radius_hover',
    array(
      'label' => __( 'Button Hover Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for button hover states.' ),
      'section' => 'button_options',
      'type' => 'number'
    )
  );


  /**
   * Button Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_border_style', array(
    'label' => 'Button Border Style',
    'section' => 'button_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border style for \'default\' button.'
  ) ) );

  // Button Top Border Style
  $wp_customize->add_setting( 'button_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_style',
    array(
      'label' => __( 'Button Border Top Style' ),
      'description' => __( 'Select a top border style for buttons.' ),
      'section' => 'button_options',
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

  // Button Hover Top Border Style
  $wp_customize->add_setting( 'button_border_top_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_top_style_hover',
    array(
      'label' => __( 'Button Hover Border Top Style' ),
      'description' => __( 'Select a top border style for button hover states.' ),
      'section' => 'button_options',
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

  // Button Right Border Style
  $wp_customize->add_setting( 'button_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_right_style',
    array(
      'label' => __( 'Button Border Right Style' ),
      'description' => __( 'Select a right border style for buttons.' ),
      'section' => 'button_options',
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

  // Button Hover Right Border Style
  $wp_customize->add_setting( 'button_border_right_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_right_style_hover',
    array(
      'label' => __( 'Button Hover Border Right Style' ),
      'description' => __( 'Select a right border style for button hover states.' ),
      'section' => 'button_options',
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

  // Button Bottom Border Style
  $wp_customize->add_setting( 'button_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_style',
    array(
      'label' => __( 'Button Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for button states.' ),
      'section' => 'button_options',
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

  // Button Hover Bottom Border Style
  $wp_customize->add_setting( 'button_border_bottom_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_bottom_style_hover',
    array(
      'label' => __( 'Button Hover Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for button hover states.' ),
      'section' => 'button_options',
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

  // Button Left Border Style
  $wp_customize->add_setting( 'button_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_left_style',
    array(
      'label' => __( 'Button Border Left Style' ),
      'description' => __( 'Select a left border style for buttons.' ),
      'section' => 'button_options',
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

  // Button Hover Left Border Style
  $wp_customize->add_setting( 'button_border_left_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_border_left_style_hover',
    array(
      'label' => __( 'Button Hover Border Left Style' ),
      'description' => __( 'Select a left border style for button hover states.' ),
      'section' => 'button_options',
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
   * Button Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_box_shadow', array(
    'label' => 'Button Box Shadow',
    'section' => 'button_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define box shadow for \'default\' button.'
  ) ) );

  // Button Box Shadow X
  $wp_customize->add_setting( 'button_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_x',
    array(
      'label' => __( 'Button Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for button box shadow x-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Y
  $wp_customize->add_setting( 'button_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_y',
    array(
      'label' => __( 'Button Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for button box shadow y-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Blur
  $wp_customize->add_setting( 'button_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_blur',
    array(
      'label' => __( 'Button Box Shadow Blur' ),
      'description' => __( 'Enter a px value for button box shadow blur.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Spread
  $wp_customize->add_setting( 'button_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_spread',
    array(
      'label' => __( 'Button Box Shadow Spread' ),
      'description' => __( 'Enter a px value for button box shadow spread.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Hover X
  $wp_customize->add_setting( 'button_box_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_hover_x',
    array(
      'label' => __( 'Button Box Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for button box shadow hover x-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Hover Y
  $wp_customize->add_setting( 'button_box_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_hover_y',
    array(
      'label' => __( 'Button Box Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for button box shadow hover y-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Hover Blur
  $wp_customize->add_setting( 'button_box_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_hover_blur',
    array(
      'label' => __( 'Button Box Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for button box shadow hover blur.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Box Shadow Hover Spread
  $wp_customize->add_setting( 'button_box_shadow_hover_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_box_shadow_hover_spread',
    array(
      'label' => __( 'Button Box Shadow Hover Spread' ),
      'description' => __( 'Enter a px value for button box shadow hover spread.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Button Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_button_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_button_text_shadow', array(
    'label' => 'Button Text Shadow',
    'section' => 'button_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' button.'
  ) ) );

  // Button Text Shadow X
  $wp_customize->add_setting( 'button_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_shadow_x',
    array(
      'label' => __( 'Button Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for button text shadow x-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Text Shadow Y
  $wp_customize->add_setting( 'button_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_shadow_y',
    array(
      'label' => __( 'Button Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for button text shadow y-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Text Shadow Blur
  $wp_customize->add_setting( 'button_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_shadow_blur',
    array(
      'label' => __( 'Button Text Shadow Blur' ),
      'description' => __( 'Enter a px value for button text shadow blur.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Text Shadow Hover X
  $wp_customize->add_setting( 'button_text_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_shadow_hover_x',
    array(
      'label' => __( 'Button Text Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for button text shadow hover x-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Text Shadow Hover Y
  $wp_customize->add_setting( 'button_text_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_shadow_hover_y',
    array(
      'label' => __( 'Button Text Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for button text shadow hover y-offset.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Button Text Shadow Hover Blur
  $wp_customize->add_setting( 'button_text_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'button_text_shadow_hover_blur',
    array(
      'label' => __( 'Button Text Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for button text shadow hover blur.' ),
      'section' => 'button_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_buttons' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_buttons() {
  ob_start();

  /**
   * Button Border Radius
   **/

  $button_border_top_left_radius = get_theme_mod( 'button_border_top_left_radius', '' );
  $button_border_top_right_radius = get_theme_mod( 'button_border_top_right_radius', '' );
  $button_border_bottom_left_radius = get_theme_mod( 'button_border_bottom_left_radius', '' );
  $button_border_bottom_right_radius = get_theme_mod( 'button_border_bottom_right_radius', '' );
  $button_border_top_left_radius_hover = get_theme_mod( 'button_border_top_left_radius_hover', '' );
  $button_border_top_right_radius_hover = get_theme_mod( 'button_border_top_right_radius_hover', '' );
  $button_border_bottom_left_radius_hover = get_theme_mod( 'button_border_bottom_left_radius_hover', '' );
  $button_border_bottom_right_radius_hover = get_theme_mod( 'button_border_bottom_right_radius_hover', '' );


  if ( isset( $button_border_top_left_radius ) && $button_border_top_left_radius != '' ) {
    ?>
    :root {
    --button-border-top-left-radius: <?php echo $button_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_top_right_radius ) && $button_border_top_right_radius != '' ) {
    ?>
    :root {
    --button-border-top-right-radius: <?php echo $button_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_bottom_left_radius ) && $button_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --button-border-bottom-left-radius: <?php echo $button_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_bottom_right_radius ) && $button_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --button-border-bottom-right-radius: <?php echo $button_border_bottom_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_top_left_radius_hover ) && $button_border_top_left_radius_hover != '' ) {
    ?>
    :root {
    --button-border-top-left-radius-hover: <?php echo $button_border_top_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_top_right_radius_hover ) && $button_border_top_right_radius_hover != '' ) {
    ?>
    :root {
    --button-border-top-right-radius-hover: <?php echo $button_border_top_right_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_bottom_left_radius_hover ) && $button_border_bottom_left_radius_hover != '' ) {
    ?>
    :root {
    --button-border-bottom-left-radius-hover: <?php echo $button_border_bottom_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_bottom_right_radius_hover ) && $button_border_bottom_right_radius_hover != '' ) {
    ?>
    :root {
    --button-border-bottom-right-radius-hover: <?php echo $button_border_bottom_right_radius_hover; ?>px;
    }
    <?php
  }


  /**
   * Button Border Width
   **/

  $button_border_top_width = get_theme_mod( 'button_border_top_width', '' );
  $button_border_right_width = get_theme_mod( 'button_border_right_width', '' );
  $button_border_bottom_width = get_theme_mod( 'button_border_bottom_width', '' );
  $button_border_left_width = get_theme_mod( 'button_border_left_width', '' );
  $button_border_top_width_hover = get_theme_mod( 'button_border_top_width_hover', '' );
  $button_border_right_width_hover = get_theme_mod( 'button_border_right_width_hover', '' );
  $button_border_bottom_width_hover = get_theme_mod( 'button_border_bottom_width_hover', '' );
  $button_border_left_width_hover = get_theme_mod( 'button_border_left_width_hover', '' );

  if ( isset( $button_border_top_width ) && $button_border_top_width != '' ) {
    ?>
    :root {
    --button-border-top-width: <?php echo $button_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_right_width ) && $button_border_right_width != '' ) {
    ?>
    :root {
    --button-border-right-width: <?php echo $button_border_right_width; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_bottom_width ) && $button_border_bottom_width != '' ) {
    ?>
    :root {
    --button-border-bottom-width: <?php echo $button_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_left_width ) && $button_border_left_width != '' ) {
    ?>
    :root {
    --button-border-left-width: <?php echo $button_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_top_width_hover ) && $button_border_top_width_hover != '' ) {
    ?>
    :root {
    --button-border-top-width-hover: <?php echo $button_border_top_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_right_width_hover ) && $button_border_right_width_hover != '' ) {
    ?>
    :root {
    --button-border-right-width-hover: <?php echo $button_border_right_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_bottom_width_hover ) && $button_border_bottom_width_hover != '' ) {
    ?>
    :root {
    --button-border-bottom-width-hover: <?php echo $button_border_bottom_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_border_left_width_hover ) && $button_border_left_width_hover != '' ) {
    ?>
    :root {
    --button-border-left-width-hover: <?php echo $button_border_left_width_hover; ?>px;
    }
    <?php
  }


  /**
   * Button Border Style
   **/

  $button_border_top_style = get_theme_mod( 'button_border_top_style', '' );
  $button_border_right_style = get_theme_mod( 'button_border_right_style', '' );
  $button_border_bottom_style = get_theme_mod( 'button_border_bottom_style', '' );
  $button_border_left_style = get_theme_mod( 'button_border_left_style', '' );
  $button_border_top_style_hover = get_theme_mod( 'button_border_top_style_hover', '' );
  $button_border_right_style_hover = get_theme_mod( 'button_border_right_style_hover', '' );
  $button_border_bottom_style_hover = get_theme_mod( 'button_border_bottom_style_hover', '' );
  $button_border_left_style_hover = get_theme_mod( 'button_border_left_style_hover', '' );

  if ( !empty( $button_border_top_style ) ) {
    ?>
    :root {
    --button-border-top-style: <?php echo $button_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_right_style ) ) {
    ?>
    :root {
    --button-border-right-style: <?php echo $button_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_bottom_style ) ) {
    ?>
    :root {
    --button-border-bottom-style: <?php echo $button_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_left_style ) ) {
    ?>
    :root {
    --button-border-left-style: <?php echo $button_border_left_style; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_top_style_hover ) ) {
    ?>
    :root {
    --button-border-top-style-hover: <?php echo $button_border_top_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_right_style_hover ) ) {
    ?>
    :root {
    --button-border-right-style-hover: <?php echo $button_border_right_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_bottom_style_hover ) ) {
    ?>
    :root {
    --button-border-bottom-style-hover: <?php echo $button_border_bottom_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $button_border_left_style_hover ) ) {
    ?>
    :root {
    --button-border-left-style-hover: <?php echo $button_border_left_style_hover; ?>;
    }
    <?php
  }

  /**
   * Button Padding
   **/

  $button_vertical_padding = get_theme_mod( 'button_vertical_padding', '' );
  $button_horizontal_padding = get_theme_mod( 'button_horizontal_padding', '' );
  $button_vertical_padding_hover = get_theme_mod( 'button_vertical_padding_hover', '' );
  $button_horizontal_padding_hover = get_theme_mod( 'button_horizontal_padding_hover', '' );

  if ( isset( $button_vertical_padding ) && $button_vertical_padding != '' ) {
    ?>
    :root {
    --button-vertical-padding: <?php echo $button_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $button_horizontal_padding ) && $button_horizontal_padding != '' ) {
    ?>
    :root {
    --button-horizontal-padding: <?php echo $button_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $button_vertical_padding_hover ) && $button_vertical_padding_hover != '' ) {
    ?>
    :root {
    --button-vertical-padding-hover: <?php echo $button_vertical_padding_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_horizontal_padding_hover ) && $button_horizontal_padding_hover != '' ) {
    ?>
    :root {
    --button-horizontal-padding-hover: <?php echo $button_horizontal_padding_hover; ?>px;
    }
    <?php
  }


  /**
   * Button Text
   **/

  $button_font_size = get_theme_mod( 'button_font_size', '' );
  $button_line_height = get_theme_mod( 'button_line_height', '' );
  $button_font_weight = get_theme_mod( 'button_font_weight', '' );
  $button_font_style = get_theme_mod( 'button_font_style', '' );
  $button_text_transform = get_theme_mod( 'button_text_transform', '' );
  $button_letter_spacing = get_theme_mod( 'button_letter_spacing', '' );
  $button_font_size_hover = get_theme_mod( 'button_font_size_hover', '' );
  $button_line_height_hover = get_theme_mod( 'button_line_height_hover', '' );
  $button_font_weight_hover = get_theme_mod( 'button_font_weight_hover', '' );
  $button_font_style_hover = get_theme_mod( 'button_font_style_hover', '' );
  $button_text_transform_hover = get_theme_mod( 'button_text_transform_hover', '' );
  $button_letter_spacing_hover = get_theme_mod( 'button_letter_spacing_hover', '' );

  if ( isset( $button_font_size ) && $button_font_size != '' ) {
    ?>
    :root {
    --button-font-size: <?php echo $button_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $button_line_height ) && $button_line_height != '' ) {
    ?>
    :root {
    --button-line-height: <?php echo $button_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $button_font_weight ) ) {
    ?>
    :root {
    --button-font-weight: <?php echo $button_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $button_font_style ) ) {
    ?>
    :root {
    --button-font-style: <?php echo $button_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $button_text_transform ) ) {
    ?>
    :root {
    --button-text-transform: <?php echo $button_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $button_letter_spacing ) && $button_letter_spacing != '' ) {
    ?>
    :root {
    --button-letter-spacing: <?php echo $button_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $button_font_size_hover ) && $button_font_size_hover != '' ) {
    ?>
    :root {
    --button-font-size-hover: <?php echo $button_font_size_hover; ?>px;
    }
    <?php
  }

  if ( isset( $button_line_height_hover ) && $button_line_height_hover != '' ) {
    ?>
    :root {
    --button-line-height-hover: <?php echo $button_line_height_hover; ?>px;
    }
    <?php
  }

  if ( !empty( $button_font_weight_hover ) ) {
    ?>
    :root {
    --button-font-weight-hover: <?php echo $button_font_weight_hover; ?>;
    }
    <?php
  }

  if ( !empty( $button_font_style_hover ) ) {
    ?>
    :root {
    --button-font-style-hover: <?php echo $button_font_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $button_text_transform_hover ) ) {
    ?>
    :root {
    --button-text-transform-hover: <?php echo $button_text_transform_hover; ?>;
    }
    <?php
  }

  if ( isset( $button_letter_spacing_hover ) && $button_letter_spacing_hover != '' ) {
    ?>
    :root {
    --button-letter-spacing-hover: <?php echo $button_letter_spacing_hover; ?>px;
    }
    <?php
  }


  /**
   * Button Box Shadow
   **/

  $button_box_shadow_x = get_theme_mod( 'button_box_shadow_x', '' );
  $button_box_shadow_y = get_theme_mod( 'button_box_shadow_y', '' );
  $button_box_shadow_blur = get_theme_mod( 'button_box_shadow_blur', '' );
  $button_box_shadow_spread = get_theme_mod( 'button_box_shadow_spread', '' );
  $button_box_shadow_hover_x = get_theme_mod( 'button_box_shadow_hover_x', '' );
  $button_box_shadow_hover_y = get_theme_mod( 'button_box_shadow_hover_y', '' );
  $button_box_shadow_hover_blur = get_theme_mod( 'button_box_shadow_hover_blur', '' );
  $button_box_shadow_hover_spread = get_theme_mod( 'button_box_shadow_hover_spread', '' );

  if ( isset( $button_box_shadow_x ) && $button_box_shadow_x != '' ) {
    ?>
    :root {
    --button-box-shadow-x: <?php echo $button_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_y ) && $button_box_shadow_y != '' ) {
    ?>
    :root {
    --button-box-shadow-y: <?php echo $button_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_blur ) && $button_box_shadow_blur != '' ) {
    ?>
    :root {
    --button-box-shadow-blur: <?php echo $button_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_spread ) && $button_box_shadow_spread != '' ) {
    ?>
    :root {
    --button-box-shadow-spread: <?php echo $button_box_shadow_spread; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_hover_x ) && $button_box_shadow_hover_x != '' ) {
    ?>
    :root {
    --button-box-shadow-hover-x: <?php echo $button_box_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_hover_y ) && $button_box_shadow_hover_y != '' ) {
    ?>
    :root {
    --button-box-shadow-hover-y: <?php echo $button_box_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_hover_blur ) && $button_box_shadow_hover_blur != '' ) {
    ?>
    :root {
    --button-box-shadow-hover-blur: <?php echo $button_box_shadow_hover_blur; ?>px;
    }
    <?php
  }

  if ( isset( $button_box_shadow_hover_spread ) && $button_box_shadow_hover_spread != '' ) {
    ?>
    :root {
    --button-box-shadow-hover-spread: <?php echo $button_box_shadow_hover_spread; ?>px;
    }
    <?php
  }


  /**
   * Button Text Shadow
   **/

  $button_text_shadow_x = get_theme_mod( 'button_text_shadow_x', '' );
  $button_text_shadow_y = get_theme_mod( 'button_text_shadow_y', '' );
  $button_text_shadow_blur = get_theme_mod( 'button_text_shadow_blur', '' );
  $button_text_shadow_hover_x = get_theme_mod( 'button_text_shadow_hover_x', '' );
  $button_text_shadow_hover_y = get_theme_mod( 'button_text_shadow_hover_y', '' );
  $button_text_shadow_hover_blur = get_theme_mod( 'button_text_shadow_hover_blur', '' );

  if ( isset( $button_text_shadow_x ) && $button_text_shadow_x != '' ) {
    ?>
    :root {
    --button-text-shadow-x: <?php echo $button_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $button_text_shadow_y ) && $button_text_shadow_y != '' ) {
    ?>
    :root {
    --button-text-shadow-y: <?php echo $button_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $button_text_shadow_blur ) && $button_text_shadow_blur != '' ) {
    ?>
    :root {
    --button-text-shadow-blur: <?php echo $button_text_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $button_text_shadow_hover_x ) && $button_text_shadow_hover_x != '' ) {
    ?>
    :root {
    --button-text-shadow-hover-x: <?php echo $button_text_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $button_text_shadow_hover_y ) && $button_text_shadow_hover_y != '' ) {
    ?>
    :root {
    --button-text-shadow-hover-y: <?php echo $button_text_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $button_text_shadow_hover_blur ) && $button_text_shadow_hover_blur != '' ) {
    ?>
    :root {
    --button-text-shadow-hover-blur: <?php echo $button_text_shadow_hover_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
