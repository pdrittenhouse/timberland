<?php

/**
 * REGISTER CUSTOMIZER CARD OPTIONS
 **/

function theme_customize_register_cards( $wp_customize ) {


  /**
   * Create Card Options Section
   **/

  $wp_customize->add_section( 'card_options' , array(
    'title'      => __( 'Card Style Options', 'dream' ),
    'priority'   => 15,
  ) );

  /**
   * Card Wrappers
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_card_wrappers',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_card_wrappers', array(
    'label' => 'Card Wrappers',
    'section' => 'card_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for card wrappers.'
  ) ) );

  // Card Border Width
  $wp_customize->add_setting( 'card_border_width',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_border_width',
    array(
      'label' => __( 'Card Border Width' ),
      'description' => __( 'Enter a px value for border width for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  // Card Border Style
  $wp_customize->add_setting( 'card_border_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_border_style',
    array(
      'label' => __( 'Card Border Style' ),
      'description' => __( 'Select a border style for cards.' ),
      'section' => 'card_options',
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

  // Card Border Radius
  $wp_customize->add_setting( 'card_border_radius',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_border_radius',
    array(
      'label' => __( 'Card Border Radius' ),
      'description' => __( 'Enter a px value for border radius for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  // Card Text Align
  $wp_customize->add_setting( 'card_text_align',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_text_align',
    array(
      'label' => __( 'Card Text Align' ),
      'description' => __( 'Select a text alignment for cards.' ),
      'section' => 'card_options',
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

  /**
   * Card Labels
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_card_labels',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_card_labels', array(
    'label' => 'Card Labels',
    'section' => 'card_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for card labels.'
  ) ) );

  // Card Label Font Size
  $wp_customize->add_setting( 'card_label_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_label_font_size',
    array(
      'label' => __( 'Card Label Font Size' ),
      'description' => __( 'Enter a px value for label font size for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  // Card Label Font Weight
  $wp_customize->add_setting( 'card_label_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_label_font_weight',
    array(
      'label' => __( 'Card Label Font Weight' ),
      'description' => __( 'Select a font weight for card labels.' ),
      'section' => 'card_options',
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

  // Card Label Font Style
  $wp_customize->add_setting( 'card_label_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_label_font_style',
    array(
      'label' => __( 'Card Label Font Style' ),
      'description' => __( 'Select a font style for card labels.' ),
      'section' => 'card_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Card Label Line Height
  $wp_customize->add_setting( 'card_label_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_label_line_height',
    array(
      'label' => __( 'Card Label Line Height' ),
      'description' => __( 'Enter a px value for label line height for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  /**
   * Card Titles
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_card_titles',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_card_titles', array(
    'label' => 'Card Titles',
    'section' => 'card_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for card titles.'
  ) ) );

  // Card Title Font Size
  $wp_customize->add_setting( 'card_title_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_title_font_size',
    array(
      'label' => __( 'Card Title Font Size' ),
      'description' => __( 'Enter a px value for title font size for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  // Card Title Font Weight
  $wp_customize->add_setting( 'card_title_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_title_font_weight',
    array(
      'label' => __( 'Card Title Font Weight' ),
      'description' => __( 'Select a font weight for card titles.' ),
      'section' => 'card_options',
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

  // Card Title Font Style
  $wp_customize->add_setting( 'card_title_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_title_font_style',
    array(
      'label' => __( 'Card Title Font Style' ),
      'description' => __( 'Select a font style for card titles.' ),
      'section' => 'card_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Card Title Line Height
  $wp_customize->add_setting( 'card_title_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_title_line_height',
    array(
      'label' => __( 'Card Title Line Height' ),
      'description' => __( 'Enter a px value for title line height for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  /**
   * Card Subtitles
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_card_subtitles',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_card_subtitles', array(
    'label' => 'Card Subtitles',
    'section' => 'card_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for card subtitles.'
  ) ) );

  // Card Subtitle Font Size
  $wp_customize->add_setting( 'card_subtitle_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_subtitle_font_size',
    array(
      'label' => __( 'Card Subtitle Font Size' ),
      'description' => __( 'Enter a px value for subtitle font size for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  // Card Subtitle Font Weight
  $wp_customize->add_setting( 'card_subtitle_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_subtitle_font_weight',
    array(
      'label' => __( 'Card Subtitle Font Weight' ),
      'description' => __( 'Select a font weight for card subtitles.' ),
      'section' => 'card_options',
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

  // Card Subtitle Font Style
  $wp_customize->add_setting( 'card_subtitle_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_subtitle_font_style',
    array(
      'label' => __( 'Card Subtitle Font Style' ),
      'description' => __( 'Select a font style for card subtitles.' ),
      'section' => 'card_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Card Subtitle Line Height
  $wp_customize->add_setting( 'card_subtitle_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_subtitle_line_height',
    array(
      'label' => __( 'Card Subtitle Line Height' ),
      'description' => __( 'Enter a px value for subtitle line height for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  /**
   * Card Text
   **/

  // Custom Text
  $wp_customize->add_setting('customtext', array(
    'default' => '',
    'type' => 'customtext_card_text',
    'transport' => 'refresh',
  ) );

  $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'customtext_card_text', array(
    'label' => 'Card Text',
    'section' => 'card_options',
    'settings' => 'customtext',
    'divider' => false,
    'extra' =>'Define default styling for card text.'
  ) ) );

  // Card Text Font Size
  $wp_customize->add_setting( 'card_text_font_size',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_text_font_size',
    array(
      'label' => __( 'Card Text Font Size' ),
      'description' => __( 'Enter a px value for text font size for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );

  // Card Text Font Weight
  $wp_customize->add_setting( 'card_text_font_weight',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_text_font_weight',
    array(
      'label' => __( 'Card Text Font Weight' ),
      'description' => __( 'Select a font weight for card texts.' ),
      'section' => 'card_options',
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

  // Card Text Font Style
  $wp_customize->add_setting( 'card_text_font_style',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_text_font_style',
    array(
      'label' => __( 'Card Text Font Style' ),
      'description' => __( 'Select a font style for card texts.' ),
      'section' => 'card_options',
      'type' => 'select',
      'choices' => array(
        '' => __( 'Default' ),
        'normal' => __( 'Normal' ),
        'italic' => __( 'Italic' ),
        'oblique' => __( 'Oblique' )
      )
    )
  );

  // Card Text Line Height
  $wp_customize->add_setting( 'card_text_line_height',
    array(
      'default' => '',
      'transport' => 'refresh',
    )
  );

  $wp_customize->add_control( 'card_text_line_height',
    array(
      'label' => __( 'Card Text Line Height' ),
      'description' => __( 'Enter a px value for text line height for cards.' ),
      'section' => 'card_options',
      'type' => 'number'
    )
  );


}

add_action( 'customize_register', 'theme_customize_register_cards' );



/**
 * OUTPUT CSS
 **/
function theme_get_customizer_cards() {
  ob_start();

  /**
   * Card Wrappers
   **/

  $card_border_width = get_theme_mod( 'card_border_width', '' );
  $card_border_style = get_theme_mod( 'card_border_style', '' );
  $card_border_radius = get_theme_mod( 'card_border_radius', '' );
  $card_text_align = get_theme_mod( 'card_text_align', '' );

  if ( isset( $card_border_width ) && $card_border_width != '' ) {
    ?>
    :root {
    --card-border-width: <?php echo $card_border_width; ?>px;
    }
    <?php
  }

  if ( !empty( $card_border_style ) ) {
    ?>
    :root {
    --card-border-style: <?php echo $card_border_style; ?>;
    }
    <?php
  }

  if ( isset( $card_border_radius ) && $card_border_radius != '' ) {
    ?>
    :root {
    --card-border-radius: <?php echo $card_border_radius; ?>px;
    }
    <?php
  }

  if ( !empty( $card_text_align ) ) {
    ?>
    :root {
    --card-text-align: <?php echo $card_text_align; ?>;
    }
    <?php
  }


  /**
   * Card Labels
   **/

  $card_label_font_size = get_theme_mod( 'card_label_font_size', '' );
  $card_label_font_weight = get_theme_mod( 'card_label_font_weight', '' );
  $card_label_font_style = get_theme_mod( 'card_label_font_style', '' );
  $card_label_line_height = get_theme_mod( 'card_label_line_height', '' );

  if ( isset( $card_label_font_size ) && $card_label_font_size != '' ) {
    ?>
    :root {
    --card-label-font-size: <?php echo $card_label_font_size; ?>px;
    }
    <?php
  }

  if ( !empty( $card_label_font_weight ) ) {
    ?>
    :root {
    --card-label-font-weight: <?php echo $card_label_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $card_label_font_style ) ) {
    ?>
    :root {
    --card-label-font-style: <?php echo $card_label_font_style; ?>;
    }
    <?php
  }

  if ( isset( $card_label_line_height ) && $card_label_line_height != '' ) {
    ?>
    :root {
    --card-label-line-height: <?php echo $card_label_line_height; ?>px;
    }
    <?php
  }


  /**
   * Card Titles
   **/

  $card_title_font_size = get_theme_mod( 'card_title_font_size', '' );
  $card_title_font_weight = get_theme_mod( 'card_title_font_weight', '' );
  $card_title_font_style = get_theme_mod( 'card_title_font_style', '' );
  $card_title_line_height = get_theme_mod( 'card_title_line_height', '' );

  if ( isset( $card_title_font_size ) && $card_title_font_size != '' ) {
    ?>
    :root {
    --card-title-font-size: <?php echo $card_title_font_size; ?>px;
    }
    <?php
  }

  if ( !empty( $card_title_font_weight ) ) {
    ?>
    :root {
    --card-title-font-weight: <?php echo $card_title_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $card_title_font_style ) ) {
    ?>
    :root {
    --card-title-font-style: <?php echo $card_title_font_style; ?>;
    }
    <?php
  }

  if ( isset( $card_title_line_height ) && $card_title_line_height != '' ) {
    ?>
    :root {
    --card-title-line-height: <?php echo $card_title_line_height; ?>px;
    }
    <?php
  }


  /**
   * Card Subtitles
   **/

  $card_subtitle_font_size = get_theme_mod( 'card_subtitle_font_size', '' );
  $card_subtitle_font_weight = get_theme_mod( 'card_subtitle_font_weight', '' );
  $card_subtitle_font_style = get_theme_mod( 'card_subtitle_font_style', '' );
  $card_subtitle_line_height = get_theme_mod( 'card_subtitle_line_height', '' );

  if ( isset( $card_subtitle_font_size ) && $card_subtitle_font_size != '' ) {
    ?>
    :root {
    --card-subtitle-font-size: <?php echo $card_subtitle_font_size; ?>px;
    }
    <?php
  }

  if ( !empty( $card_subtitle_font_weight ) ) {
    ?>
    :root {
    --card-subtitle-font-weight: <?php echo $card_subtitle_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $card_subtitle_font_style ) ) {
    ?>
    :root {
    --card-subtitle-font-style: <?php echo $card_subtitle_font_style; ?>;
    }
    <?php
  }

  if ( isset( $card_subtitle_line_height ) && $card_subtitle_line_height != '' ) {
    ?>
    :root {
    --card-subtitle-line-height: <?php echo $card_subtitle_line_height; ?>px;
    }
    <?php
  }


  /**
   * Card Text
   **/

  $card_text_font_size = get_theme_mod( 'card_text_font_size', '' );
  $card_text_font_weight = get_theme_mod( 'card_text_font_weight', '' );
  $card_text_font_style = get_theme_mod( 'card_text_font_style', '' );
  $card_text_line_height = get_theme_mod( 'card_text_line_height', '' );

  if ( isset( $card_text_font_size ) && $card_text_font_size != '' ) {
    ?>
    :root {
    --card-text-font-size: <?php echo $card_text_font_size; ?>px;
    }
    <?php
  }

  if ( !empty( $card_text_font_weight ) ) {
    ?>
    :root {
    --card-text-font-weight: <?php echo $card_text_font_weight; ?>;
    }
    <?php
  }

  if ( !empty( $card_text_font_style ) ) {
    ?>
    :root {
    --card-text-font-style: <?php echo $card_text_font_style; ?>;
    }
    <?php
  }

  if ( isset( $card_text_line_height ) && $card_text_line_height != '' ) {
    ?>
    :root {
    --card-text-line-height: <?php echo $card_text_line_height; ?>px;
    }
    <?php
  }




  $css = ob_get_clean();
  return $css;

}
