<?php

/**
 * REGISTER CUSTOMIZER HEADER CTA OPTIONS
 **/

function theme_customize_register_header_cta( $wp_customize ) {


  /**
   * Create Header CTA Options Section
   **/

  $wp_customize->add_section( 'header_cta_options' , array(
    'title'      => __( 'Header CTA Style Options', 'dream' ),
    'priority'   => 64,
  ) );

  /**
   * Header CTA Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_text', array(
    'label' => 'Header CTA Text',
    'section' => 'header_cta_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define text styling for \'default\' header cta.'
  ) ) );

  // Header CTA Font Size
  $wp_customize->add_setting( 'header_cta_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_font_size',
    array(
      'label' => __( 'Header CTA Font Size' ),
      'description' => __( 'Enter a px value for header cta font size.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Font Size
  $wp_customize->add_setting( 'header_cta_font_size_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_font_size_hover',
    array(
      'label' => __( 'Header CTA Hover Font Size' ),
      'description' => __( 'Enter a px value for header cta hover state font size.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Line Height
  $wp_customize->add_setting( 'header_cta_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_line_height',
    array(
      'label' => __( 'Header CTA Line Height' ),
      'description' => __( 'Enter a px value for header cta line height.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Line Height
  $wp_customize->add_setting( 'header_cta_line_height_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_line_height_hover',
    array(
      'label' => __( 'Header CTA Line Height Hover' ),
      'description' => __( 'Enter a px value for header cta hover state line heights.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Font Weight
  $wp_customize->add_setting( 'header_cta_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_font_weight',
    array(
      'label' => __( 'Header CTA Font Weight' ),
      'description' => __( 'Select a font weight for header cta.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Hover Font Weight
  $wp_customize->add_setting( 'header_cta_font_weight_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_font_weight_hover',
    array(
      'label' => __( 'Header CTA Hover Font Weight' ),
      'description' => __( 'Select a font weight for header cta hover states.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Font Style
  $wp_customize->add_setting( 'header_cta_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_font_style',
    array(
      'label' => __( 'Header CTA Font Style' ),
      'description' => __( 'Select a font style for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header CTA Hover Font Style
  $wp_customize->add_setting( 'header_cta_font_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_font_style_hover',
    array(
      'label' => __( 'Header CTA Hover Font Style' ),
      'description' => __( 'Select a font style for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header CTA Text Transform
  $wp_customize->add_setting( 'header_cta_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_transform',
    array(
      'label' => __( 'Header CTA Text Transform' ),
      'description' => __( 'Select a transform style for header cta text.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Hover Text Transform
  $wp_customize->add_setting( 'header_cta_text_transform_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_transform_hover',
    array(
      'label' => __( 'Header CTA Hover Text Transform' ),
      'description' => __( 'Select a transform style for header cta hover state text.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Letter Spacing
  $wp_customize->add_setting( 'header_cta_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_letter_spacing',
    array(
      'label' => __( 'Header CTA Letter Spacing' ),
      'description' => __( 'Enter a px value for header cta letter spacing.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Hover Letter Spacing
  $wp_customize->add_setting( 'header_cta_letter_spacing_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_letter_spacing_hover',
    array(
      'label' => __( 'Header CTA Hover Letter Spacing' ),
      'description' => __( 'Enter a px value for header cta hover state letter spacing.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Header CTA Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_padding', array(
    'label' => 'Header CTA Padding',
    'section' => 'header_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define padding for \'default\' header cta style.'
  ) ) );

  // Header CTA Vertical Padding
  $wp_customize->add_setting( 'header_cta_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_vertical_padding',
    array(
      'label' => __( 'Header CTA Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Vertical Padding
  $wp_customize->add_setting( 'header_cta_vertical_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_vertical_padding_hover',
    array(
      'label' => __( 'Header CTA Hover Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Horizontal Padding
  $wp_customize->add_setting( 'header_cta_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_horizontal_padding',
    array(
      'label' => __( 'Header CTA Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Horizontal Padding
  $wp_customize->add_setting( 'header_cta_horizontal_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_horizontal_padding_hover',
    array(
      'label' => __( 'Header CTA Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );


  /**
   * Header CTA Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_border_width', array(
    'label' => 'Header CTA Border Width',
    'section' => 'header_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border width for \'default\' header cta style.'
  ) ) );

  // Header CTA Top Border Width
  $wp_customize->add_setting( 'header_cta_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_width',
    array(
      'label' => __( 'Header CTA Border Top Width' ),
      'description' => __( 'Enter a px value for top border width for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Top Border Width
  $wp_customize->add_setting( 'header_cta_border_top_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_width_hover',
    array(
      'label' => __( 'Header CTA Border Hover Top Width' ),
      'description' => __( 'Enter a px value for top border width for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Right Border Width
  $wp_customize->add_setting( 'header_cta_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_right_width',
    array(
      'label' => __( 'Header CTA Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Right Border Width
  $wp_customize->add_setting( 'header_cta_border_right_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_right_width_hover',
    array(
      'label' => __( 'Header CTA Hover Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Bottom Border Width
  $wp_customize->add_setting( 'header_cta_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_width',
    array(
      'label' => __( 'Header CTA Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Bottom Border Width
  $wp_customize->add_setting( 'header_cta_border_bottom_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_width_hover',
    array(
      'label' => __( 'Header CTA Hover Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Left Border Width
  $wp_customize->add_setting( 'header_cta_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_left_width',
    array(
      'label' => __( 'Header CTA Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Left Border Width
  $wp_customize->add_setting( 'header_cta_border_left_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_left_width_hover',
    array(
      'label' => __( 'Header CTA Hover Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );


  /**
   * Header CTA Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
      'default' => '',
      'type' => 'customtext_control_header_cta_border_radius',
      'transport' => 'refresh',
    ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_control_header_cta_border_radius', array(
      'label' => 'Header CTA Border Radius',
      'section' => 'header_cta_options',
      'settings' => 'customtext',
      'extra' =>'Define border radius for \'default\' header cta style.',
      'divider' => true
    ) ) );

  // Header CTA Top Left Border Radius
  $wp_customize->add_setting( 'header_cta_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_left_radius',
    array(
      'label' => __( 'Header CTA Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Top Left Border Radius
  $wp_customize->add_setting( 'header_cta_border_top_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_left_radius_hover',
    array(
      'label' => __( 'Header CTA Hover Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Top Right Border Radius
  $wp_customize->add_setting( 'header_cta_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_right_radius',
    array(
      'label' => __( 'Header CTA Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Top Right Border Radius
  $wp_customize->add_setting( 'header_cta_border_top_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_right_radius_hover',
    array(
      'label' => __( 'Header CTA Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Bottom Left Border Radius
  $wp_customize->add_setting( 'header_cta_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_left_radius',
    array(
      'label' => __( 'Header CTA Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Bottom Left Border Radius
  $wp_customize->add_setting( 'header_cta_border_bottom_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_left_radius_hover',
    array(
      'label' => __( 'Header CTA Hover Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Bottom Right Border Radius
  $wp_customize->add_setting( 'header_cta_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_right_radius',
    array(
      'label' => __( 'Header CTA Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for header cta.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );

  // Header CTA Hover Bottom Right Border Radius
  $wp_customize->add_setting( 'header_cta_border_bottom_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_right_radius_hover',
    array(
      'label' => __( 'Header CTA Hover Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for header cta hover states.' ),
      'section' => 'header_cta_options',
      'type' => 'number'
    )
  );


  /**
   * Header CTA Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_border_style', array(
    'label' => 'Header CTA Border Style',
    'section' => 'header_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border style for \'default\' header cta.'
  ) ) );

  // Header CTA Top Border Style
  $wp_customize->add_setting( 'header_cta_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_style',
    array(
      'label' => __( 'Header CTA Border Top Style' ),
      'description' => __( 'Select a top border style for header cta.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Hover Top Border Style
  $wp_customize->add_setting( 'header_cta_border_top_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_top_style_hover',
    array(
      'label' => __( 'Header CTA Hover Border Top Style' ),
      'description' => __( 'Select a top border style for header cta hover states.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Right Border Style
  $wp_customize->add_setting( 'header_cta_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_right_style',
    array(
      'label' => __( 'Header CTA Border Right Style' ),
      'description' => __( 'Select a right border style for header cta.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Hover Right Border Style
  $wp_customize->add_setting( 'header_cta_border_right_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_right_style_hover',
    array(
      'label' => __( 'Header CTA Hover Border Right Style' ),
      'description' => __( 'Select a right border style for header cta hover states.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Bottom Border Style
  $wp_customize->add_setting( 'header_cta_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_style',
    array(
      'label' => __( 'Header CTA Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for header cta states.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Hover Bottom Border Style
  $wp_customize->add_setting( 'header_cta_border_bottom_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_bottom_style_hover',
    array(
      'label' => __( 'Header CTA Hover Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for header cta hover states.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Left Border Style
  $wp_customize->add_setting( 'header_cta_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_left_style',
    array(
      'label' => __( 'Header CTA Border Left Style' ),
      'description' => __( 'Select a left border style for header cta.' ),
      'section' => 'header_cta_options',
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

  // Header CTA Hover Left Border Style
  $wp_customize->add_setting( 'header_cta_border_left_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_border_left_style_hover',
    array(
      'label' => __( 'Header CTA Hover Border Left Style' ),
      'description' => __( 'Select a left border style for header cta hover states.' ),
      'section' => 'header_cta_options',
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
   * Header CTA Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_box_shadow', array(
    'label' => 'Header CTA Box Shadow',
    'section' => 'header_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define box shadow for \'default\' header cta.'
  ) ) );

  // Header CTA Box Shadow X
  $wp_customize->add_setting( 'header_cta_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_x',
    array(
      'label' => __( 'Header CTA Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for header cta box shadow x-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Y
  $wp_customize->add_setting( 'header_cta_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_y',
    array(
      'label' => __( 'Header CTA Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header cta box shadow y-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Blur
  $wp_customize->add_setting( 'header_cta_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_blur',
    array(
      'label' => __( 'Header CTA Box Shadow Blur' ),
      'description' => __( 'Enter a px value for header cta box shadow blur.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Spread
  $wp_customize->add_setting( 'header_cta_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_spread',
    array(
      'label' => __( 'Header CTA Box Shadow Spread' ),
      'description' => __( 'Enter a px value for header cta box shadow spread.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Hover X
  $wp_customize->add_setting( 'header_cta_box_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_hover_x',
    array(
      'label' => __( 'Header CTA Box Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for header cta box shadow hover x-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Hover Y
  $wp_customize->add_setting( 'header_cta_box_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_hover_y',
    array(
      'label' => __( 'Header CTA Box Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for header cta box shadow hover y-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Hover Blur
  $wp_customize->add_setting( 'header_cta_box_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_hover_blur',
    array(
      'label' => __( 'Header CTA Box Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for header cta box shadow hover blur.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Box Shadow Hover Spread
  $wp_customize->add_setting( 'header_cta_box_shadow_hover_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_box_shadow_hover_spread',
    array(
      'label' => __( 'Header CTA Box Shadow Hover Spread' ),
      'description' => __( 'Enter a px value for header cta box shadow hover spread.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Header CTA Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_cta_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_cta_text_shadow', array(
    'label' => 'Header CTA Text Shadow',
    'section' => 'header_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' header cta.'
  ) ) );

  // Header CTA Text Shadow X
  $wp_customize->add_setting( 'header_cta_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_shadow_x',
    array(
      'label' => __( 'Header CTA Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for header cta text shadow x-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Text Shadow Y
  $wp_customize->add_setting( 'header_cta_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_shadow_y',
    array(
      'label' => __( 'Header CTA Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header cta text shadow y-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Text Shadow Blur
  $wp_customize->add_setting( 'header_cta_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_shadow_blur',
    array(
      'label' => __( 'Header CTA Text Shadow Blur' ),
      'description' => __( 'Enter a px value for header cta text shadow blur.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Text Shadow Hover X
  $wp_customize->add_setting( 'header_cta_text_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_shadow_hover_x',
    array(
      'label' => __( 'Header CTA Text Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for header cta text shadow hover x-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Text Shadow Hover Y
  $wp_customize->add_setting( 'header_cta_text_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_shadow_hover_y',
    array(
      'label' => __( 'Header CTA Text Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for header cta text shadow hover y-offset.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header CTA Text Shadow Hover Blur
  $wp_customize->add_setting( 'header_cta_text_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_cta_text_shadow_hover_blur',
    array(
      'label' => __( 'Header CTA Text Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for header cta text shadow hover blur.' ),
      'section' => 'header_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_header_cta' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_header_cta() {
  ob_start();

  /**
   * Header CTA Border Radius
   **/

  $header_cta_border_top_left_radius = get_theme_mod( 'header_cta_border_top_left_radius', '' );
  $header_cta_border_top_right_radius = get_theme_mod( 'header_cta_border_top_right_radius', '' );
  $header_cta_border_bottom_left_radius = get_theme_mod( 'header_cta_border_bottom_left_radius', '' );
  $header_cta_border_bottom_right_radius = get_theme_mod( 'header_cta_border_bottom_right_radius', '' );
  $header_cta_border_top_left_radius_hover = get_theme_mod( 'header_cta_border_top_left_radius_hover', '' );
  $header_cta_border_top_right_radius_hover = get_theme_mod( 'header_cta_border_top_right_radius_hover', '' );
  $header_cta_border_bottom_left_radius_hover = get_theme_mod( 'header_cta_border_bottom_left_radius_hover', '' );
  $header_cta_border_bottom_right_radius_hover = get_theme_mod( 'header_cta_border_bottom_right_radius_hover', '' );


  if ( isset( $header_cta_border_top_left_radius ) && $header_cta_border_top_left_radius != '' ) {
    ?>
    :root {
    --header-cta-border-top-left-radius: <?php echo $header_cta_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_top_right_radius ) && $header_cta_border_top_right_radius != '' ) {
    ?>
    :root {
    --header-cta-border-top-right-radius: <?php echo $header_cta_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_bottom_left_radius ) && $header_cta_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --header-cta-border-bottom-left-radius: <?php echo $header_cta_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_bottom_right_radius ) && $header_cta_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --header-cta-border-bottom-right-radius: <?php echo $header_cta_border_bottom_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_top_left_radius_hover ) && $header_cta_border_top_left_radius_hover != '' ) {
    ?>
    :root {
    --header-cta-border-top-left-radius-hover: <?php echo $header_cta_border_top_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_top_right_radius_hover ) && $header_cta_border_top_right_radius_hover != '' ) {
    ?>
    :root {
    --header-cta-border-top-right-radius-hover: <?php echo $header_cta_border_top_right_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_bottom_left_radius_hover ) && $header_cta_border_bottom_left_radius_hover != '' ) {
    ?>
    :root {
    --header-cta-border-bottom-left-radius-hover: <?php echo $header_cta_border_bottom_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_bottom_right_radius_hover ) && $header_cta_border_bottom_right_radius_hover != '' ) {
    ?>
    :root {
    --header-cta-border-bottom-right-radius-hover: <?php echo $header_cta_border_bottom_right_radius_hover; ?>px;
    }
    <?php
  }


  /**
   * Header CTA Border Width
   **/

  $header_cta_border_top_width = get_theme_mod( 'header_cta_border_top_width', '' );
  $header_cta_border_right_width = get_theme_mod( 'header_cta_border_right_width', '' );
  $header_cta_border_bottom_width = get_theme_mod( 'header_cta_border_bottom_width', '' );
  $header_cta_border_left_width = get_theme_mod( 'header_cta_border_left_width', '' );
  $header_cta_border_top_width_hover = get_theme_mod( 'header_cta_border_top_width_hover', '' );
  $header_cta_border_right_width_hover = get_theme_mod( 'header_cta_border_right_width_hover', '' );
  $header_cta_border_bottom_width_hover = get_theme_mod( 'header_cta_border_bottom_width_hover', '' );
  $header_cta_border_left_width_hover = get_theme_mod( 'header_cta_border_left_width_hover', '' );

  if ( isset( $header_cta_border_top_width ) && $header_cta_border_top_width != '' ) {
    ?>
    :root {
    --header-cta-border-top-width: <?php echo $header_cta_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_right_width ) && $header_cta_border_right_width != '' ) {
    ?>
    :root {
    --header-cta-border-right-width: <?php echo $header_cta_border_right_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_bottom_width ) && $header_cta_border_bottom_width != '' ) {
    ?>
    :root {
    --header-cta-border-bottom-width: <?php echo $header_cta_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_left_width ) && $header_cta_border_left_width != '' ) {
    ?>
    :root {
    --header-cta-border-left-width: <?php echo $header_cta_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_top_width_hover ) && $header_cta_border_top_width_hover != '' ) {
    ?>
    :root {
    --header-cta-border-top-width-hover: <?php echo $header_cta_border_top_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_right_width_hover ) && $header_cta_border_right_width_hover != '' ) {
    ?>
    :root {
    --header-cta-border-right-width-hover: <?php echo $header_cta_border_right_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_bottom_width_hover ) && $header_cta_border_bottom_width_hover != '' ) {
    ?>
    :root {
    --header-cta-border-bottom-width-hover: <?php echo $header_cta_border_bottom_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_border_left_width_hover ) && $header_cta_border_left_width_hover != '' ) {
    ?>
    :root {
    --header-cta-border-left-width-hover: <?php echo $header_cta_border_left_width_hover; ?>px;
    }
    <?php
  }


  /**
   * Header CTA Border Style
   **/

  $header_cta_border_top_style = get_theme_mod( 'header_cta_border_top_style', '' );
  $header_cta_border_right_style = get_theme_mod( 'header_cta_border_right_style', '' );
  $header_cta_border_bottom_style = get_theme_mod( 'header_cta_border_bottom_style', '' );
  $header_cta_border_left_style = get_theme_mod( 'header_cta_border_left_style', '' );
  $header_cta_border_top_style_hover = get_theme_mod( 'header_cta_border_top_style_hover', '' );
  $header_cta_border_right_style_hover = get_theme_mod( 'header_cta_border_right_style_hover', '' );
  $header_cta_border_bottom_style_hover = get_theme_mod( 'header_cta_border_bottom_style_hover', '' );
  $header_cta_border_left_style_hover = get_theme_mod( 'header_cta_border_left_style_hover', '' );

  if ( !empty( $header_cta_border_top_style ) ) {
    ?>
    :root {
    --header-cta-border-top-style: <?php echo $header_cta_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_right_style ) ) {
    ?>
    :root {
    --header-cta-border-right-style: <?php echo $header_cta_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_bottom_style ) ) {
    ?>
    :root {
    --header-cta-border-bottom-style: <?php echo $header_cta_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_left_style ) ) {
    ?>
    :root {
    --header-cta-border-left-style: <?php echo $header_cta_border_left_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_top_style_hover ) ) {
    ?>
    :root {
    --header-cta-border-top-style-hover: <?php echo $header_cta_border_top_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_right_style_hover ) ) {
    ?>
    :root {
    --header-cta-border-right-style-hover: <?php echo $header_cta_border_right_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_bottom_style_hover ) ) {
    ?>
    :root {
    --header-cta-border-bottom-style-hover: <?php echo $header_cta_border_bottom_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_border_left_style_hover ) ) {
    ?>
    :root {
    --header-cta-border-left-style-hover: <?php echo $header_cta_border_left_style_hover; ?>;
    }
    <?php
  }

  /**
   * Header CTA Padding
   **/

  $header_cta_vertical_padding = get_theme_mod( 'header_cta_vertical_padding', '' );
  $header_cta_horizontal_padding = get_theme_mod( 'header_cta_horizontal_padding', '' );
  $header_cta_vertical_padding_hover = get_theme_mod( 'header_cta_vertical_padding_hover', '' );
  $header_cta_horizontal_padding_hover = get_theme_mod( 'header_cta_horizontal_padding_hover', '' );

  if ( isset( $header_cta_vertical_padding ) && $header_cta_vertical_padding != '' ) {
    ?>
    :root {
    --header-cta-vertical-padding: <?php echo $header_cta_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_horizontal_padding ) && $header_cta_horizontal_padding != '' ) {
    ?>
    :root {
    --header-cta-horizontal-padding: <?php echo $header_cta_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_vertical_padding_hover ) && $header_cta_vertical_padding_hover != '' ) {
    ?>
    :root {
    --header-cta-vertical-padding-hover: <?php echo $header_cta_vertical_padding_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_horizontal_padding_hover ) && $header_cta_horizontal_padding_hover != '' ) {
    ?>
    :root {
    --header-cta-horizontal-padding-hover: <?php echo $header_cta_horizontal_padding_hover; ?>px;
    }
    <?php
  }


  /**
   * Header CTA Text
   **/

  $header_cta_font_size = get_theme_mod( 'header_cta_font_size', '' );
  $header_cta_line_height = get_theme_mod( 'header_cta_line_height', '' );
  $header_cta_font_weight = get_theme_mod( 'header_cta_font_weight', '' );
  $header_cta_font_style = get_theme_mod( 'header_cta_font_style', '' );
  $header_cta_text_transform = get_theme_mod( 'header_cta_text_transform', '' );
  $header_cta_letter_spacing = get_theme_mod( 'header_cta_letter_spacing', '' );
  $header_cta_font_size_hover = get_theme_mod( 'header_cta_font_size_hover', '' );
  $header_cta_line_height_hover = get_theme_mod( 'header_cta_line_height_hover', '' );
  $header_cta_font_weight_hover = get_theme_mod( 'header_cta_font_weight_hover', '' );
  $header_cta_font_style_hover = get_theme_mod( 'header_cta_font_style_hover', '' );
  $header_cta_text_transform_hover = get_theme_mod( 'header_cta_text_transform_hover', '' );
  $header_cta_letter_spacing_hover = get_theme_mod( 'header_cta_letter_spacing_hover', '' );

  if ( isset( $header_cta_font_size ) && $header_cta_font_size != '' ) {
    ?>
    :root {
    --header-cta-font-size: <?php echo $header_cta_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_line_height ) && $header_cta_line_height != '' ) {
    ?>
    :root {
    --header-cta-line-height: <?php echo $header_cta_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $header_cta_font_weight ) ) {
    ?>
    :root {
    --header-cta-font-weight: <?php echo $header_cta_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_font_style ) ) {
    ?>
    :root {
    --header-cta-font-style: <?php echo $header_cta_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_text_transform ) ) {
    ?>
    :root {
    --header-cta-text-transform: <?php echo $header_cta_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $header_cta_letter_spacing ) && $header_cta_letter_spacing != '' ) {
    ?>
    :root {
    --header-cta-letter-spacing: <?php echo $header_cta_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_font_size_hover ) && $header_cta_font_size_hover != '' ) {
    ?>
    :root {
    --header-cta-font-size-hover: <?php echo $header_cta_font_size_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_line_height_hover ) && $header_cta_line_height_hover != '' ) {
    ?>
    :root {
    --header-cta-line-height-hover: <?php echo $header_cta_line_height_hover; ?>px;
    }
    <?php
  }

  if ( !empty( $header_cta_font_weight_hover ) ) {
    ?>
    :root {
    --header-cta-font-weight-hover: <?php echo $header_cta_font_weight_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_font_style_hover ) ) {
    ?>
    :root {
    --header-cta-font-style-hover: <?php echo $header_cta_font_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_cta_text_transform_hover ) ) {
    ?>
    :root {
    --header-cta-text-transform-hover: <?php echo $header_cta_text_transform_hover; ?>;
    }
    <?php
  }

  if ( isset( $header_cta_letter_spacing_hover ) && $header_cta_letter_spacing_hover != '' ) {
    ?>
    :root {
    --header-cta-letter-spacing-hover: <?php echo $header_cta_letter_spacing_hover; ?>px;
    }
    <?php
  }


  /**
   * Header CTA Box Shadow
   **/

  $header_cta_box_shadow_x = get_theme_mod( 'header_cta_box_shadow_x', '' );
  $header_cta_box_shadow_y = get_theme_mod( 'header_cta_box_shadow_y', '' );
  $header_cta_box_shadow_blur = get_theme_mod( 'header_cta_box_shadow_blur', '' );
  $header_cta_box_shadow_spread = get_theme_mod( 'header_cta_box_shadow_spread', '' );
  $header_cta_box_shadow_hover_x = get_theme_mod( 'header_cta_box_shadow_hover_x', '' );
  $header_cta_box_shadow_hover_y = get_theme_mod( 'header_cta_box_shadow_hover_y', '' );
  $header_cta_box_shadow_hover_blur = get_theme_mod( 'header_cta_box_shadow_hover_blur', '' );
  $header_cta_box_shadow_hover_spread = get_theme_mod( 'header_cta_box_shadow_hover_spread', '' );

  if ( isset( $header_cta_box_shadow_x ) && $header_cta_box_shadow_x != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-x: <?php echo $header_cta_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_y ) && $header_cta_box_shadow_y != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-y: <?php echo $header_cta_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_blur ) && $header_cta_box_shadow_blur != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-blur: <?php echo $header_cta_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_spread ) && $header_cta_box_shadow_spread != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-spread: <?php echo $header_cta_box_shadow_spread; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_hover_x ) && $header_cta_box_shadow_hover_x != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-hover-x: <?php echo $header_cta_box_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_hover_y ) && $header_cta_box_shadow_hover_y != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-hover-y: <?php echo $header_cta_box_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_hover_blur ) && $header_cta_box_shadow_hover_blur != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-hover-blur: <?php echo $header_cta_box_shadow_hover_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_box_shadow_hover_spread ) && $header_cta_box_shadow_hover_spread != '' ) {
    ?>
    :root {
    --header-cta-box-shadow-hover-spread: <?php echo $header_cta_box_shadow_hover_spread; ?>px;
    }
    <?php
  }


  /**
   * Header CTA Text Shadow
   **/

  $header_cta_text_shadow_x = get_theme_mod( 'header_cta_text_shadow_x', '' );
  $header_cta_text_shadow_y = get_theme_mod( 'header_cta_text_shadow_y', '' );
  $header_cta_text_shadow_blur = get_theme_mod( 'header_cta_text_shadow_blur', '' );
  $header_cta_text_shadow_hover_x = get_theme_mod( 'header_cta_text_shadow_hover_x', '' );
  $header_cta_text_shadow_hover_y = get_theme_mod( 'header_cta_text_shadow_hover_y', '' );
  $header_cta_text_shadow_hover_blur = get_theme_mod( 'header_cta_text_shadow_hover_blur', '' );

  if ( isset( $header_cta_text_shadow_x ) && $header_cta_text_shadow_x != '' ) {
    ?>
    :root {
    --header-cta-text-shadow-x: <?php echo $header_cta_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_text_shadow_y ) && $header_cta_text_shadow_y != '' ) {
    ?>
    :root {
    --header-cta-text-shadow-y: <?php echo $header_cta_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_text_shadow_blur ) && $header_cta_text_shadow_blur != '' ) {
    ?>
    :root {
    --header-cta-text-shadow-blur: <?php echo $header_cta_text_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_text_shadow_hover_x ) && $header_cta_text_shadow_hover_x != '' ) {
    ?>
    :root {
    --header-cta-text-shadow-hover-x: <?php echo $header_cta_text_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_text_shadow_hover_y ) && $header_cta_text_shadow_hover_y != '' ) {
    ?>
    :root {
    --header-cta-text-shadow-hover-y: <?php echo $header_cta_text_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_cta_text_shadow_hover_blur ) && $header_cta_text_shadow_hover_blur != '' ) {
    ?>
    :root {
    --header-cta-text-shadow-hover-blur: <?php echo $header_cta_text_shadow_hover_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
