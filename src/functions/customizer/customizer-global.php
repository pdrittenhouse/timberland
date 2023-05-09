<?php

/**
 * REGISTER CUSTOMIZER GLOBAL OPTIONS
 **/

function theme_customize_register_global( $wp_customize ) {


  /**
   * Create Global Options Section
   **/

  $wp_customize->add_section( 'global_options' , array(
    'title'      => __( 'Global Style Options', 'dream' ),
    'priority'   => 11,
  ) );

  /**
   * Headings
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_heading_font_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_heading_font_size', array(
    'label' => 'Headings',
    'section' => 'global_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for h1 - h6 heading tags.'
  ) ) );

  // H1 Font Size
  $wp_customize->add_setting( 'h1_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'h1_font_size',
    array(
      'label' => __( 'H1 Font Size' ),
      'description' => __( 'Enter a px value for h1 font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // H2 Font Size
  $wp_customize->add_setting( 'h2_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'h2_font_size',
    array(
      'label' => __( 'H2 Font Size' ),
      'description' => __( 'Enter a px value for h2 font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // H3 Font Size
  $wp_customize->add_setting( 'h3_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'h3_font_size',
    array(
      'label' => __( 'H3 Font Size' ),
      'description' => __( 'Enter a px value for h3 font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // H4 Font Size
  $wp_customize->add_setting( 'h4_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'h4_font_size',
    array(
      'label' => __( 'H4 Font Size' ),
      'description' => __( 'Enter a px value for h4 font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // H5 Font Size
  $wp_customize->add_setting( 'h5_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'h5_font_size',
    array(
      'label' => __( 'H5 Font Size' ),
      'description' => __( 'Enter a px value for h5 font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // H6 Font Size
  $wp_customize->add_setting( 'h6_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'h6_font_size',
    array(
      'label' => __( 'H6 Font Size' ),
      'description' => __( 'Enter a px value for h6 font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // Heading Line Height
  $wp_customize->add_setting( 'heading_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'heading_line_height',
    array(
      'label' => __( 'Heading Line Height' ),
      'description' => __( 'Enter a px value for heading line height.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );


  /**
   * Content Elements
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_content_elements',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_content_elements', array(
    'label' => 'Content Elements',
    'section' => 'global_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for content elements.'
  ) ) );

  // Paragraph Font Size
  $wp_customize->add_setting( 'paragraph_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'paragraph_font_size',
    array(
      'label' => __( 'Paragraph Font Size' ),
      'description' => __( 'Enter a px value for paragraph font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // Paragraph Line Height
  $wp_customize->add_setting( 'paragraph_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'paragraph_line_height',
    array(
      'label' => __( 'Paragraph Line Height' ),
      'description' => __( 'Enter a px value for paragraph line height.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // Font Size Large
  $wp_customize->add_setting( 'font_size_lg',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'font_size_lg',
    array(
      'label' => __( 'Font Size Large' ),
      'description' => __( 'Enter a px value for large/huge font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // Font Size Small
  $wp_customize->add_setting( 'font_size_sm',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'font_size_sm',
    array(
      'label' => __( 'Font Size Small' ),
      'description' => __( 'Enter a px value for tiny/small font size.' ),
      'section' => 'global_options',
      'type' => 'number'
    )
  );

  // Link Decoration Line
  $wp_customize->add_setting( 'link_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'link_decoration_line',
    array(
      'label' => __( 'Link Decoration Line' ),
      'description' => __( 'Select a text decoration line for links.' ),
      'section' => 'global_options',
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

  // Link Decoration Style
  $wp_customize->add_setting( 'link_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'link_decoration_style',
    array(
      'label' => __( 'Link Decoration Style' ),
      'description' => __( 'Select a text decoration style for links.' ),
      'section' => 'global_options',
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

  // Link Hover Decoration Line
  $wp_customize->add_setting( 'link_hover_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'link_hover_decoration_line',
    array(
      'label' => __( 'Link Hover Decoration Line' ),
      'description' => __( 'Select a text decoration line for links.' ),
      'section' => 'global_options',
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

  // Link Hover Decoration Style
  $wp_customize->add_setting( 'link_hover_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'link_hover_decoration_style',
    array(
      'label' => __( 'Link Hover Decoration Style' ),
      'description' => __( 'Select a text decoration style for link hover states.' ),
      'section' => 'global_options',
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


  /**
   * Global Transitions
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_transitions',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_transitions', array(
    'label' => 'Global Transitions',
    'section' => 'global_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define global transition styling.'
  ) ) );

  // Transition Properties
  $wp_customize->add_setting( 'transition_properties',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'transition_properties',
    array(
      'label' => __( 'Transition Properties' ),
      'description' => __( 'Enter a comma delineated list of CSS properties.' ),
      'section' => 'global_options',
      'type' => 'text'
    )
  );

  // Transition Duration
  $wp_customize->add_setting( 'transition_duration',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'transition_duration',
    array(
      'label' => __( 'Transition Duration' ),
      'description' => __( 'Enter a transition duration in milliseconds.' ),
      'section' => 'global_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Transition Timing Function
  $wp_customize->add_setting( 'transition_timing_function',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'transition_timing_function',
    array(
      'label' => __( 'Transiton Timing Function' ),
      'description' => __( 'Select a timing function for global transitions.' ),
      'section' => 'global_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'ease' => __( 'Ease' ),
        'ease-in' => __( 'Ease In' ),
        'ease-out' => __( 'Ease Out' ),
        'ease-in-out' => __( 'Ease In/Out' ),
        'linear' => __( 'Linear' ),
        'step-start' => __( 'Step Start' ),
        'step-end' => __( 'Step End' )
      )
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_global' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_global() {
  ob_start();

  /**
   * Headings
   **/

  $h1_font_size = get_theme_mod( 'h1_font_size', '' );
  $h2_font_size = get_theme_mod( 'h2_font_size', '' );
  $h3_font_size = get_theme_mod( 'h3_font_size', '' );
  $h4_font_size = get_theme_mod( 'h4_font_size', '' );
  $h5_font_size = get_theme_mod( 'h5_font_size', '' );
  $h6_font_size = get_theme_mod( 'h6_font_size', '' );
  $heading_line_height = get_theme_mod( 'heading_line_height', '' );

  if ( isset( $h1_font_size ) && $h1_font_size != '' ) {
    ?>
    :root {
    --h1-font-size: <?php echo $h1_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $h2_font_size ) && $h2_font_size != '' ) {
    ?>
    :root {
    --h2-font-size: <?php echo $h2_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $h3_font_size ) && $h3_font_size != '' ) {
    ?>
    :root {
    --h3-font-size: <?php echo $h3_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $h4_font_size ) && $h4_font_size != '' ) {
    ?>
    :root {
    --h4-font-size: <?php echo $h4_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $h5_font_size ) && $h5_font_size != '' ) {
    ?>
    :root {
    --h5-font-size: <?php echo $h5_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $h6_font_size ) && $h6_font_size != '' ) {
    ?>
    :root {
    --h6-font-size: <?php echo $h6_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $heading_line_height ) && $heading_line_height != '' ) {
    ?>
    :root {
    --heading-line-height: <?php echo $heading_line_height; ?>px;
    }
    <?php
  }

  /**
   * Content Elements
   **/

  $paragraph_font_size = get_theme_mod( 'paragraph_font_size', '' );
  $font_size_lg = get_theme_mod( 'font_size_lg', '' );
  $font_size_sm = get_theme_mod( 'font_size_sm', '' );
  $paragraph_line_height = get_theme_mod( 'paragraph_line_height', '' );
  $link_decoration_line = get_theme_mod( 'link_decoration_line', '' );
  $link_decoration_style = get_theme_mod( 'link_decoration_style', '' );
  $link_hover_decoration_line = get_theme_mod( 'link_hover_decoration_line', '' );
  $link_hover_decoration_style = get_theme_mod( 'link_hover_decoration_style', '' );

  if ( isset( $paragraph_font_size ) && $paragraph_font_size != '' ) {
    ?>
    :root {
    --paragraph-font-size: <?php echo $paragraph_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $font_size_lg ) && $font_size_lg != '' ) {
    ?>
    :root {
    --font-size-lg: <?php echo $font_size_lg; ?>px;
    }
    <?php
  }

  if ( isset( $font_size_sm ) && $font_size_sm != '' ) {
    ?>
    :root {
    --font-size-sm: <?php echo $font_size_sm; ?>px;
    }
    <?php
  }

  if ( isset( $paragraph_line_height ) && $paragraph_line_height != '' ) {
    ?>
    :root {
    --paragraph-line-height: <?php echo $paragraph_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $link_decoration_line ) ) {
    ?>
    :root {
    --link-decoration-line: <?php echo $link_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $link_decoration_style ) ) {
    ?>
    :root {
    --link-decoration-style: <?php echo $link_decoration_style; ?>;
    }
    <?php
  }


  if ( !empty( $link_hover_decoration_line ) ) {
    ?>
    :root {
    --link-hover-decoration-line: <?php echo $link_hover_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $link_hover_decoration_style ) ) {
    ?>
    :root {
    --link-hover-decoration-style: <?php echo $link_hover_decoration_style; ?>;
    }
    <?php
  }


  /**
   * Global Transitions
   **/

  $transition_properties = get_theme_mod( 'transition_properties', '' );
  $transition_duration = get_theme_mod( 'transition_duration', '' );
  $transition_timing_function = get_theme_mod( 'transition_timing_function', '' );

  if ( !empty( $transition_properties ) ) {
    ?>
    :root {
    --global-transition-properties: <?php echo $transition_properties; ?>;
    }
    <?php
  }

  if ( isset( $transition_duration ) && $transition_duration != '' ) {
    ?>
    :root {
    --global-transition-duration: <?php echo $transition_duration; ?>ms;
    }
    <?php
  }

  if ( !empty( $transition_timing_function ) ) {
    ?>
    :root {
    --global-transition-timing-function: <?php echo $transition_timing_function; ?>;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}
