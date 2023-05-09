<?php

/**
 * REGISTER CUSTOMIZER FOOTER CONTACT INFO OPTIONS
 **/

function theme_customize_register_footer_contact_info( $wp_customize ) {


  /**
   * Create Footer Contact Info Options Section
   **/

  $wp_customize->add_section( 'footer_contact_info_options' , array(
    'title'      => __( 'Footer Contact Info Style Options', 'dream' ),
    'priority'   => 88,
  ) );

  /**
   * Footer Contact Info Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_contact_info_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_contact_info_margin', array(
    'label' => 'Footer Contact Info Margin',
    'section' => 'footer_contact_info_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define margin for \'default\' footer contact info.'
  ) ) );

  // Footer Contact Info Mobile Margin Top
  $wp_customize->add_setting( 'footer_contact_info_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_mobile_margin_top',
    array(
      'label' => __( 'Footer Contact Info Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the footer contact info top mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Mobile Margin Bottom
  $wp_customize->add_setting( 'footer_contact_info_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_mobile_margin_bottom',
    array(
      'label' => __( 'Footer Contact Info Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer contact info bottom mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Mobile Margin Left
  $wp_customize->add_setting( 'footer_contact_info_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_mobile_margin_left',
    array(
      'label' => __( 'Footer Contact Info Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the footer contact info left mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Mobile Margin Right
  $wp_customize->add_setting( 'footer_contact_info_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_mobile_margin_right',
    array(
      'label' => __( 'Footer Contact Info Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the footer contact info right mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Margin Top
  $wp_customize->add_setting( 'footer_contact_info_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_margin_top',
    array(
      'label' => __( 'Footer Contact Info Margin Top' ),
      'description' => __( 'Enter a px value for the footer contact info top margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Margin Bottom
  $wp_customize->add_setting( 'footer_contact_info_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_margin_bottom',
    array(
      'label' => __( 'Footer Contact Info Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer contact info bottom margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Margin Left
  $wp_customize->add_setting( 'footer_contact_info_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_margin_left',
    array(
      'label' => __( 'Footer Contact Info Margin Left' ),
      'description' => __( 'Enter a px value for the footer contact info left margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Margin Right
  $wp_customize->add_setting( 'footer_contact_info_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_margin_right',
    array(
      'label' => __( 'Footer Contact Info Margin Right' ),
      'description' => __( 'Enter a px value for the footer contact info right margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Contact Info Item Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_contact_info_item_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_contact_info_item_margin', array(
    'label' => 'Footer Contact Info Item Margin',
    'section' => 'footer_contact_info_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define margin for \'default\' footer contact info items.'
  ) ) );

  // Footer Contact Info Item Mobile Margin Top
  $wp_customize->add_setting( 'footer_contact_info_item_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_mobile_margin_top',
    array(
      'label' => __( 'Footer Contact Info Item Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the footer contact info top mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Mobile Margin Bottom
  $wp_customize->add_setting( 'footer_contact_info_item_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_mobile_margin_bottom',
    array(
      'label' => __( 'Footer Contact Info Item Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer contact info bottom mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Mobile Margin Left
  $wp_customize->add_setting( 'footer_contact_info_item_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_mobile_margin_left',
    array(
      'label' => __( 'Footer Contact Info Item Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the footer contact info left mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Mobile Margin Right
  $wp_customize->add_setting( 'footer_contact_info_item_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_mobile_margin_right',
    array(
      'label' => __( 'Footer Contact Info Item Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the footer contact info right mobile margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Margin Top
  $wp_customize->add_setting( 'footer_contact_info_item_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_margin_top',
    array(
      'label' => __( 'Footer Contact Info Item Margin Top' ),
      'description' => __( 'Enter a px value for the footer contact info top margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Margin Bottom
  $wp_customize->add_setting( 'footer_contact_info_item_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_margin_bottom',
    array(
      'label' => __( 'Footer Contact Info Item Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer contact info bottom margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Margin Left
  $wp_customize->add_setting( 'footer_contact_info_item_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_margin_left',
    array(
      'label' => __( 'Footer Contact Info Item Margin Left' ),
      'description' => __( 'Enter a px value for the footer contact info left margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Margin Right
  $wp_customize->add_setting( 'footer_contact_info_item_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_margin_right',
    array(
      'label' => __( 'Footer Contact Info Item Margin Right' ),
      'description' => __( 'Enter a px value for the footer contact info right margin.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Contact Info Item Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_contact_info_item_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_contact_info_item_padding', array(
    'label' => 'Footer Contact Info Item Padding',
    'section' => 'footer_contact_info_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define padding for \'default\' footer contact info items.'
  ) ) );

  // Footer Contact Info Item Vertical Padding
  $wp_customize->add_setting( 'footer_contact_info_item_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_vertical_padding',
    array(
      'label' => __( 'Footer Contact Info Item Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer contact info items.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Mobile Vertical Padding
  $wp_customize->add_setting( 'footer_contact_info_item_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_mobile_vertical_padding',
    array(
      'label' => __( 'Footer Contact Info Item Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile footer contact info items.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Horizontal Padding
  $wp_customize->add_setting( 'footer_contact_info_item_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_horizontal_padding',
    array(
      'label' => __( 'Footer Contact Info Item Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer contact info items.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Mobile Horizontal Padding
  $wp_customize->add_setting( 'footer_contact_info_item_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_mobile_horizontal_padding',
    array(
      'label' => __( 'Footer Contact Info Item Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile footer contact info items.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Contact Info Item Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_contact_info_item_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_contact_info_item_text', array(
    'label' => 'Footer Contact Info Item Text',
    'section' => 'footer_contact_info_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for footer contact info item.'
  ) ) );

  // Footer Contact Info Item Font Size
  $wp_customize->add_setting( 'footer_contact_info_item_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_font_size',
    array(
      'label' => __( 'Footer Contact Info Item Font Size' ),
      'description' => __( 'Enter a px value for footer contact info item font size.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Font Size Mobile
  $wp_customize->add_setting( 'footer_contact_info_item_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_font_size_mobile',
    array(
      'label' => __( 'Footer Contact Info Item Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer contact info item font size.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Line Height Mobile
  $wp_customize->add_setting( 'footer_contact_info_item_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_line_height_mobile',
    array(
      'label' => __( 'Footer Contact Info Item Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer contact info item line height.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Line Height
  $wp_customize->add_setting( 'footer_contact_info_item_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_line_height',
    array(
      'label' => __( 'Footer Contact Info Item Line Height' ),
      'description' => __( 'Enter a px value for footer contact info item line height.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Font Weight
  $wp_customize->add_setting( 'footer_contact_info_item_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_font_weight',
    array(
      'label' => __( 'Footer Contact Info Item Font Weight' ),
      'description' => __( 'Select a font weight for footer contact info item.' ),
      'section' => 'footer_contact_info_options',
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

  // Footer Contact Info Item Font Style
  $wp_customize->add_setting( 'footer_contact_info_item_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_font_style',
    array(
      'label' => __( 'Footer Contact Info Item Font Style' ),
      'description' => __( 'Select a font style for footer contact info item.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Contact Info Item Text Transform
  $wp_customize->add_setting( 'footer_contact_info_item_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_text_transform',
    array(
      'label' => __( 'Footer Contact Info Item Text Transform' ),
      'description' => __( 'Select a transform style for footer contact info item text.' ),
      'section' => 'footer_contact_info_options',
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

  // Footer Contact Info Item Letter Spacing
  $wp_customize->add_setting( 'footer_contact_info_item_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_letter_spacing',
    array(
      'label' => __( 'Footer Contact Info Item Letter Spacing' ),
      'description' => __( 'Enter a px value for footer contact info item letter spacing.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Contact Info Item Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_contact_info_item_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Contact Info Item Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer contact info item letter spacing.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer Contact Info Item Label Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_contact_info_item_label_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_contact_info_item_label_text', array(
    'label' => 'Footer Contact Info Item Label Text',
    'section' => 'footer_contact_info_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define text for \'default\' footer contact info item labels.'
  ) ) );

  // Footer Contact Info Item Label Font Size
  $wp_customize->add_setting( 'footer_contact_info_item_label_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_font_size',
    array(
      'label' => __( 'Footer Contact Info Item Label Font Size' ),
      'description' => __( 'Enter a px value for footer contact info item label font size.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Label Font Size Mobile
  $wp_customize->add_setting( 'footer_contact_info_item_label_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_font_size_mobile',
    array(
      'label' => __( 'Footer Contact Info Item Label Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer contact info item label font size.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Label Line Height Mobile
  $wp_customize->add_setting( 'footer_contact_info_item_label_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_line_height_mobile',
    array(
      'label' => __( 'Footer Contact Info Item Label Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer contact info item label line height.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Label Line Height
  $wp_customize->add_setting( 'footer_contact_info_item_label_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_line_height',
    array(
      'label' => __( 'Footer Contact Info Item Label Line Height' ),
      'description' => __( 'Enter a px value for footer contact info item label line height.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number'
    )
  );

  // Footer Contact Info Item Label Font Weight
  $wp_customize->add_setting( 'footer_contact_info_item_label_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_font_weight',
    array(
      'label' => __( 'Footer Contact Info Item Label Font Weight' ),
      'description' => __( 'Select a font weight for footer contact info item label.' ),
      'section' => 'footer_contact_info_options',
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

  // Footer Contact Info Item Label Font Style
  $wp_customize->add_setting( 'footer_contact_info_item_label_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_font_style',
    array(
      'label' => __( 'Footer Contact Info Item Label Font Style' ),
      'description' => __( 'Select a font style for footer contact info item label.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Contact Info Item Label Text Transform
  $wp_customize->add_setting( 'footer_contact_info_item_label_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_text_transform',
    array(
      'label' => __( 'Footer Contact Info Item Label Text Transform' ),
      'description' => __( 'Select a transform style for footer contact info item label text.' ),
      'section' => 'footer_contact_info_options',
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

  // Footer Contact Info Item Label Letter Spacing
  $wp_customize->add_setting( 'footer_contact_info_item_label_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_letter_spacing',
    array(
      'label' => __( 'Footer Contact Info Item Label Letter Spacing' ),
      'description' => __( 'Enter a px value for footer contact info item label letter spacing.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Contact Info Item Label Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_contact_info_item_label_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_contact_info_item_label_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Contact Info Item Label Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer contact info item label letter spacing.' ),
      'section' => 'footer_contact_info_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );



}

add_action( 'customize_register', 'theme_customize_register_footer_contact_info' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_contact_info() {
  ob_start();

  /**
   * Footer Contact Info Margin
   **/

  $footer_contact_info_mobile_margin_top = get_theme_mod( 'footer_contact_info_mobile_margin_top', '' );
  $footer_contact_info_mobile_margin_bottom = get_theme_mod( 'footer_contact_info_mobile_margin_bottom', '' );
  $footer_contact_info_mobile_margin_left = get_theme_mod( 'footer_contact_info_mobile_margin_left', '' );
  $footer_contact_info_mobile_margin_right = get_theme_mod( 'footer_contact_info_mobile_margin_right', '' );
  $footer_contact_info_margin_top = get_theme_mod( 'footer_contact_info_margin_top', '' );
  $footer_contact_info_margin_bottom = get_theme_mod( 'footer_contact_info_margin_bottom', '' );
  $footer_contact_info_margin_left = get_theme_mod( 'footer_contact_info_margin_left', '' );
  $footer_contact_info_margin_right = get_theme_mod( 'footer_contact_info_margin_right', '' );

  if ( isset( $footer_contact_info_mobile_margin_top ) && $footer_contact_info_mobile_margin_top != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-top-mobile: <?php echo $footer_contact_info_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_mobile_margin_bottom ) && $footer_contact_info_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-bottom-mobile: <?php echo $footer_contact_info_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_mobile_margin_left ) && $footer_contact_info_mobile_margin_left != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-left-mobile: <?php echo $footer_contact_info_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_mobile_margin_right ) && $footer_contact_info_mobile_margin_right != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-right-mobile: <?php echo $footer_contact_info_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_margin_top ) && $footer_contact_info_margin_top != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-top: <?php echo $footer_contact_info_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_margin_bottom ) && $footer_contact_info_margin_bottom != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-bottom: <?php echo $footer_contact_info_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_margin_left ) && $footer_contact_info_margin_left != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-left: <?php echo $footer_contact_info_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_margin_right ) && $footer_contact_info_margin_right != '' ) {
    ?>
    :root {
    --footer-contact-info-margin-right: <?php echo $footer_contact_info_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Footer Contact Info Item Margin
   **/

  $footer_contact_info_item_mobile_margin_top = get_theme_mod( 'footer_contact_info_item_mobile_margin_top', '' );
  $footer_contact_info_item_mobile_margin_bottom = get_theme_mod( 'footer_contact_info_item_mobile_margin_bottom', '' );
  $footer_contact_info_item_mobile_margin_left = get_theme_mod( 'footer_contact_info_item_mobile_margin_left', '' );
  $footer_contact_info_item_mobile_margin_right = get_theme_mod( 'footer_contact_info_item_mobile_margin_right', '' );
  $footer_contact_info_item_margin_top = get_theme_mod( 'footer_contact_info_item_margin_top', '' );
  $footer_contact_info_item_margin_bottom = get_theme_mod( 'footer_contact_info_item_margin_bottom', '' );
  $footer_contact_info_item_margin_left = get_theme_mod( 'footer_contact_info_item_margin_left', '' );
  $footer_contact_info_item_margin_right = get_theme_mod( 'footer_contact_info_item_margin_right', '' );

  if ( isset( $footer_contact_info_item_mobile_margin_top ) && $footer_contact_info_item_mobile_margin_top != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-top-mobile: <?php echo $footer_contact_info_item_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_mobile_margin_bottom ) && $footer_contact_info_item_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-bottom-mobile: <?php echo $footer_contact_info_item_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_mobile_margin_left ) && $footer_contact_info_item_mobile_margin_left != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-left-mobile: <?php echo $footer_contact_info_item_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_mobile_margin_right ) && $footer_contact_info_item_mobile_margin_right != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-right-mobile: <?php echo $footer_contact_info_item_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_margin_top ) && $footer_contact_info_item_margin_top != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-top: <?php echo $footer_contact_info_item_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_margin_bottom ) && $footer_contact_info_item_margin_bottom != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-bottom: <?php echo $footer_contact_info_item_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_margin_left ) && $footer_contact_info_item_margin_left != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-left: <?php echo $footer_contact_info_item_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_margin_right ) && $footer_contact_info_item_margin_right != '' ) {
    ?>
    :root {
    --footer-contact-info-item-margin-right: <?php echo $footer_contact_info_item_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Footer Contact Info Item Padding
   **/

  $footer_contact_info_item_vertical_padding = get_theme_mod( 'footer_contact_info_item_vertical_padding', '' );
  $footer_contact_info_item_horizontal_padding = get_theme_mod( 'footer_contact_info_item_horizontal_padding', '' );
  $footer_contact_info_item_mobile_vertical_padding = get_theme_mod( 'footer_contact_info_item_mobile_vertical_padding', '' );
  $footer_contact_info_item_mobile_horizontal_padding = get_theme_mod( 'footer_contact_info_item_mobile_horizontal_padding', '' );

  if ( isset( $footer_contact_info_item_vertical_padding ) && $footer_contact_info_item_vertical_padding != '' ) {
    ?>
    :root {
    --footer-contact-info-item-vertical-padding: <?php echo $footer_contact_info_item_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_horizontal_padding ) && $footer_contact_info_item_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-contact-info-item-horizontal-padding: <?php echo $footer_contact_info_item_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_mobile_vertical_padding ) && $footer_contact_info_item_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --footer-contact-info-item-vertical-padding-mobile: <?php echo $footer_contact_info_item_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_mobile_horizontal_padding ) && $footer_contact_info_item_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-contact-info-item-horizontal-padding-mobile: <?php echo $footer_contact_info_item_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Footer Contact Info Item Text
   **/

  $footer_contact_info_item_font_size = get_theme_mod( 'footer_contact_info_item_font_size', '' );
  $footer_contact_info_item_font_size_mobile = get_theme_mod( 'footer_contact_info_item_font_size_mobile', '' );
  $footer_contact_info_item_line_height = get_theme_mod( 'footer_contact_info_item_line_height', '' );
  $footer_contact_info_item_line_height_mobile = get_theme_mod( 'footer_contact_info_item_line_height_mobile', '' );
  $footer_contact_info_item_font_weight = get_theme_mod( 'footer_contact_info_item_font_weight', '' );
  $footer_contact_info_item_font_style = get_theme_mod( 'footer_contact_info_item_font_style', '' );
  $footer_contact_info_item_text_transform = get_theme_mod( 'footer_contact_info_item_text_transform', '' );
  $footer_contact_info_item_letter_spacing = get_theme_mod( 'footer_contact_info_item_letter_spacing', '' );
  $footer_contact_info_item_letter_spacing_mobile = get_theme_mod( 'footer_contact_info_item_letter_spacing_mobile', '' );

  if ( isset( $footer_contact_info_item_font_size ) && $footer_contact_info_item_font_size != '' ) {
    ?>
    :root {
    --footer-contact-info-item-font-size: <?php echo $footer_contact_info_item_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_font_size_mobile ) && $footer_contact_info_item_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-contact-info-item-font-size-mobile: <?php echo $footer_contact_info_item_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_line_height ) && $footer_contact_info_item_line_height != '' ) {
    ?>
    :root {
    --footer-contact-info-item-line-height: <?php echo $footer_contact_info_item_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_line_height_mobile ) && $footer_contact_info_item_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-contact-info-item-line-height-mobile: <?php echo $footer_contact_info_item_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_item_font_weight ) ) {
    ?>
    :root {
    --footer-contact-info-item-font-weight: <?php echo $footer_contact_info_item_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_item_font_style ) ) {
    ?>
    :root {
    --footer-contact-info-item-font-style: <?php echo $footer_contact_info_item_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_item_text_transform ) ) {
    ?>
    :root {
    --footer-contact-info-item-text-transform: <?php echo $footer_contact_info_item_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_letter_spacing ) && $footer_contact_info_item_letter_spacing != '' ) {
    ?>
    :root {
    --footer-contact-info-item-letter-spacing: <?php echo $footer_contact_info_item_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_letter_spacing_mobile ) && $footer_contact_info_item_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-contact-info-item-letter-spacing-mobile: <?php echo $footer_contact_info_item_letter_spacing_mobile; ?>px;
    }
    <?php
  }


  /**
   * Footer Contact Info Item Label Text
   **/

  $footer_contact_info_item_label_font_size = get_theme_mod( 'footer_contact_info_item_label_font_size', '' );
  $footer_contact_info_item_label_font_size_mobile = get_theme_mod( 'footer_contact_info_item_label_font_size_mobile', '' );
  $footer_contact_info_item_label_line_height = get_theme_mod( 'footer_contact_info_item_label_line_height', '' );
  $footer_contact_info_item_label_line_height_mobile = get_theme_mod( 'footer_contact_info_item_label_line_height_mobile', '' );
  $footer_contact_info_item_label_font_weight = get_theme_mod( 'footer_contact_info_item_label_font_weight', '' );
  $footer_contact_info_item_label_font_style = get_theme_mod( 'footer_contact_info_item_label_font_style', '' );
  $footer_contact_info_item_label_text_transform = get_theme_mod( 'footer_contact_info_item_label_text_transform', '' );
  $footer_contact_info_item_label_letter_spacing = get_theme_mod( 'footer_contact_info_item_label_letter_spacing', '' );
  $footer_contact_info_item_label_letter_spacing_mobile = get_theme_mod( 'footer_contact_info_item_label_letter_spacing_mobile', '' );

  if ( isset( $footer_contact_info_item_label_font_size ) && $footer_contact_info_item_label_font_size != '' ) {
    ?>
    :root {
    --footer-contact-info-label-font-size: <?php echo $footer_contact_info_item_label_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_label_font_size_mobile ) && $footer_contact_info_item_label_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-contact-info-label-font-size-mobile: <?php echo $footer_contact_info_item_label_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_label_line_height ) && $footer_contact_info_item_label_line_height != '' ) {
    ?>
    :root {
    --footer-contact-info-label-line-height: <?php echo $footer_contact_info_item_label_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_label_line_height_mobile ) && $footer_contact_info_item_label_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-contact-info-label-line-height-mobile: <?php echo $footer_contact_info_item_label_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_item_label_font_weight ) ) {
    ?>
    :root {
    --footer-contact-info-label-font-weight: <?php echo $footer_contact_info_item_label_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_item_label_font_style ) ) {
    ?>
    :root {
    --footer-contact-info-label-font-style: <?php echo $footer_contact_info_item_label_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_contact_info_item_label_text_transform ) ) {
    ?>
    :root {
    --footer-contact-info-label-text-transform: <?php echo $footer_contact_info_item_label_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_label_letter_spacing ) && $footer_contact_info_item_label_letter_spacing != '' ) {
    ?>
    :root {
    --footer-contact-info-label-letter-spacing: <?php echo $footer_contact_info_item_label_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_contact_info_item_label_letter_spacing_mobile ) && $footer_contact_info_item_label_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-contact-info-label-letter-spacing-mobile: <?php echo $footer_contact_info_item_label_letter_spacing_mobile; ?>px;
    }
    <?php
  }





  $css = ob_get_clean();
  return $css;

}
