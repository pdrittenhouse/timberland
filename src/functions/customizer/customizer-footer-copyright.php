<?php

/**
 * REGISTER CUSTOMIZER FOOTER COPYRIGHT OPTIONS
 **/

function theme_customize_register_footer_copyright( $wp_customize ) {


  /**
   * Create Footer Copyright Options Section
   **/

  $wp_customize->add_section( 'footer_copyright_options' , array(
    'title'      => __( 'Footer Copyright Style Options', 'dream' ),
    'priority'   => 91,
  ) );

  /**
   * Footer Copyright Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_copyright_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_copyright_margin', array(
    'label' => 'Footer Copyright Margin',
    'section' => 'footer_copyright_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define margin for \'default\' footer copyright.'
  ) ) );

  // Footer Copyright Mobile Margin Top
  $wp_customize->add_setting( 'footer_copyright_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_mobile_margin_top',
    array(
      'label' => __( 'Footer Copyright Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the footer copyright top mobile margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Mobile Margin Bottom
  $wp_customize->add_setting( 'footer_copyright_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_mobile_margin_bottom',
    array(
      'label' => __( 'Footer Copyright Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer copyright bottom mobile margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Mobile Margin Left
  $wp_customize->add_setting( 'footer_copyright_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_mobile_margin_left',
    array(
      'label' => __( 'Footer Copyright Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the footer copyright left mobile margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Mobile Margin Right
  $wp_customize->add_setting( 'footer_copyright_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_mobile_margin_right',
    array(
      'label' => __( 'Footer Copyright Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the footer copyright right mobile margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Margin Top
  $wp_customize->add_setting( 'footer_copyright_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_margin_top',
    array(
      'label' => __( 'Footer Copyright Margin Top' ),
      'description' => __( 'Enter a px value for the footer copyright top margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Margin Bottom
  $wp_customize->add_setting( 'footer_copyright_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_margin_bottom',
    array(
      'label' => __( 'Footer Copyright Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer copyright bottom margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Margin Left
  $wp_customize->add_setting( 'footer_copyright_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_margin_left',
    array(
      'label' => __( 'Footer Copyright Margin Left' ),
      'description' => __( 'Enter a px value for the footer copyright left margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Margin Right
  $wp_customize->add_setting( 'footer_copyright_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_margin_right',
    array(
      'label' => __( 'Footer Copyright Margin Right' ),
      'description' => __( 'Enter a px value for the footer copyright right margin.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Copyright Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_copyright_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_copyright_padding', array(
    'label' => 'Footer Copyright Padding',
    'section' => 'footer_copyright_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define padding for \'default\' footer copyright.'
  ) ) );

  // Footer Copyright Vertical Padding
  $wp_customize->add_setting( 'footer_copyright_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_vertical_padding',
    array(
      'label' => __( 'Footer Copyright Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer copyright.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Mobile Vertical Padding
  $wp_customize->add_setting( 'footer_copyright_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_mobile_vertical_padding',
    array(
      'label' => __( 'Footer Copyright Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile footer copyright.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Horizontal Padding
  $wp_customize->add_setting( 'footer_copyright_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_horizontal_padding',
    array(
      'label' => __( 'Footer Copyright Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer copyright.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Mobile Horizontal Padding
  $wp_customize->add_setting( 'footer_copyright_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_mobile_horizontal_padding',
    array(
      'label' => __( 'Footer Copyright Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile footer copyright.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Copyright Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_copyright_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_copyright_text', array(
    'label' => 'Footer Copyright Text',
    'section' => 'footer_copyright_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for footer copyright.'
  ) ) );

  // Footer Copyright Font Size
  $wp_customize->add_setting( 'footer_copyright_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_font_size',
    array(
      'label' => __( 'Footer Copyright Font Size' ),
      'description' => __( 'Enter a px value for footer copyright font size.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Font Size Mobile
  $wp_customize->add_setting( 'footer_copyright_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_font_size_mobile',
    array(
      'label' => __( 'Footer Copyright Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer copyright font size.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Line Height Mobile
  $wp_customize->add_setting( 'footer_copyright_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_line_height_mobile',
    array(
      'label' => __( 'Footer Copyright Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer copyright line height.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Line Height
  $wp_customize->add_setting( 'footer_copyright_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_line_height',
    array(
      'label' => __( 'Footer Copyright Line Height' ),
      'description' => __( 'Enter a px value for footer copyright line height.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number'
    )
  );

  // Footer Copyright Font Weight
  $wp_customize->add_setting( 'footer_copyright_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_font_weight',
    array(
      'label' => __( 'Footer Copyright Font Weight' ),
      'description' => __( 'Select a font weight for footer copyright.' ),
      'section' => 'footer_copyright_options',
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

  // Footer Copyright Font Style
  $wp_customize->add_setting( 'footer_copyright_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_font_style',
    array(
      'label' => __( 'Footer Copyright Font Style' ),
      'description' => __( 'Select a font style for footer copyright.' ),
      'section' => 'footer_copyright_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Copyright Text Transform
  $wp_customize->add_setting( 'footer_copyright_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_text_transform',
    array(
      'label' => __( 'Footer Copyright Text Transform' ),
      'description' => __( 'Select a transform style for footer copyright text.' ),
      'section' => 'footer_copyright_options',
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

  // Footer Copyright Letter Spacing
  $wp_customize->add_setting( 'footer_copyright_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_letter_spacing',
    array(
      'label' => __( 'Footer Copyright Letter Spacing' ),
      'description' => __( 'Enter a px value for footer copyright letter spacing.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Copyright Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_copyright_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_copyright_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Copyright Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer copyright letter spacing.' ),
      'section' => 'footer_copyright_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_footer_copyright' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_copyright() {
  ob_start();

  /**
   * Footer Copyright Margin
   **/

  $footer_copyright_mobile_margin_top = get_theme_mod( 'footer_copyright_mobile_margin_top', '' );
  $footer_copyright_mobile_margin_bottom = get_theme_mod( 'footer_copyright_mobile_margin_bottom', '' );
  $footer_copyright_mobile_margin_left = get_theme_mod( 'footer_copyright_mobile_margin_left', '' );
  $footer_copyright_mobile_margin_right = get_theme_mod( 'footer_copyright_mobile_margin_right', '' );
  $footer_copyright_margin_top = get_theme_mod( 'footer_copyright_margin_top', '' );
  $footer_copyright_margin_bottom = get_theme_mod( 'footer_copyright_margin_bottom', '' );
  $footer_copyright_margin_left = get_theme_mod( 'footer_copyright_margin_left', '' );
  $footer_copyright_margin_right = get_theme_mod( 'footer_copyright_margin_right', '' );

  if ( isset( $footer_copyright_mobile_margin_top  ) && $footer_copyright_mobile_margin_top != '' ) {
    ?>
    :root {
    --footer-copyright-margin-top-mobile: <?php echo $footer_copyright_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_mobile_margin_bottom ) && $footer_copyright_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --footer-copyright-margin-bottom-mobile: <?php echo $footer_copyright_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_mobile_margin_left ) && $footer_copyright_mobile_margin_left != '' ) {
    ?>
    :root {
    --footer-copyright-margin-left-mobile: <?php echo $footer_copyright_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_mobile_margin_right ) && $footer_copyright_mobile_margin_right != '' ) {
    ?>
    :root {
    --footer-copyright-margin-right-mobile: <?php echo $footer_copyright_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_margin_top ) && $footer_copyright_margin_top != '' ) {
    ?>
    :root {
    --footer-copyright-margin-top: <?php echo $footer_copyright_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_margin_bottom ) && $footer_copyright_margin_bottom != '' ) {
    ?>
    :root {
    --footer-copyright-margin-bottom: <?php echo $footer_copyright_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_margin_left ) && $footer_copyright_margin_left != '' ) {
    ?>
    :root {
    --footer-copyright-margin-left: <?php echo $footer_copyright_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_margin_right ) && $footer_copyright_margin_right != '' ) {
    ?>
    :root {
    --footer-copyright-margin-right: <?php echo $footer_copyright_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Footer Copyright Padding
   **/

  $footer_copyright_vertical_padding = get_theme_mod( 'footer_copyright_vertical_padding', '' );
  $footer_copyright_horizontal_padding = get_theme_mod( 'footer_copyright_horizontal_padding', '' );
  $footer_copyright_mobile_vertical_padding = get_theme_mod( 'footer_copyright_mobile_vertical_padding', '' );
  $footer_copyright_mobile_horizontal_padding = get_theme_mod( 'footer_copyright_mobile_horizontal_padding', '' );

  if ( isset( $footer_copyright_vertical_padding ) && $footer_copyright_vertical_padding != '' ) {
    ?>
    :root {
    --footer-copyright-vertical-padding: <?php echo $footer_copyright_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_horizontal_padding ) && $footer_copyright_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-copyright-horizontal-padding: <?php echo $footer_copyright_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_mobile_vertical_padding ) && $footer_copyright_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --footer-copyright-vertical-padding-mobile: <?php echo $footer_copyright_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_mobile_horizontal_padding ) && $footer_copyright_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-copyright-horizontal-padding-mobile: <?php echo $footer_copyright_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Footer Copyright Text
   **/

  $footer_copyright_font_size = get_theme_mod( 'footer_copyright_font_size', '' );
  $footer_copyright_font_size_mobile = get_theme_mod( 'footer_copyright_font_size_mobile', '' );
  $footer_copyright_line_height = get_theme_mod( 'footer_copyright_line_height', '' );
  $footer_copyright_line_height_mobile = get_theme_mod( 'footer_copyright_line_height_mobile', '' );
  $footer_copyright_font_weight = get_theme_mod( 'footer_copyright_font_weight', '' );
  $footer_copyright_font_style = get_theme_mod( 'footer_copyright_font_style', '' );
  $footer_copyright_text_transform = get_theme_mod( 'footer_copyright_text_transform', '' );
  $footer_copyright_letter_spacing = get_theme_mod( 'footer_copyright_letter_spacing', '' );
  $footer_copyright_letter_spacing_mobile = get_theme_mod( 'footer_copyright_letter_spacing_mobile', '' );

  if ( isset( $footer_copyright_font_size ) && $footer_copyright_font_size != '' ) {
    ?>
    :root {
    --footer-copyright-font-size: <?php echo $footer_copyright_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_font_size_mobile ) && $footer_copyright_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-copyright-font-size-mobile: <?php echo $footer_copyright_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_line_height ) && $footer_copyright_line_height != '' ) {
    ?>
    :root {
    --footer-copyright-line-height: <?php echo $footer_copyright_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_line_height_mobile ) && $footer_copyright_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-copyright-line-height-mobile: <?php echo $footer_copyright_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_copyright_font_weight ) ) {
    ?>
    :root {
    --footer-copyright-font-weight: <?php echo $footer_copyright_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_copyright_font_style ) ) {
    ?>
    :root {
    --footer-copyright-font-style: <?php echo $footer_copyright_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_copyright_text_transform ) ) {
    ?>
    :root {
    --footer-copyright-text-transform: <?php echo $footer_copyright_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_copyright_letter_spacing ) && $footer_copyright_letter_spacing != '' ) {
    ?>
    :root {
    --footer-copyright-letter-spacing: <?php echo $footer_copyright_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_copyright_letter_spacing_mobile ) && $footer_copyright_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-copyright-letter-spacing-mobile: <?php echo $footer_copyright_letter_spacing_mobile; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
