<?php

/**
 * REGISTER CUSTOMIZER FOOTER BRANDING OPTIONS
 **/

function theme_customize_register_footer_branding( $wp_customize ) {


  /**
   * Create Footer Branding Options Section
   **/

  $wp_customize->add_section( 'footer_branding_options' , array(
    'title'      => __( 'Footer Branding Style Options', 'dream' ),
    'priority'   => 82,
  ) );

  /**
   * Footer Branding Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_branding_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_branding_width', array(
    'label' => 'Footer Branding Width',
    'section' => 'footer_branding_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default width for footer branding.'
  ) ) );

  // Footer Branding Width
  $wp_customize->add_setting( 'footer_branding_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_width',
    array(
      'label' => __( 'Footer Branding Width' ),
      'description' => __( 'Enter a px value for the footer branding width.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  /**
   * Footer Branding Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_branding_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_branding_margin', array(
    'label' => 'Footer Branding Margin',
    'section' => 'footer_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default margin for footer branding.'
  ) ) );

  // Footer Branding Mobile Margin Top
  $wp_customize->add_setting( 'footer_branding_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_mobile_margin_top',
    array(
      'label' => __( 'Footer Branding Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the footer branding top mobile margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Mobile Margin Bottom
  $wp_customize->add_setting( 'footer_branding_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_mobile_margin_bottom',
    array(
      'label' => __( 'Footer Branding Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer branding bottom mobile margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Mobile Margin Left
  $wp_customize->add_setting( 'footer_branding_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_mobile_margin_left',
    array(
      'label' => __( 'Footer Branding Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the footer branding left mobile margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Mobile Margin Right
  $wp_customize->add_setting( 'footer_branding_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_mobile_margin_right',
    array(
      'label' => __( 'Footer Branding Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the footer branding right mobile margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Margin Top
  $wp_customize->add_setting( 'footer_branding_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_margin_top',
    array(
      'label' => __( 'Footer Branding Margin Top' ),
      'description' => __( 'Enter a px value for the footer branding top margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Margin Bottom
  $wp_customize->add_setting( 'footer_branding_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_margin_bottom',
    array(
      'label' => __( 'Footer Branding Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer branding bottom margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Margin Left
  $wp_customize->add_setting( 'footer_branding_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_margin_left',
    array(
      'label' => __( 'Footer Branding Margin Left' ),
      'description' => __( 'Enter a px value for the footer branding left margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Margin Right
  $wp_customize->add_setting( 'footer_branding_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_margin_right',
    array(
      'label' => __( 'Footer Branding Margin Right' ),
      'description' => __( 'Enter a px value for the footer branding right margin.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Branding Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_branding_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_branding_text', array(
    'label' => 'Footer Branding Text',
    'section' => 'footer_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for footer branding.'
  ) ) );

  // Footer Branding Font Size
  $wp_customize->add_setting( 'footer_branding_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_font_size',
    array(
      'label' => __( 'Footer Branding Font Size' ),
      'description' => __( 'Enter a px value for footer branding font size.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Font Size Mobile
  $wp_customize->add_setting( 'footer_branding_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_font_size_mobile',
    array(
      'label' => __( 'Footer Branding Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer branding font size.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Line Height Mobile
  $wp_customize->add_setting( 'footer_branding_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_line_height_mobile',
    array(
      'label' => __( 'Footer Branding Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer branding line height.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Line Height
  $wp_customize->add_setting( 'footer_branding_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_line_height',
    array(
      'label' => __( 'Footer Branding Line Height' ),
      'description' => __( 'Enter a px value for footer branding line height.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Branding Font Weight
  $wp_customize->add_setting( 'footer_branding_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_font_weight',
    array(
      'label' => __( 'Footer Branding Font Weight' ),
      'description' => __( 'Select a font weight for footer branding.' ),
      'section' => 'footer_branding_options',
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

  // Footer Branding Font Style
  $wp_customize->add_setting( 'footer_branding_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_font_style',
    array(
      'label' => __( 'Footer Branding Font Style' ),
      'description' => __( 'Select a font style for footer branding.' ),
      'section' => 'footer_branding_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Branding Text Transform
  $wp_customize->add_setting( 'footer_branding_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_text_transform',
    array(
      'label' => __( 'Footer Branding Text Transform' ),
      'description' => __( 'Select a transform style for footer branding text.' ),
      'section' => 'footer_branding_options',
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

  // Footer Branding Letter Spacing
  $wp_customize->add_setting( 'footer_branding_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_letter_spacing',
    array(
      'label' => __( 'Footer Branding Letter Spacing' ),
      'description' => __( 'Enter a px value for footer branding letter spacing.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Branding Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_branding_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Branding Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer branding letter spacing.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  /**
   * Footer Branding Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_branding_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_branding_text_shadow', array(
    'label' => 'Footer Branding Text Shadow',
    'section' => 'footer_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' footer branding.'
  ) ) );

  // Footer Branding Text Shadow X
  $wp_customize->add_setting( 'footer_branding_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_text_shadow_x',
    array(
      'label' => __( 'Footer Branding Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer branding text shadow x-offset.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Branding Text Shadow Y
  $wp_customize->add_setting( 'footer_branding_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_text_shadow_y',
    array(
      'label' => __( 'Footer Branding Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer branding text shadow y-offset.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Branding Text Shadow Blur
  $wp_customize->add_setting( 'footer_branding_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_text_shadow_blur',
    array(
      'label' => __( 'Footer Branding Text Shadow Blur' ),
      'description' => __( 'Enter a px value for footer branding text shadow blur.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Footer Slogan Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_slogan_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_slogan_text', array(
    'label' => 'Footer Slogan Text',
    'section' => 'footer_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for footer slogan.'
  ) ) );

  // Footer Slogan Font Size
  $wp_customize->add_setting( 'footer_slogan_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_font_size',
    array(
      'label' => __( 'Footer Slogan Font Size' ),
      'description' => __( 'Enter a px value for footer slogan font size.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Slogan Font Size Mobile
  $wp_customize->add_setting( 'footer_slogan_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_font_size_mobile',
    array(
      'label' => __( 'Footer Slogan Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer slogan font size.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Slogan Line Height
  $wp_customize->add_setting( 'footer_slogan_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_line_height',
    array(
      'label' => __( 'Footer Slogan Line Height' ),
      'description' => __( 'Enter a px value for footer slogan line height.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Slogan Line Height Mobile
  $wp_customize->add_setting( 'footer_slogan_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_line_height_mobile',
    array(
      'label' => __( 'Footer Slogan Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer slogan line height.' ),
      'section' => 'footer_branding_options',
      'type' => 'number'
    )
  );

  // Footer Slogan Font Weight
  $wp_customize->add_setting( 'footer_slogan_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_font_weight',
    array(
      'label' => __( 'Footer Slogan Font Weight' ),
      'description' => __( 'Select a font weight for footer slogan.' ),
      'section' => 'footer_branding_options',
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

  // Footer Slogan Font Style
  $wp_customize->add_setting( 'footer_slogan_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_font_style',
    array(
      'label' => __( 'Footer Slogan Font Style' ),
      'description' => __( 'Select a font style for footer slogan.' ),
      'section' => 'footer_branding_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Slogan Text Transform
  $wp_customize->add_setting( 'footer_slogan_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_text_transform',
    array(
      'label' => __( 'Footer Slogan Text Transform' ),
      'description' => __( 'Select a transform style for footer slogan text.' ),
      'section' => 'footer_branding_options',
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

  // Footer Slogan Letter Spacing
  $wp_customize->add_setting( 'footer_slogan_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_letter_spacing',
    array(
      'label' => __( 'Footer Slogan Letter Spacing' ),
      'description' => __( 'Enter a px value for footer slogan letter spacing.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Slogan Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_slogan_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Slogan Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer slogan letter spacing.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  /**
   * Footer Slogan Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_slogan_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_slogan_text_shadow', array(
    'label' => 'Footer Slogan Text Shadow',
    'section' => 'footer_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' footer slogan.'
  ) ) );

  // Footer Slogan Text Shadow X
  $wp_customize->add_setting( 'footer_slogan_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_text_shadow_x',
    array(
      'label' => __( 'Footer Slogan Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer slogan text shadow x-offset.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Slogan Text Shadow Y
  $wp_customize->add_setting( 'footer_slogan_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_slogan_text_shadow_y',
    array(
      'label' => __( 'Footer Slogan Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer slogan text shadow y-offset.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Slogan Text Shadow Blur
  $wp_customize->add_setting( 'footer_branding_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_branding_text_shadow_blur',
    array(
      'label' => __( 'Footer Slogan Text Shadow Blur' ),
      'description' => __( 'Enter a px value for footer slogan text shadow blur.' ),
      'section' => 'footer_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );



}

add_action( 'customize_register', 'theme_customize_register_footer_branding' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_branding() {
  ob_start();

  /**
   * Footer Branding Width
   **/

  $footer_branding_width = get_theme_mod( 'footer_branding_width', '' );

  if ( !empty( $footer_branding_width ) ) {
    ?>
    :root {
    --footer-branding-width: <?php echo $footer_branding_width; ?>px;
    }
    <?php
  }

  /**
   * Footer Branding Margin
   **/

  $footer_branding_mobile_margin_top = get_theme_mod( 'footer_branding_mobile_margin_top', '' );
  $footer_branding_mobile_margin_bottom = get_theme_mod( 'footer_branding_mobile_margin_bottom', '' );
  $footer_branding_mobile_margin_left = get_theme_mod( 'footer_branding_mobile_margin_left', '' );
  $footer_branding_mobile_margin_right = get_theme_mod( 'footer_branding_mobile_margin_right', '' );
  $footer_branding_margin_top = get_theme_mod( 'footer_branding_margin_top', '' );
  $footer_branding_margin_bottom = get_theme_mod( 'footer_branding_margin_bottom', '' );
  $footer_branding_margin_left = get_theme_mod( 'footer_branding_margin_left', '' );
  $footer_branding_margin_right = get_theme_mod( 'footer_branding_margin_right', '' );

  if ( isset( $footer_branding_mobile_margin_top ) && $footer_branding_mobile_margin_top != '' ) {
    ?>
    :root {
    --footer-branding-margin-top-mobile: <?php echo $footer_branding_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_mobile_margin_bottom ) && $footer_branding_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --footer-branding-margin-bottom-mobile: <?php echo $footer_branding_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_mobile_margin_left ) && $footer_branding_mobile_margin_left != '' ) {
    ?>
    :root {
    --footer-branding-margin-left-mobile: <?php echo $footer_branding_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_mobile_margin_right ) && $footer_branding_mobile_margin_right != '' ) {
    ?>
    :root {
    --footer-branding-margin-right-mobile: <?php echo $footer_branding_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_margin_top ) && $footer_branding_margin_top != '' ) {
    ?>
    :root {
    --footer-branding-margin-top: <?php echo $footer_branding_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_margin_bottom ) && $footer_branding_margin_bottom != '' ) {
    ?>
    :root {
    --footer-branding-margin-bottom: <?php echo $footer_branding_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_margin_left ) && $footer_branding_margin_left != '' ) {
    ?>
    :root {
    --footer-branding-margin-left: <?php echo $footer_branding_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_margin_right ) && $footer_branding_margin_right != '' ) {
    ?>
    :root {
    --footer-branding-margin-right: <?php echo $footer_branding_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Footer Branding Text
   **/

  $footer_branding_font_size = get_theme_mod( 'footer_branding_font_size', '' );
  $footer_branding_font_size_mobile = get_theme_mod( 'footer_branding_font_size_mobile', '' );
  $footer_branding_line_height = get_theme_mod( 'footer_branding_line_height', '' );
  $footer_branding_line_height_mobile = get_theme_mod( 'footer_branding_line_height_mobile', '' );
  $footer_branding_font_weight = get_theme_mod( 'footer_branding_font_weight', '' );
  $footer_branding_font_style = get_theme_mod( 'footer_branding_font_style', '' );
  $footer_branding_text_transform = get_theme_mod( 'footer_branding_text_transform', '' );
  $footer_branding_letter_spacing = get_theme_mod( 'footer_branding_letter_spacing', '' );
  $footer_branding_letter_spacing_mobile = get_theme_mod( 'footer_branding_letter_spacing_mobile', '' );

  if ( isset( $footer_branding_font_size ) && $footer_branding_font_size != '' ) {
    ?>
    :root {
    --footer-branding-font-size: <?php echo $footer_branding_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_font_size_mobile ) && $footer_branding_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-branding-font-size-mobile: <?php echo $footer_branding_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_line_height ) && $footer_branding_line_height != '' ) {
    ?>
    :root {
    --footer-branding-line-height: <?php echo $footer_branding_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_line_height_mobile ) && $footer_branding_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-branding-line-height-mobile: <?php echo $footer_branding_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_branding_font_weight ) ) {
    ?>
    :root {
    --footer-branding-font-weight: <?php echo $footer_branding_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_branding_font_style ) ) {
    ?>
    :root {
    --footer-branding-font-style: <?php echo $footer_branding_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_branding_text_transform ) ) {
    ?>
    :root {
    --footer-branding-text-transform: <?php echo $footer_branding_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_branding_letter_spacing ) && $footer_branding_letter_spacing != '' ) {
    ?>
    :root {
    --footer-branding-letter-spacing: <?php echo $footer_branding_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_letter_spacing_mobile ) && $footer_branding_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-branding-letter-spacing-mobile: <?php echo $footer_branding_letter_spacing_mobile; ?>px;
    }
    <?php
  }


  /**
   * Footer Branding Text Shadow
   **/

  $footer_branding_text_shadow_x = get_theme_mod( 'footer_branding_text_shadow_x', '' );
  $footer_branding_text_shadow_y = get_theme_mod( 'footer_branding_text_shadow_y', '' );
  $footer_branding_text_shadow_blur = get_theme_mod( 'footer_branding_text_shadow_blur', '' );

  if ( isset( $footer_branding_text_shadow_x ) && $footer_branding_text_shadow_x != '' ) {
    ?>
    :root {
    --footer-branding-text-shadow-x: <?php echo $footer_branding_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_text_shadow_y ) && $footer_branding_text_shadow_y != '' ) {
    ?>
    :root {
    --footer-branding-text-shadow-y: <?php echo $footer_branding_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_branding_text_shadow_blur ) && $footer_branding_text_shadow_blur != '' ) {
    ?>
    :root {
    --footer-branding-text-shadow-blur: <?php echo $footer_branding_text_shadow_blur; ?>px;
    }
    <?php
  }


  /**
   * Footer Slogan Text
   **/

  $footer_slogan_font_size = get_theme_mod( 'footer_slogan_font_size', '' );
  $footer_slogan_font_size_mobile = get_theme_mod( 'footer_slogan_font_size_mobile', '' );
  $footer_slogan_line_height = get_theme_mod( 'footer_slogan_line_height', '' );
  $footer_slogan_line_height_mobile = get_theme_mod( 'footer_slogan_line_height_mobile', '' );
  $footer_slogan_font_weight = get_theme_mod( 'footer_slogan_font_weight', '' );
  $footer_slogan_font_style = get_theme_mod( 'footer_slogan_font_style', '' );
  $footer_slogan_text_transform = get_theme_mod( 'footer_slogan_text_transform', '' );
  $footer_slogan_letter_spacing = get_theme_mod( 'footer_slogan_letter_spacing', '' );
  $footer_slogan_letter_spacing_mobile = get_theme_mod( 'footer_slogan_letter_spacing_mobile', '' );

  if ( isset( $footer_slogan_font_size ) && $footer_slogan_font_size != '' ) {
    ?>
    :root {
    --footer-slogan-font-size: <?php echo $footer_slogan_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_slogan_font_size_mobile ) && $footer_slogan_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-slogan-font-size-mobile: <?php echo $footer_slogan_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_slogan_line_height ) && $footer_slogan_line_height != '' ) {
    ?>
    :root {
    --footer-slogan-line-height: <?php echo $footer_slogan_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_slogan_line_height_mobile ) && $footer_slogan_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-slogan-line-height_mobile: <?php echo $footer_slogan_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_slogan_font_weight ) ) {
    ?>
    :root {
    --footer-slogan-font-weight: <?php echo $footer_slogan_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_slogan_font_style ) ) {
    ?>
    :root {
    --footer-slogan-font-style: <?php echo $footer_slogan_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_slogan_text_transform ) ) {
    ?>
    :root {
    --footer-slogan-text-transform: <?php echo $footer_slogan_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_slogan_letter_spacing ) && $footer_slogan_letter_spacing != '' ) {
    ?>
    :root {
    --footer-slogan-letter-spacing: <?php echo $footer_slogan_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_slogan_letter_spacing_mobile ) && $footer_slogan_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-slogan-letter-spacing-mobile: <?php echo $footer_slogan_letter_spacing_mobile; ?>px;
    }
    <?php
  }


  /**
   * Footer Slogan Text Shadow
   **/

  $footer_slogan_text_shadow_x = get_theme_mod( 'footer_slogan_text_shadow_x', '' );
  $footer_slogan_text_shadow_y = get_theme_mod( 'footer_slogan_text_shadow_y', '' );
  $footer_slogan_text_shadow_blur = get_theme_mod( 'footer_slogan_text_shadow_blur', '' );

  if ( isset( $footer_slogan_text_shadow_x ) && $footer_slogan_text_shadow_x != '' ) {
    ?>
    :root {
    --footer-slogan-text-shadow-x: <?php echo $footer_slogan_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_slogan_text_shadow_y ) && $footer_slogan_text_shadow_y != '' ) {
    ?>
    :root {
    --footer-slogan-text-shadow-y: <?php echo $footer_slogan_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_slogan_text_shadow_blur ) && $footer_slogan_text_shadow_blur != '' ) {
    ?>
    :root {
    --footer-slogan-text-shadow-blur: <?php echo $footer_slogan_text_shadow_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
