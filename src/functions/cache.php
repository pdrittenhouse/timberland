<?php

/**
 * Cache Management
 *
 * Centralized cache management for:
 * - Timber/Twig template cache
 * - Block detection cache
 * - Template styles cache
 * - WordPress object cache
 */

/**
 * ========================================
 * Full Page Cache Functions
 * ========================================
 */

/**
 * Get cached page HTML
 *
 * Checks if:
 * 1. Full page cache is enabled
 * 2. User is not logged in (or cache variations exist)
 * 3. Cached page exists and is not expired
 * 4. Post hasn't been modified since cache was created
 *
 * @param int $post_id Post ID (for singular pages)
 * @param string $cache_key Unique cache key for the page
 * @return string|false Cached HTML or false if not found/expired
 */
function dream_get_page_cache($cache_key, $post_id = null) {
	// Check if full page cache is enabled
	if (!defined('ENABLE_FULL_PAGE_CACHE') || !ENABLE_FULL_PAGE_CACHE) {
		return false;
	}

	// Don't cache for logged-in users (unless specific variation exists)
	if (is_user_logged_in() && !defined('CACHE_LOGGED_IN_USERS')) {
		return false;
	}

	// Get cached data
	$cached_data = dream_cache_get($cache_key, 'dream_page_cache');

	if (!$cached_data) {
		return false;
	}

	// Validate cache structure
	if (!is_array($cached_data) || !isset($cached_data['html']) || !isset($cached_data['created_at'])) {
		return false;
	}

	// Check if cache has expired based on time
	$expiration = defined('PAGE_CACHE_EXPIRATION') ? PAGE_CACHE_EXPIRATION : 3600;
	$cache_age = time() - $cached_data['created_at'];
	if ($cache_age > $expiration) {
		// Cache expired, delete it
		dream_cache_delete($cache_key, 'dream_page_cache');
		return false;
	}

	// For singular posts/pages, check if post has been modified since cache was created
	if ($post_id && isset($cached_data['post_modified']) && $cached_data['post_modified']) {
		$post = get_post($post_id);
		if ($post) {
			$post_modified_time = strtotime($post->post_modified);
			if ($post_modified_time > $cached_data['post_modified']) {
				// Post was modified, cache is stale
				dream_cache_delete($cache_key, 'dream_page_cache');
				return false;
			}
		}
	}

	// Cache is valid
	return $cached_data['html'];
}

/**
 * Set page cache
 *
 * @param string $cache_key Unique cache key for the page
 * @param string $html HTML content to cache
 * @param int $post_id Post ID (for singular pages)
 * @return bool True on success
 */
function dream_set_page_cache($cache_key, $html, $post_id = null) {
	// Check if full page cache is enabled
	if (!defined('ENABLE_FULL_PAGE_CACHE') || !ENABLE_FULL_PAGE_CACHE) {
		return false;
	}

	// Get post modified time if this is a singular page
	$post_modified_time = null;
	if ($post_id) {
		$post = get_post($post_id);
		if ($post) {
			$post_modified_time = strtotime($post->post_modified);
		}
	}

	// Store HTML with metadata
	$cache_data = array(
		'html' => $html,
		'created_at' => time(),
		'post_modified' => $post_modified_time,
		'user_role' => is_user_logged_in() ? wp_get_current_user()->roles[0] : 'guest',
	);

	$expiration = defined('PAGE_CACHE_EXPIRATION') ? PAGE_CACHE_EXPIRATION : 3600;

	return dream_cache_set($cache_key, $cache_data, 'dream_page_cache', $expiration);
}

/**
 * Generate cache key for current request
 *
 * @param string $prefix Cache key prefix (e.g., 'page', 'archive', 'search')
 * @return string Cache key
 */
function dream_generate_cache_key($prefix = 'page') {
	$key_parts = array($prefix);

	// Add post ID for singular pages
	if (is_singular()) {
		$key_parts[] = get_the_ID();
	}

	// Add query vars for archives, search, etc.
	if (is_archive() || is_search() || is_home()) {
		global $wp_query;

		if (is_category() || is_tag() || is_tax()) {
			$key_parts[] = get_queried_object_id();
		}

		if (is_author()) {
			$key_parts[] = 'author_' . get_query_var('author');
		}

		if (is_search()) {
			$key_parts[] = 's_' . md5(get_search_query());
		}

		// Add pagination
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		if ($paged > 1) {
			$key_parts[] = 'page_' . $paged;
		}
	}

	// Add user role for logged-in users (if caching them)
	if (is_user_logged_in() && defined('CACHE_LOGGED_IN_USERS')) {
		$user = wp_get_current_user();
		$key_parts[] = 'role_' . $user->roles[0];
	}

	// Add locale for multilingual sites
	if (function_exists('get_locale')) {
		$key_parts[] = get_locale();
	}

	return implode('_', $key_parts);
}

/**
 * Clear page cache for a specific post
 *
 * @param int $post_id Post ID
 */
function dream_clear_page_cache_for_post($post_id) {
	// Clear the specific post page cache
	$cache_key = 'page_' . $post_id;

	// Clear for all locales and user roles
	$locales = defined('CACHE_LOCALES') ? CACHE_LOCALES : array(get_locale());
	$roles = array('guest', 'subscriber', 'contributor', 'author', 'editor', 'administrator');

	foreach ($locales as $locale) {
		// Guest cache
		dream_cache_delete($cache_key . '_' . $locale, 'dream_page_cache');

		// Logged-in user caches (if enabled)
		if (defined('CACHE_LOGGED_IN_USERS')) {
			foreach ($roles as $role) {
				dream_cache_delete($cache_key . '_role_' . $role . '_' . $locale, 'dream_page_cache');
			}
		}
	}
}

/**
 * Clear all page caches
 */
function dream_clear_all_page_caches() {
	global $wpdb;

	// Clear all page cache transients
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_page_cache_%' OR option_name LIKE '_transient_timeout_dream_page_cache_%'");

	// Clear wp_cache for dream_page_cache group
	wp_cache_flush_group('dream_page_cache');

	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('FULL PAGE CACHE - All page caches cleared');
	}
}

/**
 * ========================================
 * Generic Cache Functions (Hybrid: wp_cache + transient)
 * ========================================
 */

/**
 * Hybrid cache GET: Tries wp_cache first, falls back to transient
 *
 * @param string $key Cache key
 * @param string $group Cache group (for wp_cache)
 * @return mixed Cached value or false if not found
 */
function dream_cache_get($key, $group = 'dream') {
	// Try object cache first (Memcached on WP Engine, or in-memory locally)
	$value = wp_cache_get($key, $group);

	if (false !== $value) {
		return $value;
	}

	// Fallback to transient (database)
	$transient_key = $group . '_' . $key;
	return get_transient($transient_key);
}

/**
 * Hybrid cache SET: Sets both wp_cache and transient
 *
 * @param string $key Cache key
 * @param mixed $value Value to cache
 * @param string $group Cache group (for wp_cache)
 * @param int $expiration Expiration time in seconds
 * @return bool True on success
 */
function dream_cache_set($key, $value, $group = 'dream', $expiration = 0) {
	// Set in object cache (Memcached on WP Engine, or in-memory locally)
	wp_cache_set($key, $value, $group, $expiration);

	// Also set transient as fallback (database)
	$transient_key = $group . '_' . $key;
	return set_transient($transient_key, $value, $expiration);
}

/**
 * Hybrid cache DELETE: Removes from both wp_cache and transient
 *
 * @param string $key Cache key
 * @param string $group Cache group (for wp_cache)
 * @return bool True on success
 */
function dream_cache_delete($key, $group = 'dream') {
	// Delete from object cache
	wp_cache_delete($key, $group);

	// Delete transient
	$transient_key = $group . '_' . $key;
	return delete_transient($transient_key);
}

/**
 * ========================================
 * Cache Clearing Functions
 * ========================================
 */

/**
 * Clear all caches (Full Page, Timber, Block Detection, Template Styles, Object Cache)
 */
function dream_clear_timber_cache() {
	global $wpdb;

	// Clear full page cache
	dream_clear_all_page_caches();

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

	// Clear hybrid cache transients (new caching system - parent theme)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_blocks_metadata%' OR option_name LIKE '_transient_timeout_dream_blocks_blocks_metadata%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_post_blocks_%' OR option_name LIKE '_transient_timeout_dream_blocks_post_blocks_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_post_blocks_time_%' OR option_name LIKE '_transient_timeout_dream_blocks_post_blocks_time_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_blocks_pattern_blocks_%' OR option_name LIKE '_transient_timeout_dream_blocks_pattern_blocks_%'");

	// Clear wp_cache for dream_blocks group (Memcached on WP Engine)
	wp_cache_flush_group('dream_blocks');

	// Clear hybrid cache transients (new caching system - child theme)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_child_blocks_child_blocks_metadata%' OR option_name LIKE '_transient_timeout_dream_child_blocks_child_blocks_metadata%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_child_blocks_child_post_blocks_%' OR option_name LIKE '_transient_timeout_dream_child_blocks_child_post_blocks_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_child_blocks_child_post_blocks_time_%' OR option_name LIKE '_transient_timeout_dream_child_blocks_child_post_blocks_time_%'");
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_child_blocks_child_pattern_blocks_%' OR option_name LIKE '_transient_timeout_dream_child_blocks_child_pattern_blocks_%'");

	// Clear wp_cache for dream_child_blocks group (Memcached on WP Engine)
	wp_cache_flush_group('dream_child_blocks');

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

	// Clear Template styles cache (per-post caching of page styles)
	$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_dream_templates_page_styles_%' OR option_name LIKE '_transient_timeout_dream_templates_page_styles_%'");

	// Clear wp_cache for dream_templates group (Memcached on WP Engine)
	wp_cache_flush_group('dream_templates');

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

	// Clear the full page cache for this post
	dream_clear_page_cache_for_post($post_id);

	// Clear the post blocks cache (hybrid: both wp_cache and transient)
	dream_cache_delete('post_blocks_' . $post_id, 'dream_blocks');
	dream_cache_delete('post_blocks_time_' . $post_id, 'dream_blocks');

	// Clear the post template styles cache (hybrid: both wp_cache and transient)
	dream_cache_delete('page_styles_' . $post_id, 'dream_templates');
	dream_cache_delete('page_styles_time_' . $post_id, 'dream_templates');

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

