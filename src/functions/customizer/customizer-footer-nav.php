<?php

/**
 * REGISTER CUSTOMIZER FOOTER NAV OPTIONS
 **/

function theme_customize_register_footer_nav( $wp_customize ) {


  /**
   * Create Footer Nav Options Section
   **/

  $wp_customize->add_section( 'footer_nav_options' , array(
    'title'      => __( 'Footer Nav Style Options', 'dream' ),
    'priority'   => 84,
  ) );

  /**
   * Footer Nav Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_nav_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_nav_text', array(
    'label' => 'Footer Nav Text',
    'section' => 'footer_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for footer nav text.'
  ) ) );

  // Footer Nav Font Size
  $wp_customize->add_setting( 'footer_nav_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_font_size',
    array(
      'label' => __( 'Footer Nav Font Size' ),
      'description' => __( 'Enter a px value for label font size for footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Mobile Font Size
  $wp_customize->add_setting( 'footer_nav_mobile_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_mobile_font_size',
    array(
      'label' => __( 'Footer Nav Mobile Font Size' ),
      'description' => __( 'Enter a px value for label font size for mobile footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Font Weight
  $wp_customize->add_setting( 'footer_nav_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_font_weight',
    array(
      'label' => __( 'Footer Nav Font Weight' ),
      'description' => __( 'Select a font weight for footer nav.' ),
      'section' => 'footer_nav_options',
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

  // Footer Nav Font Style
  $wp_customize->add_setting( 'footer_nav_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_font_style',
    array(
      'label' => __( 'Footer Nav Font Style' ),
      'description' => __( 'Select a font style for footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Footer Nav Line Height
  $wp_customize->add_setting( 'footer_nav_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_line_height',
    array(
      'label' => __( 'Footer Nav Line Height' ),
      'description' => __( 'Enter a px value for label line height for footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Mobile Line Height
  $wp_customize->add_setting( 'footer_nav_mobile_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_mobile_line_height',
    array(
      'label' => __( 'Footer Nav Mobile Line Height' ),
      'description' => __( 'Enter a px value for label line height for mobile footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Text Transform
  $wp_customize->add_setting( 'footer_nav_text_transform',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_text_transform',
    array(
      'label' => __( 'Footer Nav Text Transform' ),
      'description' => __( 'Select a transform style for footer nav.' ),
      'section' => 'footer_nav_options',
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

  // Footer Nav Letter Spacing
  $wp_customize->add_setting( 'footer_nav_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_letter_spacing',
    array(
      'label' => __( 'Footer Nav Letter Spacing' ),
      'description' => __( 'Enter a px value for footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );

  // Footer Nav Mobile Letter Spacing
  $wp_customize->add_setting( 'footer_nav_mobile_letter_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_mobile_letter_spacing',
    array(
      'label' => __( 'Footer Nav Mobile Letter Spacing' ),
      'description' => __( 'Enter a px value for mobile footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '0.01'
      )
    )
  );






  // Footer Nav Vertical Padding
  $wp_customize->add_setting( 'footer_nav_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_vertical_padding',
    array(
      'label' => __( 'Footer Nav Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Horizontal Padding
  $wp_customize->add_setting( 'footer_nav_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_horizontal_padding',
    array(
      'label' => __( 'Footer Nav Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer nav.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Nav Links
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_nav_links',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_nav_links', array(
    'label' => 'Footer Nav Links',
    'section' => 'footer_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for footer nav links.'
  ) ) );

  // Footer Nav Link Decoration Line
  $wp_customize->add_setting( 'footer_nav_link_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_link_decoration_line',
    array(
      'label' => __( 'Footer Nav Link Decoration Line' ),
      'description' => __( 'Select a text decoration line for footer nav links.' ),
      'section' => 'footer_nav_options',
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

  // Footer Nav Link Decoration Style
  $wp_customize->add_setting( 'footer_nav_link_hover_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_link_hover_decoration_style',
    array(
      'label' => __( 'Footer Nav Link Decoration Style' ),
      'description' => __( 'Select a text decoration style for footer nav.' ),
      'section' => 'footer_nav_options',
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

  // Footer Nav Link Hover Decoration Line
  $wp_customize->add_setting( 'footer_nav_link_hover_decoration_line',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_link_hover_decoration_line',
    array(
      'label' => __( 'Footer Nav Link Hover Decoration Line' ),
      'description' => __( 'Select a text decoration line for footer nav link hover states.' ),
      'section' => 'footer_nav_options',
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

  // Footer Nav Link Hover Decoration Style
  $wp_customize->add_setting( 'footer_nav_link_decoration_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_link_decoration_style',
    array(
      'label' => __( 'Footer Nav Link Hover Decoration Style' ),
      'description' => __( 'Select a text decoration style for footer nav.' ),
      'section' => 'footer_nav_options',
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
   * Footer Nav Item Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_nav_item_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_nav_item_padding', array(
    'label' => 'Footer Nav Item Padding',
    'section' => 'footer_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default padding for footer nav items.'
  ) ) );

  // Footer Nav Item Vertical Padding
  $wp_customize->add_setting( 'footer_nav_item_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_item_vertical_padding',
    array(
      'label' => __( 'Footer Nav Item Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for footer nav items.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Item Mobile Vertical Padding
  $wp_customize->add_setting( 'footer_nav_item_mobile_vertical_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_item_mobile_vertical_padding',
    array(
      'label' => __( 'Footer Nav Item Mobile Vertical Padding' ),
      'description' => __( 'Enter a px value for top and bottom padding for mobile footer nav items.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Item Horizontal Padding
  $wp_customize->add_setting( 'footer_nav_item_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_item_horizontal_padding',
    array(
      'label' => __( 'Footer Nav Item Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for footer nav items.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

  // Footer Nav Item Mobile Horizontal Padding
  $wp_customize->add_setting( 'footer_nav_item_mobile_horizontal_padding',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_nav_item_mobile_horizontal_padding',
    array(
      'label' => __( 'Footer Nav Item Mobile Horizontal Padding' ),
      'description' => __( 'Enter a px value for left and right padding for mobile footer nav items.' ),
      'section' => 'footer_nav_options',
      'type' => 'number'
    )
  );

}

add_action( 'customize_register', 'theme_customize_register_footer_nav' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_nav() {
  ob_start();

  /**
   * Footer Nav Text
   **/

  $footer_nav_font_size = get_theme_mod( 'footer_nav_font_size', '' );
  $footer_nav_line_height = get_theme_mod( 'footer_nav_line_height', '' );
  $footer_nav_font_weight = get_theme_mod( 'footer_nav_font_weight', '' );
  $footer_nav_font_style = get_theme_mod( 'footer_nav_font_style', '' );
  $footer_nav_text_transform = get_theme_mod( 'footer_nav_text_transform', '' );
  $footer_nav_letter_spacing = get_theme_mod( 'footer_nav_letter_spacing', '' );
  $footer_nav_mobile_font_size = get_theme_mod( 'footer_nav_mobile_font_size', '' );
  $footer_nav_mobile_line_height = get_theme_mod( 'footer_nav_mobile_line_height', '' );
  $footer_nav_mobile_letter_spacing = get_theme_mod( 'footer_nav_mobile_letter_spacing', '' );

  if ( isset( $footer_nav_font_size ) && $footer_nav_font_size != '' ) {
    ?>
    :root {
    --footer-nav-font-size: <?php echo $footer_nav_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_line_height ) && $footer_nav_line_height != '' ) {
    ?>
    :root {
    --footer-line-height: <?php echo $footer_nav_line_height; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_nav_font_weight ) ) {
    ?>
    :root {
    --footer-nav-font-weight: <?php echo $footer_nav_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_font_style ) ) {
    ?>
    :root {
    --footer-nav-font-style: <?php echo $footer_nav_font_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_text_transform ) ) {
    ?>
    :root {
    --footer-nav-text-transform: <?php echo $footer_nav_text_transform; ?>;
    }
    <?php
  }

  if ( isset( $footer_nav_letter_spacing ) && $footer_nav_letter_spacing != '' ) {
    ?>
    :root {
    --footer-nav-letter-spacing: <?php echo $footer_nav_letter_spacing; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_mobile_font_size ) && $footer_nav_mobile_font_size != '' ) {
    ?>
    :root {
    --footer-nav-font-size-mobile: <?php echo $footer_nav_mobile_font_size; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_mobile_line_height ) && $footer_nav_mobile_line_height != '' ) {
    ?>
    :root {
    --footer-line-height-mobile: <?php echo $footer_nav_mobile_line_height; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_mobile_letter_spacing ) && $footer_nav_mobile_letter_spacing != '' ) {
    ?>
    :root {
    --footer-nav-letter-spacing-mobile: <?php echo $footer_nav_mobile_letter_spacing; ?>px;
    }
    <?php
  }


  /**
   * Footer Nav Links
   **/

  $footer_nav_link_decoration_line = get_theme_mod( 'footer_nav_link_decoration_line', '' );
  $footer_nav_link_decoration_style = get_theme_mod( 'footer_nav_link_decoration_style', '' );
  $footer_nav_link_hover_decoration_line = get_theme_mod( 'footer_nav_link_hover_decoration_line', '' );
  $footer_nav_link_hover_decoration_style = get_theme_mod( 'footer_nav_link_hover_decoration_style', '' );

  if ( !empty( $footer_nav_link_decoration_line ) ) {
    ?>
    :root {
    --footer-nav-link-decoration-line: <?php echo $footer_nav_link_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_link_decoration_style ) ) {
    ?>
    :root {
    --footer-nav-link-decoration-style: <?php echo $footer_nav_link_decoration_style; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_link_hover_decoration_line ) ) {
    ?>
    :root {
    --footer-nav-link-hover-decoration-line: <?php echo $footer_nav_link_hover_decoration_line; ?>;
    }
    <?php
  }

  if ( !empty( $footer_nav_link_hover_decoration_style ) ) {
    ?>
    :root {
    --footer-nav-link-hover-decoration-style: <?php echo $footer_nav_link_hover_decoration_style; ?>;
    }
    <?php
  }


  /**
   * Footer Nav Item Padding
   **/

  $footer_nav_item_vertical_padding = get_theme_mod( 'footer_nav_item_vertical_padding', '' );
  $footer_nav_item_horizontal_padding = get_theme_mod( 'footer_nav_item_horizontal_padding', '' );
  $footer_nav_item_mobile_vertical_padding = get_theme_mod( 'footer_nav_item_mobile_vertical_padding', '' );
  $footer_nav_item_mobile_horizontal_padding = get_theme_mod( 'footer_nav_item_mobile_horizontal_padding', '' );

  if ( isset( $footer_nav_item_vertical_padding ) && $footer_nav_item_vertical_padding != '' ) {
    ?>
    :root {
    --footer-nav-item-vertical-padding: <?php echo $footer_nav_item_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_item_horizontal_padding ) && $footer_nav_item_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-nav-item-horizontal-padding: <?php echo $footer_nav_item_horizontal_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_item_mobile_vertical_padding ) && $footer_nav_item_mobile_vertical_padding != '' ) {
    ?>
    :root {
    --footer-nav-item-mobile-vertical-padding: <?php echo $footer_nav_item_mobile_vertical_padding; ?>px;
    }
    <?php
  }

  if ( isset( $footer_nav_item_mobile_horizontal_padding ) && $footer_nav_item_mobile_horizontal_padding != '' ) {
    ?>
    :root {
    --footer-nav-item-mobile-horizontal-padding: <?php echo $footer_nav_item_mobile_horizontal_padding; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}
