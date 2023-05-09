<?php

/**
 * REGISTER CUSTOMIZER FOOTER SEARCH SUBMIT OPTIONS
 **/

function theme_customize_register_footer_search( $wp_customize ) {


  /**
   * Create Footer Search Options Section
   **/

  $wp_customize->add_section( 'footer_search_options' , array(
    'title'      => __( 'Footer Search Style Options', 'dream' ),
    'priority'   => 87,
  ) );

  /**
   * Footer Search Input Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_input_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_input_padding', array(
    'label' => 'Footer Search Input Padding',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define padding for \'default\' footer search input.'
  ) ) );

  // Footer Search Input Vertical Padding
  $wp_customize->add_setting( 'footer_search_input_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_vertical_padding',
    array(
      'label' => __( 'Footer Search Input Vertical Padding' ),
      'description' => __( 'Enter a px value for footer search input vertical padding.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Input Horizontal Padding
  $wp_customize->add_setting( 'footer_search_input_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_horizontal_padding',
    array(
      'label' => __( 'Footer Search Input Horizontal Padding' ),
      'description' => __( 'Enter a px value for footer search input horizontal padding.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Input Hover Horizontal Padding
  $wp_customize->add_setting( 'footer_search_input_hover_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_hover_horizontal_padding',
    array(
      'label' => __( 'Footer Search Input Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for footer search input hover horizontal padding.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Search Input Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_input_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_input_text', array(
    'label' => 'Footer Search Input Text',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text styling for \'default\' footer search input text.'
  ) ) );

  // Footer Search Input Font Size
  $wp_customize->add_setting( 'footer_search_input_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_font_size',
    array(
      'label' => __( 'Footer Search Input Font Size' ),
      'description' => __( 'Enter a px value for footer search input font size.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Input Line Height
  $wp_customize->add_setting( 'footer_search_input_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_line_height',
    array(
      'label' => __( 'Footer Search Input Line Height' ),
      'description' => __( 'Enter a px value for footer search input line height.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Input Font Weight
  $wp_customize->add_setting( 'footer_search_input_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_font_weight',
    array(
      'label' => __( 'Footer Search Input Font Weight' ),
      'description' => __( 'Select a font weight for footer search input.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Input Font Style
  $wp_customize->add_setting( 'footer_search_input_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_font_style',
    array(
      'label' => __( 'Footer Search Input Font Style' ),
      'description' => __( 'Select a font style for footer search input.' ),
      'section' => 'footer_search_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Search Input Text Transform
  $wp_customize->add_setting( 'footer_search_input_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_text_transform',
    array(
      'label' => __( 'Footer Search Input Text Transform' ),
      'description' => __( 'Select a transform style for footer search input text.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Input Letter Spacing
  $wp_customize->add_setting( 'footer_search_input_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_letter_spacing',
    array(
      'label' => __( 'Footer Search Input Letter Spacing' ),
      'description' => __( 'Enter a px value for footer search input letter spacing.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );



  /**
   * Footer Search Input Border
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_input_border',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_input_border', array(
    'label' => 'Footer Search Input Border',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text styling for \'default\' footer search input border.'
  ) ) );

  // Footer Search Input Border Width
  $wp_customize->add_setting( 'footer_search_input_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_border_width',
    array(
      'label' => __( 'Footer Search Input Border Width' ),
      'description' => __( 'Enter a px value for border width for footer search input.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Input Border Style
  $wp_customize->add_setting( 'footer_search_input_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_border_style',
    array(
      'label' => __( 'Footer Search Input Border Style' ),
      'description' => __( 'Select a border style for footer search input.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Top Left Border Radius
  $wp_customize->add_setting( 'footer_search_input_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_input_border_radius',
    array(
      'label' => __( 'Footer Search Input Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for footer search input.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Search Submit Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_submit_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_submit_text', array(
    'label' => 'Footer Search Submit Text',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text styling for \'default\' footer search submit button.'
  ) ) );

  // Footer Search Submit Font Size
  $wp_customize->add_setting( 'footer_search_submit_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_font_size',
    array(
      'label' => __( 'Footer Search Submit Font Size' ),
      'description' => __( 'Enter a px value for footer search submit button font size.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Font Size
  $wp_customize->add_setting( 'footer_search_submit_font_size_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_font_size_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Font Size' ),
      'description' => __( 'Enter a px value for footer search submit button hover state font size.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Line Height
  $wp_customize->add_setting( 'footer_search_submit_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_line_height',
    array(
      'label' => __( 'Footer Search Submit Line Height' ),
      'description' => __( 'Enter a px value for footer search submit button line height.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Line Height
  $wp_customize->add_setting( 'footer_search_submit_line_height_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_line_height_hover',
    array(
      'label' => __( 'Footer Search Submit Line Height Hover' ),
      'description' => __( 'Enter a px value for footer search submit button hover state line heights.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Font Weight
  $wp_customize->add_setting( 'footer_search_submit_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_font_weight',
    array(
      'label' => __( 'Footer Search Submit Font Weight' ),
      'description' => __( 'Select a font weight for footer search submit button.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Hover Font Weight
  $wp_customize->add_setting( 'footer_search_submit_font_weight_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_font_weight_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Font Weight' ),
      'description' => __( 'Select a font weight for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Font Style
  $wp_customize->add_setting( 'footer_search_submit_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_font_style',
    array(
      'label' => __( 'Footer Search Submit Font Style' ),
      'description' => __( 'Select a font style for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Search Submit Hover Font Style
  $wp_customize->add_setting( 'footer_search_submit_font_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_font_style_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Font Style' ),
      'description' => __( 'Select a font style for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Search Submit Text Transform
  $wp_customize->add_setting( 'footer_search_submit_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_transform',
    array(
      'label' => __( 'Footer Search Submit Text Transform' ),
      'description' => __( 'Select a transform style for footer search submit button text.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Hover Text Transform
  $wp_customize->add_setting( 'footer_search_submit_text_transform_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_transform_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Text Transform' ),
      'description' => __( 'Select a transform style for footer search submit button hover state text.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Letter Spacing
  $wp_customize->add_setting( 'footer_search_submit_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_letter_spacing',
    array(
      'label' => __( 'Footer Search Submit Letter Spacing' ),
      'description' => __( 'Enter a px value for footer search submit button letter spacing.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Hover Letter Spacing
  $wp_customize->add_setting( 'footer_search_submit_letter_spacing_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_letter_spacing_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Letter Spacing' ),
      'description' => __( 'Enter a px value for footer search submit button hover state letter spacing.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer Search Submit Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_submit_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_submit_padding', array(
    'label' => 'Footer Search Submit Padding',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define padding for \'default\' footer search submit button style.'
  ) ) );

  // Footer Search Submit Vertical Padding
  $wp_customize->add_setting( 'footer_search_submit_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_vertical_padding',
    array(
      'label' => __( 'Footer Search Submit Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Vertical Padding
  $wp_customize->add_setting( 'footer_search_submit_vertical_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_vertical_padding_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Horizontal Padding
  $wp_customize->add_setting( 'footer_search_submit_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_horizontal_padding',
    array(
      'label' => __( 'Footer Search Submit Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Horizontal Padding
  $wp_customize->add_setting( 'footer_search_submit_horizontal_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_horizontal_padding_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Search Submit Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_submit_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_submit_border_width', array(
    'label' => 'Footer Search Submit Border Width',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border width for \'default\' footer search submit button style.'
  ) ) );

  // Footer Search Submit Top Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_width',
    array(
      'label' => __( 'Footer Search Submit Border Top Width' ),
      'description' => __( 'Enter a px value for top border width for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Top Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_top_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_width_hover',
    array(
      'label' => __( 'Footer Search Submit Border Hover Top Width' ),
      'description' => __( 'Enter a px value for top border width for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Right Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_right_width',
    array(
      'label' => __( 'Footer Search Submit Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Right Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_right_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_right_width_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Bottom Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_width',
    array(
      'label' => __( 'Footer Search Submit Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Bottom Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_width_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Left Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_left_width',
    array(
      'label' => __( 'Footer Search Submit Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Left Border Width
  $wp_customize->add_setting( 'footer_search_submit_border_left_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_left_width_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Search Submit Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
      'default' => '',
      'type' => 'customtext_control_footer_search_submit_border_radius',
      'transport' => 'refresh',
    ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_control_footer_search_submit_border_radius', array(
      'label' => 'Footer Search Submit Border Radius',
      'section' => 'footer_search_options',
      'settings' => 'customtext',
      'extra' =>'Define border radius for \'default\' footer search submit button style.',
      'divider' => true
    ) ) );

  // Footer Search Submit Top Left Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_left_radius',
    array(
      'label' => __( 'Footer Search Submit Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Top Left Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_top_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_left_radius_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Top Right Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_right_radius',
    array(
      'label' => __( 'Footer Search Submit Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Top Right Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_top_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_right_radius_hover',
    array(
      'label' => __( 'Footer Search Submit Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Bottom Left Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_left_radius',
    array(
      'label' => __( 'Footer Search Submit Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Bottom Left Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_left_radius_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Bottom Right Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_right_radius',
    array(
      'label' => __( 'Footer Search Submit Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for footer search submit button.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );

  // Footer Search Submit Hover Bottom Right Border Radius
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_right_radius_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Search Submit Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_submit_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_submit_border_style', array(
    'label' => 'Footer Search Submit Border Style',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border style for \'default\' footer search submit button.'
  ) ) );

  // Footer Search Submit Top Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_style',
    array(
      'label' => __( 'Footer Search Submit Border Top Style' ),
      'description' => __( 'Select a top border style for footer search submit button.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Hover Top Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_top_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_top_style_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Top Style' ),
      'description' => __( 'Select a top border style for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Right Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_right_style',
    array(
      'label' => __( 'Footer Search Submit Border Right Style' ),
      'description' => __( 'Select a right border style for footer search submit button.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Hover Right Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_right_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_right_style_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Right Style' ),
      'description' => __( 'Select a right border style for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Bottom Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_style',
    array(
      'label' => __( 'Footer Search Submit Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for footer search submit button states.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Hover Bottom Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_bottom_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_bottom_style_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Left Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_left_style',
    array(
      'label' => __( 'Footer Search Submit Border Left Style' ),
      'description' => __( 'Select a left border style for footer search submit button.' ),
      'section' => 'footer_search_options',
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

  // Footer Search Submit Hover Left Border Style
  $wp_customize->add_setting( 'footer_search_submit_border_left_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_border_left_style_hover',
    array(
      'label' => __( 'Footer Search Submit Hover Border Left Style' ),
      'description' => __( 'Select a left border style for footer search submit button hover states.' ),
      'section' => 'footer_search_options',
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
   * Footer Search Submit Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_submit_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_submit_box_shadow', array(
    'label' => 'Footer Search Submit Box Shadow',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define box shadow for \'default\' footer search submit button.'
  ) ) );

  // Footer Search Submit Box Shadow X
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_x',
    array(
      'label' => __( 'Footer Search Submit Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow x-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Y
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_y',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow y-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Blur
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_blur',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Blur' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow blur.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Spread
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_spread',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Spread' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow spread.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Hover X
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_hover_x',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow hover x-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Hover Y
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_hover_y',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow hover y-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Hover Blur
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_hover_blur',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow hover blur.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Box Shadow Hover Spread
  $wp_customize->add_setting( 'footer_search_submit_box_shadow_hover_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_box_shadow_hover_spread',
    array(
      'label' => __( 'Footer Search Submit Box Shadow Hover Spread' ),
      'description' => __( 'Enter a px value for footer search submit button box shadow hover spread.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer Search Submit Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_search_submit_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_search_submit_text_shadow', array(
    'label' => 'Footer Search Submit Text Shadow',
    'section' => 'footer_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' footer search submit button.'
  ) ) );

  // Footer Search Submit Text Shadow X
  $wp_customize->add_setting( 'footer_search_submit_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_shadow_x',
    array(
      'label' => __( 'Footer Search Submit Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer search submit button text shadow x-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Text Shadow Y
  $wp_customize->add_setting( 'footer_search_submit_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_shadow_y',
    array(
      'label' => __( 'Footer Search Submit Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer search submit button text shadow y-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Text Shadow Blur
  $wp_customize->add_setting( 'footer_search_submit_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_shadow_blur',
    array(
      'label' => __( 'Footer Search Submit Text Shadow Blur' ),
      'description' => __( 'Enter a px value for footer search submit button text shadow blur.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Text Shadow Hover X
  $wp_customize->add_setting( 'footer_search_submit_text_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_shadow_hover_x',
    array(
      'label' => __( 'Footer Search Submit Text Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for footer search submit button text shadow hover x-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Text Shadow Hover Y
  $wp_customize->add_setting( 'footer_search_submit_text_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_shadow_hover_y',
    array(
      'label' => __( 'Footer Search Submit Text Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for footer search submit button text shadow hover y-offset.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Search Submit Text Shadow Hover Blur
  $wp_customize->add_setting( 'footer_search_submit_text_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_search_submit_text_shadow_hover_blur',
    array(
      'label' => __( 'Footer Search Submit Text Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for footer search submit button text shadow hover blur.' ),
      'section' => 'footer_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_footer_search' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_search() {
  ob_start();

  /**
   * Footer Search Input Padding
   **/
  $footer_search_input_vertical_padding = get_theme_mod( 'footer_search_input_vertical_padding', '' );
  $footer_search_input_horizontal_padding = get_theme_mod( 'footer_search_input_horizontal_padding', '' );
  $footer_search_input_hover_horizontal_padding = get_theme_mod( 'footer_search_input_hover_horizontal_padding', '' );

  if ( isset( $footer_search_input_vertical_padding ) && $footer_search_input_vertical_padding != '' ) {
    ?>
    :root {
    --footer-search-input-vertical-padding: <?php echo $footer_search_input_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_input_horizontal_padding ) && $footer_search_input_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-search-input-horizontal-padding: <?php echo $footer_search_input_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_input_hover_horizontal_padding ) && $footer_search_input_hover_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-search-input-hover-horizontal-padding: <?php echo $footer_search_input_hover_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Input Text
   **/

  $footer_search_input_font_size = get_theme_mod( 'footer_search_input_font_size', '' );
  $footer_search_input_line_height = get_theme_mod( 'footer_search_input_line_height', '' );
  $footer_search_input_font_weight = get_theme_mod( 'footer_search_input_font_weight', '' );
  $footer_search_input_font_style = get_theme_mod( 'footer_search_input_font_style', '' );
  $footer_search_input_text_transform = get_theme_mod( 'footer_search_input_text_transform', '' );
  $footer_search_input_letter_spacing = get_theme_mod( 'footer_search_input_letter_spacing', '' );

  if ( isset( $footer_search_input_font_size ) && $footer_search_input_font_size != '' ) {
    ?>
    :root {
    --footer-search-input-font-size: <?php echo $footer_search_input_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_input_line_height ) && $footer_search_input_line_height != '' ) {
    ?>
    :root {
    --footer-search-input-line-height: <?php echo $footer_search_input_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_search_input_font_weight ) ) {
    ?>
    :root {
    --footer-search-input-font-weight: <?php echo $footer_search_input_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_input_font_style ) ) {
    ?>
    :root {
    --footer-search-input-font-style: <?php echo $footer_search_input_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_input_text_transform ) ) {
    ?>
    :root {
    --footer-search-input-text-transform: <?php echo $footer_search_input_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_search_input_letter_spacing ) && $footer_search_input_letter_spacing != '' ) {
    ?>
    :root {
    --footer-search-input-letter-spacing: <?php echo $footer_search_input_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Input Border
   **/

  $footer_search_input_border_width = get_theme_mod( 'footer_search_input_border_width', '' );
  $footer_search_input_border_style = get_theme_mod( 'footer_search_input_border_style', '' );
  $footer_search_input_border_radius = get_theme_mod( 'footer_search_input_border_radius', '' );

  if ( isset( $footer_search_input_border_width ) && $footer_search_input_border_width != '' ) {
    ?>
    :root {
    --footer-search-input-border-width: <?php echo $footer_search_input_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_search_input_border_style ) ) {
    ?>
    :root {
    --footer-search-input-border-style: <?php echo $footer_search_input_border_style; ?>;
    }
    <?php
  }

  if ( isset( $footer_search_input_border_radius ) && $footer_search_input_border_radius != '' ) {
    ?>
    :root {
    --footer-search-input-border-radius: <?php echo $footer_search_input_border_radius; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Submit Border Radius
   **/

  $footer_search_submit_border_top_left_radius = get_theme_mod( 'footer_search_submit_border_top_left_radius', '' );
  $footer_search_submit_border_top_right_radius = get_theme_mod( 'footer_search_submit_border_top_right_radius', '' );
  $footer_search_submit_border_bottom_left_radius = get_theme_mod( 'footer_search_submit_border_bottom_left_radius', '' );
  $footer_search_submit_border_bottom_right_radius = get_theme_mod( 'footer_search_submit_border_bottom_right_radius', '' );
  $footer_search_submit_border_top_left_radius_hover = get_theme_mod( 'footer_search_submit_border_top_left_radius_hover', '' );
  $footer_search_submit_border_top_right_radius_hover = get_theme_mod( 'footer_search_submit_border_top_right_radius_hover', '' );
  $footer_search_submit_border_bottom_left_radius_hover = get_theme_mod( 'footer_search_submit_border_bottom_left_radius_hover', '' );
  $footer_search_submit_border_bottom_right_radius_hover = get_theme_mod( 'footer_search_submit_border_bottom_right_radius_hover', '' );


  if ( isset( $footer_search_submit_border_top_left_radius ) && $footer_search_submit_border_top_left_radius != '' ) {
    ?>
    :root {
    --footer-search-submit-border-top-left-radius: <?php echo $footer_search_submit_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_top_right_radius ) && $footer_search_submit_border_top_right_radius != '' ) {
    ?>
    :root {
    --footer-search-submit-border-top-right-radius: <?php echo $footer_search_submit_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_bottom_left_radius ) && $footer_search_submit_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-left-radius: <?php echo $footer_search_submit_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_bottom_right_radius ) && $footer_search_submit_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-right-radius: <?php echo $footer_search_submit_border_bottom_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_top_left_radius_hover ) && $footer_search_submit_border_top_left_radius_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-top-left-radius-hover: <?php echo $footer_search_submit_border_top_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_top_right_radius_hover ) && $footer_search_submit_border_top_right_radius_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-top-right-radius-hover: <?php echo $footer_search_submit_border_top_right_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_bottom_left_radius_hover ) && $footer_search_submit_border_bottom_left_radius_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-left-radius-hover: <?php echo $footer_search_submit_border_bottom_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_bottom_right_radius_hover ) && $footer_search_submit_border_bottom_right_radius_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-right-radius-hover: <?php echo $footer_search_submit_border_bottom_right_radius_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Submit Border Width
   **/

  $footer_search_submit_border_top_width = get_theme_mod( 'footer_search_submit_border_top_width', '' );
  $footer_search_submit_border_right_width = get_theme_mod( 'footer_search_submit_border_right_width', '' );
  $footer_search_submit_border_bottom_width = get_theme_mod( 'footer_search_submit_border_bottom_width', '' );
  $footer_search_submit_border_left_width = get_theme_mod( 'footer_search_submit_border_left_width', '' );
  $footer_search_submit_border_top_width_hover = get_theme_mod( 'footer_search_submit_border_top_width_hover', '' );
  $footer_search_submit_border_right_width_hover = get_theme_mod( 'footer_search_submit_border_right_width_hover', '' );
  $footer_search_submit_border_bottom_width_hover = get_theme_mod( 'footer_search_submit_border_bottom_width_hover', '' );
  $footer_search_submit_border_left_width_hover = get_theme_mod( 'footer_search_submit_border_left_width_hover', '' );

  if ( isset( $footer_search_submit_border_top_width ) && $footer_search_submit_border_top_width != '' ) {
    ?>
    :root {
    --footer_search_submit-border-top-width: <?php echo $footer_search_submit_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_right_width ) && $footer_search_submit_border_right_width != '' ) {
    ?>
    :root {
    --footer_search_submit-border-right-width: <?php echo $footer_search_submit_border_right_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_bottom_width ) && $footer_search_submit_border_bottom_width != '' ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-width: <?php echo $footer_search_submit_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_left_width ) && $footer_search_submit_border_left_width != '' ) {
    ?>
    :root {
    --footer-search-submit-border-left-width: <?php echo $footer_search_submit_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_top_width_hover ) && $footer_search_submit_border_top_width_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-top-width-hover: <?php echo $footer_search_submit_border_top_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_right_width_hover ) && $footer_search_submit_border_right_width_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-right-width-hover: <?php echo $footer_search_submit_border_right_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_bottom_width_hover ) && $footer_search_submit_border_bottom_width_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-width-hover: <?php echo $footer_search_submit_border_bottom_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_border_left_width_hover ) && $footer_search_submit_border_left_width_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-border-left-width-hover: <?php echo $footer_search_submit_border_left_width_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Submit Border Style
   **/

  $footer_search_submit_border_top_style = get_theme_mod( 'footer_search_submit_border_top_style', '' );
  $footer_search_submit_border_right_style = get_theme_mod( 'footer_search_submit_border_right_style', '' );
  $footer_search_submit_border_bottom_style = get_theme_mod( 'footer_search_submit_border_bottom_style', '' );
  $footer_search_submit_border_left_style = get_theme_mod( 'footer_search_submit_border_left_style', '' );
  $footer_search_submit_border_top_style_hover = get_theme_mod( 'footer_search_submit_border_top_style_hover', '' );
  $footer_search_submit_border_right_style_hover = get_theme_mod( 'footer_search_submit_border_right_style_hover', '' );
  $footer_search_submit_border_bottom_style_hover = get_theme_mod( 'footer_search_submit_border_bottom_style_hover', '' );
  $footer_search_submit_border_left_style_hover = get_theme_mod( 'footer_search_submit_border_left_style_hover', '' );

  if ( !empty( $footer_search_submit_border_top_style ) ) {
    ?>
    :root {
    --footer-search-submit-border-top-style: <?php echo $footer_search_submit_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_right_style ) ) {
    ?>
    :root {
    --footer-search-submit-border-right-style: <?php echo $footer_search_submit_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_bottom_style ) ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-style: <?php echo $footer_search_submit_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_left_style ) ) {
    ?>
    :root {
    --footer_search_submit-border-left-style: <?php echo $footer_search_submit_border_left_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_top_style_hover ) ) {
    ?>
    :root {
    --footer-search-submit-border-top-style-hover: <?php echo $footer_search_submit_border_top_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_right_style_hover ) ) {
    ?>
    :root {
    --footer-search-submit-border-right-style-hover: <?php echo $footer_search_submit_border_right_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_bottom_style_hover ) ) {
    ?>
    :root {
    --footer-search-submit-border-bottom-style-hover: <?php echo $footer_search_submit_border_bottom_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_border_left_style_hover ) ) {
    ?>
    :root {
    --footer-search-submit-border-left-style-hover: <?php echo $footer_search_submit_border_left_style_hover; ?>;
    }
    <?php
  }

  /**
   * Footer Search Submit Padding
   **/

  $footer_search_submit_vertical_padding = get_theme_mod( 'footer_search_submit_vertical_padding', '' );
  $footer_search_submit_horizontal_padding = get_theme_mod( 'footer_search_submit_horizontal_padding', '' );
  $footer_search_submit_vertical_padding_hover = get_theme_mod( 'footer_search_submit_vertical_padding_hover', '' );
  $footer_search_submit_horizontal_padding_hover = get_theme_mod( 'footer_search_submit_horizontal_padding_hover', '' );

  if ( isset( $footer_search_submit_vertical_padding ) && $footer_search_submit_vertical_padding != '' ) {
    ?>
    :root {
    --footer-search-submit-vertical-padding: <?php echo $footer_search_submit_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_horizontal_padding ) && $footer_search_submit_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-search-submit-horizontal-padding: <?php echo $footer_search_submit_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_vertical_padding_hover ) && $footer_search_submit_vertical_padding_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-vertical-padding-hover: <?php echo $footer_search_submit_vertical_padding_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_horizontal_padding_hover ) && $footer_search_submit_horizontal_padding_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-horizontal-padding-hover: <?php echo $footer_search_submit_horizontal_padding_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Submit Text
   **/

  $footer_search_submit_font_size = get_theme_mod( 'footer_search_submit_font_size', '' );
  $footer_search_submit_line_height = get_theme_mod( 'footer_search_submit_line_height', '' );
  $footer_search_submit_font_weight = get_theme_mod( 'footer_search_submit_font_weight', '' );
  $footer_search_submit_font_style = get_theme_mod( 'footer_search_submit_font_style', '' );
  $footer_search_submit_text_transform = get_theme_mod( 'footer_search_submit_text_transform', '' );
  $footer_search_submit_letter_spacing = get_theme_mod( 'footer_search_submit_letter_spacing', '' );
  $footer_search_submit_font_size_hover = get_theme_mod( 'footer_search_submit_font_size_hover', '' );
  $footer_search_submit_line_height_hover = get_theme_mod( 'footer_search_submit_line_height_hover', '' );
  $footer_search_submit_font_weight_hover = get_theme_mod( 'footer_search_submit_font_weight_hover', '' );
  $footer_search_submit_font_style_hover = get_theme_mod( 'footer_search_submit_font_style_hover', '' );
  $footer_search_submit_text_transform_hover = get_theme_mod( 'footer_search_submit_text_transform_hover', '' );
  $footer_search_submit_letter_spacing_hover = get_theme_mod( 'footer_search_submit_letter_spacing_hover', '' );

  if ( isset( $footer_search_submit_font_size ) && $footer_search_submit_font_size != '' ) {
    ?>
    :root {
    --footer-search-submit-font-size: <?php echo $footer_search_submit_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_line_height ) && $footer_search_submit_line_height != '' ) {
    ?>
    :root {
    --footer-search-submit-line-height: <?php echo $footer_search_submit_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_font_weight ) ) {
    ?>
    :root {
    --footer-search-submit-font-weight: <?php echo $footer_search_submit_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_font_style ) ) {
    ?>
    :root {
    --footer-search-submit-font-style: <?php echo $footer_search_submit_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_text_transform ) ) {
    ?>
    :root {
    --footer-search-submit-text-transform: <?php echo $footer_search_submit_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_search_submit_letter_spacing ) && $footer_search_submit_letter_spacing != '' ) {
    ?>
    :root {
    --footer-search-submit-letter-spacing: <?php echo $footer_search_submit_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_font_size_hover ) && $footer_search_submit_font_size_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-font-size-hover: <?php echo $footer_search_submit_font_size_hover; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_line_height_hover ) && $footer_search_submit_line_height_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-line-height-hover: <?php echo $footer_search_submit_line_height_hover; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_font_weight_hover ) ) {
    ?>
    :root {
    --footer-search-submit-font-weight-hover: <?php echo $footer_search_submit_font_weight_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_font_style_hover ) ) {
    ?>
    :root {
    --footer-search-submit-font-style-hover: <?php echo $footer_search_submit_font_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $footer_search_submit_text_transform_hover ) ) {
    ?>
    :root {
    --footer-search-submit-text-transform-hover: <?php echo $footer_search_submit_text_transform_hover; ?>;
    }
    <?php
  }

  if ( isset( $footer_search_submit_letter_spacing_hover ) && $footer_search_submit_letter_spacing_hover != '' ) {
    ?>
    :root {
    --footer-search-submit-letter-spacing-hover: <?php echo $footer_search_submit_letter_spacing_hover; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Submit Box Shadow
   **/

  $footer_search_submit_box_shadow_x = get_theme_mod( 'footer_search_submit_box_shadow_x', '' );
  $footer_search_submit_box_shadow_y = get_theme_mod( 'footer_search_submit_box_shadow_y', '' );
  $footer_search_submit_box_shadow_blur = get_theme_mod( 'footer_search_submit_box_shadow_blur', '' );
  $footer_search_submit_box_shadow_spread = get_theme_mod( 'footer_search_submit_box_shadow_spread', '' );
  $footer_search_submit_box_shadow_hover_x = get_theme_mod( 'footer_search_submit_box_shadow_hover_x', '' );
  $footer_search_submit_box_shadow_hover_y = get_theme_mod( 'footer_search_submit_box_shadow_hover_y', '' );
  $footer_search_submit_box_shadow_hover_blur = get_theme_mod( 'footer_search_submit_box_shadow_hover_blur', '' );
  $footer_search_submit_box_shadow_hover_spread = get_theme_mod( 'footer_search_submit_box_shadow_hover_spread', '' );

  if ( isset( $footer_search_submit_box_shadow_x ) && $footer_search_submit_box_shadow_x != '' ) {
    ?>
    :root {
    --footer-search-submit-box-shadow-x: <?php echo $footer_search_submit_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_y ) && $footer_search_submit_box_shadow_y != '' ) {
    ?>
    :root {
    --footer_search_submit-box-shadow-y: <?php echo $footer_search_submit_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_blur ) && $footer_search_submit_box_shadow_blur != '' ) {
    ?>
    :root {
    --footer_search_submit-box-shadow-blur: <?php echo $footer_search_submit_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_spread ) && $footer_search_submit_box_shadow_spread != '' ) {
    ?>
    :root {
    --footer-search-submit-box-shadow-spread: <?php echo $footer_search_submit_box_shadow_spread; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_hover_x ) && $footer_search_submit_box_shadow_hover_x != '' ) {
    ?>
    :root {
    --footer-search-submit-box-shadow-hover-x: <?php echo $footer_search_submit_box_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_hover_y ) && $footer_search_submit_box_shadow_hover_y != '' ) {
    ?>
    :root {
    --footer-search-submit-box-shadow-hover-y: <?php echo $footer_search_submit_box_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_hover_blur ) && $footer_search_submit_box_shadow_hover_blur != '' ) {
    ?>
    :root {
    --footer-search-submit-box-shadow-hover-blur: <?php echo $footer_search_submit_box_shadow_hover_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_box_shadow_hover_spread ) && $footer_search_submit_box_shadow_hover_spread != '' ) {
    ?>
    :root {
    --footer-search-submit-box-shadow-hover-spread: <?php echo $footer_search_submit_box_shadow_hover_spread; ?>px;
    }
    <?php
  }


  /**
   * Footer Search Submit Text Shadow
   **/

  $footer_search_submit_text_shadow_x = get_theme_mod( 'footer_search_submit_text_shadow_x', '' );
  $footer_search_submit_text_shadow_y = get_theme_mod( 'footer_search_submit_text_shadow_y', '' );
  $footer_search_submit_text_shadow_blur = get_theme_mod( 'footer_search_submit_text_shadow_blur', '' );
  $footer_search_submit_text_shadow_hover_x = get_theme_mod( 'footer_search_submit_text_shadow_hover_x', '' );
  $footer_search_submit_text_shadow_hover_y = get_theme_mod( 'footer_search_submit_text_shadow_hover_y', '' );
  $footer_search_submit_text_shadow_hover_blur = get_theme_mod( 'footer_search_submit_text_shadow_hover_blur', '' );

  if ( isset( $footer_search_submit_text_shadow_x ) && $footer_search_submit_text_shadow_x != '' ) {
    ?>
    :root {
    --footer-search-submit-text-shadow-x: <?php echo $footer_search_submit_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_text_shadow_y ) && $footer_search_submit_text_shadow_y != '' ) {
    ?>
    :root {
    --footer-search-submit-text-shadow-y: <?php echo $footer_search_submit_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_text_shadow_blur ) && $footer_search_submit_text_shadow_blur != '' ) {
    ?>
    :root {
    --eader_search_submit-text-shadow-blur: <?php echo $footer_search_submit_text_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_text_shadow_hover_x ) && $footer_search_submit_text_shadow_hover_x != '' ) {
    ?>
    :root {
    --footer-search-submit-text-shadow-hover-x: <?php echo $footer_search_submit_text_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_text_shadow_hover_y ) && $footer_search_submit_text_shadow_hover_y != '' ) {
    ?>
    :root {
    --footer-search-submit-text-shadow-hover-y: <?php echo $footer_search_submit_text_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_search_submit_text_shadow_hover_blur ) && $footer_search_submit_text_shadow_hover_blur != '' ) {
    ?>
    :root {
    --footer-search-submit-text-shadow-hover-blur: <?php echo $footer_search_submit_text_shadow_hover_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
