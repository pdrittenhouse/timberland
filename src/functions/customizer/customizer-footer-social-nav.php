<?php

/**
 * REGISTER CUSTOMIZER FOOTER SOCIAL NAV OPTIONS
 **/

function theme_customize_register_footer_social_nav( $wp_customize ) {


  /**
   * Create Footer Social Nav Options Section
   **/

  $wp_customize->add_section( 'footer_social_nav_options' , array(
    'title'      => __( 'Footer Social Nav Style Options', 'dream' ),
    'priority'   => 86,
  ) );


  /**
   * Footer Social Nav Margin
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_margin',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_margin', array(
    'label' => 'Footer Social Nav Margin',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default margin for footer social navigation menus.'
  ) ) );

  // Footer Social Nav Margin Top
  $wp_customize->add_setting( 'footer_social_nav_margin_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_margin_top',
    array(
      'label' => __( 'Footer Social Nav Margin Top' ),
      'description' => __( 'Enter a px value for the footer social nav top margin.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Margin Bottom
  $wp_customize->add_setting( 'footer_social_nav_margin_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_margin_bottom',
    array(
      'label' => __( 'Footer Social Nav Margin Bottom' ),
      'description' => __( 'Enter a px value for the footer social nav bottom margin.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Social Nav Padding
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_padding',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_padding', array(
    'label' => 'Footer Social Nav Padding',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default padding for footer social navigation menus.'
  ) ) );

  // Footer Social Nav Padding Top
  $wp_customize->add_setting( 'footer_social_nav_padding_top',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_padding_top',
    array(
      'label' => __( 'Footer Social Nav Padding Top' ),
      'description' => __( 'Enter a px value for the footer social nav top padding.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Padding Bottom
  $wp_customize->add_setting( 'footer_social_nav_padding_bottom',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_padding_bottom',
    array(
      'label' => __( 'Footer Social Nav Padding Bottom' ),
      'description' => __( 'Enter a px value for the footer social nav bottom padding.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Padding Left
  $wp_customize->add_setting( 'footer_social_nav_padding_left',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_padding_left',
    array(
      'label' => __( 'Footer Social Nav Padding Left' ),
      'description' => __( 'Enter a px value for the footer social nav left padding.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Padding Right
  $wp_customize->add_setting( 'footer_social_nav_padding_right',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_padding_right',
    array(
      'label' => __( 'Footer Social Nav Padding Right' ),
      'description' => __( 'Enter a px value for the footer social nav right padding.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Social Nav Alignment
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_alignment',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_alignment', array(
    'label' => 'Footer Social Nav Alignment',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default alignment for footer social navigation menus.'
  ) ) );

  // Footer Social Nav Text Align
  $wp_customize->add_setting( 'footer_social_nav_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_text_align',
    array(
      'label' => __( 'Footer Social Nav Text Align' ),
      'description' => __( 'Select a text alignment for footer social nav.' ),
      'section' => 'footer_social_nav_options',
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

  // Footer Social Nav Flex Align
  $wp_customize->add_setting( 'footer_social_nav_flex_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_flex_align',
    array(
      'label' => __( 'Footer Social Nav Flex Align' ),
      'description' => __( 'Select a flex alignment for social nav.' ),
      'section' => 'footer_social_nav_options',
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
   * Footer Social Nav Item Spacing
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_item_spacing',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_item_spacing', array(
    'label' => 'Footer Social Nav Item Spacing',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default spacing for footer social navigation menu items.'
  ) ) );

  // Footer Social Nav Item Spacing
  $wp_customize->add_setting( 'footer_social_nav_item_spacing',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_spacing',
    array(
      'label' => __( 'Footer Social Nav Item Width' ),
      'description' => __( 'Enter a px value for the footer social nav item spacing.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Social Nav Item Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_item_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_item_size', array(
    'label' => 'Footer Social Nav Item Size',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default sizing for footer social navigation menu items.'
  ) ) );

  // Footer Social Nav Item Width
  $wp_customize->add_setting( 'footer_social_nav_item_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_width',
    array(
      'label' => __( 'Footer Social Nav Item Width' ),
      'description' => __( 'Enter a px value for the footer social nav item width.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Item Height
  $wp_customize->add_setting( 'footer_social_nav_item_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_height',
    array(
      'label' => __( 'Footer Social Nav Item Height' ),
      'description' => __( 'Enter a px value for the footer social nav item height.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Social Nav Item Border
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_item_border',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_item_border', array(
    'label' => 'Footer Social Nav Item Border',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define styling for \'default\' social nav border.'
  ) ) );

  // Footer Social Nav Item Border Width
  $wp_customize->add_setting( 'footer_social_nav_item_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_border_width',
    array(
      'label' => __( 'Footer Social Nav Item Border Width' ),
      'description' => __( 'Enter a px value for border width for footer social nav items.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Item Border Style
  $wp_customize->add_setting( 'footer_social_nav_item_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_border_style',
    array(
      'label' => __( 'Footer Social Nav Item Border Style' ),
      'description' => __( 'Select a border style for footer social nav items.' ),
      'section' => 'footer_social_nav_options',
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

  // Footer Social Nav Item Border Radius
  $wp_customize->add_setting( 'footer_social_nav_item_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_border_radius',
    array(
      'label' => __( 'Footer Social Nav Item Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for footer social nav items.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Item Hover Border Width
  $wp_customize->add_setting( 'footer_social_nav_item_hover_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_hover_border_width',
    array(
      'label' => __( 'Footer Social Nav Item Hover Border Width' ),
      'description' => __( 'Enter a px value for border width for footer social nav item hover states.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Item Hover Border Style
  $wp_customize->add_setting( 'footer_social_nav_item_hover_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_hover_border_style',
    array(
      'label' => __( 'Footer Social Nav Item Hover Border Style' ),
      'description' => __( 'Select a border style for footer social nav item hover states.' ),
      'section' => 'footer_social_nav_options',
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

  // Footer Social Nav Item Hover Border Radius
  $wp_customize->add_setting( 'footer_social_nav_item_hover_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_item_hover_border_radius',
    array(
      'label' => __( 'Footer Social Nav Item Hover Border Radius' ),
      'description' => __( 'Enter a px value for the border radius for footer social nav item hover states.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );


  /**
   * Footer Social Nav Icon Size
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_footer_social_nav_icon_size',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_footer_social_nav_icon_size', array(
    'label' => 'Footer Social Nav Icon Size',
    'section' => 'footer_social_nav_options',
    'settings' => 'customtext',
    'divider' => true,
    'extra' =>'Define default sizing for footer social navigation menu icons.'
  ) ) );

  // Footer Social Nav Icon Width
  $wp_customize->add_setting( 'footer_social_nav_icon_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_icon_width',
    array(
      'label' => __( 'Footer Social Nav Icon Width' ),
      'description' => __( 'Enter a px value for the footer social nav icon width.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );

  // Footer Social Nav Icon Height
  $wp_customize->add_setting( 'footer_social_nav_icon_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'footer_social_nav_icon_height',
    array(
      'label' => __( 'Footer Social Nav Icon Height' ),
      'description' => __( 'Enter a px value for the footer social nav icon height.' ),
      'section' => 'footer_social_nav_options',
      'type' => 'number'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_footer_social_nav' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_footer_social_nav() {
  ob_start();

  /**
   * Footer Social Nav Margin
   **/

  $footer_social_nav_margin_top = get_theme_mod( 'footer_social_nav_margin_top', '' );
  $footer_social_nav_margin_bottom = get_theme_mod( 'footer_social_nav_margin_bottom', '' );

  if ( isset( $footer_social_nav_margin_top ) && $footer_social_nav_margin_top != '' ) {
    ?>
    :root {
    --footer-social-nav-margin-top: <?php echo $footer_social_nav_margin_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_margin_bottom ) && $footer_social_nav_margin_bottom != '' ) {
    ?>
    :root {
    --footer-social-nav-margin-bottom: <?php echo $footer_social_nav_margin_bottom; ?>px;
    }
    <?php
  }


  /**
   * Footer Social Nav Padding
   **/

  $footer_social_nav_padding_top = get_theme_mod( 'footer_social_nav_padding_top', '' );
  $footer_social_nav_padding_bottom = get_theme_mod( 'footer_social_nav_padding_bottom', '' );
  $footer_social_nav_padding_left = get_theme_mod( 'footer_social_nav_padding_left', '' );
  $footer_social_nav_padding_right = get_theme_mod( 'footer_social_nav_padding_right', '' );

  if ( isset( $footer_social_nav_padding_top ) && $footer_social_nav_padding_top != '' ) {
    ?>
    :root {
    --footer-social-nav-padding-top: <?php echo $footer_social_nav_padding_top; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_padding_bottom ) && $footer_social_nav_padding_bottom != '' ) {
    ?>
    :root {
    --footer-social-nav-padding-bottom: <?php echo $footer_social_nav_padding_bottom; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_padding_left ) && $footer_social_nav_padding_left != '' ) {
    ?>
    :root {
    --footer-social-nav-padding-left: <?php echo $footer_social_nav_padding_left; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_padding_right ) && $footer_social_nav_padding_right != '' ) {
    ?>
    :root {
    --footer-social-nav-padding-right: <?php echo $footer_social_nav_padding_right; ?>px;
    }
    <?php
  }

  /**
   * Footer Social Nav Text Align
   **/

  $footer_social_nav_text_align = get_theme_mod( 'footer_social_nav_text_align', '' );
  $footer_social_nav_flex_align = get_theme_mod( 'footer_social_nav_flex_align', '' );

  if ( !empty( $footer_social_nav_text_align ) ) {
    ?>
    :root {
    --footer-social-nav-text-align: <?php echo $footer_social_nav_text_align; ?>;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_flex_align ) ) {
    ?>
    :root {
    --footer-social-nav-flex-align: <?php echo $footer_social_nav_flex_align; ?>;
    }
    <?php
  }


  /**
   * Footer Social Nav Item Spacing
   **/

  $footer_social_nav_item_spacing = get_theme_mod( 'footer_social_nav_item_spacing', '' );

  if ( isset( $footer_social_nav_item_spacing ) && $footer_social_nav_item_spacing != '' ) {
    ?>
    :root {
    --footer-social-nav-item-spacing: <?php echo $footer_social_nav_item_spacing; ?>px;
    }
    <?php
  }


  /**
   * Footer Social Nav Item Sizing
   **/

  $footer_social_nav_item_width = get_theme_mod( 'footer_social_nav_item_width', '' );
  $footer_social_nav_item_height = get_theme_mod( 'footer_social_nav_item_height', '' );

  if ( isset( $footer_social_nav_item_width ) && $footer_social_nav_item_width != '' ) {
    ?>
    :root {
    --footer-social-nav-item-width: <?php echo $footer_social_nav_item_width; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_item_height ) && $footer_social_nav_item_height != '' ) {
    ?>
    :root {
    --footer-social-nav-item-height: <?php echo $footer_social_nav_item_height; ?>px;
    }
    <?php
  }


  /**
   * Footer Social Nav Item Border
   **/

  $footer_social_nav_item_border_width = get_theme_mod( 'footer_social_nav_item_border_width', '' );
  $footer_social_nav_item_border_style = get_theme_mod( 'footer_social_nav_item_border_style', '' );
  $footer_social_nav_item_border_radius = get_theme_mod( 'footer_social_nav_item_border_radius', '' );
  $footer_social_nav_item_hover_border_width = get_theme_mod( 'footer_social_nav_item_hover_border_width', '' );
  $footer_social_nav_item_hover_border_style = get_theme_mod( 'footer_social_nav_item_hover_border_style', '' );
  $footer_social_nav_item_hover_border_radius = get_theme_mod( 'footer_social_nav_item_hover_border_radius', '' );

  if ( isset( $footer_social_nav_item_border_width ) && $footer_social_nav_item_border_width != '' ) {
    ?>
    :root {
    --footer-social-nav-item-border-width: <?php echo $footer_social_nav_item_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_border_style ) ) {
    ?>
    :root {
    --footer-social-nav-item-border-style: <?php echo $footer_social_nav_item_border_style; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_item_border_radius ) && $footer_social_nav_item_border_radius != '' ) {
    ?>
    :root {
    --footer-social-nav-item-border-radius: <?php echo $footer_social_nav_item_border_radius; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_item_hover_border_width ) && $footer_social_nav_item_hover_border_width != '' ) {
    ?>
    :root {
    --footer-social-nav-item-hover-border-width: <?php echo $footer_social_nav_item_hover_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $footer_social_nav_item_hover_border_style ) ) {
    ?>
    :root {
    --footer-social-nav-item-hover-border-style: <?php echo $footer_social_nav_item_hover_border_style; ?>px;
    }
    <?php
  }

  if ( isset( $footer_social_nav_item_hover_border_radius ) && $footer_social_nav_item_hover_border_radius != '' ) {
    ?>
    :root {
    --footer-social-nav-item-hover-border-radius: <?php echo $footer_social_nav_item_hover_border_radius; ?>px;
    }
    <?php
  }


  $css = ob_get_clean();
  return $css;

}


/**
 * ADD TO CONTEXT
 **/

class footerSocialNav extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    parent::__construct();
  }


  // Add Global variable
  function add_to_context( $context ) {

    /**
     * Footer Social Nav Icon Size
     **/

    $footer_social_nav_icon_width = get_theme_mod( 'footer_social_nav_icon_width', '' );
    $footer_social_nav_icon_height = get_theme_mod( 'footer_social_nav_icon_height', '' );

    if ( $footer_social_nav_icon_width ) {
      $context['footer_social_icon_width'] = $footer_social_nav_icon_width;
    }

    if ( $footer_social_nav_icon_height ) {
      $context['footer_social_icon_height'] = $footer_social_nav_icon_height;
    }

    return $context;
  }

}

new footerSocialNav();
