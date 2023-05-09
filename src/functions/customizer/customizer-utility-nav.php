<?php

/**
 * REGISTER CUSTOMIZER UTILITY NAV OPTIONS
 **/

function theme_customize_register_utility_nav( $wp_customize ) {


  /**
   * Create Utility Nav Options Section
   **/

  $wp_customize->add_section( 'utility_nav_options' , array(
    'title'      => __( 'Utility Nav Style Options', 'dream' ),
    'priority'   => 85,
  ) );

  /**
   * Utility Nav Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_utility_nav_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_utility_nav_text', array(
    'label' => 'Utility Nav Text',
    'section' => 'utility_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for utility nav text.'
  ) ) );

  // Utility Nav Font Size
  $wp_customize->add_setting( 'utility_nav_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_font_size',
    array(
      'label' => __( 'Utility Nav Font Size' ),
      'description' => __( 'Enter a px value for label font size for utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Mobile Font Size
  $wp_customize->add_setting( 'utility_nav_mobile_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_mobile_font_size',
    array(
      'label' => __( 'Utility Nav Mobile Font Size' ),
      'description' => __( 'Enter a px value for label font size for mobile utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Font Weight
  $wp_customize->add_setting( 'utility_nav_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_font_weight',
    array(
      'label' => __( 'Utility Nav Font Weight' ),
      'description' => __( 'Select a font weight for utility nav.' ),
      'section' => 'utility_nav_options',
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

  // Utility Nav Font Style
  $wp_customize->add_setting( 'utility_nav_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_font_style',
    array(
      'label' => __( 'Utility Nav Font Style' ),
      'description' => __( 'Select a font style for utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Utility Nav Line Height
  $wp_customize->add_setting( 'utility_nav_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_line_height',
    array(
      'label' => __( 'Utility Nav Line Height' ),
      'description' => __( 'Enter a px value for label line height for utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Mobile Line Height
  $wp_customize->add_setting( 'utility_nav_mobile_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_mobile_line_height',
    array(
      'label' => __( 'Utility Nav Mobile Line Height' ),
      'description' => __( 'Enter a px value for label line height for mobile utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Text Transform
  $wp_customize->add_setting( 'utility_nav_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_text_transform',
    array(
      'label' => __( 'Utility Nav Text Transform' ),
      'description' => __( 'Select a transform style for utility nav.' ),
      'section' => 'utility_nav_options',
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

  // Utility Nav Letter Spacing
  $wp_customize->add_setting( 'utility_nav_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_letter_spacing',
    array(
      'label' => __( 'Utility Nav Letter Spacing' ),
      'description' => __( 'Enter a px value for utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Utility Nav Mobile Letter Spacing
  $wp_customize->add_setting( 'utility_nav_mobile_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_mobile_letter_spacing',
    array(
      'label' => __( 'Utility Nav Mobile Letter Spacing' ),
      'description' => __( 'Enter a px value for mobile utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );






  // Utility Nav Vertical Padding
  $wp_customize->add_setting( 'utility_nav_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_vertical_padding',
    array(
      'label' => __( 'Utility Nav Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Horizontal Padding
  $wp_customize->add_setting( 'utility_nav_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_horizontal_padding',
    array(
      'label' => __( 'Utility Nav Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for utility nav.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Utility Nav Links
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_utility_nav_links',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_utility_nav_links', array(
    'label' => 'Utility Nav Links',
    'section' => 'utility_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for utility nav links.'
  ) ) );

  // Utility Nav Link Decoration Line
  $wp_customize->add_setting( 'utility_nav_link_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_link_decoration_line',
    array(
      'label' => __( 'Utility Nav Link Decoration Line' ),
      'description' => __( 'Select a text decoration line for utility nav links.' ),
      'section' => 'utility_nav_options',
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

  // Utility Nav Link Decoration Style
  $wp_customize->add_setting( 'utility_nav_link_hover_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_link_hover_decoration_style',
    array(
      'label' => __( 'Utility Nav Link Decoration Style' ),
      'description' => __( 'Select a text decoration style for utility nav.' ),
      'section' => 'utility_nav_options',
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

  // Utility Nav Link Hover Decoration Line
  $wp_customize->add_setting( 'utility_nav_link_hover_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_link_hover_decoration_line',
    array(
      'label' => __( 'Utility Nav Link Hover Decoration Line' ),
      'description' => __( 'Select a text decoration line for utility nav link hover states.' ),
      'section' => 'utility_nav_options',
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

  // Utility Nav Link Hover Decoration Style
  $wp_customize->add_setting( 'utility_nav_link_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_link_decoration_style',
    array(
      'label' => __( 'Utility Nav Link Hover Decoration Style' ),
      'description' => __( 'Select a text decoration style for utility nav.' ),
      'section' => 'utility_nav_options',
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
   * Utility Nav Item Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_utility_nav_item_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_utility_nav_item_padding', array(
    'label' => 'Utility Nav Item Padding',
    'section' => 'utility_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default padding for utility nav items.'
  ) ) );

  // Utility Nav Item Vertical Padding
  $wp_customize->add_setting( 'utility_nav_item_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_item_vertical_padding',
    array(
      'label' => __( 'Utility Nav Item Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for utility nav items.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Item Mobile Vertical Padding
  $wp_customize->add_setting( 'utility_nav_item_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_item_mobile_vertical_padding',
    array(
      'label' => __( 'Utility Nav Item Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile utility nav items.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Item Horizontal Padding
  $wp_customize->add_setting( 'utility_nav_item_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_item_horizontal_padding',
    array(
      'label' => __( 'Utility Nav Item Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for utility nav items.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

  // Utility Nav Item Mobile Horizontal Padding
  $wp_customize->add_setting( 'utility_nav_item_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'utility_nav_item_mobile_horizontal_padding',
    array(
      'label' => __( 'Utility Nav Item Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile utility nav items.' ),
      'section' => 'utility_nav_options',
      'type' => 'number'
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_utility_nav' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_utility_nav() {
  ob_start();

  /**
   * Utility Nav Text
   **/

  $utility_nav_font_size = get_theme_mod( 'utility_nav_font_size', '' );
  $utility_nav_line_height = get_theme_mod( 'utility_nav_line_height', '' );
  $utility_nav_font_weight = get_theme_mod( 'utility_nav_font_weight', '' );
  $utility_nav_font_style = get_theme_mod( 'utility_nav_font_style', '' );
  $utility_nav_text_transform = get_theme_mod( 'utility_nav_text_transform', '' );
  $utility_nav_letter_spacing = get_theme_mod( 'utility_nav_letter_spacing', '' );
  $utility_nav_mobile_font_size = get_theme_mod( 'utility_nav_mobile_font_size', '' );
  $utility_nav_mobile_line_height = get_theme_mod( 'utility_nav_mobile_line_height', '' );
  $utility_nav_mobile_letter_spacing = get_theme_mod( 'utility_nav_mobile_letter_spacing', '' );

  if ( isset( $utility_nav_font_size ) && $utility_nav_font_size != '' ) {
    ?>
    :root {
    --utility-nav-font-size: <?php echo $utility_nav_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_line_height ) && $utility_nav_line_height != '' ) {
    ?>
    :root {
    --utility-line-height: <?php echo $utility_nav_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $utility_nav_font_weight ) ) {
    ?>
    :root {
    --utility-nav-font-weight: <?php echo $utility_nav_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_font_style ) ) {
    ?>
    :root {
    --utility-nav-font-style: <?php echo $utility_nav_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_text_transform ) ) {
    ?>
    :root {
    --utility-nav-text-transform: <?php echo $utility_nav_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $utility_nav_letter_spacing ) && $utility_nav_letter_spacing != '' ) {
    ?>
    :root {
    --utility-nav-letter-spacing: <?php echo $utility_nav_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_mobile_font_size ) && $utility_nav_mobile_font_size != '' ) {
    ?>
    :root {
    --utility-nav-font-size-mobile: <?php echo $utility_nav_mobile_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_mobile_line_height ) && $utility_nav_mobile_line_height != '' ) {
    ?>
    :root {
    --utility-line-height-mobile: <?php echo $utility_nav_mobile_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_mobile_letter_spacing ) && $utility_nav_mobile_letter_spacing != '' ) {
    ?>
    :root {
    --utility-nav-letter-spacing-mobile: <?php echo $utility_nav_mobile_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Utility Nav Links
   **/

  $utility_nav_link_decoration_line = get_theme_mod( 'utility_nav_link_decoration_line', '' );
  $utility_nav_link_decoration_style = get_theme_mod( 'utility_nav_link_decoration_style', '' );
  $utility_nav_link_hover_decoration_line = get_theme_mod( 'utility_nav_link_hover_decoration_line', '' );
  $utility_nav_link_hover_decoration_style = get_theme_mod( 'utility_nav_link_hover_decoration_style', '' );

  if ( !empty( $utility_nav_link_decoration_line ) ) {
    ?>
    :root {
    --utility-nav-link-decoration-line: <?php echo $utility_nav_link_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_link_decoration_style ) ) {
    ?>
    :root {
    --utility-nav-link-decoration-style: <?php echo $utility_nav_link_decoration_style; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_link_hover_decoration_line ) ) {
    ?>
    :root {
    --utility-nav-link-hover-decoration-line: <?php echo $utility_nav_link_hover_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $utility_nav_link_hover_decoration_style ) ) {
    ?>
    :root {
    --utility-nav-link-hover-decoration-style: <?php echo $utility_nav_link_hover_decoration_style; ?>;
    }
    <?php
  }


  /**
   * Utility Nav Item Padding
   **/

  $utility_nav_item_vertical_padding = get_theme_mod( 'utility_nav_item_vertical_padding', '' );
  $utility_nav_item_horizontal_padding = get_theme_mod( 'utility_nav_item_horizontal_padding', '' );
  $utility_nav_item_mobile_vertical_padding = get_theme_mod( 'utility_nav_item_mobile_vertical_padding', '' );
  $utility_nav_item_mobile_horizontal_padding = get_theme_mod( 'utility_nav_item_mobile_horizontal_padding', '' );

  if ( isset( $utility_nav_item_vertical_padding ) && $utility_nav_item_vertical_padding != '' ) {
    ?>
    :root {
    --utility-nav-item-vertical-padding: <?php echo $utility_nav_item_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_item_horizontal_padding ) && $utility_nav_item_horizontal_padding != '' ) {
    ?>d
    :root {
    --utility-nav-item-horizontal-padding: <?php echo $utility_nav_item_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_item_mobile_vertical_padding ) && $utility_nav_item_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --utility-nav-item-mobile-vertical-padding: <?php echo $utility_nav_item_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $utility_nav_item_mobile_horizontal_padding ) && $utility_nav_item_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --utility-nav-item-mobile-horizontal-padding: <?php echo $utility_nav_item_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}
