<?php

/**
 * REGISTER CUSTOMIZER HEADER SEARCH SUBMIT OPTIONS
 **/

function theme_customize_register_header_search( $wp_customize ) {


  /**
   * Create Header Search Options Section
   **/

  $wp_customize->add_section( 'header_search_options' , array(
    'title'      => __( 'Header Search Style Options', 'dream' ),
    'priority'   => 66,
  ) );

  /**
   * Header Search Input Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_input_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_input_padding', array(
    'label' => 'Header Search Input Padding',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define text padding for \'default\' header search input.'
  ) ) );

  // Header Search Input Vertical Padding
  $wp_customize->add_setting( 'header_search_input_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_vertical_padding',
    array(
      'label' => __( 'Header Search Input Vertical Padding' ),
      'description' => __( 'Enter a px value for header search input vertical padding.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Input Horizontal Padding
  $wp_customize->add_setting( 'header_search_input_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_horizontal_padding',
    array(
      'label' => __( 'Header Search Input Horizontal Padding' ),
      'description' => __( 'Enter a px value for header search input horizontal padding.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Input Hover Horizontal Padding
  $wp_customize->add_setting( 'header_search_input_hover_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_hover_horizontal_padding',
    array(
      'label' => __( 'Header Search Input Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for header search input hover horizontal padding.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );


  /**
   * Header Search Input Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_input_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_input_text', array(
    'label' => 'Header Search Input Text',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text styling for \'default\' header search input text.'
  ) ) );

  // Header Search Input Font Size
  $wp_customize->add_setting( 'header_search_input_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_font_size',
    array(
      'label' => __( 'Header Search Input Font Size' ),
      'description' => __( 'Enter a px value for header search input font size.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Input Line Height
  $wp_customize->add_setting( 'header_search_input_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_line_height',
    array(
      'label' => __( 'Header Search Input Line Height' ),
      'description' => __( 'Enter a px value for header search input line height.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Input Font Weight
  $wp_customize->add_setting( 'header_search_input_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_font_weight',
    array(
      'label' => __( 'Header Search Input Font Weight' ),
      'description' => __( 'Select a font weight for header search input.' ),
      'section' => 'header_search_options',
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

  // Header Search Input Font Style
  $wp_customize->add_setting( 'header_search_input_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_font_style',
    array(
      'label' => __( 'Header Search Input Font Style' ),
      'description' => __( 'Select a font style for header search input.' ),
      'section' => 'header_search_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header Search Input Text Transform
  $wp_customize->add_setting( 'header_search_input_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_text_transform',
    array(
      'label' => __( 'Header Search Input Text Transform' ),
      'description' => __( 'Select a transform style for header search input text.' ),
      'section' => 'header_search_options',
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

  // Header Search Input Letter Spacing
  $wp_customize->add_setting( 'header_search_input_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_letter_spacing',
    array(
      'label' => __( 'Header Search Input Letter Spacing' ),
      'description' => __( 'Enter a px value for header search input letter spacing.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );



  /**
   * Header Search Input Border
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_input_border',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_input_border', array(
    'label' => 'Header Search Input Border',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text styling for \'default\' header search input border.'
  ) ) );

  // Header Search Input Border Width
  $wp_customize->add_setting( 'header_search_input_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_border_width',
    array(
      'label' => __( 'Header Search Input Border Width' ),
      'description' => __( 'Enter a px value for border width for header search input.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Input Border Style
  $wp_customize->add_setting( 'header_search_input_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_border_style',
    array(
      'label' => __( 'Header Search Input Border Style' ),
      'description' => __( 'Select a border style for header search input.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Top Left Border Radius
  $wp_customize->add_setting( 'header_search_input_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_input_border_radius',
    array(
      'label' => __( 'Header Search Input Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for header search input.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );


  /**
   * Header Search Submit Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_submit_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_submit_text', array(
    'label' => 'Header Search Submit Text',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text styling for \'default\' header search submit button.'
  ) ) );

  // Header Search Submit Font Size
  $wp_customize->add_setting( 'header_search_submit_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_font_size',
    array(
      'label' => __( 'Header Search Submit Font Size' ),
      'description' => __( 'Enter a px value for header search submit button font size.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Font Size
  $wp_customize->add_setting( 'header_search_submit_font_size_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_font_size_hover',
    array(
      'label' => __( 'Header Search Submit Hover Font Size' ),
      'description' => __( 'Enter a px value for header search submit button hover state font size.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Line Height
  $wp_customize->add_setting( 'header_search_submit_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_line_height',
    array(
      'label' => __( 'Header Search Submit Line Height' ),
      'description' => __( 'Enter a px value for header search submit button line height.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Line Height
  $wp_customize->add_setting( 'header_search_submit_line_height_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_line_height_hover',
    array(
      'label' => __( 'Header Search Submit Line Height Hover' ),
      'description' => __( 'Enter a px value for header search submit button hover state line heights.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Font Weight
  $wp_customize->add_setting( 'header_search_submit_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_font_weight',
    array(
      'label' => __( 'Header Search Submit Font Weight' ),
      'description' => __( 'Select a font weight for header search submit button.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Hover Font Weight
  $wp_customize->add_setting( 'header_search_submit_font_weight_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_font_weight_hover',
    array(
      'label' => __( 'Header Search Submit Hover Font Weight' ),
      'description' => __( 'Select a font weight for header search submit button hover states.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Font Style
  $wp_customize->add_setting( 'header_search_submit_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_font_style',
    array(
      'label' => __( 'Header Search Submit Font Style' ),
      'description' => __( 'Select a font style for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header Search Submit Hover Font Style
  $wp_customize->add_setting( 'header_search_submit_font_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_font_style_hover',
    array(
      'label' => __( 'Header Search Submit Hover Font Style' ),
      'description' => __( 'Select a font style for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header Search Submit Text Transform
  $wp_customize->add_setting( 'header_search_submit_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_transform',
    array(
      'label' => __( 'Header Search Submit Text Transform' ),
      'description' => __( 'Select a transform style for header search submit button text.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Hover Text Transform
  $wp_customize->add_setting( 'header_search_submit_text_transform_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_transform_hover',
    array(
      'label' => __( 'Header Search Submit Hover Text Transform' ),
      'description' => __( 'Select a transform style for header search submit button hover state text.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Letter Spacing
  $wp_customize->add_setting( 'header_search_submit_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_letter_spacing',
    array(
      'label' => __( 'Header Search Submit Letter Spacing' ),
      'description' => __( 'Enter a px value for header search submit button letter spacing.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Hover Letter Spacing
  $wp_customize->add_setting( 'header_search_submit_letter_spacing_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_letter_spacing_hover',
    array(
      'label' => __( 'Header Search Submit Hover Letter Spacing' ),
      'description' => __( 'Enter a px value for header search submit button hover state letter spacing.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Header Search Submit Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_submit_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_submit_padding', array(
    'label' => 'Header Search Submit Padding',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define padding for \'default\' header search submit button style.'
  ) ) );

  // Header Search Submit Vertical Padding
  $wp_customize->add_setting( 'header_search_submit_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_vertical_padding',
    array(
      'label' => __( 'Header Search Submit Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Vertical Padding
  $wp_customize->add_setting( 'header_search_submit_vertical_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_vertical_padding_hover',
    array(
      'label' => __( 'Header Search Submit Hover Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Horizontal Padding
  $wp_customize->add_setting( 'header_search_submit_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_horizontal_padding',
    array(
      'label' => __( 'Header Search Submit Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Horizontal Padding
  $wp_customize->add_setting( 'header_search_submit_horizontal_padding_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_horizontal_padding_hover',
    array(
      'label' => __( 'Header Search Submit Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );


  /**
   * Header Search Submit Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_submit_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_submit_border_width', array(
    'label' => 'Header Search Submit Border Width',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border width for \'default\' header search submit button style.'
  ) ) );

  // Header Search Submit Top Border Width
  $wp_customize->add_setting( 'header_search_submit_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_width',
    array(
      'label' => __( 'Header Search Submit Border Top Width' ),
      'description' => __( 'Enter a px value for top border width for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Top Border Width
  $wp_customize->add_setting( 'header_search_submit_border_top_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_width_hover',
    array(
      'label' => __( 'Header Search Submit Border Hover Top Width' ),
      'description' => __( 'Enter a px value for top border width for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Right Border Width
  $wp_customize->add_setting( 'header_search_submit_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_right_width',
    array(
      'label' => __( 'Header Search Submit Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Right Border Width
  $wp_customize->add_setting( 'header_search_submit_border_right_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_right_width_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Right Width' ),
      'description' => __( 'Enter a px value for right border width for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Bottom Border Width
  $wp_customize->add_setting( 'header_search_submit_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_width',
    array(
      'label' => __( 'Header Search Submit Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Bottom Border Width
  $wp_customize->add_setting( 'header_search_submit_border_bottom_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_width_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Bottom Width' ),
      'description' => __( 'Enter a px value for bottom border width for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Left Border Width
  $wp_customize->add_setting( 'header_search_submit_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_left_width',
    array(
      'label' => __( 'Header Search Submit Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Left Border Width
  $wp_customize->add_setting( 'header_search_submit_border_left_width_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_left_width_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Left Width' ),
      'description' => __( 'Enter a px value for left border width for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );


  /**
   * Header Search Submit Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
      'default' => '',
      'type' => 'customtext_control_header_search_submit_border_radius',
      'transport' => 'refresh',
    ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_control_header_search_submit_border_radius', array(
      'label' => 'Header Search Submit Border Radius',
      'section' => 'header_search_options',
      'settings' => 'customtext',
      'extra' =>'Define border radius for \'default\' header search submit button style.',
      'divider' => true
    ) ) );

  // Header Search Submit Top Left Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_left_radius',
    array(
      'label' => __( 'Header Search Submit Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Top Left Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_top_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_left_radius_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Top Right Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_right_radius',
    array(
      'label' => __( 'Header Search Submit Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Top Right Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_top_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_right_radius_hover',
    array(
      'label' => __( 'Header Search Submit Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Bottom Left Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_left_radius',
    array(
      'label' => __( 'Header Search Submit Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Bottom Left Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_bottom_left_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_left_radius_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Bottom Right Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_right_radius',
    array(
      'label' => __( 'Header Search Submit Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for header search submit button.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );

  // Header Search Submit Hover Bottom Right Border Radius
  $wp_customize->add_setting( 'header_search_submit_border_bottom_right_radius_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_right_radius_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for header search submit button hover states.' ),
      'section' => 'header_search_options',
      'type' => 'number'
    )
  );


  /**
   * Header Search Submit Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_submit_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_submit_border_style', array(
    'label' => 'Header Search Submit Border Style',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define border style for \'default\' header search submit button.'
  ) ) );

  // Header Search Submit Top Border Style
  $wp_customize->add_setting( 'header_search_submit_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_style',
    array(
      'label' => __( 'Header Search Submit Border Top Style' ),
      'description' => __( 'Select a top border style for header search submit button.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Hover Top Border Style
  $wp_customize->add_setting( 'header_search_submit_border_top_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_top_style_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Top Style' ),
      'description' => __( 'Select a top border style for header search submit button hover states.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Right Border Style
  $wp_customize->add_setting( 'header_search_submit_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_right_style',
    array(
      'label' => __( 'Header Search Submit Border Right Style' ),
      'description' => __( 'Select a right border style for header search submit button.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Hover Right Border Style
  $wp_customize->add_setting( 'header_search_submit_border_right_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_right_style_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Right Style' ),
      'description' => __( 'Select a right border style for header search submit button hover states.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Bottom Border Style
  $wp_customize->add_setting( 'header_search_submit_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_style',
    array(
      'label' => __( 'Header Search Submit Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for header search submit button states.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Hover Bottom Border Style
  $wp_customize->add_setting( 'header_search_submit_border_bottom_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_bottom_style_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for header search submit button hover states.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Left Border Style
  $wp_customize->add_setting( 'header_search_submit_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_left_style',
    array(
      'label' => __( 'Header Search Submit Border Left Style' ),
      'description' => __( 'Select a left border style for header search submit button.' ),
      'section' => 'header_search_options',
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

  // Header Search Submit Hover Left Border Style
  $wp_customize->add_setting( 'header_search_submit_border_left_style_hover',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_border_left_style_hover',
    array(
      'label' => __( 'Header Search Submit Hover Border Left Style' ),
      'description' => __( 'Select a left border style for header search submit button hover states.' ),
      'section' => 'header_search_options',
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
   * Header Search Submit Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_submit_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_submit_box_shadow', array(
    'label' => 'Header Search Submit Box Shadow',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define box shadow for \'default\' header search submit button.'
  ) ) );

  // Header Search Submit Box Shadow X
  $wp_customize->add_setting( 'header_search_submit_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_x',
    array(
      'label' => __( 'Header Search Submit Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for header search submit button box shadow x-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Y
  $wp_customize->add_setting( 'header_search_submit_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_y',
    array(
      'label' => __( 'Header Search Submit Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header search submit button box shadow y-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Blur
  $wp_customize->add_setting( 'header_search_submit_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_blur',
    array(
      'label' => __( 'Header Search Submit Box Shadow Blur' ),
      'description' => __( 'Enter a px value for header search submit button box shadow blur.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Spread
  $wp_customize->add_setting( 'header_search_submit_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_spread',
    array(
      'label' => __( 'Header Search Submit Box Shadow Spread' ),
      'description' => __( 'Enter a px value for header search submit button box shadow spread.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Hover X
  $wp_customize->add_setting( 'header_search_submit_box_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_hover_x',
    array(
      'label' => __( 'Header Search Submit Box Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for header search submit button box shadow hover x-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Hover Y
  $wp_customize->add_setting( 'header_search_submit_box_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_hover_y',
    array(
      'label' => __( 'Header Search Submit Box Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for header search submit button box shadow hover y-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Hover Blur
  $wp_customize->add_setting( 'header_search_submit_box_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_hover_blur',
    array(
      'label' => __( 'Header Search Submit Box Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for header search submit button box shadow hover blur.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Box Shadow Hover Spread
  $wp_customize->add_setting( 'header_search_submit_box_shadow_hover_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_box_shadow_hover_spread',
    array(
      'label' => __( 'Header Search Submit Box Shadow Hover Spread' ),
      'description' => __( 'Enter a px value for header search submit button box shadow hover spread.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Header Search Submit Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_search_submit_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_search_submit_text_shadow', array(
    'label' => 'Header Search Submit Text Shadow',
    'section' => 'header_search_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' header search submit button.'
  ) ) );

  // Header Search Submit Text Shadow X
  $wp_customize->add_setting( 'header_search_submit_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_shadow_x',
    array(
      'label' => __( 'Header Search Submit Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for header search submit button text shadow x-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Text Shadow Y
  $wp_customize->add_setting( 'header_search_submit_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_shadow_y',
    array(
      'label' => __( 'Header Search Submit Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header search submit button text shadow y-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Text Shadow Blur
  $wp_customize->add_setting( 'header_search_submit_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_shadow_blur',
    array(
      'label' => __( 'Header Search Submit Text Shadow Blur' ),
      'description' => __( 'Enter a px value for header search submit button text shadow blur.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Text Shadow Hover X
  $wp_customize->add_setting( 'header_search_submit_text_shadow_hover_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_shadow_hover_x',
    array(
      'label' => __( 'Header Search Submit Text Shadow Hover X Offset' ),
      'description' => __( 'Enter a px value for header search submit button text shadow hover x-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Text Shadow Hover Y
  $wp_customize->add_setting( 'header_search_submit_text_shadow_hover_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_shadow_hover_y',
    array(
      'label' => __( 'Header Search Submit Text Shadow Hover Y Offset' ),
      'description' => __( 'Enter a px value for header search submit button text shadow hover y-offset.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Search Submit Text Shadow Hover Blur
  $wp_customize->add_setting( 'header_search_submit_text_shadow_hover_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_search_submit_text_shadow_hover_blur',
    array(
      'label' => __( 'Header Search Submit Text Shadow Hover Blur' ),
      'description' => __( 'Enter a px value for header search submit button text shadow hover blur.' ),
      'section' => 'header_search_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_header_search' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_header_search() {
  ob_start();

  /**
   * Header Search Input Padding
   **/
  $header_search_input_vertical_padding = get_theme_mod( 'header_search_input_vertical_padding', '' );
  $header_search_input_horizontal_padding = get_theme_mod( 'header_search_input_horizontal_padding', '' );
  $header_search_input_hover_horizontal_padding = get_theme_mod( 'header_search_input_hover_horizontal_padding', '' );

  if ( isset( $header_search_input_vertical_padding ) && $header_search_input_vertical_padding != '' ) {
    ?>
    :root {
    --header-search-input-vertical-padding: <?php echo $header_search_input_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_input_horizontal_padding ) && $header_search_input_horizontal_padding != '' ) {
    ?>
    :root {
    --header-search-input-horizontal-padding: <?php echo $header_search_input_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_input_hover_horizontal_padding ) && $header_search_input_hover_horizontal_padding != '' ) {
    ?>
    :root {
    --header-search-input-hover-horizontal-padding: <?php echo $header_search_input_hover_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Header Search Input Text
   **/

  $header_search_input_font_size = get_theme_mod( 'header_search_input_font_size', '' );
  $header_search_input_line_height = get_theme_mod( 'header_search_input_line_height', '' );
  $header_search_input_font_weight = get_theme_mod( 'header_search_input_font_weight', '' );
  $header_search_input_font_style = get_theme_mod( 'header_search_input_font_style', '' );
  $header_search_input_text_transform = get_theme_mod( 'header_search_input_text_transform', '' );
  $header_search_input_letter_spacing = get_theme_mod( 'header_search_input_letter_spacing', '' );

  if ( isset( $header_search_input_font_size ) && $header_search_input_font_size != '' ) {
    ?>
    :root {
    --header-search-input-font-size: <?php echo $header_search_input_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_input_line_height ) && $header_search_input_line_height != '' ) {
    ?>
    :root {
    --header-search-input-line-height: <?php echo $header_search_input_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $header_search_input_font_weight ) ) {
    ?>
    :root {
    --header-search-input-font-weight: <?php echo $header_search_input_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_input_font_style ) ) {
    ?>
    :root {
    --header-search-input-font-style: <?php echo $header_search_input_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_input_text_transform ) ) {
    ?>
    :root {
    --header-search-input-text-transform: <?php echo $header_search_input_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $header_search_input_letter_spacing ) && $header_search_input_letter_spacing != '' ) {
    ?>
    :root {
    --header-search-input-letter-spacing: <?php echo $header_search_input_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Header Search Input Border
   **/

  $header_search_input_border_width = get_theme_mod( 'header_search_input_border_width', '' );
  $header_search_input_border_style = get_theme_mod( 'header_search_input_border_style', '' );
  $header_search_input_border_radius = get_theme_mod( 'header_search_input_border_radius', '' );

  if ( isset( $header_search_input_border_width ) && $header_search_input_border_width != '' ) {
    ?>
    :root {
    --header-search-input-border-width: <?php echo $header_search_input_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $header_search_input_border_style ) ) {
    ?>
    :root {
    --header-search-input-border-style: <?php echo $header_search_input_border_style; ?>;
    }
    <?php
  }

  if ( isset( $header_search_input_border_radius ) && $header_search_input_border_radius != '' ) {
    ?>
    :root {
    --header-search-input-border-radius: <?php echo $header_search_input_border_radius; ?>px;
    }
    <?php
  }


  /**
   * Header Search Submit Border Radius
   **/

  $header_search_submit_border_top_left_radius = get_theme_mod( 'header_search_submit_border_top_left_radius', '' );
  $header_search_submit_border_top_right_radius = get_theme_mod( 'header_search_submit_border_top_right_radius', '' );
  $header_search_submit_border_bottom_left_radius = get_theme_mod( 'header_search_submit_border_bottom_left_radius', '' );
  $header_search_submit_border_bottom_right_radius = get_theme_mod( 'header_search_submit_border_bottom_right_radius', '' );
  $header_search_submit_border_top_left_radius_hover = get_theme_mod( 'header_search_submit_border_top_left_radius_hover', '' );
  $header_search_submit_border_top_right_radius_hover = get_theme_mod( 'header_search_submit_border_top_right_radius_hover', '' );
  $header_search_submit_border_bottom_left_radius_hover = get_theme_mod( 'header_search_submit_border_bottom_left_radius_hover', '' );
  $header_search_submit_border_bottom_right_radius_hover = get_theme_mod( 'header_search_submit_border_bottom_right_radius_hover', '' );


  if ( isset( $header_search_submit_border_top_left_radius ) && $header_search_submit_border_top_left_radius != '' ) {
    ?>
    :root {
    --header-search-submit-border-top-left-radius: <?php echo $header_search_submit_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_top_right_radius ) && $header_search_submit_border_top_right_radius != '' ) {
    ?>
    :root {
    --header-search-submit-border-top-right-radius: <?php echo $header_search_submit_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_bottom_left_radius ) && $header_search_submit_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --header-search-submit-border-bottom-left-radius: <?php echo $header_search_submit_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_bottom_right_radius ) && $header_search_submit_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --header-search-submit-border-bottom-right-radius: <?php echo $header_search_submit_border_bottom_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_top_left_radius_hover ) && $header_search_submit_border_top_left_radius_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-top-left-radius-hover: <?php echo $header_search_submit_border_top_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_top_right_radius_hover ) && $header_search_submit_border_top_right_radius_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-top-right-radius-hover: <?php echo $header_search_submit_border_top_right_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_bottom_left_radius_hover ) && $header_search_submit_border_bottom_left_radius_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-bottom-left-radius-hover: <?php echo $header_search_submit_border_bottom_left_radius_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_bottom_right_radius_hover ) && $header_search_submit_border_bottom_right_radius_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-bottom-right-radius-hover: <?php echo $header_search_submit_border_bottom_right_radius_hover; ?>px;
    }
    <?php
  }


  /**
   * Header Search Submit Border Width
   **/

  $header_search_submit_border_top_width = get_theme_mod( 'header_search_submit_border_top_width', '' );
  $header_search_submit_border_right_width = get_theme_mod( 'header_search_submit_border_right_width', '' );
  $header_search_submit_border_bottom_width = get_theme_mod( 'header_search_submit_border_bottom_width', '' );
  $header_search_submit_border_left_width = get_theme_mod( 'header_search_submit_border_left_width', '' );
  $header_search_submit_border_top_width_hover = get_theme_mod( 'header_search_submit_border_top_width_hover', '' );
  $header_search_submit_border_right_width_hover = get_theme_mod( 'header_search_submit_border_right_width_hover', '' );
  $header_search_submit_border_bottom_width_hover = get_theme_mod( 'header_search_submit_border_bottom_width_hover', '' );
  $header_search_submit_border_left_width_hover = get_theme_mod( 'header_search_submit_border_left_width_hover', '' );

  if ( isset( $header_search_submit_border_top_width ) && $header_search_submit_border_top_width != '' ) {
    ?>
    :root {
    --header_search_submit-border-top-width: <?php echo $header_search_submit_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_right_width ) && $header_search_submit_border_right_width != '' ) {
    ?>
    :root {
    --header_search_submit-border-right-width: <?php echo $header_search_submit_border_right_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_bottom_width ) && $header_search_submit_border_bottom_width != '' ) {
    ?>
    :root {
    --header-search-submit-border-bottom-width: <?php echo $header_search_submit_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_left_width ) && $header_search_submit_border_left_width != '' ) {
    ?>
    :root {
    --header-search-submit-border-left-width: <?php echo $header_search_submit_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_top_width_hover ) && $header_search_submit_border_top_width_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-top-width-hover: <?php echo $header_search_submit_border_top_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_right_width_hover ) && $header_search_submit_border_right_width_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-right-width-hover: <?php echo $header_search_submit_border_right_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_bottom_width_hover ) && $header_search_submit_border_bottom_width_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-bottom-width-hover: <?php echo $header_search_submit_border_bottom_width_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_border_left_width_hover ) && $header_search_submit_border_left_width_hover != '' ) {
    ?>
    :root {
    --header-search-submit-border-left-width-hover: <?php echo $header_search_submit_border_left_width_hover; ?>px;
    }
    <?php
  }


  /**
   * Header Search Submit Border Style
   **/

  $header_search_submit_border_top_style = get_theme_mod( 'header_search_submit_border_top_style', '' );
  $header_search_submit_border_right_style = get_theme_mod( 'header_search_submit_border_right_style', '' );
  $header_search_submit_border_bottom_style = get_theme_mod( 'header_search_submit_border_bottom_style', '' );
  $header_search_submit_border_left_style = get_theme_mod( 'header_search_submit_border_left_style', '' );
  $header_search_submit_border_top_style_hover = get_theme_mod( 'header_search_submit_border_top_style_hover', '' );
  $header_search_submit_border_right_style_hover = get_theme_mod( 'header_search_submit_border_right_style_hover', '' );
  $header_search_submit_border_bottom_style_hover = get_theme_mod( 'header_search_submit_border_bottom_style_hover', '' );
  $header_search_submit_border_left_style_hover = get_theme_mod( 'header_search_submit_border_left_style_hover', '' );

  if ( !empty( $header_search_submit_border_top_style ) ) {
    ?>
    :root {
    --header-search-submit-border-top-style: <?php echo $header_search_submit_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_right_style ) ) {
    ?>
    :root {
    --header-search-submit-border-right-style: <?php echo $header_search_submit_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_bottom_style ) ) {
    ?>
    :root {
    --header-search-submit-border-bottom-style: <?php echo $header_search_submit_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_left_style ) ) {
    ?>
    :root {
    --header_search_submit-border-left-style: <?php echo $header_search_submit_border_left_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_top_style_hover ) ) {
    ?>
    :root {
    --header-search-submit-border-top-style-hover: <?php echo $header_search_submit_border_top_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_right_style_hover ) ) {
    ?>
    :root {
    --header-search-submit-border-right-style-hover: <?php echo $header_search_submit_border_right_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_bottom_style_hover ) ) {
    ?>
    :root {
    --header-search-submit-border-bottom-style-hover: <?php echo $header_search_submit_border_bottom_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_border_left_style_hover ) ) {
    ?>
    :root {
    --header-search-submit-border-left-style-hover: <?php echo $header_search_submit_border_left_style_hover; ?>;
    }
    <?php
  }

  /**
   * Header Search Submit Padding
   **/

  $header_search_submit_vertical_padding = get_theme_mod( 'header_search_submit_vertical_padding', '' );
  $header_search_submit_horizontal_padding = get_theme_mod( 'header_search_submit_horizontal_padding', '' );
  $header_search_submit_vertical_padding_hover = get_theme_mod( 'header_search_submit_vertical_padding_hover', '' );
  $header_search_submit_horizontal_padding_hover = get_theme_mod( 'header_search_submit_horizontal_padding_hover', '' );

  if ( isset( $header_search_submit_vertical_padding ) && $header_search_submit_vertical_padding != '' ) {
    ?>
    :root {
    --header-search-submit-vertical-padding: <?php echo $header_search_submit_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_horizontal_padding ) && $header_search_submit_horizontal_padding != '' ) {
    ?>
    :root {
    --header-search-submit-horizontal-padding: <?php echo $header_search_submit_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_vertical_padding_hover ) && $header_search_submit_vertical_padding_hover != '' ) {
    ?>
    :root {
    --header-search-submit-vertical-padding-hover: <?php echo $header_search_submit_vertical_padding_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_horizontal_padding_hover ) && $header_search_submit_horizontal_padding_hover != '' ) {
    ?>
    :root {
    --header-search-submit-horizontal-padding-hover: <?php echo $header_search_submit_horizontal_padding_hover; ?>px;
    }
    <?php
  }


  /**
   * Header Search Submit Text
   **/

  $header_search_submit_font_size = get_theme_mod( 'header_search_submit_font_size', '' );
  $header_search_submit_line_height = get_theme_mod( 'header_search_submit_line_height', '' );
  $header_search_submit_font_weight = get_theme_mod( 'header_search_submit_font_weight', '' );
  $header_search_submit_font_style = get_theme_mod( 'header_search_submit_font_style', '' );
  $header_search_submit_text_transform = get_theme_mod( 'header_search_submit_text_transform', '' );
  $header_search_submit_letter_spacing = get_theme_mod( 'header_search_submit_letter_spacing', '' );
  $header_search_submit_font_size_hover = get_theme_mod( 'header_search_submit_font_size_hover', '' );
  $header_search_submit_line_height_hover = get_theme_mod( 'header_search_submit_line_height_hover', '' );
  $header_search_submit_font_weight_hover = get_theme_mod( 'header_search_submit_font_weight_hover', '' );
  $header_search_submit_font_style_hover = get_theme_mod( 'header_search_submit_font_style_hover', '' );
  $header_search_submit_text_transform_hover = get_theme_mod( 'header_search_submit_text_transform_hover', '' );
  $header_search_submit_letter_spacing_hover = get_theme_mod( 'header_search_submit_letter_spacing_hover', '' );

  if ( isset( $header_search_submit_font_size ) && $header_search_submit_font_size != '' ) {
    ?>
    :root {
    --header-search-submit-font-size: <?php echo $header_search_submit_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_line_height ) && $header_search_submit_line_height != '' ) {
    ?>
    :root {
    --header-search-submit-line-height: <?php echo $header_search_submit_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $header_search_submit_font_weight ) ) {
    ?>
    :root {
    --header-search-submit-font-weight: <?php echo $header_search_submit_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_font_style ) ) {
    ?>
    :root {
    --header-search-submit-font-style: <?php echo $header_search_submit_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_text_transform ) ) {
    ?>
    :root {
    --header-search-submit-text-transform: <?php echo $header_search_submit_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $header_search_submit_letter_spacing ) && $header_search_submit_letter_spacing != '' ) {
    ?>
    :root {
    --header-search-submit-letter-spacing: <?php echo $header_search_submit_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_font_size_hover ) && $header_search_submit_font_size_hover != '' ) {
    ?>
    :root {
    --header-search-submit-font-size-hover: <?php echo $header_search_submit_font_size_hover; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_line_height_hover ) && $header_search_submit_line_height_hover != '' ) {
    ?>
    :root {
    --header-search-submit-line-height-hover: <?php echo $header_search_submit_line_height_hover; ?>px;
    }
    <?php
  }

  if ( !empty( $header_search_submit_font_weight_hover ) ) {
    ?>
    :root {
    --header-search-submit-font-weight-hover: <?php echo $header_search_submit_font_weight_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_font_style_hover ) ) {
    ?>
    :root {
    --header-search-submit-font-style-hover: <?php echo $header_search_submit_font_style_hover; ?>;
    }
    <?php
  }

  if ( !empty( $header_search_submit_text_transform_hover ) ) {
    ?>
    :root {
    --header-search-submit-text-transform-hover: <?php echo $header_search_submit_text_transform_hover; ?>;
    }
    <?php
  }

  if ( isset( $header_search_submit_letter_spacing_hover ) && $header_search_submit_letter_spacing_hover != '' ) {
    ?>
    :root {
    --header-search-submit-letter-spacing-hover: <?php echo $header_search_submit_letter_spacing_hover; ?>px;
    }
    <?php
  }


  /**
   * Header Search Submit Box Shadow
   **/

  $header_search_submit_box_shadow_x = get_theme_mod( 'header_search_submit_box_shadow_x', '' );
  $header_search_submit_box_shadow_y = get_theme_mod( 'header_search_submit_box_shadow_y', '' );
  $header_search_submit_box_shadow_blur = get_theme_mod( 'header_search_submit_box_shadow_blur', '' );
  $header_search_submit_box_shadow_spread = get_theme_mod( 'header_search_submit_box_shadow_spread', '' );
  $header_search_submit_box_shadow_hover_x = get_theme_mod( 'header_search_submit_box_shadow_hover_x', '' );
  $header_search_submit_box_shadow_hover_y = get_theme_mod( 'header_search_submit_box_shadow_hover_y', '' );
  $header_search_submit_box_shadow_hover_blur = get_theme_mod( 'header_search_submit_box_shadow_hover_blur', '' );
  $header_search_submit_box_shadow_hover_spread = get_theme_mod( 'header_search_submit_box_shadow_hover_spread', '' );

  if ( isset( $header_search_submit_box_shadow_x ) && $header_search_submit_box_shadow_x != '' ) {
    ?>
    :root {
    --header-search-submit-box-shadow-x: <?php echo $header_search_submit_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_y ) && $header_search_submit_box_shadow_y != '' ) {
    ?>
    :root {
    --header_search_submit-box-shadow-y: <?php echo $header_search_submit_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_blur ) && $header_search_submit_box_shadow_blur != '' ) {
    ?>
    :root {
    --header_search_submit-box-shadow-blur: <?php echo $header_search_submit_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_spread ) && $header_search_submit_box_shadow_spread != '' ) {
    ?>
    :root {
    --header-search-submit-box-shadow-spread: <?php echo $header_search_submit_box_shadow_spread; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_hover_x ) && $header_search_submit_box_shadow_hover_x != '' ) {
    ?>
    :root {
    --header-search-submit-box-shadow-hover-x: <?php echo $header_search_submit_box_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_hover_y ) && $header_search_submit_box_shadow_hover_y != '' ) {
    ?>
    :root {
    --header-search-submit-box-shadow-hover-y: <?php echo $header_search_submit_box_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_hover_blur ) && $header_search_submit_box_shadow_hover_blur != '' ) {
    ?>
    :root {
    --header-search-submit-box-shadow-hover-blur: <?php echo $header_search_submit_box_shadow_hover_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_box_shadow_hover_spread ) && $header_search_submit_box_shadow_hover_spread != '' ) {
    ?>
    :root {
    --header-search-submit-box-shadow-hover-spread: <?php echo $header_search_submit_box_shadow_hover_spread; ?>px;
    }
    <?php
  }


  /**
   * Header Search Submit Text Shadow
   **/

  $header_search_submit_text_shadow_x = get_theme_mod( 'header_search_submit_text_shadow_x', '' );
  $header_search_submit_text_shadow_y = get_theme_mod( 'header_search_submit_text_shadow_y', '' );
  $header_search_submit_text_shadow_blur = get_theme_mod( 'header_search_submit_text_shadow_blur', '' );
  $header_search_submit_text_shadow_hover_x = get_theme_mod( 'header_search_submit_text_shadow_hover_x', '' );
  $header_search_submit_text_shadow_hover_y = get_theme_mod( 'header_search_submit_text_shadow_hover_y', '' );
  $header_search_submit_text_shadow_hover_blur = get_theme_mod( 'header_search_submit_text_shadow_hover_blur', '' );

  if ( isset( $header_search_submit_text_shadow_x ) && $header_search_submit_text_shadow_x != '' ) {
    ?>
    :root {
    --header-search-submit-text-shadow-x: <?php echo $header_search_submit_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_text_shadow_y ) && $header_search_submit_text_shadow_y != '' ) {
    ?>
    :root {
    --header-search-submit-text-shadow-y: <?php echo $header_search_submit_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_text_shadow_blur ) && $header_search_submit_text_shadow_blur != '' ) {
    ?>
    :root {
    --eader_search_submit-text-shadow-blur: <?php echo $header_search_submit_text_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_text_shadow_hover_x ) && $header_search_submit_text_shadow_hover_x != '' ) {
    ?>
    :root {
    --header-search-submit-text-shadow-hover-x: <?php echo $header_search_submit_text_shadow_hover_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_text_shadow_hover_y ) && $header_search_submit_text_shadow_hover_y != '' ) {
    ?>
    :root {
    --header-search-submit-text-shadow-hover-y: <?php echo $header_search_submit_text_shadow_hover_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_search_submit_text_shadow_hover_blur ) && $header_search_submit_text_shadow_hover_blur != '' ) {
    ?>
    :root {
    --header-search-submit-text-shadow-hover-blur: <?php echo $header_search_submit_text_shadow_hover_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
