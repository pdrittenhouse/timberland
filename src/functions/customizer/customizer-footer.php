<?php

/**
 * REGISTER CUSTOMIZER FOOTER OPTIONS
 **/

function theme_customize_register_footer( $wp_customize ) {


  /**
   * Create Footer Options Section
   **/

  $wp_customize->add_section( 'footer_options' , array(
    'title'      => __( 'Footer Style Options', 'dream' ),
    'priority'   => 81,
  ) );

  /**
   * Footer Alignment
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_text_alignment',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_text_alignment', array(
    'label' => 'Footer Alignment',
    'section' => 'footer_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default alignment for footer.'
  ) ) );

  // Footer Text Align
  $wp_customize->add_setting( 'footer_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_text_align',
    array(
      'label' => __( 'Footer Text Align' ),
      'description' => __( 'Select a text alignment for the footer.' ),
      'section' => 'footer_options',
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

  // Footer Flex Align
  $wp_customize->add_setting( 'footer_flex_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_flex_align',
    array(
      'label' => __( 'Footer Flex Align' ),
      'description' => __( 'Select a flex alignment for the footer.' ),
      'section' => 'footer_options',
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

  /**
   * Footer Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_padding', array(
    'label' => 'Footer Padding',
    'section' => 'footer_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default padding for footer.'
  ) ) );

  // Footer Padding Top
  $wp_customize->add_setting( 'footer_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_padding_top',
    array(
      'label' => __( 'Footer Padding Top' ),
      'description' => __( 'Enter a px value for the footer top padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Padding Bottom
  $wp_customize->add_setting( 'footer_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_padding_bottom',
    array(
      'label' => __( 'Footer Padding Bottom' ),
      'description' => __( 'Enter a px value for the footer bottom padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Padding Left
  $wp_customize->add_setting( 'footer_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_padding_left',
    array(
      'label' => __( 'Footer Padding Left' ),
      'description' => __( 'Enter a px value for the footer left padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Padding Right
  $wp_customize->add_setting( 'footer_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_padding_right',
    array(
      'label' => __( 'Footer Padding Right' ),
      'description' => __( 'Enter a px value for the footer right padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Mobile Padding Top
  $wp_customize->add_setting( 'footer_mobile_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_mobile_padding_top',
    array(
      'label' => __( 'Footer Mobile Padding Top' ),
      'description' => __( 'Enter a px value for the mobile footer top padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Mobile Padding Bottom
  $wp_customize->add_setting( 'footer_mobile_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_mobile_padding_bottom',
    array(
      'label' => __( 'Footer Mobile Padding Bottom' ),
      'description' => __( 'Enter a px value for the mobile footer bottom padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Mobile Padding Left
  $wp_customize->add_setting( 'footer_mobile_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_mobile_padding_left',
    array(
      'label' => __( 'Footer Mobile Padding Left' ),
      'description' => __( 'Enter a px value for the mobile footer left padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Mobile Padding Right
  $wp_customize->add_setting( 'footer_mobile_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_mobile_padding_right',
    array(
      'label' => __( 'Footer Mobile Padding Right' ),
      'description' => __( 'Enter a px value for the mobile footer right padding.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_border_width', array(
    'label' => 'Footer Border Width',
    'section' => 'footer_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border width for footer.'
  ) ) );

  // Footer Border Top Width
  $wp_customize->add_setting( 'footer_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_top_width',
    array(
      'label' => __( 'Footer Top Border Width' ),
      'description' => __( 'Enter a px value for the footer top border width.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Border Bottom Width
  $wp_customize->add_setting( 'footer_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_bottom_width',
    array(
      'label' => __( 'Footer Bottom Border Width' ),
      'description' => __( 'Enter a px value for the footer bottom border width.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Border Left Width
  $wp_customize->add_setting( 'footer_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_left_width',
    array(
      'label' => __( 'Footer Left Border Width' ),
      'description' => __( 'Enter a px value for the footer left border width.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Border Right Width
  $wp_customize->add_setting( 'footer_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_right_width',
    array(
      'label' => __( 'Footer Right Border Width' ),
      'description' => __( 'Enter a px value for the footer right border width.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_border_style', array(
    'label' => 'Footer Border Style',
    'section' => 'footer_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border style for footer.'
  ) ) );

  // Footer Top Border Style
  $wp_customize->add_setting( 'footer_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_top_style',
    array(
      'label' => __( 'Footer Border Top Style' ),
      'description' => __( 'Select a top border style for the footer.' ),
      'section' => 'footer_options',
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

  // Footer Right Border Style
  $wp_customize->add_setting( 'footer_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_right_style',
    array(
      'label' => __( 'Footer Border Right Style' ),
      'description' => __( 'Select a right border style for the footer.' ),
      'section' => 'footer_options',
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

  // Footer Bottom Border Style
  $wp_customize->add_setting( 'footer_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_bottom_style',
    array(
      'label' => __( 'Footer Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for the footer.' ),
      'section' => 'footer_options',
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

  // Footer Left Border Style
  $wp_customize->add_setting( 'footer_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_left_style',
    array(
      'label' => __( 'Footer Border Left Style' ),
      'description' => __( 'Select a left border style for the footer.' ),
      'section' => 'footer_options',
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
   * Footer Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_border_radius',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_border_radius', array(
    'label' => 'Footer Border Radius',
    'section' => 'footer_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border width for footer.'
  ) ) );

  // Footer Top Left Border Radius
  $wp_customize->add_setting( 'footer_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_top_left_radius',
    array(
      'label' => __( 'Footer Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for the footer.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Top Right Border Radius
  $wp_customize->add_setting( 'footer_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_top_right_radius',
    array(
      'label' => __( 'Footer Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for the footer.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Bottom Left Border Radius
  $wp_customize->add_setting( 'footer_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_bottom_left_radius',
    array(
      'label' => __( 'Footer Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for the footer.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );

  // Footer Bottom Right Border Radius
  $wp_customize->add_setting( 'footer_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_border_bottom_right_radius',
    array(
      'label' => __( 'Footer Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for the footer.' ),
      'section' => 'footer_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_box_shadow', array(
    'label' => 'Footer Box Shadow',
    'section' => 'footer_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default box shadow for footer.'
  ) ) );

  // Footer Box Shadow X
  $wp_customize->add_setting( 'footer_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_box_shadow_x',
    array(
      'label' => __( 'Footer Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for footer box shadow x-offset.' ),
      'section' => 'footer_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Box Shadow Y
  $wp_customize->add_setting( 'footer_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_box_shadow_y',
    array(
      'label' => __( 'Footer Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for footer box shadow y-offset.' ),
      'section' => 'footer_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Box Shadow Blur
  $wp_customize->add_setting( 'footer_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_box_shadow_blur',
    array(
      'label' => __( 'Footer Box Shadow Blur' ),
      'description' => __( 'Enter a px value for footer box shadow blur.' ),
      'section' => 'footer_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Box Shadow Spread
  $wp_customize->add_setting( 'footer_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_box_shadow_spread',
    array(
      'label' => __( 'Footer Box Shadow Spread' ),
      'description' => __( 'Enter a px value for footer box shadow spread.' ),
      'section' => 'footer_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_footer' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer() {
  ob_start();

  /**
   * Footer Alignment
   **/

  $footer_text_align = get_theme_mod( 'footer_text_align', '' );
  $footer_flex_align = get_theme_mod( 'footer_flex_align', '' );

  if ( !empty( $footer_text_align ) ) {
    ?>
    :root {
    --footer-text-align: <?php echo $footer_text_align; ?>;
    }
    <?php
  }

  if ( !empty( $footer_flex_align ) ) {
    ?>
    :root {
    --footer-flex-align: <?php echo $footer_flex_align; ?>;
    }
    <?php
  }


  /**
   * Footer Padding
   **/

  $footer_padding_top = get_theme_mod( 'footer_padding_top', '' );
  $footer_padding_bottom = get_theme_mod( 'footer_padding_bottom', '' );
  $footer_padding_left = get_theme_mod( 'footer_padding_left', '' );
  $footer_padding_right = get_theme_mod( 'footer_padding_right', '' );
  $footer_mobile_padding_top = get_theme_mod( 'footer_mobile_padding_top', '' );
  $footer_mobile_padding_bottom = get_theme_mod( 'footer_mobile_padding_bottom', '' );
  $footer_mobile_padding_left = get_theme_mod( 'footer_mobile_padding_left', '' );
  $footer_mobile_padding_right = get_theme_mod( 'footer_padding_right', '' );

  if ( isset( $footer_padding_top ) && $footer_padding_top != '' ) {
    ?>
    :root {
    --footer-padding-top: <?php echo $footer_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_padding_bottom ) && $footer_padding_bottom != '' ) {
    ?>
    :root {
    --footer-padding-bottom: <?php echo $footer_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_padding_left ) && $footer_padding_left != '' ) {
    ?>
    :root {
    --footer-padding-left: <?php echo $footer_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_padding_right ) && $footer_padding_right != '' ) {
    ?>
    :root {
    --footer-padding-right: <?php echo $footer_padding_right; ?>px;
    }
    <?php
  }

  if ( isset( $footer_mobile_padding_top ) && $footer_mobile_padding_top != '' ) {
    ?>
    :root {
    --footer-mobile-padding-top: <?php echo $footer_mobile_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_mobile_padding_bottom ) && $footer_mobile_padding_bottom != '' ) {
    ?>
    :root {
    --footer-mobile-padding-bottom: <?php echo $footer_mobile_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_mobile_padding_left ) && $footer_mobile_padding_left != '' ) {
    ?>
    :root {
    --footer-mobile-padding-left: <?php echo $footer_mobile_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_mobile_padding_right ) && $footer_mobile_padding_right != '' ) {
    ?>
    :root {
    --footer-mobile-padding-right: <?php echo $footer_mobile_padding_right; ?>px;
    }
    <?php
  }

  /**
   * Footer Border Width
   **/

  $footer_border_top_width = get_theme_mod( 'footer_border_top_width', '' );
  $footer_border_bottom_width = get_theme_mod( 'footer_border_bottom_width', '' );
  $footer_border_left_width = get_theme_mod( 'footer_border_left_width', '' );
  $footer_border_right_width = get_theme_mod( 'footer_border_right_width', '' );

  if ( isset( $footer_border_top_width ) && $footer_border_top_width != '' ) {
    ?>
    :root {
    --footer-border-top-width: <?php echo $footer_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_border_bottom_width ) && $footer_border_bottom_width != '' ) {
    ?>
    :root {
    --footer-border-bottom-width: <?php echo $footer_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_border_left_width ) && $footer_border_left_width != '' ) {
    ?>
    :root {
    --footer-border-left-width: <?php echo $footer_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_border_right_width ) && $footer_border_right_width != '' ) {
    ?>
    :root {
    --footer-border-right-width: <?php echo $footer_border_right_width; ?>px;
    }
    <?php
  }


  /**
   * Footer Border Style
   **/

  $footer_border_top_style = get_theme_mod( 'footer_border_top_style', '' );
  $footer_border_right_style = get_theme_mod( 'footer_border_right_style', '' );
  $footer_border_bottom_style = get_theme_mod( 'footer_border_bottom_style', '' );
  $footer_border_left_style = get_theme_mod( 'footer_border_left_style', '' );

  if ( !empty( $footer_border_top_style ) ) {
    ?>
    :root {
    --footer-border-top-style: <?php echo $footer_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_right_style ) ) {
    ?>
    :root {
    --footer-border-right-style: <?php echo $footer_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_bottom_style ) ) {
    ?>
    :root {
    --footer-border-bottom-style: <?php echo $footer_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_border_left_style ) ) {
    ?>
    :root {
    --footer-border-left-style: <?php echo $footer_border_left_style; ?>;
    }
    <?php
  }


  /**
   * Footer Border Radius
   **/

  $footer_border_top_left_radius = get_theme_mod( 'footer_border_top_left_radius', '' );
  $footer_border_top_right_radius = get_theme_mod( 'footer_border_top_right_radius', '' );
  $footer_border_bottom_left_radius = get_theme_mod( 'footer_border_bottom_left_radius', '' );
  $footer_border_bottom_right_radius = get_theme_mod( 'footer_border_bottom_right_radius', '' );

  if ( isset( $footer_border_top_left_radius ) && $footer_border_top_left_radius != '' ) {
    ?>
    :root {
    --footer-border-top-left-radius: <?php echo $footer_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_border_top_right_radius ) && $footer_border_top_right_radius != '' ) {
    ?>
    :root {
    --footer-border-top-right-radius: <?php echo $footer_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_border_bottom_left_radius ) && $footer_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --footer-border-bottom-left-radius: <?php echo $footer_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_border_bottom_right_radius ) && $footer_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --footer-border-bottom-right-radius: <?php echo $footer_border_bottom_right_radius; ?>px;
    }
    <?php
  }


  /**
   * Footer Box Shadow
   **/

  $footer_box_shadow_x = get_theme_mod( 'footer_box_shadow_x', '' );
  $footer_box_shadow_y = get_theme_mod( 'footer_box_shadow_y', '' );
  $footer_box_shadow_blur = get_theme_mod( 'footer_box_shadow_blur', '' );
  $footer_box_shadow_spread = get_theme_mod( 'footer_box_shadow_spread', '' );

  if ( isset( $footer_box_shadow_x ) && $footer_box_shadow_x != '' ) {
    ?>
    :root {
    --footer-box-shadow-x: <?php echo $footer_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $footer_box_shadow_y ) && $footer_box_shadow_y != '' ) {
    ?>
    :root {
    --footer-box-shadow-y: <?php echo $footer_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $footer_box_shadow_blur ) && $footer_box_shadow_blur != '' ) {
    ?>
    :root {
    --footer-box-shadow-blur: <?php echo $footer_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $footer_box_shadow_spread ) && $footer_box_shadow_spread != '' ) {
    ?>
    :root {
    --footer-box-shadow-spread: <?php echo $footer_box_shadow_spread; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
