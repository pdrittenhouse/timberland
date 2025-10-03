<?php

function dream_enqueue_scripts() {

  //Enqueue Scripts

  /*
   * Use this to include jquery manually
   */
  //wp_deregister_script( 'jquery' );
  //wp_register_script( 'jquery', ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "/wp-content/themes/PDFK/js/libs/jquery/dist/jquery.min.js", false, '3.1.1');
  //wp_enqueue_script( 'jquery' );

  wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/wp/js/dream.bundle.js', array ( 'jquery' ), wp_get_theme()->get( 'Version' ), true);

}

if ( !is_admin() ) {
  add_action( 'wp_enqueue_scripts', 'dream_enqueue_scripts' );
}

function dream_enqueue_admin_scripts() {

  //Enqueue Scripts

  wp_enqueue_script( 'admin_script', get_template_directory_uri() . '/dist/wp/js/admin.bundle.js', array ( 'jquery' ), wp_get_theme()->get( 'Version' ), true);

}

if ( is_admin() ) {
  add_action( 'admin_enqueue_scripts', 'dream_enqueue_admin_scripts' );
}


/**
 * Block Detection Caching Helpers
 */

/**
 * Get cached block metadata for parent theme
 * Returns array of ['block-slug' => 'acf/block-name', ...]
 */
function dream_get_blocks_metadata() {
	$blocks_metadata = get_transient('dream_blocks_metadata');

	if (false === $blocks_metadata) {
		$blocks_metadata = [];
		$blocks_path = dirname(__DIR__) . '/templates/blocks';

		if (file_exists($blocks_path)) {
			$blocks = array_filter(scandir($blocks_path), 'filter_block_dir');

			foreach ($blocks as $block) {
				$block_json_path = $blocks_path . '/' . $block . '/block.json';

				if (file_exists($block_json_path)) {
					$block_json_content = file_get_contents($block_json_path);
					$block_data = json_decode($block_json_content, true);

					if (isset($block_data['name'])) {
						$blocks_metadata[$block] = $block_data['name'];
					}
				}
			}
		}

		// Cache for 1 week
		set_transient('dream_blocks_metadata', $blocks_metadata, WEEK_IN_SECONDS);
	}

	return $blocks_metadata;
}

/**
 * Get blocks used in a specific pattern (cached)
 */
function dream_get_pattern_used_blocks($pattern_id, $blocks_metadata) {
	$cache_key = 'dream_pattern_blocks_' . $pattern_id;
	$used_blocks = get_transient($cache_key);

	if (false === $used_blocks) {
		$used_blocks = [];
		$pattern = get_post($pattern_id);

		if ($pattern) {
			$pattern_content = $pattern->post_content;

			foreach ($blocks_metadata as $block_slug => $block_name) {
				if (has_block($block_name, $pattern_content)) {
					$used_blocks[] = $block_slug;
				}
			}
		}

		// Cache for 1 day
		set_transient($cache_key, $used_blocks, DAY_IN_SECONDS);
	}

	return $used_blocks;
}

/**
 * Get all blocks used in a post (including blocks within patterns)
 */
function dream_get_post_used_blocks($post_id, $blocks_metadata) {
	$cache_key = 'dream_post_blocks_' . $post_id;
	$used_blocks = get_transient($cache_key);

	if (false === $used_blocks) {
		$used_blocks = [];
		$post = get_post($post_id);

		if ($post) {
			$post_content = $post->post_content;

			// Check main post content for blocks
			foreach ($blocks_metadata as $block_slug => $block_name) {
				if (has_block($block_name, $post_content)) {
					$used_blocks[] = $block_slug;
				}
			}

			// Check for referenced patterns and get their blocks
			if (preg_match_all('/<!-- wp:block {"ref":(\d+)} \/-->/', $post_content, $matches)) {
				foreach ($matches[1] as $pattern_id) {
					$pattern_blocks = dream_get_pattern_used_blocks($pattern_id, $blocks_metadata);
					$used_blocks = array_merge($used_blocks, $pattern_blocks);
				}
			}

			// Remove duplicates
			$used_blocks = array_unique($used_blocks);
		}

		// Cache for 1 day
		set_transient($cache_key, $used_blocks, DAY_IN_SECONDS);
	}

	return $used_blocks;
}

/**
 * Block Scripts
 * @link https://jasonyingling.me/enqueueing-scripts-and-styles-for-gutenberg-blocks/
*/

// function dream_enqueue_block_scripts() {
//   $blocks_path = dirname(__DIR__) . '/templates/blocks';
//   $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//   foreach ($blocks as $block) {
//     if ( file_exists( $blocks_path . '/' . $block . '/script.js' ) ) {
//       wp_enqueue_script( 'block_script_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/script.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);
//     }
//   }
// }
// add_action( 'enqueue_block_assets', 'dream_enqueue_block_scripts' );



// function dream_enqueue_block_admin_scripts() {
//   $blocks_path = dirname(__DIR__) . '/templates/blocks';
//   $blocks = array_filter(scandir($blocks_path), 'filter_block_dir');
//   foreach ($blocks as $block) {
//     if ( file_exists( $blocks_path . '/' . $block . '/index.js' ) ) {
//       wp_enqueue_script( 'block_admin_script_' . $block, get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);
//     }
//   }
// }
// add_action( 'enqueue_block_editor_assets', 'dream_enqueue_block_admin_scripts' );

function dream_enqueue_block_scripts() {
	if (get_post() === null) {
		return;
	}

	$post_id = get_the_ID();
	$blocks_metadata = dream_get_blocks_metadata();
	$used_blocks = dream_get_post_used_blocks($post_id, $blocks_metadata);
	$blocks_path = dirname(__DIR__) . '/templates/blocks';

	// Only enqueue scripts for blocks actually used on this page
	foreach ($used_blocks as $block_slug) {
		$script_path = $blocks_path . '/' . $block_slug . '/script.js';

		if (file_exists($script_path)) {
			wp_enqueue_script(
				'block_script_' . $block_slug,
				get_template_directory_uri() . '/src/templates/blocks/' . $block_slug . '/script.js',
				array('jquery', 'acf-input'),
				wp_get_theme()->get('Version'),
				true
			);
		}
	}
}
add_action('enqueue_block_assets', 'dream_enqueue_block_scripts');


// Admin editor: Load all block admin scripts (no caching needed - editor needs all blocks available)
function dream_enqueue_block_admin_scripts() {
	$blocks_path = dirname(__DIR__) . '/templates/blocks';
	$blocks = array_filter(scandir($blocks_path), 'filter_block_dir');

	foreach ($blocks as $block) {
		if (file_exists($blocks_path . '/' . $block . '/index.js')) {
			wp_enqueue_script(
				'block_admin_script_' . $block,
				get_template_directory_uri() . '/src/templates/blocks/' . $block . '/index.js',
				array('jquery', 'acf-input'),
				wp_get_theme()->get('Version'),
				true
			);
		}
	}
}
add_action('enqueue_block_editor_assets', 'dream_enqueue_block_admin_scripts');
