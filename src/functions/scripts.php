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

/**
 * Block Scripts - Use the same detection from styles.php (blocks detected on 'wp' hook)
 * We don't re-detect here, we rely on the cache being populated by styles.php
 */
add_action('enqueue_block_assets', function() {
	// Only on frontend
	if (is_admin()) {
		return;
	}

	// Only on singular pages
	if (!is_singular()) {
		return;
	}

	$post_id = get_the_ID();
	$blocks_metadata = dream_get_blocks_metadata(); // Helper function from helpers.php
	$used_blocks = dream_get_post_used_blocks($post_id, $blocks_metadata); // Will use cached value from 'wp' hook
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
});


// Admin editor: Load block admin scripts (optimized - only load non-empty files)
// Note: block.json references assets, but WordPress won't auto-enqueue empty files
// So we handle enqueuing here with content check to skip empty/whitespace-only files
function dream_enqueue_block_admin_scripts() {
	$blocks_path = dirname(__DIR__) . '/templates/blocks';
	$blocks = array_filter(scandir($blocks_path), 'filter_block_dir'); // Helper function from helpers.php

	foreach ($blocks as $block) {
		$index_js_path = $blocks_path . '/' . $block . '/index.js';

		// Only enqueue if file exists AND has actual content (not just whitespace)
		if (file_exists($index_js_path)) {
			$content = file_get_contents($index_js_path);
			if (!empty(trim($content))) {
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
}
add_action('enqueue_block_editor_assets', 'dream_enqueue_block_admin_scripts');
