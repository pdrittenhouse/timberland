<?php

/**
 * REGISTER CUSTOMIZER NAVBAR OPTIONS
 **/

function theme_customize_register_navbar( $wp_customize ) {


  /**
   * Create Navbar Options Section
   **/

  $wp_customize->add_section( 'navbar_options' , array(
    'title'      => __( 'Navbar Style Options', 'dream' ),
    'priority'   => 61,
  ) );

  /**
   * Navbar Toggle Position
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_toggle_vertical_position',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_toggle_vertical_position', array(
    'label' => 'Navbar Toggle Position',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' => 'Define default position for navbar toggle.'
  ) ) );

  // Navbar Toggle Vertical Position
  $wp_customize->add_setting( 'navbar_toggle_vertical_position',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_vertical_position',
    array(
      'label' => __( 'Navbar Toggle Vertical Position' ),
      'description' => __( 'Enter a px value for the navbar toggle vertical position.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Horizontal Position
  $wp_customize->add_setting( 'navbar_toggle_horizontal_position',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_horizontal_position',
    array(
      'label' => __( 'Navbar Toggle Horizontal Position' ),
      'description' => __( 'Enter a px value for the navbar toggle horizontal position.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );


  /**
   * Navbar Toggle Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_toggle_vertical_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_toggle_vertical_padding', array(
    'label' => 'Navbar Toggle Vertical Padding',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' => 'Define default vertical padding for navbar toggle.'
  ) ) );

  // Navbar Toggle Vertical Padding
  $wp_customize->add_setting( 'navbar_toggle_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_vertical_padding',
    array(
      'label' => __( 'Navbar Toggle Vertical Padding' ),
      'description' => __( 'Enter a px value for the navbar toggle vertical padding.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Horizontal Padding
  $wp_customize->add_setting( 'navbar_toggle_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_horizontal_padding',
    array(
      'label' => __( 'Navbar Toggle Horizontal Padding' ),
      'description' => __( 'Enter a px value for the navbar toggle horizontal padding.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );


  /**
   * Navbar Toggle Layer
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_toggle_layer',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_toggle_layer', array(
    'label' => 'Navbar Toggle Layer Styling',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' => 'Define default layer styling for navbar toggle.'
  ) ) );

  // Navbar Toggle Layer Width
  $wp_customize->add_setting( 'navbar_toggle_layer_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_layer_width',
    array(
      'label' => __( 'Navbar Toggle Layer Width' ),
      'description' => __( 'Enter a px value for the navbar toggle layer width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Layer Height
  $wp_customize->add_setting( 'navbar_toggle_layer_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_layer_height',
    array(
      'label' => __( 'Navbar Toggle Layer Height' ),
      'description' => __( 'Enter a px value for the navbar toggle layer height.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Layer Spacing
  $wp_customize->add_setting( 'navbar_toggle_layer_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_layer_spacing',
    array(
      'label' => __( 'Navbar Toggle Layer Spacing' ),
      'description' => __( 'Enter a px value for the navbar toggle layer spacing.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Layer Border Radius
  $wp_customize->add_setting( 'navbar_toggle_layer_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_layer_border_radius',
    array(
      'label' => __( 'Navbar Toggle Layer Border Radius' ),
      'description' => __( 'Enter a px value for the navbar toggle layer border radius.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Hover Opacity
  $wp_customize->add_setting( 'navbar_toggle_hover_opacity',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_hover_opacity',
    array(
      'label' => __( 'Navbar Toggle Hover Opacity' ),
      'description' => __( 'Enter a px value for the navbar toggle hover opacity.' ),
      'section' => 'navbar_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Navbar Toggle Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_toggle_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_toggle_margin', array(
    'label' => 'Navbar Toggle Margin',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' => 'Define default margin for navbar toggle.'
  ) ) );

  // Navbar Toggle Margin Top
  $wp_customize->add_setting( 'navbar_toggle_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_margin_top',
    array(
      'label' => __( 'Navbar Toggle Margin Top' ),
      'description' => __( 'Enter a px value for the navbar toggle top margin.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Margin Bottom
  $wp_customize->add_setting( 'navbar_toggle_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_margin_bottom',
    array(
      'label' => __( 'Navbar Toggle Margin Bottom' ),
      'description' => __( 'Enter a px value for the navbar toggle bottom margin.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Margin Left
  $wp_customize->add_setting( 'navbar_toggle_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_margin_left',
    array(
      'label' => __( 'Navbar Toggle Margin Left' ),
      'description' => __( 'Enter a px value for the navbar toggle left margin.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Toggle Margin Right
  $wp_customize->add_setting( 'navbar_toggle_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_toggle_margin_right',
    array(
      'label' => __( 'Navbar Toggle Margin Right' ),
      'description' => __( 'Enter a px value for the navbar toggle right margin.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );


  /**
   * Navbar Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_border_width', array(
    'label' => 'Navbar Border Width',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' => 'Define default border width for navbar.'
  ) ) );

  // Navbar Border Top Width
  $wp_customize->add_setting( 'navbar_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_top_width',
    array(
      'label' => __( 'Navbar Border Top Width' ),
      'description' => __( 'Enter a px value for the navbar top border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Border Bottom Width
  $wp_customize->add_setting( 'navbar_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_bottom_width',
    array(
      'label' => __( 'Navbar Border Bottom Width' ),
      'description' => __( 'Enter a px value for the navbar bottom border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Border Left Width
  $wp_customize->add_setting( 'navbar_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_left_width',
    array(
      'label' => __( 'Navbar Border Left Width' ),
      'description' => __( 'Enter a px value for the navbar left border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Border Right Width
  $wp_customize->add_setting( 'navbar_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_right_width',
    array(
      'label' => __( 'Navbar Border Right Width' ),
      'description' => __( 'Enter a px value for the navbar right border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Border Top Width
  $wp_customize->add_setting( 'navbar_mobile_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_top_width',
    array(
      'label' => __( 'Navbar Mobile Border Top Width' ),
      'description' => __( 'Enter a px value for the navbar top mobile border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Border Bottom Width
  $wp_customize->add_setting( 'navbar_mobile_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_bottom_width',
    array(
      'label' => __( 'Navbar Mobile Border Bottom Width' ),
      'description' => __( 'Enter a px value for the navbar bottom mobile border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Border Left Width
  $wp_customize->add_setting( 'navbar_mobile_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_left_width',
    array(
      'label' => __( 'Navbar Mobile Border Left Width' ),
      'description' => __( 'Enter a px value for the navbar left mobile border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Border Right Width
  $wp_customize->add_setting( 'navbar_mobile_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_right_width',
    array(
      'label' => __( 'Navbar Mobile Border Right Width' ),
      'description' => __( 'Enter a px value for the navbar right mobile border width.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );


  /**
   * Navbar Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_border_style', array(
    'label' => 'Navbar Border Style',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' => 'Define default border style for navbar.'
  ) ) );

  // Navbar Top Border Style
  $wp_customize->add_setting( 'navbar_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_top_style',
    array(
      'label' => __( 'Navbar Border Top Style' ),
      'description' => __( 'Select a top border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Right Border Style
  $wp_customize->add_setting( 'navbar_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_right_style',
    array(
      'label' => __( 'Navbar Border Right Style' ),
      'description' => __( 'Select a right border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Bottom Border Style
  $wp_customize->add_setting( 'navbar_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_bottom_style',
    array(
      'label' => __( 'Navbar Border Left Style' ),
      'description' => __( 'Select a bottom border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Left Border Style
  $wp_customize->add_setting( 'navbar_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_left_style',
    array(
      'label' => __( 'Navbar Border Left Style' ),
      'description' => __( 'Select a left border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Mobile Top Border Style
  $wp_customize->add_setting( 'navbar_mobile_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_top_style',
    array(
      'label' => __( 'Navbar Mobile Border Top Style' ),
      'description' => __( 'Select a top border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Mobile Right Border Style
  $wp_customize->add_setting( 'navbar_mobile_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_right_style',
    array(
      'label' => __( 'Navbar Mobile Border Right Style' ),
      'description' => __( 'Select a right border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Mobile Bottom Border Style
  $wp_customize->add_setting( 'navbar_mobile_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_bottom_style',
    array(
      'label' => __( 'Navbar Mobile Border Left Style' ),
      'description' => __( 'Select a bottom border style for the navbar.' ),
      'section' => 'navbar_options',
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

  // Navbar Mobile Left Border Style
  $wp_customize->add_setting( 'navbar_mobile_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_left_style',
    array(
      'label' => __( 'Navbar Mobile Border Left Style' ),
      'description' => __( 'Select a left border style for the navbar.' ),
      'section' => 'navbar_options',
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
   * Navbar Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_control_navbar_border_radius',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_control_navbar_border_radius', array(
    'label' => 'Navbar Border Radius',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'extra' =>'Define border radius for \'default\' navbar style.',
    'divider' => true
  ) ) );

  // Navbar Top Left Border Radius
  $wp_customize->add_setting( 'navbar_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_top_left_radius',
    array(
      'label' => __( 'Navbar Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Top Right Border Radius
  $wp_customize->add_setting( 'navbar_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_top_right_radius',
    array(
      'label' => __( 'Navbar Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Bottom Left Border Radius
  $wp_customize->add_setting( 'navbar_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_bottom_left_radius',
    array(
      'label' => __( 'Navbar Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Bottom Right Border Radius
  $wp_customize->add_setting( 'navbar_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_border_bottom_right_radius',
    array(
      'label' => __( 'Navbar Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Top Left Border Radius
  $wp_customize->add_setting( 'navbar_mobile_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_top_left_radius',
    array(
      'label' => __( 'Navbar Mobile Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Top Right Border Radius
  $wp_customize->add_setting( 'navbar_mobile_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_top_right_radius',
    array(
      'label' => __( 'Navbar Mobile Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Bottom Left Border Radius
  $wp_customize->add_setting( 'navbar_mobile_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_bottom_left_radius',
    array(
      'label' => __( 'Navbar Mobile Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Mobile Bottom Right Border Radius
  $wp_customize->add_setting( 'navbar_mobile_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_mobile_border_bottom_right_radius',
    array(
      'label' => __( 'Navbar Mobile Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for the navbar.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );


  /**
   * Navbar Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_navbar_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_navbar_padding', array(
    'label' => 'Navbar Padding',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default padding for navbar.'
  ) ) );

  // Navbar Padding Top
  $wp_customize->add_setting( 'navbar_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_padding_top',
    array(
      'label' => __( 'Navbar Padding Top' ),
      'description' => __( 'Enter a px value for the navbar top padding.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Padding Bottom
  $wp_customize->add_setting( 'navbar_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_padding_bottom',
    array(
      'label' => __( 'Navbar Padding Bottom' ),
      'description' => __( 'Enter a px value for the navbar bottom padding.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Padding Left
  $wp_customize->add_setting( 'navbar_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_padding_left',
    array(
      'label' => __( 'Navbar Padding Left' ),
      'description' => __( 'Enter a px value for the navbar left padding.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Navbar Padding Right
  $wp_customize->add_setting( 'navbar_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'navbar_padding_right',
    array(
      'label' => __( 'Navbar Padding Right' ),
      'description' => __( 'Enter a px value for the navbar right padding.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );


  /**
   * Mobile Nav Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_mobile_nav_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_mobile_nav_size', array(
    'label' => 'Mobile Nav Size',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default size for mobile nav.'
  ) ) );

  // Mobile Nav Width Unit Selector
  $wp_customize->add_setting( 'unit_selector--mobile_nav_width',
    array(
      'default' => 'px',
      'transport'   => 'postMessage'
    )
  );

  $wp_customize->add_control( 'unit_selector--mobile_nav_width',
    array(
      'label' => __( 'Mobile Nav Width Unit' ),
      'description' => __( 'Select px, % or vw unit for mobile nav width.' ),
      'section' => 'navbar_options',
      'type' => 'radio',
      'choices' => array(
        'px' => __( 'px' ),
        'pct' => __( '%' ),
        'vw' => __( 'vw' )
      )
    )
  );

  // Mobile Nav Width Number Input
  $wp_customize->add_setting( 'number--mobile_nav_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'number--mobile_nav_width',
    array(
      'label' => __( 'Mobile Nav Width' ),
      'description' => __( 'Width for mobile nav. Use width left/right nav menu.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Mobile Nav Width Range Input
  $wp_customize->add_setting( 'range--mobile_nav_width' , array(
    'default'     => 0,
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'range--mobile_nav_width', array(
    'label'	=>  'Mobile Nav Width',
    'description' => __( 'Width for mobile nav. Use width left/right nav menu.' ),
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'section' => 'navbar_options',
  ) ) );

  // Mobile Nav Height Unit Selector
  $wp_customize->add_setting( 'unit_selector--mobile_nav_height',
    array(
      'default' => 'px',
      'transport'   => 'postMessage'
    )
  );

  $wp_customize->add_control( 'unit_selector--mobile_nav_height',
    array(
      'label' => __( 'Mobile Nav Height Unit' ),
      'description' => __( 'Select px, % or vh unit for mobile nav height.' ),
      'section' => 'navbar_options',
      'type' => 'radio',
      'choices' => array(
        'px' => __( 'px' ),
        'pct' => __( '%' ),
        'vh' => __( 'vh' )
      )
    )
  );

  // Mobile Nav Height Number Input
  $wp_customize->add_setting( 'number--mobile_nav_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'number--mobile_nav_height',
    array(
      'label' => __( 'Mobile Nav Height' ),
      'description' => __( 'Height for mobile nav. Use width top/bottom nav menu.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Mobile Nav Height Range Input
  $wp_customize->add_setting( 'range--mobile_nav_height' , array(
    'default'     => 0,
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'range--mobile_nav_height', array(
    'label'	=>  'Mobile Nav Height',
    'description' => __( 'Height for mobile nav. Use width top/bottom nav menu.' ),
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'section' => 'navbar_options',
  ) ) );


  /**
   * Mobile Nav Alignment
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_mobile_nav_alignment',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_mobile_nav_alignment', array(
    'label' => 'Mobile Nav Alignment',
    'section' => 'navbar_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default alignment for mobile nav.'
  ) ) );

  // Mobile Nav Text Align
  $wp_customize->add_setting( 'mobile_nav_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'mobile_nav_text_align',
    array(
      'label' => __( 'Mobile Nav Text Align' ),
      'description' => __( 'Select a text alignment for mobile nav.' ),
      'section' => 'navbar_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'left' => __( 'Left' ),
        'right' => __( 'Right' ),
        'center' => __( 'Center' ),
        'justify' => __( 'Justify' )
      )
    )
  );

  // Mobile Nav Flex Align
  $wp_customize->add_setting( 'mobile_nav_flex_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'mobile_nav_flex_align',
    array(
      'label' => __( 'Mobile Nav Flex Align' ),
      'description' => __( 'Select a flex alignment for mobile nav.' ),
      'section' => 'navbar_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'flex-start' => __( 'Start' ),
        'flex-end' => __( 'End' ),
        'center' => __( 'Center' ),
        'stretch' => __( 'Stretch' )
      )
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_navbar' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_navbar() {
  ob_start();

  /**
   * Navbar Toggle Position
   **/

  $navbar_toggle_vertical_position = get_theme_mod( 'navbar_toggle_vertical_position', '' );
  $navbar_toggle_horizontal_position = get_theme_mod( 'navbar_toggle_horizontal_position', '' );

  if ( isset( $navbar_toggle_vertical_position ) && $navbar_toggle_vertical_position != '' ) {
    ?>
    :root {
    --nav-toggle-vertical-position: <?php echo $navbar_toggle_vertical_position; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_horizontal_position ) && $navbar_toggle_horizontal_position != '' ) {
    ?>
    :root {
    --nav-toggle-horizontal-position: <?php echo $navbar_toggle_horizontal_position; ?>px;
    }
    <?php
  }


  /**
   * Navbar Toggle Padding
   **/

  $navbar_toggle_vertical_padding = get_theme_mod( 'navbar_toggle_vertical_padding', '' );
  $navbar_toggle_horizontal_padding = get_theme_mod( 'navbar_toggle_horizontal_padding', '' );

  if ( isset( $navbar_toggle_vertical_padding ) && $navbar_toggle_vertical_padding != '' ) {
    ?>
    :root {
    --nav-toggle-vertical-padding: <?php echo $navbar_toggle_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_horizontal_padding ) && $navbar_toggle_horizontal_padding != '' ) {
    ?>
    :root {
    --nav-toggle-horizontal-padding: <?php echo $navbar_toggle_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Navbar Toggle Layer
   **/
  $navbar_toggle_layer_width = get_theme_mod( 'navbar_toggle_layer_width', '' );
  $navbar_toggle_layer_height = get_theme_mod( 'navbar_toggle_layer_height', '' );
  $navbar_toggle_layer_spacing = get_theme_mod( 'navbar_toggle_layer_spacing', '' );
  $navbar_toggle_layer_border_radius = get_theme_mod( 'navbar_toggle_layer_border_radius', '' );
  $navbar_toggle_opacity = get_theme_mod( 'navbar_toggle_opacity', '' );

  if ( isset( $navbar_toggle_layer_width ) && $navbar_toggle_layer_width != '' ) {
    ?>
    :root {
    --nav-toggle-layer-width: <?php echo $navbar_toggle_layer_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_layer_height ) && $navbar_toggle_layer_height != '' ) {
    ?>
    :root {
    --nav-toggle-layer-height: <?php echo $navbar_toggle_layer_height; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_layer_spacing ) && $navbar_toggle_layer_spacing != '' ) {
    ?>
    :root {
    --nav-toggle-layer-spacing: <?php echo $navbar_toggle_layer_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_layer_border_radius ) && $navbar_toggle_layer_border_radius != '' ) {
    ?>
    :root {
    --nav-toggle-border-radius: <?php echo $navbar_toggle_layer_border_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_opacity ) && $navbar_toggle_opacity != '' ) {
    ?>
    :root {
    --nav-toggle-hover-opacity: <?php echo $navbar_toggle_opacity; ?>px;
    }
    <?php
  }


  /**
   * Navbar Toggle Margin
   **/
  $navbar_toggle_margin_top = get_theme_mod( 'navbar_toggle_margin_top', '' );
  $navbar_toggle_margin_bottom = get_theme_mod( 'navbar_toggle_margin_bottom', '' );
  $navbar_toggle_margin_left = get_theme_mod( 'navbar_toggle_margin_left', '' );
  $navbar_toggle_margin_right = get_theme_mod( 'navbar_toggle_margin_right', '' );

  if ( isset( $navbar_toggle_margin_top ) && $navbar_toggle_margin_top != '' ) {
    ?>
    :root {
    --nav-toggle-margin-top: <?php echo $navbar_toggle_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_margin_bottom ) && $navbar_toggle_margin_bottom != '' ) {
    ?>
    :root {
    --nav-toggle-margin-bottom: <?php echo $navbar_toggle_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_margin_left ) && $navbar_toggle_margin_left != '' ) {
    ?>
    :root {
    --nav-toggle-margin-left: <?php echo $navbar_toggle_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_toggle_margin_right ) && $navbar_toggle_margin_right != '' ) {
    ?>
    :root {
    --nav-toggle-margin-right: <?php echo $navbar_toggle_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Navbar Border Width
   **/
  $navbar_border_top_width = get_theme_mod( 'navbar_border_top_width', '' );
  $navbar_border_bottom_width = get_theme_mod( 'navbar_border_bottom_width', '' );
  $navbar_border_left_width = get_theme_mod( 'navbar_border_left_width', '' );
  $navbar_border_right_width = get_theme_mod( 'navbar_border_right_width', '' );
  $navbar_mobile_border_top_width = get_theme_mod( 'navbar_mobile_border_top_width', '' );
  $navbar_mobile_border_bottom_width = get_theme_mod( 'navbar_mobile_border_bottom_width', '' );
  $navbar_mobile_border_left_width = get_theme_mod( 'navbar_mobile_border_left_width', '' );
  $navbar_mobile_border_right_width = get_theme_mod( 'navbar_mobile_border_right_width', '' );

  if ( isset( $navbar_border_top_width ) && $navbar_border_top_width != '' ) {
    ?>
    :root {
    --nav-border-top-width: <?php echo $navbar_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_border_bottom_width ) && $navbar_border_bottom_width != '' ) {
    ?>
    :root {
    --nav-border-bottom-width: <?php echo $navbar_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_border_left_width ) && $navbar_border_left_width != '' ) {
    ?>
    :root {
    --nav-border-left-width: <?php echo $navbar_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_border_right_width ) && $navbar_border_right_width != '' ) {
    ?>
    :root {
    --nav-border-right-width: <?php echo $navbar_border_right_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_top_width ) && $navbar_mobile_border_top_width != '' ) {
    ?>
    :root {
    --nav-mobile-border-top-width: <?php echo $navbar_mobile_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_bottom_width ) && $navbar_mobile_border_bottom_width != '' ) {
    ?>
    :root {
    --nav-mobile-border-bottom-width: <?php echo $navbar_mobile_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_left_width ) && $navbar_mobile_border_left_width != '' ) {
    ?>
    :root {
    --nav-mobile-border-left-width: <?php echo $navbar_mobile_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_right_width ) && $navbar_mobile_border_right_width != '' ) {
    ?>
    :root {
    --nav-mobile-border-right-width: <?php echo $navbar_mobile_border_right_width; ?>px;
    }
    <?php
  }


  /**
   * Navbar Border Style
   **/

  $navbar_border_top_style = get_theme_mod( 'navbar_border_top_style', '' );
  $navbar_border_right_style = get_theme_mod( 'navbar_border_right_style', '' );
  $navbar_border_bottom_style = get_theme_mod( 'navbar_border_bottom_style', '' );
  $navbar_border_left_style = get_theme_mod( 'navbar_border_left_style', '' );
  $navbar_mobile_border_top_style = get_theme_mod( 'navbar_mobile_border_top_style', '' );
  $navbar_mobile_border_right_style = get_theme_mod( 'navbar_mobile_border_right_style', '' );
  $navbar_mobile_border_bottom_style = get_theme_mod( 'navbar_mobile_border_bottom_style', '' );
  $navbar_mobile_border_left_style = get_theme_mod( 'navbar_mobile_border_left_style', '' );

  if ( !empty( $navbar_border_top_style ) ) {
    ?>
    :root {
    --nav-border-top-style: <?php echo $navbar_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_border_right_style ) ) {
    ?>
    :root {
    --nav-border-right-style: <?php echo $navbar_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_border_bottom_style ) ) {
    ?>
    :root {
    --nav-border-bottom-style: <?php echo $navbar_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_border_left_style ) ) {
    ?>
    :root {
    --nav-border-left-style: <?php echo $navbar_border_left_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_mobile_border_top_style ) ) {
    ?>
    :root {
    --nav-mobile-border-top-style: <?php echo $navbar_mobile_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_mobile_border_right_style ) ) {
    ?>
    :root {
    --nav-mobile-border-right-style: <?php echo $navbar_mobile_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_mobile_border_bottom_style ) ) {
    ?>
    :root {
    --nav-mobile-border-bottom-style: <?php echo $navbar_mobile_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $navbar_mobile_border_left_style ) ) {
    ?>
    :root {
    --nav-mobile-border-left-style: <?php echo $navbar_mobile_border_left_style; ?>;
    }
    <?php
  }


  /**
   * Navbar Border Radius
   **/

  $navbar_border_top_left_radius = get_theme_mod( 'navbar_border_top_left_radius', '' );
  $navbar_border_top_right_radius = get_theme_mod( 'navbar_border_top_right_radius', '' );
  $navbar_border_bottom_left_radius = get_theme_mod( 'navbar_border_bottom_left_radius', '' );
  $navbar_border_bottom_right_radius = get_theme_mod( 'navbar_border_bottom_right_radius', '' );
  $navbar_mobile_border_top_left_radius = get_theme_mod( 'navbar_mobile_border_top_left_radius', '' );
  $navbar_mobile_border_top_right_radius = get_theme_mod( 'navbar_mobile_border_top_right_radius', '' );
  $navbar_mobile_border_bottom_left_radius = get_theme_mod( 'navbar_mobile_border_bottom_left_radius', '' );
  $navbar_mobile_border_bottom_right_radius = get_theme_mod( 'navbar_mobile_border_bottom_right_radius', '' );

  if ( isset( $navbar_border_top_left_radius ) && $navbar_border_top_left_radius != '' ) {
    ?>
    :root {
    --nav-border-top-left-radius: <?php echo $navbar_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_border_top_right_radius ) && $navbar_border_top_right_radius != '' ) {
    ?>
    :root {
    --nav-border-top-right-radius: <?php echo $navbar_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_border_bottom_left_radius ) && $navbar_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --nav-border-bottom-left-radius: <?php echo $navbar_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_border_bottom_right_radius ) && $navbar_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --nav-border-bottom-right-radius: <?php echo $navbar_border_bottom_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_top_left_radius ) && $navbar_mobile_border_top_left_radius != '' ) {
    ?>
    :root {
    --nav-mobile-border-top-left-radius: <?php echo $navbar_mobile_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_top_right_radius ) && $navbar_mobile_border_top_right_radius != '' ) {
    ?>
    :root {
    --nav-mobile-border-top-right-radius: <?php echo $navbar_mobile_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_bottom_left_radius ) && $navbar_mobile_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --nav-mobile-border-bottom-left-radius: <?php echo $navbar_mobile_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_border_bottom_right_radius ) && $navbar_mobile_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --nav-mobile-border-bottom-right-radius: <?php echo $navbar_mobile_border_bottom_right_radius; ?>px;
    }
    <?php
  }


  /**
   * Navbar Padding
   **/

  $navbar_padding_top = get_theme_mod( 'navbar_padding_top', '' );
  $navbar_padding_bottom = get_theme_mod( 'navbar_padding_bottom', '' );
  $navbar_padding_left = get_theme_mod( 'navbar_padding_left', '' );
  $navbar_padding_right = get_theme_mod( 'navbar_padding_right', '' );
  $navbar_mobile_padding_top = get_theme_mod( 'navbar_mobile_padding_top', '' );
  $navbar_mobile_padding_bottom = get_theme_mod( 'navbar_mobile_padding_bottom', '' );
  $navbar_mobile_padding_left = get_theme_mod( 'navbar_mobile_padding_left', '' );
  $navbar_mobile_padding_right = get_theme_mod( 'navbar_padding_right', '' );

  if ( isset( $navbar_padding_top ) && $navbar_padding_top != '' ) {
    ?>
    :root {
    --nav-padding-top: <?php echo $navbar_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_padding_bottom ) && $navbar_padding_bottom != '' ) {
    ?>
    :root {
    --nav-padding-bottom: <?php echo $navbar_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_padding_left ) && $navbar_padding_left != '' ) {
    ?>
    :root {
    --nav-padding-left: <?php echo $navbar_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_padding_right ) && $navbar_padding_right != '' ) {
    ?>
    :root {
    --nav-padding-right: <?php echo $navbar_padding_right; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_padding_top ) && $navbar_mobile_padding_top != '' ) {
    ?>
    :root {
    --nav-mobile-padding-top: <?php echo $navbar_mobile_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_padding_bottom ) && $navbar_mobile_padding_bottom != '' ) {
    ?>
    :root {
    --nav-mobile-padding-bottom: <?php echo $navbar_mobile_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_padding_left ) && $navbar_mobile_padding_left != '' ) {
    ?>
    :root {
    --nav-mobile-padding-left: <?php echo $navbar_mobile_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $navbar_mobile_padding_right ) && $navbar_mobile_padding_right != '' ) {
    ?>
    :root {
    --nav-mobile-padding-right: <?php echo $navbar_mobile_padding_right; ?>px;
    }
    <?php
  }


  /**
   * Mobile Nav Size
   **/

  $mobile_nav_width_unit = get_theme_mod( 'unit_selector--mobile_nav_width', '' );
  $mobile_nav_width_number = get_theme_mod( 'number--mobile_nav_width', '' );
  $mobile_nav_width_range = get_theme_mod( 'range--mobile_nav_width', '' );
  $mobile_nav_height_unit = get_theme_mod( 'unit_selector--mobile_nav_height', '' );
  $mobile_nav_height_number = get_theme_mod( 'number--mobile_nav_height', '' );
  $mobile_nav_height_range = get_theme_mod( 'range--mobile_nav_height', '' );

  if ( !empty( $mobile_nav_width_number ) and $mobile_nav_width_unit == 'px' ) {
    ?>
    :root {
    --nav-width: <?php echo $mobile_nav_width_number; ?>px;
    }
    <?php
  }

  if ( !empty( $mobile_nav_width_range ) and $mobile_nav_width_unit == 'pct' ) {
    ?>
    :root {
    --nav-width: <?php echo $mobile_nav_width_range; ?>%;
    }
    <?php
  }

  if ( !empty( $mobile_nav_width_range ) and $mobile_nav_width_unit == 'vw' ) {
    ?>
    :root {
    --nav-width: <?php echo $mobile_nav_width_range; ?>vw;
    }
    <?php
  }

  if ( !empty( $mobile_nav_height_number ) and $mobile_nav_height_unit == 'px' ) {
    ?>
    :root {
    --nav-height: <?php echo $mobile_nav_height_number; ?>px;
    }
    <?php
  }

  if ( !empty( $mobile_nav_height_range ) and $mobile_nav_height_unit == 'pct' ) {
    ?>
    :root {
    --nav-height: <?php echo $mobile_nav_height_range; ?>%;
    }
    <?php
  }

  if ( !empty( $mobile_nav_height_range ) and $mobile_nav_height_unit == 'vh' ) {
    ?>
    :root {
    --nav-height: <?php echo $mobile_nav_height_range; ?>vh;
    }
    <?php
  }


  /**
   * Mobile Nav Alignment
   **/

  $mobile_nav_text_align = get_theme_mod( 'mobile_nav_text_align', '' );
  $mobile_nav_flex_align = get_theme_mod( 'mobile_nav_flex_align', '' );

  if ( !empty( $mobile_nav_text_align ) ) {
    ?>
    :root {
    --nav-alignment-mobile: <?php echo $mobile_nav_text_align; ?>;
    }
    <?php
  }

  if ( !empty( $mobile_nav_flex_align ) ) {
    ?>
    :root {
    --nav-alignment-mobile-flex: <?php echo $mobile_nav_flex_align; ?>;
    }
    <?php
  }

  $css = ob_get_clean();
  return $css;

}
