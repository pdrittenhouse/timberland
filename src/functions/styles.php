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
 * Block Styles - Detect blocks early when post content is guaranteed to be loaded
 * @link https://jasonyingling.me/enqueueing-scripts-and-styles-for-gutenberg-blocks/
 */

// Detect blocks on 'wp' hook (after main query is set, before template loads)
add_action('wp', function() {
	// Only run on singular pages where we have a single post
	if (!is_singular()) {
		return;
	}

	$post_id = get_the_ID();
	$blocks_metadata = dream_get_blocks_metadata(); // Helper function from helpers.php

	// Detect blocks NOW (when post content is definitely loaded)
	$used_blocks = dream_get_post_used_blocks($post_id, $blocks_metadata);

	// Temporary debug
	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('wp hook - Post ID: ' . $post_id);
		error_log('wp hook - Post content length: ' . strlen(get_post($post_id)->post_content));
		error_log('wp hook - Detected blocks: ' . print_r($used_blocks, true));
	}

	// Then hook into enqueue_block_assets to actually enqueue the styles
	add_action('enqueue_block_assets', function() use ($used_blocks) {
		$blocks_path = dirname(__DIR__) . '/templates/blocks';

		// Only enqueue styles for blocks actually used on this page
		foreach ($used_blocks as $block_slug) {
			$style_path = $blocks_path . '/' . $block_slug . '/style.css';

			if (file_exists($style_path)) {
				wp_enqueue_style(
					'blocks_css_' . $block_slug,
					get_template_directory_uri() . '/src/templates/blocks/' . $block_slug . '/style.css',
					array(),
					wp_get_theme()->get('Version'),
					'all'
				);
			}
		}
	});
});


// Admin editor: Load block admin styles (optimized - only load non-empty files)
// Note: block.json references assets, but WordPress won't auto-enqueue empty files
// So we handle enqueuing here with content check to skip empty/whitespace-only files
function dream_enqueue_block_admin_styles() {
	$blocks_path = dirname(__DIR__) . '/templates/blocks';
	$blocks = array_filter(scandir($blocks_path), 'filter_block_dir'); // Helper function from helpers.php

	foreach ($blocks as $block) {
		$index_css_path = $blocks_path . '/' . $block . '/index.css';

		// Only enqueue if file exists AND has actual content (not just whitespace)
		if (file_exists($index_css_path)) {
			$content = file_get_contents($index_css_path);
			if (!empty(trim($content))) {
				wp_enqueue_style(
					'blocks_css_' . $block,
					get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.css',
					array(),
					wp_get_theme()->get('Version'),
					'all'
				);
			}
		}
	}
}
add_action('enqueue_block_editor_assets', 'dream_enqueue_block_admin_styles');
