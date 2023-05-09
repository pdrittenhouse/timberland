<?php

/**
 * REGISTER CUSTOMIZER FOOTER CTA OPTIONS
 **/

function theme_customize_register_footer_cta( $wp_customize ) {


  /**
   * Create Footer CTA Options Section
   **/

  $wp_customize->add_section( 'footer_cta_options' , array(
    'title'      => __( 'Footer CTA Style Options', 'dream' ),
    'priority'   => 83,
  ) );

  /**
   * Footer CTA Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_text', array(
    'label' => 'Footer CTA Text',
    'section' => 'footer_cta_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define text styling for \'default\' footer cta.'
  ) ) );

  // Footer CTA Font Size
  $wp_customize->add_setting( 'footer_cta_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_font_size',
    array(
      'label' => __( 'Footer CTA Font Size' ),
      'description' => __( 'Enter a px value for footer cta font size.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Font Size
  $wp_customize->add_setting( 'footer_cta_font_size_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_font_size_hover',
    array(
      'label' => __( 'Footer CTA Hover Font Size' ),
      'description' => __( 'Enter a px value for footer cta hover state font size.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Line Height
  $wp_customize->add_setting( 'footer_cta_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_line_height',
    array(
      'label' => __( 'Footer CTA Line Height' ),
      'description' => __( 'Enter a px value for footer cta line height.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Line Height
  $wp_customize->add_setting( 'footer_cta_line_height_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_line_height_hover',
    array(
      'label' => __( 'Footer CTA Line Height Hover' ),
      'description' => __( 'Enter a px value for footer cta hover state line heights.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Font Weight
  $wp_customize->add_setting( 'footer_cta_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_font_weight',
    array(
      'label' => __( 'Footer CTA Font Weight' ),
      'description' => __( 'Select a font weight for footer cta.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Hover Font Weight
  $wp_customize->add_setting( 'footer_cta_font_weight_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_font_weight_hover',
    array(
      'label' => __( 'Footer CTA Hover Font Weight' ),
      'description' => __( 'Select a font weight for footer cta hover states.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Font Style
  $wp_customize->add_setting( 'footer_cta_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_font_style',
    array(
      'label' => __( 'Footer CTA Font Style' ),
      'description' => __( 'Select a font style for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer CTA Hover Font Style
  $wp_customize->add_setting( 'footer_cta_font_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_font_style_hover',
    array(
      'label' => __( 'Footer CTA Hover Font Style' ),
      'description' => __( 'Select a font style for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer CTA Text Transform
  $wp_customize->add_setting( 'footer_cta_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_transform',
    array(
      'label' => __( 'Footer CTA Text Transform' ),
      'description' => __( 'Select a transform style for footer cta text.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Hover Text Transform
  $wp_customize->add_setting( 'footer_cta_text_transform_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_transform_hover',
    array(
      'label' => __( 'Footer CTA Hover Text Transform' ),
      'description' => __( 'Select a transform style for footer cta hover state text.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Letter Spacing
  $wp_customize->add_setting( 'footer_cta_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_letter_spacing',
    array(
      'label' => __( 'Footer CTA Letter Spacing' ),
      'description' => __( 'Enter a px value for footer cta letter spacing.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Hover Letter Spacing
  $wp_customize->add_setting( 'footer_cta_letter_spacing_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_letter_spacing_hover',
    array(
      'label' => __( 'Footer CTA Hover Letter Spacing' ),
      'description' => __( 'Enter a px value for footer cta hover state letter spacing.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer CTA Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_padding', array(
    'label' => 'Footer CTA Padding',
    'section' => 'footer_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define padding for \'default\' footer cta style.'
  ) ) );

  // Footer CTA Vertical Padding
  $wp_customize->add_setting( 'footer_cta_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_vertical_padding',
    array(
      'label' => __( 'Footer CTA Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Vertical Padding
  $wp_customize->add_setting( 'footer_cta_vertical_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_vertical_padding_hover',
    array(
      'label' => __( 'Footer CTA Hover Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Horizontal Padding
  $wp_customize->add_setting( 'footer_cta_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_horizontal_padding',
    array(
      'label' => __( 'Footer CTA Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Horizontal Padding
  $wp_customize->add_setting( 'footer_cta_horizontal_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_horizontal_padding_hover',
    array(
      'label' => __( 'Footer CTA Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );


  /**
   * Footer CTA Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_border_width', array(
    'label' => 'Footer CTA Border Width',
    'section' => 'footer_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border width for \'default\' footer cta style.'
  ) ) );

  // Footer CTA Top Border Width
  $wp_customize->add_setting( 'footer_cta_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_width',
    array(
      'label' => __( 'Footer CTA Border Top Width' ),
      'description' => __( 'Enter a px value for top border width for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Top Border Width
  $wp_customize->add_setting( 'footer_cta_border_top_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_width_hover',
    array(
      'label' => __( 'Footer CTA Border Hover Top Width' ),
      'description' => __( 'Enter a px value for top border width for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Right Border Width
  $wp_customize->add_setting( 'footer_cta_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_right_width',
    array(
      'label' => __( 'Footer CTA Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Right Border Width
  $wp_customize->add_setting( 'footer_cta_border_right_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_right_width_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Bottom Border Width
  $wp_customize->add_setting( 'footer_cta_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_width',
    array(
      'label' => __( 'Footer CTA Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Bottom Border Width
  $wp_customize->add_setting( 'footer_cta_border_bottom_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_width_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Left Border Width
  $wp_customize->add_setting( 'footer_cta_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_left_width',
    array(
      'label' => __( 'Footer CTA Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Left Border Width
  $wp_customize->add_setting( 'footer_cta_border_left_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_left_width_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );


  /**
   * Footer CTA Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
      'default' => '',
      'type' => 'customtext_control_footer_cta_border_radius',
      'transport' => 'refresh',
    ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_control_footer_cta_border_radius', array(
      'label' => 'Footer CTA Border Radius',
      'section' => 'footer_cta_options',
      'settings' => 'customtext',
      'extra' =>'Define border radius for \'default\' footer cta style.',
      'divider' => true
    ) ) );

  // Footer CTA Top Left Border Radius
  $wp_customize->add_setting( 'footer_cta_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_left_radius',
    array(
      'label' => __( 'Footer CTA Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Top Left Border Radius
  $wp_customize->add_setting( 'footer_cta_border_top_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_left_radius_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Top Right Border Radius
  $wp_customize->add_setting( 'footer_cta_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_right_radius',
    array(
      'label' => __( 'Footer CTA Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Top Right Border Radius
  $wp_customize->add_setting( 'footer_cta_border_top_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_right_radius_hover',
    array(
      'label' => __( 'Footer CTA Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Bottom Left Border Radius
  $wp_customize->add_setting( 'footer_cta_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_left_radius',
    array(
      'label' => __( 'Footer CTA Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Bottom Left Border Radius
  $wp_customize->add_setting( 'footer_cta_border_bottom_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_left_radius_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Bottom Right Border Radius
  $wp_customize->add_setting( 'footer_cta_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_right_radius',
    array(
      'label' => __( 'Footer CTA Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for footer cta.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );

  // Footer CTA Hover Bottom Right Border Radius
  $wp_customize->add_setting( 'footer_cta_border_bottom_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_right_radius_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for footer cta hover states.' ),
      'section' => 'footer_cta_options',
      'type' => 'number'
    )
  );


  /**
   * Footer CTA Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_border_style', array(
    'label' => 'Footer CTA Border Style',
    'section' => 'footer_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border style for \'default\' footer cta.'
  ) ) );

  // Footer CTA Top Border Style
  $wp_customize->add_setting( 'footer_cta_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_style',
    array(
      'label' => __( 'Footer CTA Border Top Style' ),
      'description' => __( 'Select a top border style for footer cta.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Hover Top Border Style
  $wp_customize->add_setting( 'footer_cta_border_top_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_top_style_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Top Style' ),
      'description' => __( 'Select a top border style for footer cta hover states.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Right Border Style
  $wp_customize->add_setting( 'footer_cta_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_right_style',
    array(
      'label' => __( 'Footer CTA Border Right Style' ),
      'description' => __( 'Select a right border style for footer cta.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Hover Right Border Style
  $wp_customize->add_setting( 'footer_cta_border_right_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_right_style_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Right Style' ),
      'description' => __( 'Select a right border style for footer cta hover states.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Bottom Border Style
  $wp_customize->add_setting( 'footer_cta_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_style',
    array(
      'label' => __( 'Footer CTA Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for footer cta states.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Hover Bottom Border Style
  $wp_customize->add_setting( 'footer_cta_border_bottom_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_bottom_style_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for footer cta hover states.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Left Border Style
  $wp_customize->add_setting( 'footer_cta_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_left_style',
    array(
      'label' => __( 'Footer CTA Border Left Style' ),
      'description' => __( 'Select a left border style for footer cta.' ),
      'section' => 'footer_cta_options',
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

  // Footer CTA Hover Left Border Style
  $wp_customize->add_setting( 'footer_cta_border_left_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_border_left_style_hover',
    array(
      'label' => __( 'Footer CTA Hover Border Left Style' ),
      'description' => __( 'Select a left border style for footer cta hover states.' ),
      'section' => 'footer_cta_options',
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
   * Footer CTA Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_box_shadow', array(
    'label' => 'Footer CTA Box Shadow',
    'section' => 'footer_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define box shadow for \'default\' footer cta.'
  ) ) );

  // Footer CTA Box Shadow X
  $wp_customize->add_setting( 'footer_cta_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_x',
    array(
      'label' => __( 'Footer CTA Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer cta box shadow x-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Y
  $wp_customize->add_setting( 'footer_cta_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_y',
    array(
      'label' => __( 'Footer CTA Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer cta box shadow y-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Blur
  $wp_customize->add_setting( 'footer_cta_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_blur',
    array(
      'label' => __( 'Footer CTA Box Shadow Blur' ),
      'description' => __( 'Enter a px value for footer cta box shadow blur.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Spread
  $wp_customize->add_setting( 'footer_cta_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_spread',
    array(
      'label' => __( 'Footer CTA Box Shadow Spread' ),
      'description' => __( 'Enter a px value for footer cta box shadow spread.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Hover X
  $wp_customize->add_setting( 'footer_cta_box_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_hover_x',
    array(
      'label' => __( 'Footer CTA Box Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for footer cta box shadow hover x-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Hover Y
  $wp_customize->add_setting( 'footer_cta_box_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_hover_y',
    array(
      'label' => __( 'Footer CTA Box Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for footer cta box shadow hover y-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Hover Blur
  $wp_customize->add_setting( 'footer_cta_box_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_hover_blur',
    array(
      'label' => __( 'Footer CTA Box Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for footer cta box shadow hover blur.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Box Shadow Hover Spread
  $wp_customize->add_setting( 'footer_cta_box_shadow_hover_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_box_shadow_hover_spread',
    array(
      'label' => __( 'Footer CTA Box Shadow Hover Spread' ),
      'description' => __( 'Enter a px value for footer cta box shadow hover spread.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer CTA Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_cta_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_cta_text_shadow', array(
    'label' => 'Footer CTA Text Shadow',
    'section' => 'footer_cta_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' footer cta.'
  ) ) );

  // Footer CTA Text Shadow X
  $wp_customize->add_setting( 'footer_cta_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_shadow_x',
    array(
      'label' => __( 'Footer CTA Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer cta text shadow x-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Text Shadow Y
  $wp_customize->add_setting( 'footer_cta_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_shadow_y',
    array(
      'label' => __( 'Footer CTA Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer cta text shadow y-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Text Shadow Blur
  $wp_customize->add_setting( 'footer_cta_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_shadow_blur',
    array(
      'label' => __( 'Footer CTA Text Shadow Blur' ),
      'description' => __( 'Enter a px value for footer cta text shadow blur.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Text Shadow Hover X
  $wp_customize->add_setting( 'footer_cta_text_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_shadow_hover_x',
    array(
      'label' => __( 'Footer CTA Text Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for footer cta text shadow hover x-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Text Shadow Hover Y
  $wp_customize->add_setting( 'footer_cta_text_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_shadow_hover_y',
    array(
      'label' => __( 'Footer CTA Text Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for footer cta text shadow hover y-offset.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer CTA Text Shadow Hover Blur
  $wp_customize->add_setting( 'footer_cta_text_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_cta_text_shadow_hover_blur',
    array(
      'label' => __( 'Footer CTA Text Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for footer cta text shadow hover blur.' ),
      'section' => 'footer_cta_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_footer_cta' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_cta() {
  ob_start();

  /**
   * Footer CTA Border Radius
   **/

  $footer_cta_border_top_left_radius = get_theme_mod( 'footer_cta_border_top_left_radius', '' );
  $footer_cta_border_top_right_radius = get_theme_mod( 'footer_cta_border_top_right_radius', '' );
  $footer_cta_border_bottom_left_radius = get_theme_mod( 'footer_cta_border_bottom_left_radius', '' );
  $footer_cta_border_bottom_right_radius = get_theme_mod( 'footer_cta_border_bottom_right_radius', '' );
  $footer_cta_border_top_left_radius_hover = get_theme_mod( 'footer_cta_border_top_left_radius_hover', '' );
  $footer_cta_border_top_right_radius_hover = get_theme_mod( 'footer_cta_border_top_right_radius_hover', '' );
  $footer_cta_border_bottom_left_radius_hover = get_theme_mod( 'footer_cta_border_bottom_left_radius_hover', '' );
  $footer_cta_border_bottom_right_radius_hover = get_theme_mod( 'footer_cta_border_bottom_right_radius_hover', '' );


  if ( isset( $footer_cta_border_top_left_radius ) && $footer_cta_border_top_left_radius != '' ) {
    ?>
    :root {
    --footer-cta-border-top-left-radius: <?php echo $footer_cta_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_top_right_radius ) && $footer_cta_border_top_right_radius != '' ) {
    ?>
    :root {
    --footer-cta-border-top-right-radius: <?php echo $footer_cta_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_bottom_left_radius ) && $footer_cta_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --footer-cta-border-bottom-left-radius: <?php echo $footer_cta_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_bottom_right_radius ) && $footer_cta_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --footer-cta-border-bottom-right-radius: <?php echo $footer_cta_border_bottom_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_top_left_radius_hover ) && $footer_cta_border_top_left_radius_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-top-left-radius-hover: <?php echo $footer_cta_border_top_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_top_right_radius_hover ) && $footer_cta_border_top_right_radius_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-top-right-radius-hover: <?php echo $footer_cta_border_top_right_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_bottom_left_radius_hover ) && $footer_cta_border_bottom_left_radius_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-bottom-left-radius-hover: <?php echo $footer_cta_border_bottom_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_bottom_right_radius_hover ) && $footer_cta_border_bottom_right_radius_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-bottom-right-radius-hover: <?php echo $footer_cta_border_bottom_right_radius_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer CTA Border Width
   **/

  $footer_cta_border_top_width = get_theme_mod( 'footer_cta_border_top_width', '' );
  $footer_cta_border_right_width = get_theme_mod( 'footer_cta_border_right_width', '' );
  $footer_cta_border_bottom_width = get_theme_mod( 'footer_cta_border_bottom_width', '' );
  $footer_cta_border_left_width = get_theme_mod( 'footer_cta_border_left_width', '' );
  $footer_cta_border_top_width_hover = get_theme_mod( 'footer_cta_border_top_width_hover', '' );
  $footer_cta_border_right_width_hover = get_theme_mod( 'footer_cta_border_right_width_hover', '' );
  $footer_cta_border_bottom_width_hover = get_theme_mod( 'footer_cta_border_bottom_width_hover', '' );
  $footer_cta_border_left_width_hover = get_theme_mod( 'footer_cta_border_left_width_hover', '' );

  if ( isset( $footer_cta_border_top_width ) && $footer_cta_border_top_width != '' ) {
    ?>
    :root {
    --footer-cta-border-top-width: <?php echo $footer_cta_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_right_width ) && $footer_cta_border_right_width != '' ) {
    ?>
    :root {
    --footer-cta-border-right-width: <?php echo $footer_cta_border_right_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_bottom_width ) && $footer_cta_border_bottom_width != '' ) {
    ?>
    :root {
    --footer-cta-border-bottom-width: <?php echo $footer_cta_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_left_width ) && $footer_cta_border_left_width != '' ) {
    ?>
    :root {
    --footer-cta-border-left-width: <?php echo $footer_cta_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_top_width_hover ) && $footer_cta_border_top_width_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-top-width-hover: <?php echo $footer_cta_border_top_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_right_width_hover ) && $footer_cta_border_right_width_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-right-width-hover: <?php echo $footer_cta_border_right_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_bottom_width_hover ) && $footer_cta_border_bottom_width_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-bottom-width-hover: <?php echo $footer_cta_border_bottom_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_border_left_width_hover ) && $footer_cta_border_left_width_hover != '' ) {
    ?>
    :root {
    --footer-cta-border-left-width-hover: <?php echo $footer_cta_border_left_width_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer CTA Border Style
   **/

  $footer_cta_border_top_style = get_theme_mod( 'footer_cta_border_top_style', '' );
  $footer_cta_border_right_style = get_theme_mod( 'footer_cta_border_right_style', '' );
  $footer_cta_border_bottom_style = get_theme_mod( 'footer_cta_border_bottom_style', '' );
  $footer_cta_border_left_style = get_theme_mod( 'footer_cta_border_left_style', '' );
  $footer_cta_border_top_style_hover = get_theme_mod( 'footer_cta_border_top_style_hover', '' );
  $footer_cta_border_right_style_hover = get_theme_mod( 'footer_cta_border_right_style_hover', '' );
  $footer_cta_border_bottom_style_hover = get_theme_mod( 'footer_cta_border_bottom_style_hover', '' );
  $footer_cta_border_left_style_hover = get_theme_mod( 'footer_cta_border_left_style_hover', '' );

  if ( !empty( $footer_cta_border_top_style ) ) {
    ?>
    :root {
    --footer-cta-border-top-style: <?php echo $footer_cta_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_right_style ) ) {
    ?>
    :root {
    --footer-cta-border-right-style: <?php echo $footer_cta_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_bottom_style ) ) {
    ?>
    :root {
    --footer-cta-border-bottom-style: <?php echo $footer_cta_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_left_style ) ) {
    ?>
    :root {
    --footer-cta-border-left-style: <?php echo $footer_cta_border_left_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_top_style_hover ) ) {
    ?>
    :root {
    --footer-cta-border-top-style-hover: <?php echo $footer_cta_border_top_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_right_style_hover ) ) {
    ?>
    :root {
    --footer-cta-border-right-style-hover: <?php echo $footer_cta_border_right_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_bottom_style_hover ) ) {
    ?>
    :root {
    --footer-cta-border-bottom-style-hover: <?php echo $footer_cta_border_bottom_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_border_left_style_hover ) ) {
    ?>
    :root {
    --footer-cta-border-left-style-hover: <?php echo $footer_cta_border_left_style_hover; ?>;
    }
    <?php
  }

  /**
   * Footer CTA Padding
   **/

  $footer_cta_vertical_padding = get_theme_mod( 'footer_cta_vertical_padding', '' );
  $footer_cta_horizontal_padding = get_theme_mod( 'footer_cta_horizontal_padding', '' );
  $footer_cta_vertical_padding_hover = get_theme_mod( 'footer_cta_vertical_padding_hover', '' );
  $footer_cta_horizontal_padding_hover = get_theme_mod( 'footer_cta_horizontal_padding_hover', '' );

  if ( isset( $footer_cta_vertical_padding ) && $footer_cta_vertical_padding != '' ) {
    ?>
    :root {
    --footer-cta-vertical-padding: <?php echo $footer_cta_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_horizontal_padding ) && $footer_cta_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-cta-horizontal-padding: <?php echo $footer_cta_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_vertical_padding_hover ) && $footer_cta_vertical_padding_hover != '' ) {
    ?>
    :root {
    --footer-cta-vertical-padding-hover: <?php echo $footer_cta_vertical_padding_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_horizontal_padding_hover ) && $footer_cta_horizontal_padding_hover != '' ) {
    ?>
    :root {
    --footer-cta-horizontal-padding-hover: <?php echo $footer_cta_horizontal_padding_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer CTA Text
   **/

  $footer_cta_font_size = get_theme_mod( 'footer_cta_font_size', '' );
  $footer_cta_line_height = get_theme_mod( 'footer_cta_line_height', '' );
  $footer_cta_font_weight = get_theme_mod( 'footer_cta_font_weight', '' );
  $footer_cta_font_style = get_theme_mod( 'footer_cta_font_style', '' );
  $footer_cta_text_transform = get_theme_mod( 'footer_cta_text_transform', '' );
  $footer_cta_letter_spacing = get_theme_mod( 'footer_cta_letter_spacing', '' );
  $footer_cta_font_size_hover = get_theme_mod( 'footer_cta_font_size_hover', '' );
  $footer_cta_line_height_hover = get_theme_mod( 'footer_cta_line_height_hover', '' );
  $footer_cta_font_weight_hover = get_theme_mod( 'footer_cta_font_weight_hover', '' );
  $footer_cta_font_style_hover = get_theme_mod( 'footer_cta_font_style_hover', '' );
  $footer_cta_text_transform_hover = get_theme_mod( 'footer_cta_text_transform_hover', '' );
  $footer_cta_letter_spacing_hover = get_theme_mod( 'footer_cta_letter_spacing_hover', '' );

  if ( isset( $footer_cta_font_size ) && $footer_cta_font_size != '' ) {
    ?>
    :root {
    --footer-cta-font-size: <?php echo $footer_cta_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_line_height ) && $footer_cta_line_height != '' ) {
    ?>
    :root {
    --footer-cta-line-height: <?php echo $footer_cta_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_cta_font_weight ) ) {
    ?>
    :root {
    --footer-cta-font-weight: <?php echo $footer_cta_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_font_style ) ) {
    ?>
    :root {
    --footer-cta-font-style: <?php echo $footer_cta_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_text_transform ) ) {
    ?>
    :root {
    --footer-cta-text-transform: <?php echo $footer_cta_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_cta_letter_spacing ) && $footer_cta_letter_spacing != '' ) {
    ?>
    :root {
    --footer-cta-letter-spacing: <?php echo $footer_cta_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_font_size_hover ) && $footer_cta_font_size_hover != '' ) {
    ?>
    :root {
    --footer-cta-font-size-hover: <?php echo $footer_cta_font_size_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_line_height_hover )  && $footer_cta_line_height_hover != '') {
    ?>
    :root {
    --footer-cta-line-height-hover: <?php echo $footer_cta_line_height_hover; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_cta_font_weight_hover ) ) {
    ?>
    :root {
    --footer-cta-font-weight-hover: <?php echo $footer_cta_font_weight_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_font_style_hover ) ) {
    ?>
    :root {
    --footer-cta-font-style-hover: <?php echo $footer_cta_font_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_cta_text_transform_hover ) ) {
    ?>
    :root {
    --footer-cta-text-transform-hover: <?php echo $footer_cta_text_transform_hover; ?>;
    }
    <?php
  }

  if ( isset( $footer_cta_letter_spacing_hover ) && $footer_cta_letter_spacing_hover != '' ) {
    ?>
    :root {
    --footer-cta-letter-spacing-hover: <?php echo $footer_cta_letter_spacing_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer CTA Box Shadow
   **/

  $footer_cta_box_shadow_x = get_theme_mod( 'footer_cta_box_shadow_x', '' );
  $footer_cta_box_shadow_y = get_theme_mod( 'footer_cta_box_shadow_y', '' );
  $footer_cta_box_shadow_blur = get_theme_mod( 'footer_cta_box_shadow_blur', '' );
  $footer_cta_box_shadow_spread = get_theme_mod( 'footer_cta_box_shadow_spread', '' );
  $footer_cta_box_shadow_hover_x = get_theme_mod( 'footer_cta_box_shadow_hover_x', '' );
  $footer_cta_box_shadow_hover_y = get_theme_mod( 'footer_cta_box_shadow_hover_y', '' );
  $footer_cta_box_shadow_hover_blur = get_theme_mod( 'footer_cta_box_shadow_hover_blur', '' );
  $footer_cta_box_shadow_hover_spread = get_theme_mod( 'footer_cta_box_shadow_hover_spread', '' );

  if ( isset( $footer_cta_box_shadow_x ) && $footer_cta_box_shadow_x != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-x: <?php echo $footer_cta_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_y ) && $footer_cta_box_shadow_y != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-y: <?php echo $footer_cta_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_blur ) && $footer_cta_box_shadow_blur != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-blur: <?php echo $footer_cta_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_spread ) && $footer_cta_box_shadow_spread != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-spread: <?php echo $footer_cta_box_shadow_spread; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_hover_x ) && $footer_cta_box_shadow_hover_x != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-hover-x: <?php echo $footer_cta_box_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_hover_y ) && $footer_cta_box_shadow_hover_y != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-hover-y: <?php echo $footer_cta_box_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_hover_blur ) && $footer_cta_box_shadow_hover_blur != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-hover-blur: <?php echo $footer_cta_box_shadow_hover_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_box_shadow_hover_spread ) && $footer_cta_box_shadow_hover_spread != '' ) {
    ?>
    :root {
    --footer-cta-box-shadow-hover-spread: <?php echo $footer_cta_box_shadow_hover_spread; ?>px;
    }
    <?php
  }


  /**
   * Footer CTA Text Shadow
   **/

  $footer_cta_text_shadow_x = get_theme_mod( 'footer_cta_text_shadow_x', '' );
  $footer_cta_text_shadow_y = get_theme_mod( 'footer_cta_text_shadow_y', '' );
  $footer_cta_text_shadow_blur = get_theme_mod( 'footer_cta_text_shadow_blur', '' );
  $footer_cta_text_shadow_hover_x = get_theme_mod( 'footer_cta_text_shadow_hover_x', '' );
  $footer_cta_text_shadow_hover_y = get_theme_mod( 'footer_cta_text_shadow_hover_y', '' );
  $footer_cta_text_shadow_hover_blur = get_theme_mod( 'footer_cta_text_shadow_hover_blur', '' );

  if ( isset( $footer_cta_text_shadow_x ) && $footer_cta_text_shadow_x != '' ) {
    ?>
    :root {
    --footer-cta-text-shadow-x: <?php echo $footer_cta_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_text_shadow_y ) && $footer_cta_text_shadow_y != '' ) {
    ?>
    :root {
    --footer-cta-text-shadow-y: <?php echo $footer_cta_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_text_shadow_blur ) && $footer_cta_text_shadow_blur != '' ) {
    ?>
    :root {
    --footer-cta-text-shadow-blur: <?php echo $footer_cta_text_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_text_shadow_hover_x ) && $footer_cta_text_shadow_hover_x != '' ) {
    ?>
    :root {
    --footer-cta-text-shadow-hover-x: <?php echo $footer_cta_text_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_text_shadow_hover_y ) && $footer_cta_text_shadow_hover_y != '' ) {
    ?>
    :root {
    --footer-cta-text-shadow-hover-y: <?php echo $footer_cta_text_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_cta_text_shadow_hover_blur ) && $footer_cta_text_shadow_hover_blur != '' ) {
    ?>
    :root {
    --footer-cta-text-shadow-hover-blur: <?php echo $footer_cta_text_shadow_hover_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
