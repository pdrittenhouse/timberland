<?php

function dream_enqueue_scripts() {

  //Enqueue Scripts

  /*
   * Use this to include jquery manually
   */
  //wp_deregister_script( 'jquery' );
  //wp_register_script( 'jquery', ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "/wp-content/themes/PDFK/js/libs/jquery/dist/jquery.min.js", false, '3.1.1');
  //wp_enqueue_script( 'jquery' );

  wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/wp/js/dream.bundle.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);

}

if ( !is_admin() ) {
  add_action( 'wp_enqueue_scripts', 'dream_enqueue_scripts' );
}

function dream_enqueue_admin_scripts() {

  //Enqueue Scripts

  wp_enqueue_script( 'admin_script', get_template_directory_uri() . '/dist/wp/js/admin.bundle.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);

}

if ( is_admin() ) {
  add_action( 'admin_enqueue_scripts', 'dream_enqueue_admin_scripts' );
}

/**
 * Block Scripts
 * @link https://jasonyingling.me/enqueueing-scripts-and-styles-for-gutenberg-blocks/
*/

//function dream_enqueue_block_scripts() {
//  $blocks_path = dirname(__DIR__) . '/templates/blocks';
//  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//  foreach ($blocks as $block) {
//    if ( file_exists( $blocks_path . '/' . $block . '/script.js' ) ) {
//      wp_enqueue_script( 'block_script_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/script.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);
//    }
//  }
//}
//add_action( 'enqueue_block_assets', 'dream_enqueue_block_scripts' );


function dream_enqueue_block_scripts() {
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
          // Enqueue the block script
          if (file_exists($blocks_path . '/' . $block . '/script.js')) {
            wp_enqueue_script('block_script_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/script.js', array('jquery', 'acf-input'), wp_get_theme()->get('Version'), true);
          }
        }
      }
    }
  }
}
add_action('enqueue_block_assets', 'dream_enqueue_block_scripts');

//function dream_enqueue_block_admin_scripts() {
//  $blocks_path = dirname(__DIR__) . '/templates/blocks';
//  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//  foreach ($blocks as $block) {
//    if ( file_exists( $blocks_path . '/' . $block . '/index.js' ) ) {
//      wp_enqueue_script( 'block_admin_script_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);
//    }
//  }
//}
//add_action( 'enqueue_block_editor_assets', 'dream_enqueue_block_admin_scripts' );

function dream_enqueue_block_admin_scripts() {
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
          // Enqueue the block admin script
          if (file_exists($blocks_path . '/' . $block . '/index.js')) {
            wp_enqueue_script('block_admin_script_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.js', array('jquery', 'acf-input'), wp_get_theme()->get('Version'), true);
          }
        }
      }
    }
  }
}
add_action('enqueue_block_editor_assets', 'dream_enqueue_block_admin_scripts');
