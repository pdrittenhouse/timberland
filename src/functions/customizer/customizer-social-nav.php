<?php

/**
 * REGISTER CUSTOMIZER SOCIAL NAV OPTIONS
 **/

function theme_customize_register_social_navs( $wp_customize ) {


  /**
   * Create Social Nav Options Section
   **/

  $wp_customize->add_section( 'social_nav_options' , array(
    'title'      => __( 'Social Nav Style Options', 'dream' ),
    'priority'   => 16,
  ) );


  /**
   * Social Nav Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_margin', array(
    'label' => 'Social Nav Margin',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default margin for social navigation menus.'
  ) ) );

  // Social Nav Margin Top
  $wp_customize->add_setting( 'social_nav_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_margin_top',
    array(
      'label' => __( 'Social Nav Margin Top' ),
      'description' => __( 'Enter a px value for the social nav top margin.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Margin Bottom
  $wp_customize->add_setting( 'social_nav_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_margin_bottom',
    array(
      'label' => __( 'Social Nav Margin Bottom' ),
      'description' => __( 'Enter a px value for the social nav bottom margin.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Social Nav Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_padding', array(
    'label' => 'Social Nav Padding',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default padding for social navigation menus.'
  ) ) );

  // Social Nav Padding Top
  $wp_customize->add_setting( 'social_nav_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_padding_top',
    array(
      'label' => __( 'Social Nav Padding Top' ),
      'description' => __( 'Enter a px value for the social nav top padding.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Padding Bottom
  $wp_customize->add_setting( 'social_nav_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_padding_bottom',
    array(
      'label' => __( 'Social Nav Padding Bottom' ),
      'description' => __( 'Enter a px value for the social nav bottom padding.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Padding Left
  $wp_customize->add_setting( 'social_nav_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_padding_left',
    array(
      'label' => __( 'Social Nav Padding Left' ),
      'description' => __( 'Enter a px value for the social nav left padding.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Padding Right
  $wp_customize->add_setting( 'social_nav_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_padding_right',
    array(
      'label' => __( 'Social Nav Padding Right' ),
      'description' => __( 'Enter a px value for the social nav right padding.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Social Nav Alignment
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_alignment',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_alignment', array(
    'label' => 'Social Nav Alignment',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default alignment for social navigation menus.'
  ) ) );

  // Social Nav Text Align
  $wp_customize->add_setting( 'social_nav_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_text_align',
    array(
      'label' => __( 'Social Nav Text Align' ),
      'description' => __( 'Select a text alignment for social nav.' ),
      'section' => 'social_nav_options',
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

  // Social Nav Flex Align
  $wp_customize->add_setting( 'social_nav_flex_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_flex_align',
    array(
      'label' => __( 'Social Nav Flex Align' ),
      'description' => __( 'Select a flex alignment for social nav.' ),
      'section' => 'social_nav_options',
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
   * Social Nav Item Spacing
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_item_spacing',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_item_spacing', array(
    'label' => 'Social Nav Item Spacing',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default spacing for social navigation menu items.'
  ) ) );

  // Social Nav Item Spacing
  $wp_customize->add_setting( 'social_nav_item_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_spacing',
    array(
      'label' => __( 'Social Nav Item Width' ),
      'description' => __( 'Enter a px value for the social nav item spacing.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Social Nav Item Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_item_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_item_size', array(
    'label' => 'Social Nav Item Size',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default sizing for social navigation menu items.'
  ) ) );

  // Social Nav Item Width
  $wp_customize->add_setting( 'social_nav_item_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_width',
    array(
      'label' => __( 'Social Nav Item Width' ),
      'description' => __( 'Enter a px value for the social nav item width.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Item Height
  $wp_customize->add_setting( 'social_nav_item_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_height',
    array(
      'label' => __( 'Social Nav Item Height' ),
      'description' => __( 'Enter a px value for the social nav item height.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Social Nav Item Border
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_item_border',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_item_border', array(
    'label' => 'Social Nav Item Border',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define styling for \'default\' social nav border.'
  ) ) );

  // Social Nav Item Border Width
  $wp_customize->add_setting( 'social_nav_item_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_border_width',
    array(
      'label' => __( 'Social Nav Item Border Width' ),
      'description' => __( 'Enter a px value for border width for social nav items.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Item Border Style
  $wp_customize->add_setting( 'social_nav_item_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_border_style',
    array(
      'label' => __( 'Social Nav Item Border Style' ),
      'description' => __( 'Select a border style for social nav items.' ),
      'section' => 'social_nav_options',
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

  // Social Nav Item Border Radius
  $wp_customize->add_setting( 'social_nav_item_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_border_radius',
    array(
      'label' => __( 'Social Nav Item Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for social nav items.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Item Hover Border Width
  $wp_customize->add_setting( 'social_nav_item_hover_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_hover_border_width',
    array(
      'label' => __( 'Social Nav Item Hover Border Width' ),
      'description' => __( 'Enter a px value for border width for social nav item hover states.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Item Hover Border Style
  $wp_customize->add_setting( 'social_nav_item_hover_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_hover_border_style',
    array(
      'label' => __( 'Social Nav Item Hover Border Style' ),
      'description' => __( 'Select a border style for social nav item hover states.' ),
      'section' => 'social_nav_options',
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

  // Social Nav Item Hover Border Radius
  $wp_customize->add_setting( 'social_nav_item_hover_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_item_hover_border_radius',
    array(
      'label' => __( 'Social Nav Item Hover Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for social nav item hover states.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Social Nav Icon Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_social_nav_icon_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_social_nav_icon_size', array(
    'label' => 'Social Nav Icon Size',
    'section' => 'social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default sizing for social navigation menu icons.'
  ) ) );

  // Social Nav Icon Width
  $wp_customize->add_setting( 'social_nav_icon_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_icon_width',
    array(
      'label' => __( 'Social Nav Icon Width' ),
      'description' => __( 'Enter a px value for the social nav icon width.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );

  // Social Nav Icon Height
  $wp_customize->add_setting( 'social_nav_icon_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'social_nav_icon_height',
    array(
      'label' => __( 'Social Nav Icon Height' ),
      'description' => __( 'Enter a px value for the social nav icon height.' ),
      'section' => 'social_nav_options',
      'type' => 'number'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_social_navs' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_social_navs() {
  ob_start();

  /**
   * Social Nav Margin
   **/

  $social_nav_margin_top = get_theme_mod( 'social_nav_margin_top', '' );
  $social_nav_margin_bottom = get_theme_mod( 'social_nav_margin_bottom', '' );

  if ( isset( $social_nav_margin_top ) && $social_nav_margin_top != '' ) {
    ?>
    :root {
    --social-nav-margin-top: <?php echo $social_nav_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_margin_bottom ) && $social_nav_margin_bottom != '' ) {
    ?>
    :root {
    --social-nav-margin-bottom: <?php echo $social_nav_margin_bottom; ?>px;
    }
    <?php
  }


  /**
   * Social Nav Padding
   **/

  $social_nav_padding_top = get_theme_mod( 'social_nav_padding_top', '' );
  $social_nav_padding_bottom = get_theme_mod( 'social_nav_padding_bottom', '' );
  $social_nav_padding_left = get_theme_mod( 'social_nav_padding_left', '' );
  $social_nav_padding_right = get_theme_mod( 'social_nav_padding_right', '' );

  if ( isset( $social_nav_padding_top ) && $social_nav_padding_top != '' ) {
    ?>
    :root {
    --social-nav-padding-top: <?php echo $social_nav_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_padding_bottom ) && $social_nav_padding_bottom != '' ) {
    ?>
    :root {
    --social-nav-padding-bottom: <?php echo $social_nav_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_padding_left ) && $social_nav_padding_left != '' ) {
    ?>
    :root {
    --social-nav-padding-left: <?php echo $social_nav_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_padding_right ) && $social_nav_padding_right != '' ) {
    ?>
    :root {
    --social-nav-padding-right: <?php echo $social_nav_padding_right; ?>px;
    }
    <?php
  }

  /**
   * Social Nav Text Align
   **/

  $social_nav_text_align = get_theme_mod( 'social_nav_text_align', '' );
  $social_nav_flex_align = get_theme_mod( 'social_nav_flex_align', '' );

  if ( !empty( $social_nav_text_align ) ) {
    ?>
    :root {
    --social-nav-text-align: <?php echo $social_nav_text_align; ?>px;
    }
    <?php
  }

  if ( !empty( $social_nav_flex_align ) ) {
    ?>
    :root {
    --social-nav-flex-align: <?php echo $social_nav_flex_align; ?>px;
    }
    <?php
  }


  /**
   * Social Nav Item Spacing
   **/

  $social_nav_item_spacing = get_theme_mod( 'social_nav_item_spacing', '' );

  if ( isset( $social_nav_item_spacing ) && $social_nav_item_spacing != '' ) {
    ?>
    :root {
    --social-nav-item-spacing: <?php echo $social_nav_item_spacing; ?>px;
    }
    <?php
  }


  /**
   * Social Nav Item Sizing
   **/

  $social_nav_item_width = get_theme_mod( 'social_nav_item_width', '' );
  $social_nav_item_height = get_theme_mod( 'social_nav_item_height', '' );

  if ( isset( $social_nav_item_width ) && $social_nav_item_width != '' ) {
    ?>
    :root {
    --social-nav-item-width: <?php echo $social_nav_item_width; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_item_height ) && $social_nav_item_height != '' ) {
    ?>
    :root {
    --social-nav-item-height: <?php echo $social_nav_item_height; ?>px;
    }
    <?php
  }


  /**
   * Social Nav Item Border
   **/

  $social_nav_item_border_width = get_theme_mod( 'social_nav_item_border_width', '' );
  $social_nav_item_border_style = get_theme_mod( 'social_nav_item_border_style', '' );
  $social_nav_item_border_radius = get_theme_mod( 'social_nav_item_border_radius', '' );
  $social_nav_item_hover_border_width = get_theme_mod( 'social_nav_item_hover_border_width', '' );
  $social_nav_item_hover_border_style = get_theme_mod( 'social_nav_item_hover_border_style', '' );
  $social_nav_item_hover_border_radius = get_theme_mod( 'social_nav_item_hover_border_radius', '' );

  if ( isset( $social_nav_item_border_width ) && $social_nav_item_border_width != '' ) {
    ?>
    :root {
    --social-nav-item-border-width: <?php echo $social_nav_item_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $social_nav_item_border_style ) ) {
    ?>
    :root {
    --social-nav-item-border-style: <?php echo $social_nav_item_border_style; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_item_border_radius ) && $social_nav_item_border_radius != '' ) {
    ?>
    :root {
    --social-nav-item-border-radius: <?php echo $social_nav_item_border_radius; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_item_hover_border_width ) && $social_nav_item_hover_border_width != '' ) {
    ?>
    :root {
    --social-nav-item-hover-border-width: <?php echo $social_nav_item_hover_border_width; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_item_hover_border_style ) && $social_nav_item_hover_border_style != '' ) {
    ?>
    :root {
    --social-nav-item-hover-border-style: <?php echo $social_nav_item_hover_border_style; ?>px;
    }
    <?php
  }

  if ( isset( $social_nav_item_hover_border_radius ) && $social_nav_item_hover_border_radius != '' ) {
    ?>
    :root {
    --social-nav-item-hover-border-radius: <?php echo $social_nav_item_hover_border_radius; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}


/**
 * ADD TO CONTEXT
 **/

class socialNav extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    parent::__construct();
  }


  // Add Global variable
  function add_to_context( $context ) {

    /**
     * Social Nav Icon Size
     **/

    $social_nav_icon_width = get_theme_mod( 'social_nav_icon_width', '' );
    $social_nav_icon_height = get_theme_mod( 'social_nav_icon_height', '' );

    if ( $social_nav_icon_width ) {
      $context['social_icon_width'] = $social_nav_icon_width;
    }

    if ( $social_nav_icon_height ) {
      $context['social_icon_height'] = $social_nav_icon_height;
    }

    return $context;
  }

}

new socialNav();
