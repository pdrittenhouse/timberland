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

	// Clear block transient cache (legacy dream_block_*)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_block_%' OR option_name LIKE '_transient_timeout_dream_block_%'");

	// Clear hybrid cache transients (new caching system)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_blocks_metadata%' OR option_name LIKE '_transient_timeout_dream_blocks_blocks_metadata%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_child_blocks_metadata%' OR option_name LIKE '_transient_timeout_dream_child_blocks_metadata%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_post_blocks_%' OR option_name LIKE '_transient_timeout_dream_blocks_post_blocks_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_post_blocks_time_%' OR option_name LIKE '_transient_timeout_dream_blocks_post_blocks_time_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_pattern_blocks_%' OR option_name LIKE '_transient_timeout_dream_blocks_pattern_blocks_%'");

	// Clear wp_cache for dream_blocks group (Memcached on WP Engine)
	wp_cache_flush_group('dream_blocks');

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

// Test that this file loads
$request_uri = $_SERVER['REQUEST_URI'] ?? 'N/A';
$is_post_edit = (strpos($request_uri, 'post.php') !== false && strpos($request_uri, 'action=edit') !== false);
error_log('CACHE.PHP - File loaded | URI: ' . $request_uri . ' | Is post edit: ' . ($is_post_edit ? 'YES' : 'NO'));

/**
 * Clear cache for a specific post
 */
function dream_clear_post_cache($post_id) {
	error_log('CACHE INVALIDATION - Function called for post ID: ' . $post_id);
	// Skip autosaves and revisions
	if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
		return;
	}

	// Debug logging
	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('CACHE INVALIDATION - Post ID: ' . $post_id . ' | Post Type: ' . get_post_type($post_id));
	}

	// Clear the post blocks cache (hybrid: both wp_cache and transient)
	dream_cache_delete('post_blocks_' . $post_id, 'dream_blocks');
	dream_cache_delete('post_blocks_time_' . $post_id, 'dream_blocks');

	// Debug logging
	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('CACHE INVALIDATION - Cleared hybrid cache for post: ' . $post_id);
	}

	// Clear block template cache for this specific post (legacy transients)
	global $wpdb;
	$wpdb->query($wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_dream_block_' . $post_id . '_%',
		'_transient_timeout_dream_block_' . $post_id . '_%'
	));

	// If this is a pattern (wp_block post type), clear pattern cache (hybrid)
	if (get_post_type($post_id) === 'wp_block') {
		dream_cache_delete('pattern_blocks_' . $post_id, 'dream_blocks');
	}
}

// Check if REST API is being used
add_action('rest_api_init', function() {
	error_log('CACHE.PHP - REST API initialized');
});

// Log ALL REST requests (not just wp/v2)
add_filter('rest_pre_dispatch', function($result, $server, $request) {
	$route = $request->get_route();
	error_log('CACHE.PHP - REST request: ' . $route . ' | Method: ' . $request->get_method());
	return $result;
}, 10, 3);

/**
 * REST API save handler for Gutenberg (most reliable)
 */
function dream_clear_post_cache_rest($post, $request, $creating) {
	$post_id = $post->ID;
	error_log('✅ REST SAVE DETECTED - Post ID: ' . $post_id . ' | Type: ' . $post->post_type . ' | Creating: ' . ($creating ? 'YES' : 'NO'));
	dream_clear_post_cache($post_id);
}

// Hook into REST API saves (Gutenberg block editor)
add_action('rest_after_insert_post', 'dream_clear_post_cache_rest', 10, 3);
add_action('rest_after_insert_page', 'dream_clear_post_cache_rest', 10, 3);
add_action('rest_after_insert_wp_block', 'dream_clear_post_cache_rest', 10, 3);

// NUCLEAR OPTION: Clear cache on EVERY admin-ajax request that has a post_id
// This catches Gutenberg/ACF saves that don't trigger normal hooks
add_action('admin_init', function() {
	// Only on AJAX requests
	if (defined('DOING_AJAX') && DOING_AJAX && !empty($_POST['post_id'])) {
		$post_id = intval($_POST['post_id']);

		// Only clear cache once per request
		static $cleared_posts = [];
		if (!in_array($post_id, $cleared_posts)) {
			error_log('AJAX REQUEST DETECTED - Clearing cache for post: ' . $post_id);
			dream_clear_post_cache($post_id);
			$cleared_posts[] = $post_id;
		}
	}
}, 999);

// Also hook into traditional saves (Classic Editor, Quick Edit, programmatic)
add_action('save_post', 'dream_clear_post_cache', 99, 1);
add_action('post_updated', 'dream_clear_post_cache', 99, 1);
add_action('acf/save_post', 'dream_clear_post_cache', 99, 1);

error_log('CACHE.PHP - All hooks registered (including AJAX catch-all)');

// Clear post-specific block cache when post is trashed
add_action('wp_trash_post', function($post_id) {
	// Clear hybrid cache (both wp_cache and transient)
	dream_cache_delete('post_blocks_' . $post_id, 'dream_blocks');
	dream_cache_delete('post_blocks_time_' . $post_id, 'dream_blocks');

	// Clear block template cache for this specific post (legacy transients)
	global $wpdb;
	$wpdb->query($wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_dream_block_' . $post_id . '_%',
		'_transient_timeout_dream_block_' . $post_id . '_%'
	));

	if (get_post_type($post_id) === 'wp_block') {
		dream_cache_delete('pattern_blocks_' . $post_id, 'dream_blocks');
	}
});

// Clear post-specific block cache when post is deleted
add_action('delete_post', function($post_id) {
	// Clear hybrid cache (both wp_cache and transient)
	dream_cache_delete('post_blocks_' . $post_id, 'dream_blocks');
	dream_cache_delete('post_blocks_time_' . $post_id, 'dream_blocks');

	// Clear block template cache for this specific post (legacy transients)
	global $wpdb;
	$wpdb->query($wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_dream_block_' . $post_id . '_%',
		'_transient_timeout_dream_block_' . $post_id . '_%'
	));

	if (get_post_type($post_id) === 'wp_block') {
		dream_cache_delete('pattern_blocks_' . $post_id, 'dream_blocks');
	}
});

// Clear all post block caches when menus are updated (blocks can be in menus)
add_action('wp_update_nav_menu', function() {
	global $wpdb;

	// Clear hybrid cache transients (database)
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_blocks_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_blocks_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_blocks_post_blocks_time_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_blocks_post_blocks_time_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_blocks_pattern_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_blocks_pattern_blocks_%'");

	// Clear wp_cache for dream_blocks group (Memcached on WP Engine)
	wp_cache_flush_group('dream_blocks');

	// Also clear legacy block template cache since menu changes affect rendered output
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_block_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_block_%'");
});

// Clear all post block caches when widgets are updated (blocks can be in widgets)
add_action('update_option_sidebars_widgets', function() {
	global $wpdb;

	// Clear hybrid cache transients (database)
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_blocks_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_blocks_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_blocks_post_blocks_time_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_blocks_post_blocks_time_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_blocks_pattern_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_blocks_pattern_blocks_%'");

	// Clear wp_cache for dream_blocks group (Memcached on WP Engine)
	wp_cache_flush_group('dream_blocks');

	// Also clear legacy block template cache since widget changes affect rendered output
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_block_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_block_%'");
});

// Clear parent block metadata cache when theme is switched
add_action('switch_theme', function() {
	// Clear hybrid cache (both wp_cache and transient)
	dream_cache_delete('blocks_metadata', 'dream_blocks');
});

