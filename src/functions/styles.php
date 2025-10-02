<?php

// Front-End Styles
function dream_enqueue_styles() {

  //Enqueue Styles
  wp_enqueue_style( 'styles', get_template_directory_uri() . '/dist/wp/css/dream.css', array(), wp_get_theme()->get( 'Version' ), 'all' );

  // Get cached customizer CSS
  $cached_customizer_css = get_transient( 'dream_customizer_css' );

  if ( false === $cached_customizer_css ) {
    // Generate all customizer CSS
    $cached_customizer_css = '';
    $cached_customizer_css .= theme_get_customizer_colors();
    $cached_customizer_css .= theme_get_customizer_buttons();
    $cached_customizer_css .= theme_get_customizer_global();
    $cached_customizer_css .= theme_get_customizer_forms();
    $cached_customizer_css .= theme_get_customizer_alerts();
    $cached_customizer_css .= theme_get_customizer_cards();
    $cached_customizer_css .= theme_get_customizer_modals();
    $cached_customizer_css .= theme_get_customizer_social_navs();
    $cached_customizer_css .= theme_get_customizer_header();
    $cached_customizer_css .= theme_get_customizer_header_branding();
    $cached_customizer_css .= theme_get_customizer_navbar();
    $cached_customizer_css .= theme_get_customizer_primary_nav();
    $cached_customizer_css .= theme_get_customizer_secondary_nav();
    $cached_customizer_css .= theme_get_customizer_header_cta();
    $cached_customizer_css .= theme_get_customizer_header_cta_mobile();
    $cached_customizer_css .= theme_get_customizer_header_search();
    $cached_customizer_css .= theme_get_customizer_header_social_nav();
    $cached_customizer_css .= theme_get_customizer_footer();
    $cached_customizer_css .= theme_get_customizer_footer_branding();
    $cached_customizer_css .= theme_get_customizer_footer_cta();
    $cached_customizer_css .= theme_get_customizer_footer_nav();
    $cached_customizer_css .= theme_get_customizer_utility_nav();
    $cached_customizer_css .= theme_get_customizer_footer_social_nav();
    $cached_customizer_css .= theme_get_customizer_footer_search();
    $cached_customizer_css .= theme_get_customizer_footer_contact_info();
    $cached_customizer_css .= theme_get_customizer_footer_disclaimer();
    $cached_customizer_css .= theme_get_customizer_footer_attribution();
    $cached_customizer_css .= theme_get_customizer_footer_copyright();

    // Cache for 1 week (or until customizer is saved)
    set_transient( 'dream_customizer_css', $cached_customizer_css, WEEK_IN_SECONDS );
  }

  // Add the cached CSS
  wp_add_inline_style( 'styles', $cached_customizer_css );

}


// Admin Styles
if ( !is_admin() ) {
  add_action( 'wp_enqueue_scripts', 'dream_enqueue_styles' );
}

function dream_enqueue_admin_styles() {

  //Enqueue Styles
  wp_enqueue_style( 'admin_styles', get_template_directory_uri() . '/dist/wp/css/admin.css', array(), wp_get_theme()->get( 'Version' ), 'all' );

  // Get cached admin customizer CSS
  $cached_admin_customizer_css = get_transient( 'dream_admin_customizer_css' );

  if ( false === $cached_admin_customizer_css ) {
    // Generate all admin customizer CSS
    $cached_admin_customizer_css = '';
    $cached_admin_customizer_css .= theme_get_customizer_colors();
    $cached_admin_customizer_css .= theme_get_customizer_buttons();
    $cached_admin_customizer_css .= theme_get_customizer_global();
    $cached_admin_customizer_css .= theme_get_customizer_forms();
    $cached_admin_customizer_css .= theme_get_customizer_alerts();
    $cached_admin_customizer_css .= theme_get_customizer_cards();
    $cached_admin_customizer_css .= theme_get_customizer_modals();
    $cached_admin_customizer_css .= theme_get_customizer_social_navs();
    $cached_admin_customizer_css .= theme_get_customizer_header();
    $cached_admin_customizer_css .= theme_get_customizer_header_branding();
    $cached_admin_customizer_css .= theme_get_customizer_navbar();
    $cached_admin_customizer_css .= theme_get_customizer_primary_nav();
    $cached_admin_customizer_css .= theme_get_customizer_secondary_nav();
    $cached_admin_customizer_css .= theme_get_customizer_header_cta();
    $cached_admin_customizer_css .= theme_get_customizer_header_cta_mobile();
    $cached_admin_customizer_css .= theme_get_customizer_header_search();
    $cached_admin_customizer_css .= theme_get_customizer_header_social_nav();
    $cached_admin_customizer_css .= theme_get_customizer_footer();
    $cached_admin_customizer_css .= theme_get_customizer_footer_branding();
    $cached_admin_customizer_css .= theme_get_customizer_footer_cta();
    $cached_admin_customizer_css .= theme_get_customizer_footer_nav();
    $cached_admin_customizer_css .= theme_get_customizer_utility_nav();
    $cached_admin_customizer_css .= theme_get_customizer_footer_social_nav();
    $cached_admin_customizer_css .= theme_get_customizer_footer_search();
    $cached_admin_customizer_css .= theme_get_customizer_footer_contact_info();
    $cached_admin_customizer_css .= theme_get_customizer_footer_disclaimer();
    $cached_admin_customizer_css .= theme_get_customizer_footer_attribution();
    $cached_admin_customizer_css .= theme_get_customizer_footer_copyright();

    // Cache for 1 week (or until customizer is saved)
    set_transient( 'dream_admin_customizer_css', $cached_admin_customizer_css, WEEK_IN_SECONDS );
  }

  // Add the cached CSS
  wp_add_inline_style( 'admin_styles', $cached_admin_customizer_css );

}

if ( is_admin() ) {
  add_action( 'admin_enqueue_scripts', 'dream_enqueue_admin_styles' );
}

// Clear customizer CSS cache when customizer is saved
add_action( 'customize_save_after', function() {
  delete_transient( 'dream_customizer_css' );
  delete_transient( 'dream_admin_customizer_css' );
});


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

// function dream_enqueue_block_styles() {
//   $blocks_path = dirname(__DIR__) . '/templates/blocks';
//   $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//   foreach ($blocks as $block) {
//     if ( file_exists( $blocks_path . '/' . $block . '/style.css' ) ) {
//       wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/style.css', array(), wp_get_theme()->get( 'Version' ), 'all');
//     }
//   }
// }
// add_action( 'enqueue_block_assets', 'dream_enqueue_block_styles' );

// function dream_enqueue_block_admin_styles() {
//   $blocks_path = dirname(__DIR__) . '/templates/blocks';
//   $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//   foreach ($blocks as $block) {
//     if ( file_exists( $blocks_path . '/' . $block . '/index.css' ) ) {
//       wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.css', array(), wp_get_theme()->get( 'Version' ), 'all');
//     }
//   }

// }
// add_action( 'enqueue_block_editor_assets', 'dream_enqueue_block_admin_styles' );

/**
 * Block Styles
 * @link https://jasonyingling.me/enqueueing-scripts-and-styles-for-gutenberg-blocks/
 */

// Function to check and enqueue block styles
function check_and_enqueue_block_styles($content, $blocks_path, $blocks) {
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

                // Check if the content contains the block
                if (has_block($block_name, $content)) {
                    // Enqueue the block style
                    if (file_exists($blocks_path . '/' . $block . '/style.css')) {
                        wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/style.css', array(), wp_get_theme()->get('Version'), 'all');
                    }
                }
            }
        }
    }
}

function dream_enqueue_block_styles() {
    $blocks_path = dirname(__DIR__) . '/templates/blocks';
    $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');

    if (get_post() !== null) {
        // Get the post content
        $post_content = get_post()->post_content;

        // Check post content
        check_and_enqueue_block_styles($post_content, $blocks_path, $blocks);

        // Parse patterns and check content within patterns
        if (preg_match_all('/<!-- wp:block {"ref":(\d+)} \/-->/', $post_content, $matches)) {
            foreach ($matches[1] as $pattern_id) {
                $pattern_content = get_post($pattern_id)->post_content;
                check_and_enqueue_block_styles($pattern_content, $blocks_path, $blocks);
            }
        }
    }
}
add_action('enqueue_block_assets', 'dream_enqueue_block_styles');


// Function to check and enqueue block admin styles
function check_and_enqueue_block_admin_styles($content, $blocks_path, $blocks) {
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

                // Check if the content contains the block
                if (has_block($block_name, $content)) {
                    // Enqueue the block admin style
                    if (file_exists($blocks_path . '/' . $block . '/index.css')) {
                        wp_enqueue_style('blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.css', array(), wp_get_theme()->get('Version'), 'all');
                    }
                }
            }
        }
    }
}

function dream_enqueue_block_admin_styles() {
    $blocks_path = dirname(__DIR__) . '/templates/blocks';
    $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');

    foreach ($blocks as $block) {
        if ( file_exists( $blocks_path . '/' . $block . '/index.css' ) ) {
            wp_enqueue_style( 'blocks_css_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.css', array(), wp_get_theme()->get( 'Version' ), 'all');
        }
    }
}
add_action('enqueue_block_editor_assets', 'dream_enqueue_block_admin_styles');


