<?php

/**
 * REGISTER CUSTOMIZER PRIMARY NAV OPTIONS
 **/

function theme_customize_register_primary_nav( $wp_customize ) {


  /**
   * Create Primary Nav Options Section
   **/

  $wp_customize->add_section( 'primary_nav_options' , array(
    'title'      => __( 'Primary Nav Style Options', 'dream' ),
    'priority'   => 62,
  ) );

  /**
   * Primary Nav Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_primary_nav_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_primary_nav_text', array(
    'label' => 'Primary Nav Text',
    'section' => 'primary_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for primary nav text.'
  ) ) );

  // Primary Nav Font Size
  $wp_customize->add_setting( 'primary_nav_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_font_size',
    array(
      'label' => __( 'Primary Nav Font Size' ),
      'description' => __( 'Enter a px value for label font size for primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Mobile Font Size
  $wp_customize->add_setting( 'primary_nav_mobile_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_mobile_font_size',
    array(
      'label' => __( 'Primary Nav Mobile Font Size' ),
      'description' => __( 'Enter a px value for label font size for mobile primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Font Weight
  $wp_customize->add_setting( 'primary_nav_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_font_weight',
    array(
      'label' => __( 'Primary Nav Font Weight' ),
      'description' => __( 'Select a font weight for primary nav.' ),
      'section' => 'primary_nav_options',
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

  // Primary Nav Font Style
  $wp_customize->add_setting( 'primary_nav_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_font_style',
    array(
      'label' => __( 'Primary Nav Font Style' ),
      'description' => __( 'Select a font style for primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Primary Nav Line Height
  $wp_customize->add_setting( 'primary_nav_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_line_height',
    array(
      'label' => __( 'Primary Nav Line Height' ),
      'description' => __( 'Enter a px value for label line height for primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Mobile Line Height
  $wp_customize->add_setting( 'primary_nav_mobile_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_mobile_line_height',
    array(
      'label' => __( 'Primary Nav Mobile Line Height' ),
      'description' => __( 'Enter a px value for label line height for mobile primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Text Transform
  $wp_customize->add_setting( 'primary_nav_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_text_transform',
    array(
      'label' => __( 'Primary Nav Text Transform' ),
      'description' => __( 'Select a transform style for primary nav.' ),
      'section' => 'primary_nav_options',
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

  // Primary Nav Letter Spacing
  $wp_customize->add_setting( 'primary_nav_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_letter_spacing',
    array(
      'label' => __( 'Primary Nav Letter Spacing' ),
      'description' => __( 'Enter a px value for primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Primary Nav Mobile Letter Spacing
  $wp_customize->add_setting( 'primary_nav_mobile_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_mobile_letter_spacing',
    array(
      'label' => __( 'Primary Nav Mobile Letter Spacing' ),
      'description' => __( 'Enter a px value for mobile primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );






  // Primary Nav Vertical Padding
  $wp_customize->add_setting( 'primary_nav_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_vertical_padding',
    array(
      'label' => __( 'Primary Nav Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Horizontal Padding
  $wp_customize->add_setting( 'primary_nav_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_horizontal_padding',
    array(
      'label' => __( 'Primary Nav Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for primary nav.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Primary Nav Links
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_primary_nav_links',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_primary_nav_links', array(
    'label' => 'Primary Nav Links',
    'section' => 'primary_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for primary nav links.'
  ) ) );

  // Primary Nav Link Decoration Line
  $wp_customize->add_setting( 'primary_nav_link_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_link_decoration_line',
    array(
      'label' => __( 'Primary Nav Link Decoration Line' ),
      'description' => __( 'Select a text decoration line for primary nav links.' ),
      'section' => 'primary_nav_options',
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

  // Primary Nav Link Decoration Style
  $wp_customize->add_setting( 'primary_nav_link_hover_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_link_hover_decoration_style',
    array(
      'label' => __( 'Primary Nav Link Decoration Style' ),
      'description' => __( 'Select a text decoration style for primary nav.' ),
      'section' => 'primary_nav_options',
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

  // Primary Nav Link Hover Decoration Line
  $wp_customize->add_setting( 'primary_nav_link_hover_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_link_hover_decoration_line',
    array(
      'label' => __( 'Primary Nav Link Hover Decoration Line' ),
      'description' => __( 'Select a text decoration line for primary nav link hover states.' ),
      'section' => 'primary_nav_options',
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

  // Primary Nav Link Hover Decoration Style
  $wp_customize->add_setting( 'primary_nav_link_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_link_decoration_style',
    array(
      'label' => __( 'Primary Nav Link Hover Decoration Style' ),
      'description' => __( 'Select a text decoration style for primary nav.' ),
      'section' => 'primary_nav_options',
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
   * Primary Nav Item Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_primary_nav_item_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_primary_nav_item_padding', array(
    'label' => 'Primary Nav Item Padding',
    'section' => 'primary_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default padding for primary nav items.'
  ) ) );

  // Primary Nav Item Vertical Padding
  $wp_customize->add_setting( 'primary_nav_item_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_item_vertical_padding',
    array(
      'label' => __( 'Primary Nav Item Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for primary nav items.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Item Mobile Vertical Padding
  $wp_customize->add_setting( 'primary_nav_item_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_item_mobile_vertical_padding',
    array(
      'label' => __( 'Primary Nav Item Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile primary nav items.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Item Horizontal Padding
  $wp_customize->add_setting( 'primary_nav_item_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_item_horizontal_padding',
    array(
      'label' => __( 'Primary Nav Item Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for primary nav items.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

  // Primary Nav Item Mobile Horizontal Padding
  $wp_customize->add_setting( 'primary_nav_item_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'primary_nav_item_mobile_horizontal_padding',
    array(
      'label' => __( 'Primary Nav Item Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile primary nav items.' ),
      'section' => 'primary_nav_options',
      'type' => 'number'
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_primary_nav' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_primary_nav() {
  ob_start();

  /**
   * Primary Nav Text
   **/

  $primary_nav_font_size = get_theme_mod( 'primary_nav_font_size', '' );
  $primary_nav_line_height = get_theme_mod( 'primary_nav_line_height', '' );
  $primary_nav_font_weight = get_theme_mod( 'primary_nav_font_weight', '' );
  $primary_nav_font_style = get_theme_mod( 'primary_nav_font_style', '' );
  $primary_nav_text_transform = get_theme_mod( 'primary_nav_text_transform', '' );
  $primary_nav_letter_spacing = get_theme_mod( 'primary_nav_letter_spacing', '' );
  $primary_nav_mobile_font_size = get_theme_mod( 'primary_nav_mobile_font_size', '' );
  $primary_nav_mobile_line_height = get_theme_mod( 'primary_nav_mobile_line_height', '' );
  $primary_nav_mobile_letter_spacing = get_theme_mod( 'primary_nav_mobile_letter_spacing', '' );

  if ( isset( $primary_nav_font_size ) && $primary_nav_font_size != '' ) {
    ?>
    :root {
    --primary-nav-font-size: <?php echo $primary_nav_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_line_height ) && $primary_nav_line_height != '' ) {
    ?>
    :root {
    --primary-nav-line-height: <?php echo $primary_nav_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $primary_nav_font_weight ) ) {
    ?>
    :root {
    --primary-nav-font-weight: <?php echo $primary_nav_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_font_style ) ) {
    ?>
    :root {
    --primary-nav-font-style: <?php echo $primary_nav_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_text_transform ) ) {
    ?>
    :root {
    --primary-nav-text-transform: <?php echo $primary_nav_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $primary_nav_letter_spacing ) && $primary_nav_letter_spacing != '' ) {
    ?>
    :root {
    --primary-nav-letter-spacing: <?php echo $primary_nav_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_mobile_font_size ) && $primary_nav_mobile_font_size != '' ) {
    ?>
    :root {
    --primary-nav-font-size-mobile: <?php echo $primary_nav_mobile_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_mobile_line_height ) && $primary_nav_mobile_line_height != '' ) {
    ?>
    :root {
    --primary-nav-height-mobile: <?php echo $primary_nav_mobile_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_mobile_letter_spacing ) && $primary_nav_mobile_letter_spacing != '' ) {
    ?>
    :root {
    --primary-nav-letter-spacing-mobile: <?php echo $primary_nav_mobile_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Primary Nav Links
   **/

  $primary_nav_link_decoration_line = get_theme_mod( 'primary_nav_link_decoration_line', '' );
  $primary_nav_link_decoration_style = get_theme_mod( 'primary_nav_link_decoration_style', '' );
  $primary_nav_link_hover_decoration_line = get_theme_mod( 'primary_nav_link_hover_decoration_line', '' );
  $primary_nav_link_hover_decoration_style = get_theme_mod( 'primary_nav_link_hover_decoration_style', '' );

  if ( !empty( $primary_nav_link_decoration_line ) ) {
    ?>
    :root {
    --primary-nav-link-decoration-line: <?php echo $primary_nav_link_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_link_decoration_style ) ) {
    ?>
    :root {
    --primary-nav-link-decoration-style: <?php echo $primary_nav_link_decoration_style; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_link_hover_decoration_line ) ) {
    ?>
    :root {
    --primary-nav-link-hover-decoration-line: <?php echo $primary_nav_link_hover_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $primary_nav_link_hover_decoration_style ) ) {
    ?>
    :root {
    --primary-nav-link-hover-decoration-style: <?php echo $primary_nav_link_hover_decoration_style; ?>;
    }
    <?php
  }


  /**
   * Primary Nav Item Padding
   **/

  $primary_nav_item_vertical_padding = get_theme_mod( 'primary_nav_item_vertical_padding', '' );
  $primary_nav_item_horizontal_padding = get_theme_mod( 'primary_nav_item_horizontal_padding', '' );
  $primary_nav_item_mobile_vertical_padding = get_theme_mod( 'primary_nav_item_mobile_vertical_padding', '' );
  $primary_nav_item_mobile_horizontal_padding = get_theme_mod( 'primary_nav_item_mobile_horizontal_padding', '' );

  if ( isset( $primary_nav_item_vertical_padding ) && $primary_nav_item_vertical_padding != '' ) {
    ?>
    :root {
    --primary-nav-item-vertical-padding: <?php echo $primary_nav_item_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_item_horizontal_padding ) && $primary_nav_item_horizontal_padding != '' ) {
    ?>
    :root {
    --primary-nav-item-horizontal-padding: <?php echo $primary_nav_item_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_item_mobile_vertical_padding ) && $primary_nav_item_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --primary-nav-item-mobile-vertical-padding: <?php echo $primary_nav_item_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $primary_nav_item_mobile_horizontal_padding ) && $primary_nav_item_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --primary-nav-item-mobile-horizontal-padding: <?php echo $primary_nav_item_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}
