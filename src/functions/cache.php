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

// Clear post-specific block cache when post is saved
add_action('save_post', function($post_id) {
	delete_transient('dream_post_blocks_' . $post_id);

	// If this is a pattern (wp_block post type), clear pattern cache
	if (get_post_type($post_id) === 'wp_block') {
		delete_transient('dream_pattern_blocks_' . $post_id);
	}
});

// Clear post-specific block cache when post is trashed
add_action('wp_trash_post', function($post_id) {
	delete_transient('dream_post_blocks_' . $post_id);

	if (get_post_type($post_id) === 'wp_block') {
		delete_transient('dream_pattern_blocks_' . $post_id);
	}
});

// Clear post-specific block cache when post is deleted
add_action('delete_post', function($post_id) {
	delete_transient('dream_post_blocks_' . $post_id);

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
});

// Clear all post block caches when widgets are updated (blocks can be in widgets)
add_action('update_option_sidebars_widgets', function() {
	global $wpdb;
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_post_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_dream_pattern_blocks_%'");
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_dream_pattern_blocks_%'");
});

// Clear parent block metadata cache when theme is switched
add_action('switch_theme', function() {
	delete_transient('dream_blocks_metadata');
});
