<?php
/**
 * Pattern Loader
 *
 * Dynamically loads pattern CSS/JS based on page content and manifest
 * Separate from Bootstrap loader - handles pattern-specific assets only
 */

class Dream_Pattern_Loader {
	private $manifest = null;
	private $enqueued_patterns = [];

	public function __construct() {
		add_action('wp_head', [$this, 'preload_patterns'], 1); // Very early for preload
		add_action('wp_enqueue_scripts', [$this, 'enqueue_patterns'], 10); // After Bootstrap
		add_action('save_post', [$this, 'clear_post_cache']);
		add_action('update_option_sidebars_widgets', [$this, 'clear_all_post_caches']);
		add_action('update_option_widget_block', [$this, 'clear_all_post_caches']);
	}

	/**
	 * Load manifest from JSON file with mtime-based caching
	 * Caching disabled if WP_DEBUG is true
	 */
	private function load_manifest() {
		$manifest_path = get_template_directory() . '/dist/wp/pattern-manifest.json';

		if (!file_exists($manifest_path)) {
			return null;
		}

		// Disable caching if WP_DEBUG is enabled
		if (defined('WP_DEBUG') && WP_DEBUG) {
			$this->manifest = json_decode(file_get_contents($manifest_path), true);
			return $this->manifest;
		}

		// Use file modification time as cache key
		$mtime = filemtime($manifest_path);
		$cache_key = "pattern_manifest_{$mtime}";

		$cached = get_transient($cache_key);

		if (false === $cached) {
			$this->manifest = json_decode(file_get_contents($manifest_path), true);
			set_transient($cache_key, $this->manifest, WEEK_IN_SECONDS);

			// Clean up old manifest caches (different mtime)
			global $wpdb;
			$wpdb->query($wpdb->prepare(
				"DELETE FROM {$wpdb->options}
				 WHERE option_name LIKE %s
				 AND option_name != %s
				 AND option_name != %s",
				'_transient_pattern_manifest_%',
				'_transient_' . $cache_key,
				'_transient_timeout_' . $cache_key
			));
		} else {
			$this->manifest = $cached;
		}

		return $this->manifest;
	}

	/**
	 * Preload critical patterns (first 3) to speed up page render
	 * Outputs <link rel="preload"> tags in <head>
	 */
	public function preload_patterns() {
		if (!$this->load_manifest()) {
			return;
		}

		// Only preload on singular pages, archives, and home
		if (!is_singular() && !is_archive() && !is_home()) {
			return;
		}

		// Get template patterns (header/footer patterns loaded via Twig includes)
		$template_patterns = $this->get_template_patterns();

		// Get content patterns (ACF blocks in post content)
		$content_patterns = $this->detect_required_patterns();

		// Merge template patterns first (they're above the fold), then content patterns
		$all_patterns = array_unique(array_merge($template_patterns, $content_patterns));

		// Only preload first 3 patterns (most critical above-the-fold)
		// Limited to 3 to avoid preload overhead on first visit
		$patterns_to_preload = array_slice($all_patterns, 0, 3);

		foreach ($patterns_to_preload as $pattern_path) {
			if (!isset($this->manifest['patterns'][$pattern_path])) {
				continue;
			}

			$pattern_info = $this->manifest['patterns'][$pattern_path];
			$pattern_name = $pattern_info['name'] ?? basename($pattern_path);
			$level = $pattern_info['level'] ?? '';
			$level_name = preg_replace('/^0\d-/', '', $level);

			// Preload CSS if pattern has it
			if (!empty($pattern_info['css'])) {
				$css_file = get_template_directory() . "/dist/wp/css/patterns/{$level_name}/{$pattern_name}.css";
				if (file_exists($css_file)) {
					$css_url = get_template_directory_uri() . "/dist/wp/css/patterns/{$level_name}/{$pattern_name}.css";
					echo "<link rel='preload' href='{$css_url}' as='style'>\n";
				}
			}

			// Preload JS if pattern has it
			if (!empty($pattern_info['js'])) {
				$js_file = get_template_directory() . "/dist/wp/js/patterns/{$level_name}/{$pattern_name}.bundle.js";
				if (file_exists($js_file)) {
					$js_url = get_template_directory_uri() . "/dist/wp/js/patterns/{$level_name}/{$pattern_name}.bundle.js";
					echo "<link rel='preload' href='{$js_url}' as='script'>\n";
				}
			}
		}
	}

	/**
	 * Enqueue patterns based on page content
	 */
	public function enqueue_patterns() {
		if (!$this->load_manifest()) {
			// No manifest - patterns are in main bundle (dream.css/dream.js)
			return;
		}

		$version = $this->manifest['version'] ?? wp_get_theme()->get('Version');

		// 1. Detect and enqueue patterns from template usage
		$template_patterns = $this->get_template_patterns();
		foreach ($template_patterns as $pattern_path) {
			$this->enqueue_pattern_with_dependencies($pattern_path, $version);
		}

		// 2. Detect and enqueue patterns based on page content
		if (is_singular() || is_archive() || is_home()) {
			$patterns = $this->detect_required_patterns();

			// DEBUG: Log detected patterns
			if (defined('WP_DEBUG') && WP_DEBUG) {
				error_log('Pattern Loader - Detected patterns: ' . print_r($patterns, true));
			}

			foreach ($patterns as $pattern_path) {
				$this->enqueue_pattern_with_dependencies($pattern_path, $version);
			}
		}
	}

	/**
	 * Detect which patterns are needed for current page
	 * Caching disabled if WP_DEBUG is true
	 */
	private function detect_required_patterns() {
		$post_id = get_queried_object_id();

		if (!$post_id) {
			return [];
		}

		$cache_key = "pattern_dependencies_{$post_id}";

		// Check cache (skip if WP_DEBUG is enabled)
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			$cached = get_transient($cache_key);
			if (false !== $cached) {
				return $cached;
			}
		}

		$patterns = [];

		// Get post content
		$post = get_post($post_id);
		if (!$post) {
			return [];
		}

		$content = $post->post_content ?? '';

		// Parse blocks from content
		$blocks = parse_blocks($content);
		$patterns = $this->get_patterns_from_blocks($blocks);

		// Pre-load patterns for AJAX-loaded content
		$patterns = array_merge($patterns, $this->get_ajax_preload_patterns($blocks));

		// Scan active widget areas for blocks
		$patterns = array_merge($patterns, $this->get_patterns_from_widgets());

		// Deduplicate
		$patterns = array_unique($patterns);

		// Cache for 1 day (only if not debugging)
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			set_transient($cache_key, $patterns, DAY_IN_SECONDS);
		}

		return $patterns;
	}

	/**
	 * Get patterns from template usage
	 */
	private function get_template_patterns() {
		if (!isset($this->manifest['templates'])) {
			return [];
		}

		$patterns = [];
		$templates_to_check = [];

		// Get current template hierarchy
		$template = get_page_template_slug();

		if (!empty($template)) {
			// Custom page template
			$templates_to_check[] = $template;
		} else {
			// Build template hierarchy based on WordPress template hierarchy
			if (is_page()) {
				$post_id = get_the_ID();
				$templates_to_check[] = "pages/page-{$post_id}.twig";
				$templates_to_check[] = "pages/page.twig";
			} elseif (is_singular()) {
				$post_type = get_post_type();
				$post_id = get_the_ID();
				$templates_to_check[] = "pages/single-{$post_type}-{$post_id}.twig";
				$templates_to_check[] = "pages/single-{$post_type}.twig";
				$templates_to_check[] = "pages/single.twig";
			} elseif (is_archive()) {
				$templates_to_check[] = "pages/archive.twig";
			} elseif (is_home()) {
				$templates_to_check[] = "pages/index.twig";
			}
		}

		// Debug logging
		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('Pattern Loader - Checking templates: ' . print_r($templates_to_check, true));
		}

		// Check each template in hierarchy
		foreach ($templates_to_check as $template_path) {
			if (isset($this->manifest['templates'][$template_path])) {
				$template_patterns = $this->manifest['templates'][$template_path];

				if (defined('WP_DEBUG') && WP_DEBUG) {
					error_log('Pattern Loader - Found template: ' . $template_path);
					error_log('Pattern Loader - Patterns: ' . print_r($template_patterns, true));
				}

				$patterns = array_merge($patterns, $template_patterns);
			}
		}

		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('Pattern Loader - Template patterns: ' . print_r($patterns, true));
		}

		return array_unique($patterns);
	}

	/**
	 * Recursively get patterns from blocks
	 */
	private function get_patterns_from_blocks($blocks, &$found = []) {
		foreach ($blocks as $block) {
			if (empty($block['blockName'])) {
				continue;
			}

			// Check manifest for this block
			if (isset($this->manifest['blocks'][$block['blockName']])) {
				$found = array_merge($found, $this->manifest['blocks'][$block['blockName']]);
			}

			// Recursively check inner blocks
			if (!empty($block['innerBlocks'])) {
				$this->get_patterns_from_blocks($block['innerBlocks'], $found);
			}
		}

		return array_unique($found);
	}

	/**
	 * Get patterns that might be loaded via AJAX
	 *
	 * NOTE: This method handles dynamic pattern loading by reading block attributes.
	 * If you add new blocks that dynamically load patterns in the future, you may need
	 * to add detection logic here. Look for blocks that:
	 * - Store pattern selection in ACF fields
	 * - Use {% include %} with variables
	 * - Load content via AJAX
	 */
	private function get_ajax_preload_patterns($blocks) {
		$preload = [];

		foreach ($blocks as $block) {
			// Posts-loop with load-more might AJAX-load cards/modals
			if ($block['blockName'] === 'acf/posts-loop') {
				// Check what pattern the posts-loop uses
				$pattern = $block['attrs']['data']['pattern'] ?? 'card';

				// Pre-load this pattern (get_pattern_path will find the full path)
				$pattern_path = $this->get_pattern_path($pattern);
				if ($pattern_path) {
					$preload[] = $pattern_path;
				}
			}

			// Pattern block - dynamically includes any atom/molecule/organism
			if ($block['blockName'] === 'acf/pattern') {
				// Pattern selection stored in separate fields based on group
				$group = $block['attrs']['data']['group'] ?? null;
				$pattern = null;

				// Determine which pattern is selected based on group
				if ($group === 'atoms') {
					$pattern = $block['attrs']['data']['atoms'] ?? null;
				} elseif ($group === 'molecules') {
					$pattern = $block['attrs']['data']['molecules'] ?? null;
				} elseif ($group === 'organisms') {
					$pattern = $block['attrs']['data']['organisms'] ?? null;
				}

				// Pre-load the selected pattern
				if ($pattern) {
					$pattern_path = $this->get_pattern_path($pattern);
					if ($pattern_path) {
						$preload[] = $pattern_path;
					}
				}
			}

			// Recursively check inner blocks
			if (!empty($block['innerBlocks'])) {
				$preload = array_merge($preload, $this->get_ajax_preload_patterns($block['innerBlocks']));
			}
		}

		return $preload;
	}

	/**
	 * Get patterns from active widget areas
	 */
	private function get_patterns_from_widgets() {
		global $wp_registered_sidebars;
		$patterns = [];

		if (empty($wp_registered_sidebars)) {
			return [];
		}

		// Loop through all registered sidebars
		foreach ($wp_registered_sidebars as $sidebar_id => $sidebar) {
			// Check if sidebar is active and has widgets
			if (!is_active_sidebar($sidebar_id)) {
				continue;
			}

			// Get widgets for this sidebar
			$widgets = wp_get_sidebars_widgets();
			if (empty($widgets[$sidebar_id])) {
				continue;
			}

			// Get widget options
			foreach ($widgets[$sidebar_id] as $widget_id) {
				// Check if it's a block widget
				if (strpos($widget_id, 'block-') === 0) {
					// Get block widget content
					$widget_options = get_option('widget_block');
					$widget_number = str_replace('block-', '', $widget_id);

					if (isset($widget_options[$widget_number]['content'])) {
						$content = $widget_options[$widget_number]['content'];
						$blocks = parse_blocks($content);
						$widget_patterns = $this->get_patterns_from_blocks($blocks);
						$patterns = array_merge($patterns, $widget_patterns);
					}
				}
			}
		}

		return array_unique($patterns);
	}

	/**
	 * Convert pattern name to pattern path by searching manifest
	 * No hardcoded paths - 100% dynamic from manifest
	 */
	private function get_pattern_path($pattern) {
		// Search manifest for pattern match (any level)
		if (isset($this->manifest['patterns'])) {
			foreach ($this->manifest['patterns'] as $pattern_path => $pattern_info) {
				// Match pattern name at end of path: "02-molecules/card" ends with "card"
				if (str_ends_with($pattern_path, '/' . $pattern)) {
					return $pattern_path;
				}
			}
		}

		// If not found in manifest, return null (pattern won't be loaded)
		return null;
	}

	/**
	 * Enqueue a pattern with all its dependencies
	 */
	private function enqueue_pattern_with_dependencies($pattern_path, $version) {
		// Get pattern info from manifest
		if (!isset($this->manifest['patterns'][$pattern_path])) {
			return;
		}

		$pattern_info = $this->manifest['patterns'][$pattern_path];

		// Enqueue all dependencies first (if they exist)
		if (!empty($pattern_info['dependencies'])) {
			foreach ($pattern_info['dependencies'] as $dependency_path) {
				$this->enqueue_pattern($dependency_path, $version);
			}
		}

		// Then enqueue the pattern itself
		$this->enqueue_pattern($pattern_path, $version);
	}

	/**
	 * Enqueue a single pattern's CSS/JS
	 */
	public function enqueue_pattern($pattern_path, $version = null) {
		// Prevent duplicate enqueues
		if (in_array($pattern_path, $this->enqueued_patterns)) {
			return;
		}

		// Get pattern info from manifest
		if (!isset($this->manifest['patterns'][$pattern_path])) {
			return;
		}

		$pattern_info = $this->manifest['patterns'][$pattern_path];

		if (!$version) {
			$version = $this->manifest['version'] ?? wp_get_theme()->get('Version');
		}

		// Extract pattern name and level from path (e.g., "02-molecules/card" -> "molecules/card")
		$pattern_name = $pattern_info['name'] ?? basename($pattern_path);
		$level = $pattern_info['level'] ?? ''; // e.g., "01-atoms", "02-molecules"

		// Convert level to simple name: "01-atoms" -> "atoms"
		$level_name = preg_replace('/^0\d-/', '', $level);

		// Enqueue CSS if pattern has it
		if (!empty($pattern_info['css'])) {
			$css_handle = "pattern-{$level_name}-{$pattern_name}";
			$css_file = get_template_directory() . "/dist/wp/css/patterns/{$level_name}/{$pattern_name}.css";

			if (file_exists($css_file)) {
				wp_enqueue_style($css_handle,
					get_template_directory_uri() . "/dist/wp/css/patterns/{$level_name}/{$pattern_name}.css",
					['styles'], // Depend on main dream.css (which includes protons)
					$version
				);
			}
		}

		// Enqueue JS if pattern has it
		if (!empty($pattern_info['js'])) {
			$js_handle = "pattern-{$level_name}-{$pattern_name}-js";
			$js_file = get_template_directory() . "/dist/wp/js/patterns/{$level_name}/{$pattern_name}.bundle.js";

			if (file_exists($js_file)) {
				wp_enqueue_script($js_handle,
					get_template_directory_uri() . "/dist/wp/js/patterns/{$level_name}/{$pattern_name}.bundle.js",
					['jquery', 'script'], // Depend on jQuery and main dream.js
					$version,
					true  // Load in footer
				);
			}
		}

		$this->enqueued_patterns[] = $pattern_path;
	}

	/**
	 * Clear post-specific cache on save
	 */
	public function clear_post_cache($post_id) {
		delete_transient("pattern_dependencies_{$post_id}");
	}

	/**
	 * Clear all post caches (when widgets change)
	 */
	public function clear_all_post_caches() {
		global $wpdb;
		$wpdb->query(
			"DELETE FROM {$wpdb->options}
			WHERE option_name LIKE '_transient_pattern_dependencies_%'
			OR option_name LIKE '_transient_timeout_pattern_dependencies_%'"
		);
	}
}

// Initialize loader
new Dream_Pattern_Loader();

/**
 * Manual function to enqueue a pattern from template
 *
 * Usage in Twig: {{ function('enqueue_pattern', 'card') }}
 * Usage in PHP: enqueue_pattern('button');
 *
 * The pattern name can be just the name (e.g., 'card') or the full path (e.g., '02-molecules/card')
 * Dependencies will be automatically loaded.
 */
function enqueue_pattern($pattern) {
	static $loader = null;

	if (!$loader) {
		global $wp_filter;
		// Get the loader instance from the action hook
		if (isset($wp_filter['wp_enqueue_scripts']) && isset($wp_filter['wp_enqueue_scripts']->callbacks[10])) {
			foreach ($wp_filter['wp_enqueue_scripts']->callbacks[10] as $callback) {
				if (is_array($callback['function']) &&
					$callback['function'][0] instanceof Dream_Pattern_Loader) {
					$loader = $callback['function'][0];
					break;
				}
			}
		}
	}

	if ($loader) {
		$reflection = new ReflectionClass($loader);

		// Get pattern path if only name provided
		if (strpos($pattern, '/') === false) {
			$get_pattern_path_method = $reflection->getMethod('get_pattern_path');
			$get_pattern_path_method->setAccessible(true);
			$pattern_path = $get_pattern_path_method->invoke($loader, $pattern);
		} else {
			$pattern_path = $pattern;
		}

		if ($pattern_path) {
			// Enqueue with dependencies
			$method = $reflection->getMethod('enqueue_pattern_with_dependencies');
			$method->setAccessible(true);
			$method->invoke($loader, $pattern_path, wp_get_theme()->get('Version'));
		}
	}
}
