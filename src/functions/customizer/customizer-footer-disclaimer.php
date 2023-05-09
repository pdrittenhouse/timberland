<?php

/**
 * REGISTER CUSTOMIZER FOOTER DISCLAIMER OPTIONS
 **/

function theme_customize_register_footer_disclaimer( $wp_customize ) {


  /**
   * Create Footer Disclaimer Options Section
   **/

  $wp_customize->add_section( 'footer_disclaimer_options' , array(
    'title'      => __( 'Footer Disclaimer Style Options', 'dream' ),
    'priority'   => 89,
  ) );


  /**
   * Footer Disclaimer Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_disclaimer_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_disclaimer_width', array(
    'label' => 'Footer Disclaimer Width',
    'section' => 'footer_disclaimer_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define \'default\' footer disclaimer width.'
  ) ) );

  // Footer Disclaimer Width Unit Selector
  $wp_customize->add_setting( 'unit_selector--footer_disclaimer_width',
    array(
      'default' => 'px',
      'transport'   => 'postMessage'
    )
  );

  $wp_customize->add_control( 'unit_selector--footer_disclaimer_width',
    array(
      'label' => __( 'Footer Disclaimer Width Unit' ),
      'description' => __( 'Select px, % or vw unit for footer disclaimer width.' ),
      'section' => 'navbar_options',
      'type' => 'radio',
      'choices' => array(
        'px' => __( 'px' ),
        'pct' => __( '%' ),
        'vw' => __( 'vw' )
      )
    )
  );

  // Footer Disclaimer Width Number Input
  $wp_customize->add_setting( 'number--footer_disclaimer_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'number--footer_disclaimer_width',
    array(
      'label' => __( 'Footer Disclaimer Width' ),
      'description' => __( 'Width for footer disclaimer. Use width left/right nav menu.' ),
      'section' => 'navbar_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Width Range Input
  $wp_customize->add_setting( 'range--footer_disclaimer_width' , array(
    'default'     => 0,
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'range--footer_disclaimer_width', array(
    'label'	=>  'Footer Disclaimer Width',
    'description' => __( 'Width for footer disclaimer. Use width left/right nav menu.' ),
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'section' => 'navbar_options',
  ) ) );


  /**
   * Footer Disclaimer Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_disclaimer_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_disclaimer_margin', array(
    'label' => 'Footer Disclaimer Margin',
    'section' => 'footer_disclaimer_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define margin for \'default\' footer disclaimer.'
  ) ) );

  // Footer Disclaimer Mobile Margin Top
  $wp_customize->add_setting( 'footer_disclaimer_mobile_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_mobile_margin_top',
    array(
      'label' => __( 'Footer Disclaimer Mobile Margin Top' ),
      'description' => __( 'Enter a px value for the footer disclaimer top mobile margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Mobile Margin Bottom
  $wp_customize->add_setting( 'footer_disclaimer_mobile_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_mobile_margin_bottom',
    array(
      'label' => __( 'Footer Disclaimer Mobile Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer disclaimer bottom mobile margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Mobile Margin Left
  $wp_customize->add_setting( 'footer_disclaimer_mobile_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_mobile_margin_left',
    array(
      'label' => __( 'Footer Disclaimer Mobile Margin Left' ),
      'description' => __( 'Enter a px value for the footer disclaimer left mobile margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Mobile Margin Right
  $wp_customize->add_setting( 'footer_disclaimer_mobile_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_mobile_margin_right',
    array(
      'label' => __( 'Footer Disclaimer Mobile Margin Right' ),
      'description' => __( 'Enter a px value for the footer disclaimer right mobile margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Margin Top
  $wp_customize->add_setting( 'footer_disclaimer_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_margin_top',
    array(
      'label' => __( 'Footer Disclaimer Margin Top' ),
      'description' => __( 'Enter a px value for the footer disclaimer top margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Margin Bottom
  $wp_customize->add_setting( 'footer_disclaimer_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_margin_bottom',
    array(
      'label' => __( 'Footer Disclaimer Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer disclaimer bottom margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Margin Left
  $wp_customize->add_setting( 'footer_disclaimer_margin_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_margin_left',
    array(
      'label' => __( 'Footer Disclaimer Margin Left' ),
      'description' => __( 'Enter a px value for the footer disclaimer left margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Margin Right
  $wp_customize->add_setting( 'footer_disclaimer_margin_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_margin_right',
    array(
      'label' => __( 'Footer Disclaimer Margin Right' ),
      'description' => __( 'Enter a px value for the footer disclaimer right margin.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Disclaimer Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_disclaimer_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_disclaimer_padding', array(
    'label' => 'Footer Disclaimer Padding',
    'section' => 'footer_disclaimer_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define padding for \'default\' footer disclaimer.'
  ) ) );

  // Footer Disclaimer Vertical Padding
  $wp_customize->add_setting( 'footer_disclaimer_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_vertical_padding',
    array(
      'label' => __( 'Footer Disclaimer Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer disclaimer.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Mobile Vertical Padding
  $wp_customize->add_setting( 'footer_disclaimer_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_mobile_vertical_padding',
    array(
      'label' => __( 'Footer Disclaimer Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile footer disclaimer.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Horizontal Padding
  $wp_customize->add_setting( 'footer_disclaimer_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_horizontal_padding',
    array(
      'label' => __( 'Footer Disclaimer Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer disclaimer.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Mobile Horizontal Padding
  $wp_customize->add_setting( 'footer_disclaimer_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_mobile_horizontal_padding',
    array(
      'label' => __( 'Footer Disclaimer Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile footer disclaimer.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Disclaimer Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_disclaimer_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_disclaimer_text', array(
    'label' => 'Footer Disclaimer Text',
    'section' => 'footer_disclaimer_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text styling for footer disclaimer.'
  ) ) );

  // Footer Disclaimer Font Size
  $wp_customize->add_setting( 'footer_disclaimer_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_font_size',
    array(
      'label' => __( 'Footer Disclaimer Font Size' ),
      'description' => __( 'Enter a px value for footer disclaimer font size.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Font Size Mobile
  $wp_customize->add_setting( 'footer_disclaimer_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_font_size_mobile',
    array(
      'label' => __( 'Footer Disclaimer Font Size Mobile' ),
      'description' => __( 'Enter a px value for mobile footer disclaimer font size.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Line Height Mobile
  $wp_customize->add_setting( 'footer_disclaimer_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_line_height_mobile',
    array(
      'label' => __( 'Footer Disclaimer Line Height Mobile' ),
      'description' => __( 'Enter a px value for mobile footer disclaimer line height.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Line Height
  $wp_customize->add_setting( 'footer_disclaimer_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_line_height',
    array(
      'label' => __( 'Footer Disclaimer Line Height' ),
      'description' => __( 'Enter a px value for footer disclaimer line height.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number'
    )
  );

  // Footer Disclaimer Font Weight
  $wp_customize->add_setting( 'footer_disclaimer_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_font_weight',
    array(
      'label' => __( 'Footer Disclaimer Font Weight' ),
      'description' => __( 'Select a font weight for footer disclaimer.' ),
      'section' => 'footer_disclaimer_options',
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

  // Footer Disclaimer Font Style
  $wp_customize->add_setting( 'footer_disclaimer_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_font_style',
    array(
      'label' => __( 'Footer Disclaimer Font Style' ),
      'description' => __( 'Select a font style for footer disclaimer.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Disclaimer Text Transform
  $wp_customize->add_setting( 'footer_disclaimer_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_text_transform',
    array(
      'label' => __( 'Footer Disclaimer Text Transform' ),
      'description' => __( 'Select a transform style for footer disclaimer text.' ),
      'section' => 'footer_disclaimer_options',
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

  // Footer Disclaimer Letter Spacing
  $wp_customize->add_setting( 'footer_disclaimer_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_letter_spacing',
    array(
      'label' => __( 'Footer Disclaimer Letter Spacing' ),
      'description' => __( 'Enter a px value for footer disclaimer letter spacing.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Disclaimer Letter Spacing Mobile
  $wp_customize->add_setting( 'footer_disclaimer_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_disclaimer_letter_spacing_mobile',
    array(
      'label' => __( 'Footer Disclaimer Letter Spacing Mobile' ),
      'description' => __( 'Enter a px value for mobile footer disclaimer letter spacing.' ),
      'section' => 'footer_disclaimer_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_footer_disclaimer' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_disclaimer() {
  ob_start();

  /**
   * Footer Disclaimer Width
   **/

  $footer_disclaimer_width_unit = get_theme_mod( 'unit_selector--footer_disclaimer_width', '' );
  $footer_disclaimer_width_number = get_theme_mod( 'number--footer_disclaimer_width', '' );
  $footer_disclaimer_width_range = get_theme_mod( 'range--footer_disclaimer_width', '' );

  if ( !empty( $footer_disclaimer_width_number ) and $footer_disclaimer_width_unit == 'px' ) {
    ?>
    :root {
    --footer-disclaimer-width: <?php echo $footer_disclaimer_width_number; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_disclaimer_width_range ) and $footer_disclaimer_width_unit == 'pct' ) {
    ?>
    :root {
    --footer-disclaimer-width: <?php echo $footer_disclaimer_width_range; ?>%;
    }
    <?php
  }

  if ( !empty( $footer_disclaimer_width_range ) and $footer_disclaimer_width_unit == 'vw' ) {
    ?>
    :root {
    --footer-disclaimer-width: <?php echo $footer_disclaimer_width_range; ?>vw;
    }
    <?php
  }

  /**
   * Footer Disclaimer Margin
   **/

  $footer_disclaimer_mobile_margin_top = get_theme_mod( 'footer_disclaimer_mobile_margin_top', '' );
  $footer_disclaimer_mobile_margin_bottom = get_theme_mod( 'footer_disclaimer_mobile_margin_bottom', '' );
  $footer_disclaimer_mobile_margin_left = get_theme_mod( 'footer_disclaimer_mobile_margin_left', '' );
  $footer_disclaimer_mobile_margin_right = get_theme_mod( 'footer_disclaimer_mobile_margin_right', '' );
  $footer_disclaimer_margin_top = get_theme_mod( 'footer_disclaimer_margin_top', '' );
  $footer_disclaimer_margin_bottom = get_theme_mod( 'footer_disclaimer_margin_bottom', '' );
  $footer_disclaimer_margin_left = get_theme_mod( 'footer_disclaimer_margin_left', '' );
  $footer_disclaimer_margin_right = get_theme_mod( 'footer_disclaimer_margin_right', '' );

  if ( isset( $footer_disclaimer_mobile_margin_top ) && $footer_disclaimer_mobile_margin_top != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-top-mobile: <?php echo $footer_disclaimer_mobile_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_mobile_margin_bottom ) && $footer_disclaimer_mobile_margin_bottom != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-bottom-mobile: <?php echo $footer_disclaimer_mobile_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_mobile_margin_left ) && $footer_disclaimer_mobile_margin_left != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-left-mobile: <?php echo $footer_disclaimer_mobile_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_mobile_margin_right ) && $footer_disclaimer_mobile_margin_right != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-right-mobile: <?php echo $footer_disclaimer_mobile_margin_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_margin_top ) && $footer_disclaimer_margin_top != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-top: <?php echo $footer_disclaimer_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_margin_bottom ) && $footer_disclaimer_margin_bottom != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-bottom: <?php echo $footer_disclaimer_margin_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_margin_left ) && $footer_disclaimer_margin_left != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-left: <?php echo $footer_disclaimer_margin_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_margin_right ) && $footer_disclaimer_margin_right != '' ) {
    ?>
    :root {
    --footer-disclaimer-margin-right: <?php echo $footer_disclaimer_margin_right; ?>px;
    }
    <?php
  }


  /**
   * Footer Disclaimer Padding
   **/

  $footer_disclaimer_vertical_padding = get_theme_mod( 'footer_disclaimer_vertical_padding', '' );
  $footer_disclaimer_horizontal_padding = get_theme_mod( 'footer_disclaimer_horizontal_padding', '' );
  $footer_disclaimer_mobile_vertical_padding = get_theme_mod( 'footer_disclaimer_mobile_vertical_padding', '' );
  $footer_disclaimer_mobile_horizontal_padding = get_theme_mod( 'footer_disclaimer_mobile_horizontal_padding', '' );

  if ( isset( $footer_disclaimer_vertical_padding ) && $footer_disclaimer_vertical_padding != '' ) {
    ?>
    :root {
    --footer-disclaimer-vertical-padding: <?php echo $footer_disclaimer_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_horizontal_padding ) && $footer_disclaimer_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-disclaimer-horizontal-padding: <?php echo $footer_disclaimer_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_mobile_vertical_padding ) && $footer_disclaimer_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --footer-disclaimer-vertical-padding-mobile: <?php echo $footer_disclaimer_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_mobile_horizontal_padding ) && $footer_disclaimer_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-disclaimer-horizontal-padding-mobile: <?php echo $footer_disclaimer_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  /**
   * Footer Disclaimer Text
   **/

  $footer_disclaimer_font_size = get_theme_mod( 'footer_disclaimer_font_size', '' );
  $footer_disclaimer_font_size_mobile = get_theme_mod( 'footer_disclaimer_font_size_mobile', '' );
  $footer_disclaimer_line_height = get_theme_mod( 'footer_disclaimer_line_height', '' );
  $footer_disclaimer_line_height_mobile = get_theme_mod( 'footer_disclaimer_line_height_mobile', '' );
  $footer_disclaimer_font_weight = get_theme_mod( 'footer_disclaimer_font_weight', '' );
  $footer_disclaimer_font_style = get_theme_mod( 'footer_disclaimer_font_style', '' );
  $footer_disclaimer_text_transform = get_theme_mod( 'footer_disclaimer_text_transform', '' );
  $footer_disclaimer_letter_spacing = get_theme_mod( 'footer_disclaimer_letter_spacing', '' );
  $footer_disclaimer_letter_spacing_mobile = get_theme_mod( 'footer_disclaimer_letter_spacing_mobile', '' );

  if ( isset( $footer_disclaimer_font_size ) && $footer_disclaimer_font_size != '' ) {
    ?>
    :root {
    --footer-disclaimer-font-size: <?php echo $footer_disclaimer_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_font_size_mobile ) && $footer_disclaimer_font_size_mobile != '' ) {
    ?>
    :root {
    --footer-disclaimer-font-size-mobile: <?php echo $footer_disclaimer_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_line_height ) && $footer_disclaimer_line_height != '' ) {
    ?>
    :root {
    --footer-disclaimer-line-height: <?php echo $footer_disclaimer_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_line_height_mobile ) && $footer_disclaimer_line_height_mobile != '' ) {
    ?>
    :root {
    --footer-disclaimer-line-height-mobile: <?php echo $footer_disclaimer_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_disclaimer_font_weight ) ) {
    ?>
    :root {
    --footer-disclaimer-font-weight: <?php echo $footer_disclaimer_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_disclaimer_font_style ) ) {
    ?>
    :root {
    --footer-disclaimer-font-style: <?php echo $footer_disclaimer_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_disclaimer_text_transform ) ) {
    ?>
    :root {
    --footer-disclaimer-text-transform: <?php echo $footer_disclaimer_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_letter_spacing ) && $footer_disclaimer_letter_spacing != '' ) {
    ?>
    :root {
    --footer-disclaimer-letter-spacing: <?php echo $footer_disclaimer_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_disclaimer_letter_spacing_mobile ) && $footer_disclaimer_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --footer-disclaimer-letter-spacing-mobile: <?php echo $footer_disclaimer_letter_spacing_mobile; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
