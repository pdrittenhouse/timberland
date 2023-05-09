<?php

/**
 * REGISTER CUSTOMIZER ALERT OPTIONS
 **/

function theme_customize_register_alerts( $wp_customize ) {


  /**
   * Create Alert Options Section
   **/

  $wp_customize->add_section( 'alert_options' , array(
    'title'      => __( 'Alert Style Options', 'dream' ),
    'priority'   => 13,
  ) );

  /**
   * Alert Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_alert_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_alert_padding', array(
    'label' => 'Alert Padding',
    'section' => 'alert_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default padding for alerts.'
  ) ) );

  // Alert Padding Vertical
  $wp_customize->add_setting( 'alert_padding_vertical',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_padding_vertical',
    array(
      'label' => __( 'Alert Padding Vertical' ),
      'description' => __( 'Enter a px value for alert vertical padding.' ),
      'section' => 'alert_options',
      'type' => 'number'
    )
  );


  // Alert Padding Horizontal
  $wp_customize->add_setting( 'alert_padding_horizontal',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_padding_horizontal',
    array(
      'label' => __( 'Alert Padding Horizontal' ),
      'description' => __( 'Enter a px value for alert horizontal padding.' ),
      'section' => 'alert_options',
      'type' => 'number'
    )
  );


  /**
   * Alert Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_alert_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_alert_text', array(
    'label' => 'Alert Text',
    'section' => 'alert_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default styling for alert text.'
  ) ) );

  // Alert Font Size
  $wp_customize->add_setting( 'alert_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_font_size',
    array(
      'label' => __( 'Alert Font Size' ),
      'description' => __( 'Enter a px value for alert font size.' ),
      'section' => 'alert_options',
      'type' => 'number'
    )
  );

  // Alert Font Size Mobile
  $wp_customize->add_setting( 'alert_font_size_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_font_size_mobile',
    array(
      'label' => __( 'Alert Mobile Font Size' ),
      'description' => __( 'Enter a px value for alert mobile font size.' ),
      'section' => 'alert_options',
      'type' => 'number'
    )
  );

  // Alert Font Weight
  $wp_customize->add_setting( 'alert_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_font_weight',
    array(
      'label' => __( 'Alert Font Weight' ),
      'description' => __( 'Select a font weight for alerts.' ),
      'section' => 'alert_options',
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

  // Alert Font Style
  $wp_customize->add_setting( 'alert_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_font_style',
    array(
      'label' => __( 'Alert Font Style' ),
      'description' => __( 'Select a font style for alerts.' ),
      'section' => 'alert_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Alert Line Height
  $wp_customize->add_setting( 'alert_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_line_height',
    array(
      'label' => __( 'Alert Line Height' ),
      'description' => __( 'Enter a px value for alert line height.' ),
      'section' => 'alert_options',
      'type' => 'number'
    )
  );

  // Alert Line Height Mobile
  $wp_customize->add_setting( 'alert_line_height_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_line_height_mobile',
    array(
      'label' => __( 'Alert Mobile Line Height' ),
      'description' => __( 'Enter a px value for alert mobile line height.' ),
      'section' => 'alert_options',
      'type' => 'number'
    )
  );

  // Alert Letter Spacing
  $wp_customize->add_setting( 'alert_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_letter_spacing',
    array(
      'label' => __( 'Alert Letter Spacing' ),
      'description' => __( 'Enter a px value for alert letter spacing.' ),
      'section' => 'alert_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Alert Mobile Letter Spacing
  $wp_customize->add_setting( 'alert_letter_spacing_mobile',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_letter_spacing_mobile',
    array(
      'label' => __( 'Alert Mobile Letter Spacing' ),
      'description' => __( 'Enter a px value for alert mobile letter spacing.' ),
      'section' => 'alert_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Alert Text Transform
  $wp_customize->add_setting( 'alert_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_text_transform',
    array(
      'label' => __( 'Alert Text Transform' ),
      'description' => __( 'Select a transform style for alert text.' ),
      'section' => 'alert_options',
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


  /**
   * Alert Text Shadow
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_alert_text_shadow',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_alert_text_shadow', array(
    'label' => 'Alert Text Shadow',
    'section' => 'alert_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default text shadow for alerts.'
  ) ) );

  // Alert Text Shadow X
  $wp_customize->add_setting( 'alert_text_shadow_x',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_text_shadow_x',
    array(
      'label' => __( 'Alert Text Shadow X Offset' ),
      'description' => __( 'Enter a px value for alert text shadow x-offset.' ),
      'section' => 'alert_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Alert Text Shadow Y
  $wp_customize->add_setting( 'alert_text_shadow_y',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_text_shadow_y',
    array(
      'label' => __( 'Alert Text Shadow Y Offset' ),
      'description' => __( 'Enter a px value for alert text shadow y-offset.' ),
      'section' => 'alert_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Alert Text Shadow Blur
  $wp_customize->add_setting( 'alert_text_shadow_blur',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_text_shadow_blur',
    array(
      'label' => __( 'Alert Text Shadow Blur' ),
      'description' => __( 'Enter a px value for alert text shadow blur.' ),
      'section' => 'alert_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Alert Link
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_alert_link',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_alert_link', array(
    'label' => 'Alert Link',
    'section' => 'alert_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default styling for alert links.'
  ) ) );

  // Alert Link Decoration Line
  $wp_customize->add_setting( 'alert_link_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_link_decoration_line',
    array(
      'label' => __( 'Alert Link Decoration Line' ),
      'description' => __( 'Select a text decoration line for alert links.' ),
      'section' => 'alert_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'underline' => __( 'Underline' ),
        'overline' => __( 'Overline' ),
        'line-through' => __( 'Line Through' )
      )
    )
  );

  // Alert Link Decoration Style
  $wp_customize->add_setting( 'alert_link_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_link_decoration_style',
    array(
      'label' => __( 'Alert Link Decoration Style' ),
      'description' => __( 'Select a text decoration style for alerts.' ),
      'section' => 'alert_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'solid' => __( 'Solid' ),
        'double' => __( 'Double' ),
        'dotted' => __( 'Dotted' ),
        'dashed' => __( 'Dashed' ),
        'wavy' => __( 'Wavy' )
      )
    )
  );

  // Alert Link Hover Decoration Line
  $wp_customize->add_setting( 'alert_link_hover_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_link_hover_decoration_line',
    array(
      'label' => __( 'Alert Link Hover Decoration Line' ),
      'description' => __( 'Select a text decoration line for alert link hover states.' ),
      'section' => 'alert_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'none' => __( 'None' ),
        'underline' => __( 'Underline' ),
        'overline' => __( 'Overline' ),
        'line-through' => __( 'Line Through' )
      )
    )
  );

  // Alert Link Hover Decoration Style
  $wp_customize->add_setting( 'alert_link_hover_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'alert_link_hover_decoration_style',
    array(
      'label' => __( 'Alert Link Hover Decoration Style' ),
      'description' => __( 'Select a text decoration style for alert hover states.' ),
      'section' => 'alert_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'solid' => __( 'Solid' ),
        'double' => __( 'Double' ),
        'dotted' => __( 'Dotted' ),
        'dashed' => __( 'Dashed' ),
        'wavy' => __( 'Wavy' )
      )
    )
  );



}

add_action( 'customize_register', 'theme_customize_register_alerts' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_alerts() {
  ob_start();

  /**
   * Alert Padding
   **/

  $alert_padding_vertical = get_theme_mod( 'alert_padding_vertical', '' );
  $alert_padding_horizontal = get_theme_mod( 'alert_padding_horizontal', '' );

  if ( isset( $alert_padding_vertical ) && $alert_padding_vertical != '' ) {
    ?>
    :root {
    --alert-padding-vertical: <?php echo $alert_padding_vertical; ?>px;
    }
    <?php
  }

  if ( isset( $alert_padding_horizontal ) && $alert_padding_horizontal != '' ) {
    ?>
    :root {
    --alert-padding-horizontal: <?php echo $alert_padding_horizontal; ?>px;
    }
    <?php
  }


  /**
   * Alert Text
   **/

  $alert_font_size = get_theme_mod( 'alert_font_size', '' );
  $alert_font_size_mobile = get_theme_mod( 'alert_font_size_mobile', '' );
  $alert_font_weight = get_theme_mod( 'alert_font_weight', '' );
  $alert_font_style = get_theme_mod( 'alert_font_style', '' );
  $alert_line_height = get_theme_mod( 'alert_line_height', '' );
  $alert_line_height_mobile = get_theme_mod( 'alert_line_height_mobile', '' );
  $alert_letter_spacing = get_theme_mod( 'alert_letter_spacing', '' );
  $alert_letter_spacing_mobile = get_theme_mod( 'alert_letter_spacing_mobile', '' );
  $alert_text_transform = get_theme_mod( 'alert_text_transform', '' );

  if ( isset( $alert_font_size ) && $alert_font_size != '' ) {
    ?>
    :root {
    --alert-font-size: <?php echo $alert_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $alert_font_size_mobile ) && $alert_font_size_mobile != '' ) {
    ?>
    :root {
    --alert-font-size-mobile: <?php echo $alert_font_size_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $alert_font_weight ) ) {
    ?>
    :root {
    --alert-font-weight: <?php echo $alert_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $alert_font_style ) ) {
    ?>
    :root {
    --alert-font-style: <?php echo $alert_font_style; ?>;
    }
    <?php
  }

  if ( isset( $alert_line_height ) && $alert_line_height != '' ) {
    ?>
    :root {
    --alert-line-height: <?php echo $alert_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $alert_line_height_mobile ) && $alert_line_height_mobile != '' ) {
    ?>
    :root {
    --alert-line-height-mobile: <?php echo $alert_line_height_mobile; ?>px;
    }
    <?php
  }

  if ( isset( $alert_letter_spacing ) && $alert_letter_spacing != '' ) {
    ?>
    :root {
    --alert-letter-spacing: <?php echo $alert_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $alert_letter_spacing_mobile ) && $alert_letter_spacing_mobile != '' ) {
    ?>
    :root {
    --alert-letter-spacing-mobile: <?php echo $alert_letter_spacing_mobile; ?>px;
    }
    <?php
  }

  if ( !empty( $alert_text_transform ) ) {
    ?>
    :root {
    --alert-text-transform: <?php echo $alert_text_transform; ?>px;
    }
    <?php
  }


  /**
   * Alert Text Shadow
   **/

  $alert_text_shadow_x = get_theme_mod( 'alert_text_shadow_x', '' );
  $alert_text_shadow_y = get_theme_mod( 'alert_text_shadow_y', '' );
  $alert_text_shadow_blur = get_theme_mod( 'alert_text_shadow_blur', '' );

  if ( isset( $alert_text_shadow_x ) && $alert_text_shadow_x != '' ) {
    ?>
    :root {
    --alert-text-shadow-x: <?php echo $alert_text_shadow_x; ?>px;
    }
    <?php
  }

  if ( isset( $alert_text_shadow_y ) && $alert_text_shadow_y != '' ) {
    ?>
    :root {
    --alert-text-shadow-y: <?php echo $alert_text_shadow_y; ?>px;
    }
    <?php
  }

  if ( isset( $alert_text_shadow_blur ) && $alert_text_shadow_blur != '' ) {
    ?>
    :root {
    --alert-text-shadow-blur: <?php echo $alert_text_shadow_blur; ?>px;
    }
    <?php
  }


  /**
   * Alert Link
   **/

  $alert_link_decoration_line = get_theme_mod( 'alert_link_decoration_line', '' );
  $alert_link_decoration_style = get_theme_mod( 'alert_link_decoration_style', '' );
  $alert_link_hover_decoration_line = get_theme_mod( 'alert_link_hover_decoration_line', '' );
  $alert_link_hover_decoration_style = get_theme_mod( 'alert_link_hover_decoration_style', '' );

  if ( !empty( $alert_link_decoration_line ) ) {
    ?>
    :root {
    --alert-link-decoration-line: <?php echo $alert_link_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_decoration_style ) ) {
    ?>
    :root {
    --alert-link-decoration-style: <?php echo $alert_link_decoration_style; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_hover_decoration_line ) ) {
    ?>
    :root {
    --alert-link-hover-decoration-line: <?php echo $alert_link_hover_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $alert_link_hover_decoration_style ) ) {
    ?>
    :root {
    --alert-link-hover-decoration-style: <?php echo $alert_link_hover_decoration_style; ?>;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
