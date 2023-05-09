<?php

/**
 * REGISTER CUSTOMIZER HEADER BRANDING OPTIONS
 **/

function theme_customize_register_header_branding( $wp_customize ) {


  /**
   * Create Header Branding Options Section
   **/

  $wp_customize->add_section( 'header_branding_options' , array(
    'title'      => __( 'Header Branding Style Options', 'dream' ),
    'priority'   => 60,
  ) );

  /**
   * Header Branding Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_branding_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_branding_width', array(
    'label' => 'Header Branding Width',
    'section' => 'header_branding_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default width for header branding.'
  ) ) );

  // Header Branding Width
  $wp_customize->add_setting( 'header_branding_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_width',
    array(
      'label' => __( 'Header Branding Width' ),
      'description' => __( 'Enter a px value for the header branding width.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  /**
   * Header Branding Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_branding_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_branding_margin', array(
    'label' => 'Header Branding Margin',
    'section' => 'header_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default margin for header branding.'
  ) ) );

  // Header Branding Mobile Margin Top
  $wp_customize->add_setting( 'header_branding_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_mobile_margin_top',
    array(
      'label' => __( 'Header Branding Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the header branding top mobile margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Mobile Margin Bottom
  $wp_customize->add_setting( 'header_branding_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_mobile_margin_bottom',
    array(
      'label' => __( 'Header Branding Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the header branding bottom mobile margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Mobile Margin Left
  $wp_customize->add_setting( 'header_branding_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_mobile_margin_left',
    array(
      'label' => __( 'Header Branding Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the header branding left mobile margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Mobile Margin Right
  $wp_customize->add_setting( 'header_branding_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_mobile_margin_right',
    array(
      'label' => __( 'Header Branding Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the header branding right mobile margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Margin Top
  $wp_customize->add_setting( 'header_branding_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_margin_top',
    array(
      'label' => __( 'Header Branding Margin Top' ),
      'description' => __( 'Enter a px value for the header branding top margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Margin Bottom
  $wp_customize->add_setting( 'header_branding_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_margin_bottom',
    array(
      'label' => __( 'Header Branding Margin Bottom' ),
      'description' => __( 'Enter a px value for the header branding bottom margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Margin Left
  $wp_customize->add_setting( 'header_branding_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_margin_left',
    array(
      'label' => __( 'Header Branding Margin Left' ),
      'description' => __( 'Enter a px value for the header branding left margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Margin Right
  $wp_customize->add_setting( 'header_branding_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_margin_right',
    array(
      'label' => __( 'Header Branding Margin Right' ),
      'description' => __( 'Enter a px value for the header branding right margin.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );


  /**
   * Header Branding Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_branding_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_branding_text', array(
    'label' => 'Header Branding Text',
    'section' => 'header_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for header branding.'
  ) ) );

  // Header Branding Font Size
  $wp_customize->add_setting( 'header_branding_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_font_size',
    array(
      'label' => __( 'Header Branding Font Size' ),
      'description' => __( 'Enter a px value for header branding font size.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Font Size Mobile
  $wp_customize->add_setting( 'header_branding_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_font_size_mobile',
    array(
      'label' => __( 'Header Branding Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile header branding font size.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Line Height
  $wp_customize->add_setting( 'header_branding_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_line_height',
    array(
      'label' => __( 'Header Branding Line Height' ),
      'description' => __( 'Enter a px value for header branding line height.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Line Height Mobile
  $wp_customize->add_setting( 'header_branding_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_line_height_mobile',
    array(
      'label' => __( 'Header Branding Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile header branding line height.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Branding Font Weight
  $wp_customize->add_setting( 'header_branding_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_font_weight',
    array(
      'label' => __( 'Header Branding Font Weight' ),
      'description' => __( 'Select a font weight for header branding.' ),
      'section' => 'header_branding_options',
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

  // Header Branding Font Style
  $wp_customize->add_setting( 'header_branding_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_font_style',
    array(
      'label' => __( 'Header Branding Font Style' ),
      'description' => __( 'Select a font style for header branding.' ),
      'section' => 'header_branding_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header Branding Text Transform
  $wp_customize->add_setting( 'header_branding_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_text_transform',
    array(
      'label' => __( 'Header Branding Text Transform' ),
      'description' => __( 'Select a transform style for header branding text.' ),
      'section' => 'header_branding_options',
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

  // Header Branding Letter Spacing
  $wp_customize->add_setting( 'header_branding_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_letter_spacing',
    array(
      'label' => __( 'Header Branding Letter Spacing' ),
      'description' => __( 'Enter a px value for header branding letter spacing.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Branding Letter Spacing Mobile
  $wp_customize->add_setting( 'header_branding_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_letter_spacing_mobile',
    array(
      'label' => __( 'Header Branding Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile header branding letter spacing.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  /**
   * Header Branding Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_branding_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_branding_text_shadow', array(
    'label' => 'Header Branding Text Shadow',
    'section' => 'header_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' header branding.'
  ) ) );

  // Header Branding Text Shadow X
  $wp_customize->add_setting( 'header_branding_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_text_shadow_x',
    array(
      'label' => __( 'Header Branding Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for header branding text shadow x-offset.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Branding Text Shadow Y
  $wp_customize->add_setting( 'header_branding_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_text_shadow_y',
    array(
      'label' => __( 'Header Branding Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header branding text shadow y-offset.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Branding Text Shadow Blur
  $wp_customize->add_setting( 'header_branding_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_text_shadow_blur',
    array(
      'label' => __( 'Header Branding Text Shadow Blur' ),
      'description' => __( 'Enter a px value for header branding text shadow blur.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Header Slogan Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_slogan_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_slogan_text', array(
    'label' => 'Header Slogan Text',
    'section' => 'header_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for header slogan.'
  ) ) );

  // Header Slogan Font Size
  $wp_customize->add_setting( 'header_slogan_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_font_size',
    array(
      'label' => __( 'Header Slogan Font Size' ),
      'description' => __( 'Enter a px value for header slogan font size.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Slogan Font Size Mobile
  $wp_customize->add_setting( 'header_slogan_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_font_size_mobile',
    array(
      'label' => __( 'Header Slogan Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile header slogan font size.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Slogan Line Height
  $wp_customize->add_setting( 'header_slogan_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_line_height',
    array(
      'label' => __( 'Header Slogan Line Height' ),
      'description' => __( 'Enter a px value for header slogan line height.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Slogan Line Height Mobile
  $wp_customize->add_setting( 'header_slogan_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_line_height_mobile',
    array(
      'label' => __( 'Header Slogan Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile header slogan line height.' ),
      'section' => 'header_branding_options',
      'type' => 'number'
    )
  );

  // Header Slogan Font Weight
  $wp_customize->add_setting( 'header_slogan_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_font_weight',
    array(
      'label' => __( 'Header Slogan Font Weight' ),
      'description' => __( 'Select a font weight for header slogan.' ),
      'section' => 'header_branding_options',
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

  // Header Slogan Font Style
  $wp_customize->add_setting( 'header_slogan_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_font_style',
    array(
      'label' => __( 'Header Slogan Font Style' ),
      'description' => __( 'Select a font style for header slogan.' ),
      'section' => 'header_branding_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Header Slogan Text Transform
  $wp_customize->add_setting( 'header_slogan_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_text_transform',
    array(
      'label' => __( 'Header Slogan Text Transform' ),
      'description' => __( 'Select a transform style for header slogan text.' ),
      'section' => 'header_branding_options',
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

  // Header Slogan Letter Spacing
  $wp_customize->add_setting( 'header_slogan_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_letter_spacing',
    array(
      'label' => __( 'Header Slogan Letter Spacing' ),
      'description' => __( 'Enter a px value for header slogan letter spacing.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Slogan Letter Spacing Mobile
  $wp_customize->add_setting( 'header_slogan_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_letter_spacing_mobile',
    array(
      'label' => __( 'Header Slogan Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile header slogan letter spacing.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  /**
   * Header Slogan Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_slogan_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_slogan_text_shadow', array(
    'label' => 'Header Slogan Text Shadow',
    'section' => 'header_branding_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define text shadow for \'default\' header slogan.'
  ) ) );

  // Header Slogan Text Shadow X
  $wp_customize->add_setting( 'header_slogan_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_text_shadow_x',
    array(
      'label' => __( 'Header Slogan Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for header slogan text shadow x-offset.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Slogan Text Shadow Y
  $wp_customize->add_setting( 'header_slogan_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_slogan_text_shadow_y',
    array(
      'label' => __( 'Header Slogan Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header slogan text shadow y-offset.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Slogan Text Shadow Blur
  $wp_customize->add_setting( 'header_branding_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_branding_text_shadow_blur',
    array(
      'label' => __( 'Header Slogan Text Shadow Blur' ),
      'description' => __( 'Enter a px value for header slogan text shadow blur.' ),
      'section' => 'header_branding_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );



}

add_action( 'customize_register', 'theme_customize_register_header_branding' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_header_branding() {
  ob_start();

  /**
   * Header Branding Width
   **/

  $header_branding_width = get_theme_mod( 'header_branding_width', '' );

  if ( !empty( $header_branding_width ) ) {
    ?>
    :root {
    --branding-width: <?php echo $header_branding_width; ?>px;
    }
    <?php
  }

  /**
   * Header Branding Margin
   **/

  $header_branding_mobile_margin_top = get_theme_mod( 'header_branding_mobile_margin_top', '' );
  $header_branding_mobile_margin_bottom = get_theme_mod( 'header_branding_mobile_margin_bottom', '' );
  $header_branding_mobile_margin_left = get_theme_mod( 'header_branding_mobile_margin_left', '' );
  $header_branding_mobile_margin_right = get_theme_mod( 'header_branding_mobile_margin_right', '' );
  $header_branding_margin_top = get_theme_mod( 'header_branding_margin_top', '' );
  $header_branding_margin_bottom = get_theme_mod( 'header_branding_margin_bottom', '' );
  $header_branding_margin_left = get_theme_mod( 'header_branding_margin_left', '' );
  $header_branding_margin_right = get_theme_mod( 'header_branding_margin_right', '' );

  if ( isset( $header_branding_mobile_margin_top ) && $header_branding_mobile_margin_top != '' ) {
    ?>
    :root {
    --branding-margin-top-mobile: <?php echo $header_branding_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_mobile_margin_bottom ) && $header_branding_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --branding-margin-bottom-mobile: <?php echo $header_branding_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_mobile_margin_left ) && $header_branding_mobile_margin_left != '' ) {
    ?>
    :root {
    --branding-margin-left-mobile: <?php echo $header_branding_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_mobile_margin_right ) && $header_branding_mobile_margin_right != '' ) {
    ?>
    :root {
    --branding-margin-right-mobile: <?php echo $header_branding_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_margin_top ) && $header_branding_margin_top != '' ) {
    ?>
    :root {
    --branding-margin-top: <?php echo $header_branding_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_margin_bottom ) && $header_branding_margin_bottom != '' ) {
    ?>
    :root {
    --branding-margin-bottom: <?php echo $header_branding_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_margin_left ) && $header_branding_margin_left != '' ) {
    ?>
    :root {
    --branding-margin-left: <?php echo $header_branding_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_margin_right ) && $header_branding_margin_right != '' ) {
    ?>
    :root {
    --branding-margin-right: <?php echo $header_branding_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Header Branding Text
   **/

  $header_branding_font_size = get_theme_mod( 'header_branding_font_size', '' );
  $header_branding_font_size_mobile = get_theme_mod( 'header_branding_font_size_mobile', '' );
  $header_branding_line_height = get_theme_mod( 'header_branding_line_height', '' );
  $header_branding_line_height_mobile = get_theme_mod( 'header_branding_line_height_mobile', '' );
  $header_branding_font_weight = get_theme_mod( 'header_branding_font_weight', '' );
  $header_branding_font_style = get_theme_mod( 'header_branding_font_style', '' );
  $header_branding_text_transform = get_theme_mod( 'header_branding_text_transform', '' );
  $header_branding_letter_spacing = get_theme_mod( 'header_branding_letter_spacing', '' );
  $header_branding_letter_spacing_mobile = get_theme_mod( 'header_branding_letter_spacing_mobile', '' );

  if ( isset( $header_branding_font_size ) && $header_branding_font_size != '' ) {
    ?>
    :root {
    --branding-font-size: <?php echo $header_branding_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_font_size_mobile ) && $header_branding_font_size_mobile != '' ) {
    ?>
    :root {
    --branding-font-size-mobile: <?php echo $header_branding_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_line_height ) && $header_branding_line_height != '' ) {
    ?>
    :root {
    --branding-line-height: <?php echo $header_branding_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_line_height_mobile ) && $header_branding_line_height_mobile != '' ) {
    ?>
    :root {
    --branding-line-height-mobile: <?php echo $header_branding_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $header_branding_font_weight ) ) {
    ?>
    :root {
    --branding-font-weight: <?php echo $header_branding_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $header_branding_font_style ) ) {
    ?>
    :root {
    --branding-font-style: <?php echo $header_branding_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_branding_text_transform ) ) {
    ?>
    :root {
    --branding-text-transform: <?php echo $header_branding_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $header_branding_letter_spacing ) && $header_branding_letter_spacing != '' ) {
    ?>
    :root {
    --branding-letter-spacing: <?php echo $header_branding_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_letter_spacing_mobile ) && $header_branding_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --branding-letter-spacing-mobile: <?php echo $header_branding_letter_spacing_mobile; ?>px;
    }
    <?php
  }


  /**
   * Header Branding Text Shadow
   **/

  $header_branding_text_shadow_x = get_theme_mod( 'header_branding_text_shadow_x', '' );
  $header_branding_text_shadow_y = get_theme_mod( 'header_branding_text_shadow_y', '' );
  $header_branding_text_shadow_blur = get_theme_mod( 'header_branding_text_shadow_blur', '' );

  if ( isset( $header_branding_text_shadow_x ) && $header_branding_text_shadow_x != '' ) {
    ?>
    :root {
    --branding-text-shadow-x: <?php echo $header_branding_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_text_shadow_y ) && $header_branding_text_shadow_y != '' ) {
    ?>
    :root {
    --branding-text-shadow-y: <?php echo $header_branding_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_branding_text_shadow_blur ) && $header_branding_text_shadow_blur != '' ) {
    ?>
    :root {
    --branding-text-shadow-blur: <?php echo $header_branding_text_shadow_blur; ?>px;
    }
    <?php
  }


  /**
   * Header Slogan Text
   **/

  $header_slogan_font_size = get_theme_mod( 'header_slogan_font_size', '' );
  $header_slogan_font_size_mobile = get_theme_mod( 'header_slogan_font_size_mobile', '' );
  $header_slogan_line_height = get_theme_mod( 'header_slogan_line_height', '' );
  $header_slogan_line_height_mobile = get_theme_mod( 'header_slogan_line_height_mobile', '' );
  $header_slogan_font_weight = get_theme_mod( 'header_slogan_font_weight', '' );
  $header_slogan_font_style = get_theme_mod( 'header_slogan_font_style', '' );
  $header_slogan_text_transform = get_theme_mod( 'header_slogan_text_transform', '' );
  $header_slogan_letter_spacing = get_theme_mod( 'header_slogan_letter_spacing', '' );
  $header_slogan_letter_spacing_mobile = get_theme_mod( 'header_slogan_letter_spacing_mobile', '' );

  if ( isset( $header_slogan_font_size ) && $header_slogan_font_size != '' ) {
    ?>
    :root {
    --slogan-font-size: <?php echo $header_slogan_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $header_slogan_font_size_mobile ) && $header_slogan_font_size_mobile != '' ) {
    ?>
    :root {
    --slogan-font-size-mobile: <?php echo $header_slogan_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $header_slogan_line_height ) && $header_slogan_line_height != '' ) {
    ?>
    :root {
    --slogan-line-height: <?php echo $header_slogan_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $header_slogan_line_height_mobile ) && $header_slogan_line_height_mobile != '' ) {
    ?>
    :root {
    --slogan-line-height-mobile: <?php echo $header_slogan_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $header_slogan_font_weight ) ) {
    ?>
    :root {
    --slogan-font-weight: <?php echo $header_slogan_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $header_slogan_font_style ) ) {
    ?>
    :root {
    --slogan-font-style: <?php echo $header_slogan_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_slogan_text_transform ) ) {
    ?>
    :root {
    --slogan-text-transform: <?php echo $header_slogan_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $header_slogan_letter_spacing ) && $header_slogan_letter_spacing != '' ) {
    ?>
    :root {
    --slogan-letter-spacing: <?php echo $header_slogan_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $header_slogan_letter_spacing_mobile ) && $header_slogan_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --slogan-letter-spacing-mobile: <?php echo $header_slogan_letter_spacing_mobile; ?>px;
    }
    <?php
  }


  /**
   * Header Slogan Text Shadow
   **/

  $header_slogan_text_shadow_x = get_theme_mod( 'header_slogan_text_shadow_x', '' );
  $header_slogan_text_shadow_y = get_theme_mod( 'header_slogan_text_shadow_y', '' );
  $header_slogan_text_shadow_blur = get_theme_mod( 'header_slogan_text_shadow_blur', '' );

  if ( isset( $header_slogan_text_shadow_x ) && $header_slogan_text_shadow_x != '' ) {
    ?>
    :root {
    --slogan-text-shadow-x: <?php echo $header_slogan_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_slogan_text_shadow_y ) && $header_slogan_text_shadow_y != '' ) {
    ?>
    :root {
    --slogan-text-shadow-y: <?php echo $header_slogan_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_slogan_text_shadow_blur ) && $header_slogan_text_shadow_blur != '' ) {
    ?>
    :root {
    --slogan-text-shadow-blur: <?php echo $header_slogan_text_shadow_blur; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
