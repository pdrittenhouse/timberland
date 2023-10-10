<?php
/**
 * Block Styles
 */
function dream_register_block_styles() {

  if ( function_exists( 'register_block_style' ) ) {

    /**
     * Image
    */
    register_block_style(
      'core/image',
      array(
        'name'  => 'inline',
        'label' => __('Inline'),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'circle',
        'label' => __( 'Circle' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'full-width',
        'label' => __('Full Width'),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'full-height',
        'label' => __( 'Full Height' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-1-1',
        'label' => __( '1:1 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-2-3',
        'label' => __( '2:3 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-3-2',
        'label' => __( '3:2 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-3-4',
        'label' => __( '3:4 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-4-3',
        'label' => __( '4:3 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-5-7',
        'label' => __( '5:7 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-16-9',
        'label' => __( '16:9 Aspect Ratio' ),
      )
    );

    register_block_style(
      'core/image',
      array(
        'name'  => 'ar-21-9',
        'label' => __( '21:9 Aspect Ratio' ),
      )
    );

    /**
     * Featured Image
     */
    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'rounded',
        'label' => __('Rounded'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'circle',
        'label' => __('Circle'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'full-width',
        'label' => __('Full Width'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'full-height',
        'label' => __('Full Height'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-1-1',
        'label' => __('1:1 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-2-3',
        'label' => __('2:3 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-3-2',
        'label' => __('3:2 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-3-4',
        'label' => __('3:4 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-4-3',
        'label' => __('4:3 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-5-7',
        'label' => __('5:7 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-16-9',
        'label' => __('16:9 Aspect Ratio'),
      )
    );

    register_block_style(
      'core/post-featured-image',
      array(
        'name'  => 'ar-21-9',
        'label' => __('21:9 Aspect Ratio'),
      )
    );

    /**
     * Separator
     */
    register_block_style(
      'core/separator',
      array(
        'name'  => 'short',
        'label' => __( 'Short' ),
      )
    );

    /**
     * Headings
     */
    register_block_style(
      'core/heading',
      array(
        'name'  => 'base',
        'label' => __( 'Base Font Family' ),
      )
    );

    register_block_style(
      'core/heading',
      array(
        'name'  => 'alternate',
        'label' => __( 'Alternate Font Family' ),
      )
    );

    register_block_style(
      'core/heading',
      array(
        'name'  => 'serif',
        'label' => __( 'Serif Font Family' ),
      )
    );

    register_block_style(
      'core/heading',
      array(
        'name'  => 'sansserif',
        'label' => __( 'Sans Serif Font Family' ),
      )
    );

    /**
     * Group
     */
    register_block_style(
      'core/group',
      array(
        'name'  => 'align-center',
        'label' => __('Align Center'),
      )
    );

    register_block_style(
      'core/group',
      array(
        'name'  => 'align-right',
        'label' => __('Align Right'),
      )
    );
  }
}
add_action( 'after_setup_theme', 'dream_register_block_styles' );
