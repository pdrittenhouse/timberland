<?php

/**
 * Cache Management
 *
 * Centralized cache management for:
 * - Timber/Twig template cache
 * - Block detection cache
 * - WordPress object cache
 */

/**
 * Clear all caches (Timber, Block Detection, Object Cache)
 */
function dream_clear_timber_cache() {
	global $wpdb;

	// Clear Timber file cache if it exists
	if (function_exists('timber_clear_cache_timber')) {
		timber_clear_cache_timber();
	}

	// Clear Timber file cache directory
	$cache_dir = WP_CONTENT_DIR . '/cache/timber';
	if (is_dir($cache_dir)) {
		$files = glob($cache_dir . '/*');
		foreach ($files as $file) {
			if (is_file($file)) {
				unlink($file);
			}
		}
	}

	// Clear block transient cache (dream_block_*)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_block_%' OR option_name LIKE '_transient_timeout_dream_block_%'");

	// Clear block detection cache (new caching system)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_metadata%' OR option_name LIKE '_transient_timeout_dream_blocks_metadata%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_child_blocks_metadata%' OR option_name LIKE '_transient_timeout_dream_child_blocks_metadata%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_post_blocks_%' OR option_name LIKE '_transient_timeout_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_pattern_blocks_%' OR option_name LIKE '_transient_timeout_dream_pattern_blocks_%'");

	// Clear SASS data cache (all versions - mtime-based keys)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_theme_sass_data_%' OR option_name LIKE '_transient_timeout_theme_sass_data_%'");

	// Clear Bootstrap manifest cache (all versions - mtime-based keys)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_bootstrap_manifest_%' OR option_name LIKE '_transient_timeout_bootstrap_manifest_%'");

	// Clear Bootstrap components cache (per-post detection)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_bootstrap_components_%' OR option_name LIKE '_transient_timeout_bootstrap_components_%'");

	// Clear Pattern manifest cache (all versions - mtime-based keys)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_pattern_manifest_%' OR option_name LIKE '_transient_timeout_pattern_manifest_%'");

	// Clear Pattern dependencies cache (per-post detection)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_pattern_dependencies_%' OR option_name LIKE '_transient_timeout_pattern_dependencies_%'");

	// Clear any WordPress object cache
	if (function_exists('wp_cache_flush')) {
		wp_cache_flush();
	}

	return true;
}

/**
 * Handle manual cache clear action from admin
 */
add_action('admin_post_dream_clear_timber_cache', function() {
	// Check nonce for security
	if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'dream_clear_timber_cache')) {
		wp_die('Security check failed');
	}

	// Check user capability
	if (!current_user_can('manage_options')) {
		wp_die('Unauthorized');
	}

	// Clear the cache
	dream_clear_timber_cache();

	// Redirect back with success message
	wp_redirect(add_query_arg(
		array('page' => 'acf-options-cache-options', 'cache_cleared' => 'timber'),
		admin_url('admin.php')
	));
	exit;
});

/**
 * Add cache clear button to ACF Cache Options page
 */
add_action('acf/input/admin_head', function() {
	$screen = get_current_screen();

	// Only on Cache options page
	if ($screen && $screen->id === 'theme-options_page_acf-options-cache-options') {
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			// Wait for ACF fields to load, then add button
			function addCacheButton() {
				if ($('.acf-fields').length || $('.wrap form').length) {
					var buttonsHtml = '<div class="acf-field" style="margin: 20px 0;">';
					buttonsHtml += '<div class="acf-label"><label>Clear Cache</label></div>';
					buttonsHtml += '<div class="acf-input">';
					buttonsHtml += '<a href="<?php echo wp_nonce_url(admin_url("admin-post.php?action=dream_clear_timber_cache"), "dream_clear_timber_cache"); ?>" class="button button-secondary" style="margin-right: 10px;">Clear All Caches</a>';
					buttonsHtml += '<p class="description">Clear the Timber/Twig template cache and block detection cache. Use this to see template changes or force blocks to re-detect.</p>';
					buttonsHtml += '</div>';
					buttonsHtml += '</div>';

					if ($('.acf-fields').length) {
						$('.acf-fields').prepend(buttonsHtml);
					} else {
						$('.wrap form').prepend(buttonsHtml);
					}
				} else {
					// Retry if ACF fields aren't loaded yet
					setTimeout(addCacheButton, 100);
				}
			}

			addCacheButton();

			// Show success message if cache was cleared
			<?php if (isset($_GET['cache_cleared']) && $_GET['cache_cleared'] === 'timber'): ?>
			$('<div class="notice notice-success is-dismissible"><p>Cache cleared successfully!</p></div>').insertAfter('.wrap h1');
			<?php endif; ?>
		});
		</script>
		<style>
		.acf-field .button-secondary {
			height: auto;
			padding: 8px 15px;
			font-size: 14px;
		}
		</style>
		<?php
	}
});


/**
 * Block Detection Cache Invalidation Hooks
 */

// DIAGNOSTIC: Check if this file loads during REST requests
if (!headers_sent()) {
    header('X-Debug-Cache-Loaded: YES');
}

add_action('init', function() {
	if (!headers_sent()) {
		header('X-Debug-Cache-Init-Fired: YES');

		if (defined('REST_REQUEST') && REST_REQUEST) {
			header('X-Debug-Cache-Is-REST-Request: TRUE');
		}

		if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/wp-json/') !== false) {
			header('X-Debug-Cache-URI-Has-JSON: TRUE');
		}
	}
});


/**
 * Clear cache for a specific post
 * Named function (not closure) for better compatibility with REST/opcache
 */
function dream_clear_post_cache($post_id) {
	if (!headers_sent()) {
		header('X-Debug-Cache-Clear-Called: ' . $post_id);
	}

	// Skip autosaves and revisions
	if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
		if (!headers_sent()) {
			header('X-Debug-Cache-Clear-Skipped: autosave-or-revision');
		}
		return;
	}

	if (!headers_sent()) {
		header('X-Debug-Cache-Clear-Executing: ' . $post_id);
		header('X-Debug-Cache-Clear-Post-Type: ' . get_post_type($post_id));
	}

	// Check if transient exists before deleting
	$cache_key = 'dream_post_blocks_' . $post_id;
	$transient_exists = get_transient($cache_key);

	if (!headers_sent()) {
		header('X-Debug-Cache-Transient-Exists: ' . ($transient_exists !== false ? 'YES' : 'NO'));
		if ($transient_exists !== false) {
			header('X-Debug-Cache-Transient-Value: ' . json_encode($transient_exists));
		}
	}

	// Clear the post blocks cache
	$deleted = delete_transient($cache_key);

	if (!headers_sent()) {
		header('X-Debug-Cache-Transient-Deleted: ' . ($deleted ? 'TRUE' : 'FALSE'));
	}

	// Clear block template cache for this specific post
	global $wpdb;
	$wpdb->query($wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_dream_block_' . $post_id . '_%',
		'_transient_timeout_dream_block_' . $post_id . '_%'
	));

	// If this is a pattern (wp_block post type), clear pattern cache
	if (get_post_type($post_id) === 'wp_block') {
		delete_transient('dream_pattern_blocks_' . $post_id);
		if (!headers_sent()) {
			header('X-Debug-Cache-Pattern-Cleared: TRUE');
		}
	}

	if (!headers_sent()) {
		header('X-Debug-Cache-Clear-Completed: ' . $post_id);
	}
}

// Hook into ALL save events (catches admin-ajax, REST API, and traditional saves)
// Priority 99 = run late, after the post is fully saved
add_action('save_post', 'dream_clear_post_cache', 99, 1);
add_action('post_updated', 'dream_clear_post_cache', 99, 1);
add_action('acf/save_post', 'dream_clear_post_cache', 99, 1);

// Add diagnostic headers to track which hooks fire
add_action('save_post', function($post_id) {
	if (!headers_sent()) {
		header('X-Debug-Save-Post-Hook: FIRED-' . $post_id);
	}
}, 98, 1);

add_action('post_updated', function($post_id) {
	if (!headers_sent()) {
		header('X-Debug-Post-Updated-Hook: FIRED-' . $post_id);
	}
}, 98, 1);

// Clear post-specific block cache when post is trashed
add_action('wp_trash_post', function($post_id) {
	delete_transient('dream_post_blocks_' . $post_id);

	// Clear block template cache for this specific post
	global $wpdb;
	$wpdb->query($wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_dream_block_' . $post_id . '_%',
		'_transient_timeout_dream_block_' . $post_id . '_%'
	));

	if (get_post_type($post_id) === 'wp_block') {
		delete_transient('dream_pattern_blocks_' . $post_id);
	}
});

// Clear post-specific block cache when post is deleted
add_action('delete_post', function($post_id) {
	delete_transient('dream_post_blocks_' . $post_id);

	// Clear block template cache for this specific post
	global $wpdb;
	$wpdb->query($wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_dream_block_' . $post_id . '_%',
		'_transient_timeout_dream_block_' . $post_id . '_%'
	));

	if (get_post_type($post_id) === 'wp_block') {
		delete_transient('dream_pattern_blocks_' . $post_id);
	}
});

// Clear all post block caches when menus are updated (blocks can be in menus)
add_action('wp_update_nav_menu', function() {
	global $wpdb;
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_pattern_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_pattern_blocks_%'");
	// Also clear block template cache since menu changes affect rendered output
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_block_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_block_%'");
});

// Clear all post block caches when widgets are updated (blocks can be in widgets)
add_action('update_option_sidebars_widgets', function() {
	global $wpdb;
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_pattern_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_pattern_blocks_%'");
	// Also clear block template cache since widget changes affect rendered output
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_block_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_block_%'");
});

// Clear parent block metadata cache when theme is switched
add_action('switch_theme', function() {
	delete_transient('dream_blocks_metadata');
});



/**
 * Automatically clear all caches when a post or page is saved or updated.
 */
function dream_clear_all_caches_on_save($post_id) {
	// Skip autosaves and revisions
	if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
		return;
	}

	// Run the global cache clear function
	if (function_exists('dream_clear_timber_cache')) {
		dream_clear_timber_cache();
	}
}
add_action('save_post', 'dream_clear_all_caches_on_save', 100, 1);
add_action('post_updated', 'dream_clear_all_caches_on_save', 100, 1);
add_action('acf/save_post', 'dream_clear_all_caches_on_save', 100, 1);