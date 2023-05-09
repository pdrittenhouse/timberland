<?php

/**
 * REGISTER CUSTOMIZER HEADER SOCIAL NAV OPTIONS
 **/

function theme_customize_register_header_social_nav( $wp_customize ) {


  /**
   * Create Header Social Nav Options Section
   **/

  $wp_customize->add_section( 'header_social_nav_options' , array(
    'title'      => __( 'Header Social Nav Style Options', 'dream' ),
    'priority'   => 67,
  ) );


  /**
   * Header Social Nav Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_margin', array(
    'label' => 'Header Social Nav Margin',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default margin for header social navigation menus.'
  ) ) );

  // Header Social Nav Margin Top
  $wp_customize->add_setting( 'header_social_nav_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_margin_top',
    array(
      'label' => __( 'Header Social Nav Margin Top' ),
      'description' => __( 'Enter a px value for the header social nav top margin.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Margin Bottom
  $wp_customize->add_setting( 'header_social_nav_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_margin_bottom',
    array(
      'label' => __( 'Header Social Nav Margin Bottom' ),
      'description' => __( 'Enter a px value for the header social nav bottom margin.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Header Social Nav Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_padding', array(
    'label' => 'Header Social Nav Padding',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default padding for header social navigation menus.'
  ) ) );

  // Header Social Nav Padding Top
  $wp_customize->add_setting( 'header_social_nav_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_padding_top',
    array(
      'label' => __( 'Header Social Nav Padding Top' ),
      'description' => __( 'Enter a px value for the header social nav top padding.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Padding Bottom
  $wp_customize->add_setting( 'header_social_nav_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_padding_bottom',
    array(
      'label' => __( 'Header Social Nav Padding Bottom' ),
      'description' => __( 'Enter a px value for the header social nav bottom padding.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Padding Left
  $wp_customize->add_setting( 'header_social_nav_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_padding_left',
    array(
      'label' => __( 'Header Social Nav Padding Left' ),
      'description' => __( 'Enter a px value for the header social nav left padding.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Padding Right
  $wp_customize->add_setting( 'header_social_nav_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_padding_right',
    array(
      'label' => __( 'Header Social Nav Padding Right' ),
      'description' => __( 'Enter a px value for the header social nav right padding.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Header Social Nav Alignment
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_alignment',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_alignment', array(
    'label' => 'Header Social Nav Alignment',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default alignment for header social navigation menus.'
  ) ) );

  // Header Social Nav Text Align
  $wp_customize->add_setting( 'header_social_nav_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_text_align',
    array(
      'label' => __( 'Header Social Nav Text Align' ),
      'description' => __( 'Select a text alignment for header social nav.' ),
      'section' => 'header_social_nav_options',
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

  // Header Social Nav Flex Align
  $wp_customize->add_setting( 'header_social_nav_flex_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_flex_align',
    array(
      'label' => __( 'Header Social Nav Flex Align' ),
      'description' => __( 'Select a flex alignment for social nav.' ),
      'section' => 'header_social_nav_options',
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
   * Header Social Nav Item Spacing
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_item_spacing',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_item_spacing', array(
    'label' => 'Header Social Nav Item Spacing',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default spacing for header social navigation menu items.'
  ) ) );

  // Header Social Nav Item Spacing
  $wp_customize->add_setting( 'header_social_nav_item_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_spacing',
    array(
      'label' => __( 'Header Social Nav Item Width' ),
      'description' => __( 'Enter a px value for the header social nav item spacing.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Header Social Nav Item Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_item_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_item_size', array(
    'label' => 'Header Social Nav Item Size',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default sizing for header social navigation menu items.'
  ) ) );

  // Header Social Nav Item Width
  $wp_customize->add_setting( 'header_social_nav_item_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_width',
    array(
      'label' => __( 'Header Social Nav Item Width' ),
      'description' => __( 'Enter a px value for the header social nav item width.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Item Height
  $wp_customize->add_setting( 'header_social_nav_item_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_height',
    array(
      'label' => __( 'Header Social Nav Item Height' ),
      'description' => __( 'Enter a px value for the header social nav item height.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Header Social Nav Item Border
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_item_border',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_item_border', array(
    'label' => 'Header Social Nav Item Border',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define styling for \'default\' social nav border.'
  ) ) );

  // Header Social Nav Item Border Width
  $wp_customize->add_setting( 'header_social_nav_item_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_border_width',
    array(
      'label' => __( 'Header Social Nav Item Border Width' ),
      'description' => __( 'Enter a px value for border width for header social nav items.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Item Border Style
  $wp_customize->add_setting( 'header_social_nav_item_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_border_style',
    array(
      'label' => __( 'Header Social Nav Item Border Style' ),
      'description' => __( 'Select a border style for header social nav items.' ),
      'section' => 'header_social_nav_options',
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

  // Header Social Nav Item Border Radius
  $wp_customize->add_setting( 'header_social_nav_item_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_border_radius',
    array(
      'label' => __( 'Header Social Nav Item Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for header social nav items.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Item Hover Border Width
  $wp_customize->add_setting( 'header_social_nav_item_hover_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_hover_border_width',
    array(
      'label' => __( 'Header Social Nav Item Hover Border Width' ),
      'description' => __( 'Enter a px value for border width for header social nav item hover states.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Item Hover Border Style
  $wp_customize->add_setting( 'header_social_nav_item_hover_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_hover_border_style',
    array(
      'label' => __( 'Header Social Nav Item Hover Border Style' ),
      'description' => __( 'Select a border style for header social nav item hover states.' ),
      'section' => 'header_social_nav_options',
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

  // Header Social Nav Item Hover Border Radius
  $wp_customize->add_setting( 'header_social_nav_item_hover_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_item_hover_border_radius',
    array(
      'label' => __( 'Header Social Nav Item Hover Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for header social nav item hover states.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Header Social Nav Icon Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_header_social_nav_icon_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_header_social_nav_icon_size', array(
    'label' => 'Header Social Nav Icon Size',
    'section' => 'header_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default sizing for header social navigation menu icons.'
  ) ) );

  // Header Social Nav Icon Width
  $wp_customize->add_setting( 'header_social_nav_icon_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_icon_width',
    array(
      'label' => __( 'Header Social Nav Icon Width' ),
      'description' => __( 'Enter a px value for the header social nav icon width.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );

  // Header Social Nav Icon Height
  $wp_customize->add_setting( 'header_social_nav_icon_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'header_social_nav_icon_height',
    array(
      'label' => __( 'Header Social Nav Icon Height' ),
      'description' => __( 'Enter a px value for the header social nav icon height.' ),
      'section' => 'header_social_nav_options',
      'type' => 'number'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_header_social_nav' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_header_social_nav() {
  ob_start();

  /**
   * Header Social Nav Margin
   **/

  $header_social_nav_margin_top = get_theme_mod( 'header_social_nav_margin_top', '' );
  $header_social_nav_margin_bottom = get_theme_mod( 'header_social_nav_margin_bottom', '' );

  if ( isset( $header_social_nav_margin_top ) && $header_social_nav_margin_top != '' ) {
    ?>
    :root {
    --header_social_nav-margin-top: <?php echo $header_social_nav_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_margin_bottom ) && $header_social_nav_margin_bottom != '' ) {
    ?>
    :root {
    --header-social-nav-margin-bottom: <?php echo $header_social_nav_margin_bottom; ?>px;
    }
    <?php
  }


  /**
   * Header Social Nav Padding
   **/

  $header_social_nav_padding_top = get_theme_mod( 'header_social_nav_padding_top', '' );
  $header_social_nav_padding_bottom = get_theme_mod( 'header_social_nav_padding_bottom', '' );
  $header_social_nav_padding_left = get_theme_mod( 'header_social_nav_padding_left', '' );
  $header_social_nav_padding_right = get_theme_mod( 'header_social_nav_padding_right', '' );

  if ( isset( $header_social_nav_padding_top ) && $header_social_nav_padding_top != '' ) {
    ?>
    :root {
    --header-social-nav-padding-top: <?php echo $header_social_nav_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_padding_bottom ) && $header_social_nav_padding_bottom != '' ) {
    ?>
    :root {
    --header-social-nav-padding-bottom: <?php echo $header_social_nav_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_padding_left ) && $header_social_nav_padding_left != '' ) {
    ?>
    :root {
    --header-social-nav-padding-left: <?php echo $header_social_nav_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_padding_right ) && $header_social_nav_padding_right != '' ) {
    ?>
    :root {
    --header-social-nav-padding-right: <?php echo $header_social_nav_padding_right; ?>px;
    }
    <?php
  }

  /**
   * Header Social Nav Text Align
   **/

  $header_social_nav_text_align = get_theme_mod( 'header_social_nav_text_align', '' );
  $header_social_nav_flex_align = get_theme_mod( 'header_social_nav_flex_align', '' );

  if ( !empty( $header_social_nav_text_align ) ) {
    ?>
    :root {
    --header-social-nav-text-align: <?php echo $header_social_nav_text_align; ?>px;
    }
    <?php
  }

  if ( !empty( $header_social_nav_flex_align ) ) {
    ?>
    :root {
    --header-social-nav-flex-align: <?php echo $header_social_nav_flex_align; ?>px;
    }
    <?php
  }


  /**
   * Header Social Nav Item Spacing
   **/

  $header_social_nav_item_spacing = get_theme_mod( 'header_social_nav_item_spacing', '' );

  if ( isset( $header_social_nav_item_spacing ) && $header_social_nav_item_spacing != '' ) {
    ?>
    :root {
    --header-social-nav-item-spacing: <?php echo $header_social_nav_item_spacing; ?>px;
    }
    <?php
  }


  /**
   * Header Social Nav Item Sizing
   **/

  $header_social_nav_item_width = get_theme_mod( 'header_social_nav_item_width', '' );
  $header_social_nav_item_height = get_theme_mod( 'header_social_nav_item_height', '' );

  if ( isset( $header_social_nav_item_width ) && $header_social_nav_item_width != '' ) {
    ?>
    :root {
    --header-social-nav-item-width: <?php echo $header_social_nav_item_width; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_item_height ) && $header_social_nav_item_height != '' ) {
    ?>
    :root {
    --header-social-nav-item-height: <?php echo $header_social_nav_item_height; ?>px;
    }
    <?php
  }


  /**
   * Header Social Nav Item Border
   **/

  $header_social_nav_item_border_width = get_theme_mod( 'header_social_nav_item_border_width', '' );
  $header_social_nav_item_border_style = get_theme_mod( 'header_social_nav_item_border_style', '' );
  $header_social_nav_item_border_radius = get_theme_mod( 'header_social_nav_item_border_radius', '' );
  $header_social_nav_item_hover_border_width = get_theme_mod( 'header_social_nav_item_hover_border_width', '' );
  $header_social_nav_item_hover_border_style = get_theme_mod( 'header_social_nav_item_hover_border_style', '' );
  $header_social_nav_item_hover_border_radius = get_theme_mod( 'header_social_nav_item_hover_border_radius', '' );

  if ( isset( $header_social_nav_item_border_width ) && $header_social_nav_item_border_width != '' ) {
    ?>
    :root {
    --header-social-nav-item-border-width: <?php echo $header_social_nav_item_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_border_style ) ) {
    ?>
    :root {
    --header-social-nav-item-border-style: <?php echo $header_social_nav_item_border_style; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_item_border_radius ) && $header_social_nav_item_border_radius != '' ) {
    ?>
    :root {
    --header-social-nav-item-border-radius: <?php echo $header_social_nav_item_border_radius; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_item_hover_border_width ) && $header_social_nav_item_hover_border_width != '' ) {
    ?>
    :root {
    --header-social-nav-item-hover-border-width: <?php echo $header_social_nav_item_hover_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $header_social_nav_item_hover_border_style ) ) {
    ?>
    :root {
    --header-social-nav-item-hover-border-style: <?php echo $header_social_nav_item_hover_border_style; ?>px;
    }
    <?php
  }

  if ( isset( $header_social_nav_item_hover_border_radius ) && $header_social_nav_item_hover_border_radius != '' ) {
    ?>
    :root {
    --header-social-nav-item-hover-border-radius: <?php echo $header_social_nav_item_hover_border_radius; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}

/**
 * ADD TO CONTEXT
 **/

class headerSocialNav extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    parent::__construct();
  }


  // Add Global variable
  function add_to_context( $context ) {

    /**
     * Header Social Nav Icon Size
     **/

    $header_social_nav_icon_width = get_theme_mod( 'header_social_nav_icon_width', '' );
    $header_social_nav_icon_height = get_theme_mod( 'header_social_nav_icon_height', '' );

    if ( $header_social_nav_icon_width ) {
      $context['header_social_icon_width'] = $header_social_nav_icon_width;
    }

    if ( $header_social_nav_icon_height ) {
      $context['header_social_icon_height'] = $header_social_nav_icon_height;
    }

    return $context;
  }

}

new headerSocialNav();
