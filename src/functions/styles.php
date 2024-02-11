<?php

// Front-End Styles
function dream_enqueue_styles() {

  //Enqueue Styles
  wp_enqueue_style( 'styles', get_template_directory_uri() . '/dist/wp/css/dream.css', array(), wp_get_theme()->get( 'Version' ), 'all' );

  //Customizer Styles
  wp_add_inline_style( 'styles', theme_get_customizer_colors() );
  wp_add_inline_style( 'styles', theme_get_customizer_buttons() );
  wp_add_inline_style( 'styles', theme_get_customizer_global() );
  wp_add_inline_style( 'styles', theme_get_customizer_forms() );
  wp_add_inline_style( 'styles', theme_get_customizer_alerts() );
  wp_add_inline_style( 'styles', theme_get_customizer_cards() );
  wp_add_inline_style( 'styles', theme_get_customizer_modals() );
  wp_add_inline_style( 'styles', theme_get_customizer_social_navs() );
  wp_add_inline_style( 'styles', theme_get_customizer_header() );
  wp_add_inline_style( 'styles', theme_get_customizer_header_branding() );
  wp_add_inline_style( 'styles', theme_get_customizer_navbar() );
  wp_add_inline_style( 'styles', theme_get_customizer_primary_nav() );
  wp_add_inline_style( 'styles', theme_get_customizer_secondary_nav() );
  wp_add_inline_style( 'styles', theme_get_customizer_header_cta() );
  wp_add_inline_style( 'styles', theme_get_customizer_header_cta_mobile() );
  wp_add_inline_style( 'styles', theme_get_customizer_header_search() );
  wp_add_inline_style( 'styles', theme_get_customizer_header_social_nav() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_branding() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_cta() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_nav() );
  wp_add_inline_style( 'styles', theme_get_customizer_utility_nav() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_social_nav() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_search() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_contact_info() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_disclaimer() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_attribution() );
  wp_add_inline_style( 'styles', theme_get_customizer_footer_copyright() );

}


// Admin Styles
if ( !is_admin() ) {
  add_action( 'wp_enqueue_scripts', 'dream_enqueue_styles' );
}

function dream_enqueue_admin_styles() {

  //Enqueue Styles
  wp_enqueue_style( 'admin_styles', get_template_directory_uri() . '/dist/wp/css/admin.css', array(), wp_get_theme()->get( 'Version' ), 'all' );

  //Customizer Styles
  wp_add_inline_style( 'admin_styles', theme_get_customizer_colors() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_buttons() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_global() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_forms() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_alerts() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_cards() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_modals() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_social_navs() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_header() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_header_branding() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_navbar() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_primary_nav() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_secondary_nav() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_header_cta() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_header_cta_mobile() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_header_search() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_header_social_nav() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_branding() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_cta() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_nav() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_utility_nav() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_social_nav() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_search() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_contact_info() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_disclaimer() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_attribution() );
  wp_add_inline_style( 'admin_styles', theme_get_customizer_footer_copyright() );

}

if ( is_admin() ) {
  add_action( 'admin_enqueue_scripts', 'dream_enqueue_admin_styles' );
}


// Block Editor Styles
function dream_acf_block_editor_style()
{
  wp_enqueue_style('block_css', get_template_directory_uri() . '/dist/wp/css/editor.css', array(), wp_get_theme()->get( 'Version' ), 'all');
}

if (is_admin()) {
  add_action('enqueue_block_assets', 'dream_acf_block_editor_style');
}


/**
 * Block Styles
 * @link https://jasonyingling.me/enqueueing-scripts-and-styles-for-gutenberg-blocks/
 */

//function dream_enqueue_block_styles() {
//  $blocks_path = dirname(__DIR__) . '/templates/blocks';
//  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//  foreach ($blocks as $block) {
//    if ( file_exists( $blocks_path . '/' . $block . '/style.css' ) ) {
//      wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/style.css', array(), wp_get_theme()->get( 'Version' ), 'all');
//    }
//  }
//}
//add_action( 'enqueue_block_assets', 'dream_enqueue_block_styles' );

function dream_enqueue_block_styles() {
  $blocks_path = dirname(__DIR__) . '/templates/blocks';
  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');

  // Get the post content
  $post_content = get_post()->post_content;

  foreach ($blocks as $block) {
    // Get the block.json file path
    $block_json_path = $blocks_path . '/' . $block . '/block.json';

    if (file_exists($block_json_path)) {
      // Read the block.json file
      $block_json_content = file_get_contents($block_json_path);
      $block_data = json_decode($block_json_content, true);

      // Check if the block name is defined in block.json
      if (isset($block_data['name'])) {
        $block_name = $block_data['name'];

        // Check if the post content contains the block
        if (has_block($block_name, $post_content)) {
          // Enqueue the block style
          if (file_exists($blocks_path . '/' . $block . '/style.css')) {
            wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/style.css', array(), wp_get_theme()->get('Version'), 'all');
          }
        }
      }
    }
  }
}
add_action('enqueue_block_assets', 'dream_enqueue_block_styles');

//function dream_enqueue_block_admin_styles() {
//  $blocks_path = dirname(__DIR__) . '/templates/blocks';
//  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//  foreach ($blocks as $block) {
//    if ( file_exists( $blocks_path . '/' . $block . '/index.css' ) ) {
//      wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.css', array(), wp_get_theme()->get( 'Version' ), 'all');
//    }
//  }
//
//}
//add_action( 'enqueue_block_editor_assets', 'dream_enqueue_block_admin_styles' );

function dream_enqueue_block_admin_styles() {
  $blocks_path = dirname(__DIR__) . '/templates/blocks';
  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');

  // Get the post content
  $post_content = get_post()->post_content;

  foreach ($blocks as $block) {
    // Get the block.json file path
    $block_json_path = $blocks_path . '/' . $block . '/block.json';

    if (file_exists($block_json_path)) {
      // Read the block.json file
      $block_json_content = file_get_contents($block_json_path);
      $block_data = json_decode($block_json_content, true);

      // Check if the block name is defined in block.json
      if (isset($block_data['name'])) {
        $block_name = $block_data['name'];

        // Check if the post content contains the block
        if (has_block($block_name, $post_content)) {
          // Enqueue the block admin style
          if (file_exists($blocks_path . '/' . $block . '/index.css')) {
            wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.css', array(), wp_get_theme()->get('Version'), 'all');
          }
        }
      }
    }
  }
}
add_action('enqueue_block_editor_assets', 'dream_enqueue_block_admin_styles');
