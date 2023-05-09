<?php

/**
 * REGISTER CUSTOMIZER MODAL OPTIONS
 **/

function theme_customize_register_modals( $wp_customize ) {


  /**
   * Create Modal Options Section
   **/

  $wp_customize->add_section( 'modal_options' , array(
    'title'      => __( 'Modal Style Options', 'dream' ),
    'priority'   => 15,
  ) );

  /**
   * Modal Wrapper
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_modal_wrappers',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_modal_wrappers', array(
    'label' => 'Modal Wrappers',
    'section' => 'modal_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for modal wrappers.'
  ) ) );

  // Modal Text Align
  $wp_customize->add_setting( 'modal_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_align',
    array(
      'label' => __( 'Modal Text Align' ),
      'description' => __( 'Select a text alignment for modal windows.' ),
      'section' => 'modal_options',
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

  // Modal Width Unit Selector
  $wp_customize->add_setting( 'unit_selector--modal_width',
    array(
      'default' => 'px',
      'transport'   => 'postMessage'
    )
  );

  $wp_customize->add_control( 'unit_selector--modal_width',
    array(
      'label' => __( 'Modal Width Unit' ),
      'description' => __( 'Select px or % unit for modal width.' ),
      'section' => 'modal_options',
      'type' => 'radio',
      'choices' => array(
        'px' => __( 'px' ),
        'pct' => __( '%' )
      )
    )
  );

  // Modal Width Number Input
  $wp_customize->add_setting( 'number--modal_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'number--modal_width',
    array(
      'label' => __( 'Modal Width' ),
      'description' => __( 'Set a px value for modal window width.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  // Modal Width Range Input
  $wp_customize->add_setting( 'range--modal_width' , array(
    'default'     => 0,
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'range--modal_width', array(
    'label'	=>  'Modal Width',
    'description' => __( 'Set a % value for modal window width.' ),
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'section' => 'modal_options',
  ) ) );

  // Modal Border Width
  $wp_customize->add_setting( 'modal_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_border_width',
    array(
      'label' => __( 'Modal Border Width' ),
      'description' => __( 'Enter a px value for border width for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  // Modal Border Style
  $wp_customize->add_setting( 'modal_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_border_style',
    array(
      'label' => __( 'Modal Border Style' ),
      'description' => __( 'Select a border style for modal windows.' ),
      'section' => 'modal_options',
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

  // Modal Border Radius
  $wp_customize->add_setting( 'modal_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_border_radius',
    array(
      'label' => __( 'Modal Border Radius' ),
      'description' => __( 'Enter a px value for border radius for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  /**
   * Modal Title
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_modal_titles',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_modal_titles', array(
    'label' => 'Modal Titles',
    'section' => 'modal_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for modal titles.'
  ) ) );

  // Modal Title Font Size
  $wp_customize->add_setting( 'modal_title_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_title_font_size',
    array(
      'label' => __( 'Modal Title Font Size' ),
      'description' => __( 'Enter a px value for title font size for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  // Modal Title Font Weight
  $wp_customize->add_setting( 'modal_title_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_title_font_weight',
    array(
      'label' => __( 'Modal Title Font Weight' ),
      'description' => __( 'Select a title font weight for modal windows.' ),
      'section' => 'modal_options',
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

  // Modal Title Font Style
  $wp_customize->add_setting( 'modal_title_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_title_font_style',
    array(
      'label' => __( 'Modal Title Font Style' ),
      'description' => __( 'Select a title font style for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Modal Title Line Height
  $wp_customize->add_setting( 'modal_title_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_title_line_height',
    array(
      'label' => __( 'Modal Title Line Height' ),
      'description' => __( 'Enter a px value for title line height for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  // Modal Title Text Transform
  $wp_customize->add_setting( 'modal_title_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_title_text_transform',
    array(
      'label' => __( 'Modal Title Text Transform' ),
      'description' => __( 'Select a transform style for modal title text.' ),
      'section' => 'modal_options',
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

  // Modal Title Letter Spacing
  $wp_customize->add_setting( 'modal_title_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_title_letter_spacing',
    array(
      'label' => __( 'Modal Title Letter Spacing' ),
      'description' => __( 'Enter a px value for modal title letter spacing.' ),
      'section' => 'modal_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );


  /**
   * Modal Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_modal_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_modal_text', array(
    'label' => 'Modal Text',
    'section' => 'modal_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for modal text.'
  ) ) );

  // Modal Text Font Size
  $wp_customize->add_setting( 'modal_text_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_font_size',
    array(
      'label' => __( 'Modal Text Font Size' ),
      'description' => __( 'Enter a px value for text font size for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  // Modal Text Font Weight
  $wp_customize->add_setting( 'modal_text_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_font_weight',
    array(
      'label' => __( 'Modal Text Font Weight' ),
      'description' => __( 'Select a text font weight for modal windows.' ),
      'section' => 'modal_options',
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

  // Modal Text Font Style
  $wp_customize->add_setting( 'modal_text_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_font_style',
    array(
      'label' => __( 'Modal Text Font Style' ),
      'description' => __( 'Select a text font style for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Modal Text Line Height
  $wp_customize->add_setting( 'modal_text_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_line_height',
    array(
      'label' => __( 'Modal Text Line Height' ),
      'description' => __( 'Enter a px value for text line height for modal windows.' ),
      'section' => 'modal_options',
      'type' => 'number'
    )
  );

  // Modal Text Text Transform
  $wp_customize->add_setting( 'modal_title_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_text_transform',
    array(
      'label' => __( 'Modal Text Text Transform' ),
      'description' => __( 'Select a transform style for modal body text.' ),
      'section' => 'modal_options',
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

  // Modal Text Letter Spacing
  $wp_customize->add_setting( 'modal_text_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'modal_text_letter_spacing',
    array(
      'label' => __( 'Modal Text Letter Spacing' ),
      'description' => __( 'Enter a px value for modal text letter spacing.' ),
      'section' => 'modal_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );



}

add_action( 'customize_register', 'theme_customize_register_modals' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_modals() {
  ob_start();

  /**
   * Modal Wrapper
   **/

  $modal_text_align = get_theme_mod( 'modal_text_align', '' );
  $modal_width_unit = get_theme_mod( 'unit_selector--modal_width', '' );
  $modal_width_number = get_theme_mod( 'number--modal_width', '' );
  $modal_width_range = get_theme_mod( 'range--modal_width', '' );
  $modal_border_width = get_theme_mod( 'modal_border_width', '' );
  $modal_border_style = get_theme_mod( 'modal_border_style', '' );
  $modal_border_radius = get_theme_mod( 'modal_border_radius', '' );

  if ( !empty( $modal_text_align ) ) {
    ?>
    :root {
    --modal-text-align: <?php echo $modal_text_align; ?>;
    }
    <?php
  }

  if ( !empty( $modal_width_number ) and $modal_width_unit == 'px' ) {
    ?>
    :root {
    --modal-width: <?php echo $modal_width_number; ?>px;
    }
    <?php
  }

  if ( !empty( $modal_width_range ) and $modal_width_unit == 'pct' ) {
    ?>
    :root {
    --modal-width: <?php echo $modal_width_range; ?>%;
    }
    <?php
  }

  if ( isset( $modal_border_width ) && $modal_border_width != '' ) {
    ?>
    :root {
    --modal-border-width: <?php echo $modal_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $modal_border_style ) ) {
    ?>
    :root {
    --modal-border-style: <?php echo $modal_border_style; ?>;
    }
    <?php
  }

  if ( isset( $modal_border_radius ) && $modal_border_radius != '' ) {
    ?>
    :root {
    --modal-border-radius: <?php echo $modal_border_radius; ?>px;
    }
    <?php
  }


  /**
   * Modal Title
   **/

  $modal_title_font_size = get_theme_mod('modal_title_font_size', '');
  $modal_title_font_weight = get_theme_mod('modal_title_font_weight', '');
  $modal_title_font_style = get_theme_mod('modal_title_font_style', '');
  $modal_title_line_height = get_theme_mod('modal_title_line_height', '');
  $modal_title_text_transform = get_theme_mod('modal_title_text_transform', '');
  $modal_title_letter_spacing = get_theme_mod('modal_title_letter_spacing', '');

  if ( isset( $modal_title_font_size ) && $modal_title_font_size != '' ) {
    ?>
    :root {
    --modal-title-font-size: <?php echo $modal_title_font_size; ?>px;
    }
    <?php
  }

  if ( !empty( $modal_title_font_weight ) ) {
    ?>
    :root {
    --modal-title-font-weight: <?php echo $modal_title_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $modal_title_font_style ) ) {
    ?>
    :root {
    --modal-title-font-style: <?php echo $modal_title_font_style; ?>;
    }
    <?php
  }

  if ( isset( $modal_title_line_height ) && $modal_title_line_height != '' ) {
    ?>
    :root {
    --modal-title-line-height: <?php echo $modal_title_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $modal_title_text_transform ) ) {
    ?>
    :root {
    --modal-title-text-transform: <?php echo $modal_title_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $modal_title_letter_spacing ) && $modal_title_letter_spacing != '' ) {
    ?>
    :root {
    --modal-title-letter-spacing: <?php echo $modal_title_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Modal Text
   **/

  $modal_text_font_size = get_theme_mod('modal_text_font_size', '');
  $modal_text_font_weight = get_theme_mod('modal_text_font_weight', '');
  $modal_text_font_style = get_theme_mod('modal_text_font_style', '');
  $modal_text_line_height = get_theme_mod('modal_text_line_height', '');
  $modal_text_text_transform = get_theme_mod('modal_text_text_transform', '');
  $modal_text_letter_spacing = get_theme_mod('modal_text_letter_spacing', '');

  if ( isset( $modal_text_font_size ) && $modal_text_font_size != '' ) {
    ?>
    :root {
    --modal-text-font-size: <?php echo $modal_text_font_size; ?>px;
    }
    <?php
  }

  if ( !empty( $modal_text_font_weight ) ) {
    ?>
    :root {
    --modal-text-font-weight: <?php echo $modal_text_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $modal_text_font_style ) ) {
    ?>
    :root {
    --modal-text-font-style: <?php echo $modal_text_font_style; ?>;
    }
    <?php
  }

  if ( isset( $modal_text_line_height ) && $modal_text_line_height != '' ) {
    ?>
    :root {
    --modal-text-line-height: <?php echo $modal_text_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $modal_text_text_transform ) ) {
    ?>
    :root {
    --modal-text-text-transform: <?php echo $modal_text_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $modal_text_letter_spacing ) && $modal_text_letter_spacing != '' ) {
    ?>
    :root {
    --modal-text-letter-spacing: <?php echo $modal_text_letter_spacing; ?>px;
    }
    <?php
  }



  $css = ob_get_clean();
  return $css;

}
