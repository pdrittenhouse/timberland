<?php

/**
 * REGISTER CUSTOMIZER HEADER OPTIONS
 **/

function theme_customize_register_header( $wp_customize ) {


  /**
   * Create Header Options Section
   **/

  $wp_customize->add_section( 'header_options' , array(
    'title'      => __( 'Header Style Options', 'dream' ),
    'priority'   => 47,
  ) );

  /**
   * Header Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_padding', array(
    'label' => 'Header Padding',
    'section' => 'header_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default padding for header.'
  ) ) );

  // Header Padding Top
  $wp_customize->add_setting( 'header_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_padding_top',
    array(
      'label' => __( 'Header Padding Top' ),
      'description' => __( 'Enter a px value for the header top padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Padding Bottom
  $wp_customize->add_setting( 'header_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_padding_bottom',
    array(
      'label' => __( 'Header Padding Bottom' ),
      'description' => __( 'Enter a px value for the header bottom padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Padding Left
  $wp_customize->add_setting( 'header_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_padding_left',
    array(
      'label' => __( 'Header Padding Left' ),
      'description' => __( 'Enter a px value for the header left padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Padding Right
  $wp_customize->add_setting( 'header_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_padding_right',
    array(
      'label' => __( 'Header Padding Right' ),
      'description' => __( 'Enter a px value for the header right padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Mobile Padding Top
  $wp_customize->add_setting( 'header_mobile_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_mobile_padding_top',
    array(
      'label' => __( 'Header Mobile Padding Top' ),
      'description' => __( 'Enter a px value for the mobile header top padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Mobile Padding Bottom
  $wp_customize->add_setting( 'header_mobile_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_mobile_padding_bottom',
    array(
      'label' => __( 'Header Mobile Padding Bottom' ),
      'description' => __( 'Enter a px value for the mobile header bottom padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Mobile Padding Left
  $wp_customize->add_setting( 'header_mobile_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_mobile_padding_left',
    array(
      'label' => __( 'Header Mobile Padding Left' ),
      'description' => __( 'Enter a px value for the mobile header left padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Mobile Padding Right
  $wp_customize->add_setting( 'header_mobile_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_mobile_padding_right',
    array(
      'label' => __( 'Header Mobile Padding Right' ),
      'description' => __( 'Enter a px value for the mobile header right padding.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );


  /**
   * Header Border Width
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_border_width',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_border_width', array(
    'label' => 'Header Border Width',
    'section' => 'header_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border width for header.'
  ) ) );

  // Header Border Top Width
  $wp_customize->add_setting( 'header_border_top_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_top_width',
    array(
      'label' => __( 'Header Top Border Width' ),
      'description' => __( 'Enter a px value for the header top border width.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Border Bottom Width
  $wp_customize->add_setting( 'header_border_bottom_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_bottom_width',
    array(
      'label' => __( 'Header Bottom Border Width' ),
      'description' => __( 'Enter a px value for the header bottom border width.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Border Left Width
  $wp_customize->add_setting( 'header_border_left_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_left_width',
    array(
      'label' => __( 'Header Left Border Width' ),
      'description' => __( 'Enter a px value for the header left border width.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Border Right Width
  $wp_customize->add_setting( 'header_border_right_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_right_width',
    array(
      'label' => __( 'Header Right Border Width' ),
      'description' => __( 'Enter a px value for the header right border width.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );


  /**
   * Header Border Style
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_border_style',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_border_style', array(
    'label' => 'Header Border Style',
    'section' => 'header_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border style for header.'
  ) ) );

  // Header Top Border Style
  $wp_customize->add_setting( 'header_border_top_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_top_style',
    array(
      'label' => __( 'Header Border Top Style' ),
      'description' => __( 'Select a top border style for the header.' ),
      'section' => 'header_options',
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

  // Header Right Border Style
  $wp_customize->add_setting( 'header_border_right_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_right_style',
    array(
      'label' => __( 'Header Border Right Style' ),
      'description' => __( 'Select a right border style for the header.' ),
      'section' => 'header_options',
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

  // Header Bottom Border Style
  $wp_customize->add_setting( 'header_border_bottom_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_bottom_style',
    array(
      'label' => __( 'Header Border Bottom Style' ),
      'description' => __( 'Select a bottom border style for the header.' ),
      'section' => 'header_options',
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

  // Header Left Border Style
  $wp_customize->add_setting( 'header_border_left_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_left_style',
    array(
      'label' => __( 'Header Border Left Style' ),
      'description' => __( 'Select a left border style for the header.' ),
      'section' => 'header_options',
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
   * Header Border Radius
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_border_radius',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_border_radius', array(
    'label' => 'Header Border Radius',
    'section' => 'header_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default border width for header.'
  ) ) );

  // Header Top Left Border Radius
  $wp_customize->add_setting( 'header_border_top_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_top_left_radius',
    array(
      'label' => __( 'Header Border Top Left Radius' ),
      'description' => __( 'Enter a px value for the top left border radius for the header.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Top Right Border Radius
  $wp_customize->add_setting( 'header_border_top_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_top_right_radius',
    array(
      'label' => __( 'Header Border Top Right Radius' ),
      'description' => __( 'Enter a px value for top right border radius for the header.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Bottom Left Border Radius
  $wp_customize->add_setting( 'header_border_bottom_left_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_bottom_left_radius',
    array(
      'label' => __( 'Header Border Bottom Left Radius' ),
      'description' => __( 'Enter a px value for bottom left border radius for the header.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );

  // Header Bottom Right Border Radius
  $wp_customize->add_setting( 'header_border_bottom_right_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_border_bottom_right_radius',
    array(
      'label' => __( 'Header Border Bottom Right Radius' ),
      'description' => __( 'Enter a px value for bottom right border radius for the header.' ),
      'section' => 'header_options',
      'type' => 'number'
    )
  );


  /**
   * Header Box Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_box_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_box_shadow', array(
    'label' => 'Header Box Shadow',
    'section' => 'header_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default box shadow for header.'
  ) ) );

  // Header Box Shadow X
  $wp_customize->add_setting( 'header_box_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_box_shadow_x',
    array(
      'label' => __( 'Header Box Shadow X Offset' ),
      'description' => __( 'Enter a px value for header box shadow x-offset.' ),
      'section' => 'header_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Box Shadow Y
  $wp_customize->add_setting( 'header_box_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_box_shadow_y',
    array(
      'label' => __( 'Header Box Shadow Y Offset' ),
      'description' => __( 'Enter a px value for header box shadow y-offset.' ),
      'section' => 'header_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Box Shadow Blur
  $wp_customize->add_setting( 'header_box_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_box_shadow_blur',
    array(
      'label' => __( 'Header Box Shadow Blur' ),
      'description' => __( 'Enter a px value for header box shadow blur.' ),
      'section' => 'header_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Header Box Shadow Spread
  $wp_customize->add_setting( 'header_box_shadow_spread',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_box_shadow_spread',
    array(
      'label' => __( 'Header Box Shadow Spread' ),
      'description' => __( 'Enter a px value for header box shadow spread.' ),
      'section' => 'header_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_header' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_header() {
  ob_start();

  /**
   * Header Padding
   **/

  $header_padding_top = get_theme_mod( 'header_padding_top', '' );
  $header_padding_bottom = get_theme_mod( 'header_padding_bottom', '' );
  $header_padding_left = get_theme_mod( 'header_padding_left', '' );
  $header_padding_right = get_theme_mod( 'header_padding_right', '' );
  $header_mobile_padding_top = get_theme_mod( 'header_mobile_padding_top', '' );
  $header_mobile_padding_bottom = get_theme_mod( 'header_mobile_padding_bottom', '' );
  $header_mobile_padding_left = get_theme_mod( 'header_mobile_padding_left', '' );
  $header_mobile_padding_right = get_theme_mod( 'header_mobile_padding_right', '' );

  if ( isset( $header_padding_top ) && $header_padding_top != '' ) {
    ?>
    :root {
    --header-padding-top: <?php echo $header_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $header_padding_bottom ) && $header_padding_bottom != '' ) {
    ?>
    :root {
    --header-padding-bottom: <?php echo $header_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $header_padding_left ) && $header_padding_left != '' ) {
    ?>
    :root {
    --header-padding-left: <?php echo $header_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $header_padding_right ) && $header_padding_right != '' ) {
    ?>
    :root {
    --header-padding-right: <?php echo $header_padding_right; ?>px;
    }
    <?php
  }

  if ( isset( $header_mobile_padding_top ) && $header_mobile_padding_top != '' ) {
    ?>
    :root {
    --header-mobile-padding-top: <?php echo $header_mobile_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $header_mobile_padding_bottom ) && $header_mobile_padding_bottom != '' ) {
    ?>
    :root {
    --header-mobile-padding-bottom: <?php echo $header_mobile_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $header_mobile_padding_left ) && $header_mobile_padding_left != '' ) {
    ?>
    :root {
    --header-mobile-padding-left: <?php echo $header_mobile_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $header_mobile_padding_right ) && $header_mobile_padding_right != '' ) {
    ?>
    :root {
    --header-mobile-padding-right: <?php echo $header_mobile_padding_right; ?>px;
    }
    <?php
  }

  /**
   * Header Border Width
   **/

  $header_border_top_width = get_theme_mod( 'header_border_top_width', '' );
  $header_border_bottom_width = get_theme_mod( 'header_border_bottom_width', '' );
  $header_border_left_width = get_theme_mod( 'header_border_left_width', '' );
  $header_border_right_width = get_theme_mod( 'header_border_right_width', '' );

  if ( isset( $header_border_top_width ) && $header_border_top_width != '' ) {
    ?>
    :root {
    --header-border-top-width: <?php echo $header_border_top_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_border_bottom_width ) && $header_border_bottom_width != '' ) {
    ?>
    :root {
    --header-border-bottom-width: <?php echo $header_border_bottom_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_border_left_width ) && $header_border_left_width != '' ) {
    ?>
    :root {
    --header-border-left-width: <?php echo $header_border_left_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_border_right_width ) && $header_border_right_width != '' ) {
    ?>
    :root {
    --header-border-right-width: <?php echo $header_border_right_width; ?>px;
    }
    <?php
  }


  /**
   * Header Border Style
   **/

  $header_border_top_style = get_theme_mod( 'header_border_top_style', '' );
  $header_border_right_style = get_theme_mod( 'header_border_right_style', '' );
  $header_border_bottom_style = get_theme_mod( 'header_border_bottom_style', '' );
  $header_border_left_style = get_theme_mod( 'header_border_left_style', '' );

  if ( !empty( $header_border_top_style ) ) {
    ?>
    :root {
    --header-border-top-style: <?php echo $header_border_top_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_right_style ) ) {
    ?>
    :root {
    --header-border-right-style: <?php echo $header_border_right_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_bottom_style ) ) {
    ?>
    :root {
    --header-border-bottom-style: <?php echo $header_border_bottom_style; ?>;
    }
    <?php
  }

  if ( !empty( $header_border_left_style ) ) {
    ?>
    :root {
    --header-border-left-style: <?php echo $header_border_left_style; ?>;
    }
    <?php
  }


  /**
   * Header Border Radius
   **/

  $header_border_top_left_radius = get_theme_mod( 'header_border_top_left_radius', '' );
  $header_border_top_right_radius = get_theme_mod( 'header_border_top_right_radius', '' );
  $header_border_bottom_left_radius = get_theme_mod( 'header_border_bottom_left_radius', '' );
  $header_border_bottom_right_radius = get_theme_mod( 'header_border_bottom_right_radius', '' );

  if ( isset( $header_border_top_left_radius ) && $header_border_top_left_radius != '' ) {
    ?>
    :root {
    --header-border-top-left-radius: <?php echo $header_border_top_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_border_top_right_radius ) && $header_border_top_right_radius != '' ) {
    ?>
    :root {
    --header-border-top-right-radius: <?php echo $header_border_top_right_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_border_bottom_left_radius ) && $header_border_bottom_left_radius != '' ) {
    ?>
    :root {
    --header-border-bottom-left-radius: <?php echo $header_border_bottom_left_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_border_bottom_right_radius ) && $header_border_bottom_right_radius != '' ) {
    ?>
    :root {
    --header-border-bottom-right-radius: <?php echo $header_border_bottom_right_radius; ?>px;
    }
    <?php
  }


  /**
   * Header Box Shadow
   **/

  $header_box_shadow_x = get_theme_mod( 'header_box_shadow_x', '' );
  $header_box_shadow_y = get_theme_mod( 'header_box_shadow_y', '' );
  $header_box_shadow_blur = get_theme_mod( 'header_box_shadow_blur', '' );
  $header_box_shadow_spread = get_theme_mod( 'header_box_shadow_spread', '' );

  if ( isset( $header_box_shadow_x ) && $header_box_shadow_x != '' ) {
    ?>
    :root {
    --header-box-shadow-x: <?php echo $header_box_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $header_box_shadow_y ) && $header_box_shadow_y != '' ) {
    ?>
    :root {
    --header-box-shadow-y: <?php echo $header_box_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $header_box_shadow_blur ) && $header_box_shadow_blur != '' ) {
    ?>
    :root {
    --header-box-shadow-blur: <?php echo $header_box_shadow_blur; ?>px;
    }
    <?php
  }

  if ( isset( $header_box_shadow_spread ) && $header_box_shadow_spread != '' ) {
    ?>
    :root {
    --header-box-shadow-spread: <?php echo $header_box_shadow_spread; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
