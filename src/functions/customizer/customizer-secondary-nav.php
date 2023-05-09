<?php

/**
 * REGISTER CUSTOMIZER SECONDARY NAV OPTIONS
 **/

function theme_customize_register_secondary_nav( $wp_customize ) {


  /**
   * Create Secondary Nav Options Section
   **/

  $wp_customize->add_section( 'secondary_nav_options' , array(
    'title'      => __( 'Secondary Nav Style Options', 'dream' ),
    'priority'   => 63,
  ) );

  /**
   * Secondary Nav Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_secondary_nav_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_secondary_nav_text', array(
    'label' => 'Secondary Nav Text',
    'section' => 'secondary_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for secondary nav text.'
  ) ) );

  // Secondary Nav Font Size
  $wp_customize->add_setting( 'secondary_nav_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_font_size',
    array(
      'label' => __( 'Secondary Nav Font Size' ),
      'description' => __( 'Enter a px value for label font size for secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Mobile Font Size
  $wp_customize->add_setting( 'secondary_nav_mobile_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_mobile_font_size',
    array(
      'label' => __( 'Secondary Nav Mobile Font Size' ),
      'description' => __( 'Enter a px value for label font size for mobile secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Font Weight
  $wp_customize->add_setting( 'secondary_nav_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_font_weight',
    array(
      'label' => __( 'Secondary Nav Font Weight' ),
      'description' => __( 'Select a font weight for secondary nav.' ),
      'section' => 'secondary_nav_options',
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

  // Secondary Nav Font Style
  $wp_customize->add_setting( 'secondary_nav_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_font_style',
    array(
      'label' => __( 'Secondary Nav Font Style' ),
      'description' => __( 'Select a font style for secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Secondary Nav Line Height
  $wp_customize->add_setting( 'secondary_nav_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_line_height',
    array(
      'label' => __( 'Secondary Nav Line Height' ),
      'description' => __( 'Enter a px value for label line height for secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Mobile Line Height
  $wp_customize->add_setting( 'secondary_nav_mobile_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_mobile_line_height',
    array(
      'label' => __( 'Secondary Nav Mobile Line Height' ),
      'description' => __( 'Enter a px value for label line height for mobile secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Text Transform
  $wp_customize->add_setting( 'secondary_nav_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_text_transform',
    array(
      'label' => __( 'Secondary Nav Text Transform' ),
      'description' => __( 'Select a transform style for secondary nav.' ),
      'section' => 'secondary_nav_options',
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

  // Secondary Nav Letter Spacing
  $wp_customize->add_setting( 'secondary_nav_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_letter_spacing',
    array(
      'label' => __( 'Secondary Nav Letter Spacing' ),
      'description' => __( 'Enter a px value for secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Secondary Nav Mobile Letter Spacing
  $wp_customize->add_setting( 'secondary_nav_mobile_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_mobile_letter_spacing',
    array(
      'label' => __( 'Secondary Nav Mobile Letter Spacing' ),
      'description' => __( 'Enter a px value for mobile secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );






  // Secondary Nav Vertical Padding
  $wp_customize->add_setting( 'secondary_nav_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_vertical_padding',
    array(
      'label' => __( 'Secondary Nav Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Horizontal Padding
  $wp_customize->add_setting( 'secondary_nav_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_horizontal_padding',
    array(
      'label' => __( 'Secondary Nav Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for secondary nav.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Secondary Nav Links
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_secondary_nav_links',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_secondary_nav_links', array(
    'label' => 'Secondary Nav Links',
    'section' => 'secondary_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for secondary nav links.'
  ) ) );

  // Secondary Nav Link Decoration Line
  $wp_customize->add_setting( 'secondary_nav_link_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_link_decoration_line',
    array(
      'label' => __( 'Secondary Nav Link Decoration Line' ),
      'description' => __( 'Select a text decoration line for secondary nav links.' ),
      'section' => 'secondary_nav_options',
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

  // Secondary Nav Link Decoration Style
  $wp_customize->add_setting( 'secondary_nav_link_hover_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_link_hover_decoration_style',
    array(
      'label' => __( 'Secondary Nav Link Decoration Style' ),
      'description' => __( 'Select a text decoration style for secondary nav.' ),
      'section' => 'secondary_nav_options',
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

  // Secondary Nav Link Hover Decoration Line
  $wp_customize->add_setting( 'secondary_nav_link_hover_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_link_hover_decoration_line',
    array(
      'label' => __( 'Secondary Nav Link Hover Decoration Line' ),
      'description' => __( 'Select a text decoration line for secondary nav link hover states.' ),
      'section' => 'secondary_nav_options',
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

  // Secondary Nav Link Hover Decoration Style
  $wp_customize->add_setting( 'secondary_nav_link_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_link_decoration_style',
    array(
      'label' => __( 'Secondary Nav Link Hover Decoration Style' ),
      'description' => __( 'Select a text decoration style for secondary nav.' ),
      'section' => 'secondary_nav_options',
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
   * Secondary Nav Item Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_secondary_nav_item_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_secondary_nav_item_padding', array(
    'label' => 'Secondary Nav Item Padding',
    'section' => 'secondary_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default padding for secondary nav items.'
  ) ) );

  // Secondary Nav Item Vertical Padding
  $wp_customize->add_setting( 'secondary_nav_item_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_item_vertical_padding',
    array(
      'label' => __( 'Secondary Nav Item Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for secondary nav items.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Item Mobile Vertical Padding
  $wp_customize->add_setting( 'secondary_nav_item_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_item_mobile_vertical_padding',
    array(
      'label' => __( 'Secondary Nav Item Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile secondary nav items.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Item Horizontal Padding
  $wp_customize->add_setting( 'secondary_nav_item_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_item_horizontal_padding',
    array(
      'label' => __( 'Secondary Nav Item Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for secondary nav items.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

  // Secondary Nav Item Mobile Horizontal Padding
  $wp_customize->add_setting( 'secondary_nav_item_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'secondary_nav_item_mobile_horizontal_padding',
    array(
      'label' => __( 'Secondary Nav Item Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile secondary nav items.' ),
      'section' => 'secondary_nav_options',
      'type' => 'number'
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_secondary_nav' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_secondary_nav() {
  ob_start();

  /**
   * Secondary Nav Text
   **/

  $secondary_nav_font_size = get_theme_mod( 'secondary_nav_font_size', '' );
  $secondary_nav_line_height = get_theme_mod( 'secondary_nav_line_height', '' );
  $secondary_nav_font_weight = get_theme_mod( 'secondary_nav_font_weight', '' );
  $secondary_nav_font_style = get_theme_mod( 'secondary_nav_font_style', '' );
  $secondary_nav_text_transform = get_theme_mod( 'secondary_nav_text_transform', '' );
  $secondary_nav_letter_spacing = get_theme_mod( 'secondary_nav_letter_spacing', '' );
  $secondary_nav_mobile_font_size = get_theme_mod( 'secondary_nav_mobile_font_size', '' );
  $secondary_nav_mobile_line_height = get_theme_mod( 'secondary_nav_mobile_line_height', '' );
  $secondary_nav_mobile_letter_spacing = get_theme_mod( 'secondary_nav_mobile_letter_spacing', '' );

  if ( isset( $secondary_nav_font_size ) && $secondary_nav_font_size != '' ) {
    ?>
    :root {
    --secondary-nav-font-size: <?php echo $secondary_nav_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_line_height ) && $secondary_nav_line_height != '' ) {
    ?>
    :root {
    --secondary-line-height: <?php echo $secondary_nav_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $secondary_nav_font_weight ) ) {
    ?>
    :root {
    --secondary-nav-font-weight: <?php echo $secondary_nav_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_font_style ) ) {
    ?>
    :root {
    --secondary-nav-font-style: <?php echo $secondary_nav_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_text_transform ) ) {
    ?>
    :root {
    --secondary-nav-text-transform: <?php echo $secondary_nav_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $secondary_nav_letter_spacing ) && $secondary_nav_letter_spacing != '' ) {
    ?>
    :root {
    --secondary-nav-letter-spacing: <?php echo $secondary_nav_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_mobile_font_size ) && $secondary_nav_mobile_font_size != '' ) {
    ?>
    :root {
    --secondary-nav-font-size-mobile: <?php echo $secondary_nav_mobile_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_mobile_line_height ) && $secondary_nav_mobile_line_height != '' ) {
    ?>
    :root {
    --secondary-line-height-mobile: <?php echo $secondary_nav_mobile_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_mobile_letter_spacing ) && $secondary_nav_mobile_letter_spacing != '' ) {
    ?>
    :root {
    --secondary-nav-letter-spacing-mobile: <?php echo $secondary_nav_mobile_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Secondary Nav Links
   **/

  $secondary_nav_link_decoration_line = get_theme_mod( 'secondary_nav_link_decoration_line', '' );
  $secondary_nav_link_decoration_style = get_theme_mod( 'secondary_nav_link_decoration_style', '' );
  $secondary_nav_link_hover_decoration_line = get_theme_mod( 'secondary_nav_link_hover_decoration_line', '' );
  $secondary_nav_link_hover_decoration_style = get_theme_mod( 'secondary_nav_link_hover_decoration_style', '' );

  if ( !empty( $secondary_nav_link_decoration_line ) ) {
    ?>
    :root {
    --secondary-nav-link-decoration-line: <?php echo $secondary_nav_link_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_link_decoration_style ) ) {
    ?>
    :root {
    --secondary-nav-link-decoration-style: <?php echo $secondary_nav_link_decoration_style; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_link_hover_decoration_line ) ) {
    ?>
    :root {
    --secondary-nav-link-hover-decoration-line: <?php echo $secondary_nav_link_hover_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $secondary_nav_link_hover_decoration_style ) ) {
    ?>
    :root {
    --secondary-nav-link-hover-decoration-style: <?php echo $secondary_nav_link_hover_decoration_style; ?>;
    }
    <?php
  }


  /**
   * Secondary Nav Item Padding
   **/

  $secondary_nav_item_vertical_padding = get_theme_mod( 'secondary_nav_item_vertical_padding', '' );
  $secondary_nav_item_horizontal_padding = get_theme_mod( 'secondary_nav_item_horizontal_padding', '' );
  $secondary_nav_item_mobile_vertical_padding = get_theme_mod( 'secondary_nav_item_mobile_vertical_padding', '' );
  $secondary_nav_item_mobile_horizontal_padding = get_theme_mod( 'secondary_nav_item_mobile_horizontal_padding', '' );

  if ( isset( $secondary_nav_item_vertical_padding ) && $secondary_nav_item_vertical_padding != '' ) {
    ?>
    :root {
    --secondary-nav-item-vertical-padding: <?php echo $secondary_nav_item_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_item_horizontal_padding ) && $secondary_nav_item_horizontal_padding != '' ) {
    ?>
    :root {
    --secondary-nav-item-horizontal-padding: <?php echo $secondary_nav_item_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_item_mobile_vertical_padding ) && $secondary_nav_item_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --secondary-nav-item-mobile-vertical-padding: <?php echo $secondary_nav_item_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $secondary_nav_item_mobile_horizontal_padding ) && $secondary_nav_item_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --secondary-nav-item-mobile-horizontal-padding: <?php echo $secondary_nav_item_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}
