<?php

/**
 * REGISTER CUSTOMIZER FORM OPTIONS
 **/

function theme_customize_register_forms( $wp_customize ) {


  /**
   * Create Forms Options Section
   **/

  $wp_customize->add_section( 'form_options' , array(
    'title'      => __( 'Form Style Options', 'dream' ),
    'priority'   => 14,
  ) );

  /**
   * Inputs
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_inputs',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_inputs', array(
    'label' => 'Inputs',
    'section' => 'form_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for form inputs.'
  ) ) );

  // Input Vertical Padding
  $wp_customize->add_setting( 'input_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_vertical_padding',
    array(
      'label' => __( 'Input Vertical Padding' ),
      'description' => __( 'Enter a px value for input vertical padding.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );


  // Input Horizontal Padding
  $wp_customize->add_setting( 'input_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_horizontal_padding',
    array(
      'label' => __( 'Input Horizontal Padding' ),
      'description' => __( 'Enter a px value for input horizontal padding.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );


  // Input Hover Horizontal Padding
  $wp_customize->add_setting( 'input_hover_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_hover_horizontal_padding',
    array(
      'label' => __( 'Input Hover Horizontal Padding' ),
      'description' => __( 'Enter a px value for input hover horizontal padding.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );


  // Input Font Size
  $wp_customize->add_setting( 'input_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_font_size',
    array(
      'label' => __( 'Input Font Size' ),
      'description' => __( 'Enter a px value for input font size.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );

  // Input Line Height
  $wp_customize->add_setting( 'input_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_line_height',
    array(
      'label' => __( 'Input Line Height' ),
      'description' => __( 'Enter a px value for input line height.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );

  // Input Border Width
  $wp_customize->add_setting( 'input_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_border_width',
    array(
      'label' => __( 'Input Border Width' ),
      'description' => __( 'Enter a px value for input border width.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );

  // Input Border Style
  $wp_customize->add_setting( 'input_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_border_style',
    array(
      'label' => __( 'Input Border Style' ),
      'description' => __( 'Select a border style for inputs.' ),
      'section' => 'form_options',
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

  // Input Border Radius
  $wp_customize->add_setting( 'input_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'input_border_radius',
    array(
      'label' => __( 'Input Border Radius' ),
      'description' => __( 'Enter a px value for input border radius.' ),
      'section' => 'form_options',
      'type' => 'number'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_forms' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_forms() {
  ob_start();

  /**
   *Inputs
   **/

  $input_vertical_padding = get_theme_mod( 'input_vertical_padding', '' );
  $input_horizontal_padding = get_theme_mod( 'input_horizontal_padding', '' );
  $input_hover_horizontal_padding = get_theme_mod( 'input_hover_horizontal_padding', '' );
  $input_font_size = get_theme_mod( 'input_font_size', '' );
  $input_line_height = get_theme_mod( 'input_line_height', '' );
  $input_border_width = get_theme_mod( 'input_border_width', '' );
  $input_border_style = get_theme_mod( 'input_border_style', '' );
  $input_border_radius = get_theme_mod( 'input_border_radius', '' );

  if ( isset( $input_vertical_padding ) && $input_vertical_padding != '' ) {
    ?>
    :root {
    --input-vertical-padding: <?php echo $input_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $input_horizontal_padding ) && $input_horizontal_padding != '' ) {
    ?>
    :root {
    --input-horizontal-padding: <?php echo $input_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $input_hover_horizontal_padding ) && $input_hover_horizontal_padding != '' ) {
    ?>
    :root {
    --input-hover-horizontal-padding: <?php echo $input_hover_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $input_font_size ) && $input_font_size != '' ) {
    ?>
    :root {
    --input-font-size: <?php echo $input_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $input_line_height ) && $input_line_height != '' ) {
    ?>
    :root {
    --input-line-height: <?php echo $input_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $input_border_width ) ) {
    ?>
    :root {
    --input-border-width: <?php echo $input_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $input_border_style ) ) {
    ?>
    :root {
    --input-border-style: <?php echo $input_border_style; ?>;
    }
    <?php
  }

  if ( isset( $input_border_radius ) && $input_border_radius != '' ) {
    ?>
    :root {
    --input-border-radius: <?php echo $input_border_radius; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
