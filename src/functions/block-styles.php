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
     * Separator
     */
    register_block_style(
      'core/separator',
      array(
        'name'  => 'short',
        'label' => __( 'Short' ),
      )
    );
  }
}
add_action( 'after_setup_theme', 'dream_register_block_styles' );
