<?php
/**
 * Bootstrap Component Loader
 *
 * Dynamically loads Bootstrap components based on page content and manifest
 */

class Dream_Bootstrap_Loader {
	private $manifest = null;
	private $enqueued_components = [];

	public function __construct() {
		add_action('wp_head', [$this, 'preload_bootstrap'], 1); // Very early for preload
		add_action('wp_enqueue_scripts', [$this, 'enqueue_bootstrap'], 5); // Early priority
		add_action('save_post', [$this, 'clear_post_cache']);
		add_action('update_option_sidebars_widgets', [$this, 'clear_all_post_caches']);
		add_action('update_option_widget_block', [$this, 'clear_all_post_caches']);
	}

	/**
	 * Load manifest from JSON file with mtime-based caching
	 * Caching disabled if WP_DEBUG is true
	 */
	private function load_manifest() {
		$manifest_path = get_template_directory() . '/dist/wp/bootstrap-manifest.json';

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
		$cache_key = "bootstrap_manifest_{$mtime}";

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
				'_transient_bootstrap_manifest_%',
				'_transient_' . $cache_key,
				'_transient_timeout_' . $cache_key
			));
		} else {
			$this->manifest = $cached;
		}

		return $this->manifest;
	}

	/**
	 * Preload critical Bootstrap components to speed up page render
	 * Outputs <link rel="preload"> tags in <head>
	 */
	public function preload_bootstrap() {
		if (!$this->load_manifest()) {
			return;
		}

		// Only preload on singular pages, archives, and home
		if (!is_singular() && !is_archive() && !is_home()) {
			return;
		}

		$version = $this->manifest['version'] ?? wp_get_theme()->get('Version');

		// Always preload critical Bootstrap CSS
		$critical_file = get_template_directory() . '/dist/wp/css/bootstrap/critical.css';
		if (file_exists($critical_file)) {
			$critical_url = get_template_directory_uri() . '/dist/wp/css/bootstrap/critical.css';
			echo "<link rel='preload' href='{$critical_url}' as='style'>\n";
		}

		// Get template components (header/footer components)
		$template_components = $this->get_template_components();

		// Get content components (from post content blocks)
		$content_components = $this->detect_required_components();

		// Merge template components first (they're above the fold), then content components
		$all_components = array_unique(array_merge($template_components, $content_components));

		// Preload first 3 components (most critical above-the-fold)
		// Limited to 3 to avoid preload overhead on first visit
		$components_to_preload = array_slice($all_components, 0, 3);

		foreach ($components_to_preload as $component) {
			$css_file = get_template_directory() . "/dist/wp/css/bootstrap/{$component}.css";
			if (file_exists($css_file)) {
				$css_url = get_template_directory_uri() . "/dist/wp/css/bootstrap/{$component}.css";
				echo "<link rel='preload' href='{$css_url}' as='style'>\n";
			}
		}
	}

	/**
	 * Enqueue Bootstrap critical and components
	 */
	public function enqueue_bootstrap() {
		if (!$this->load_manifest()) {
			// Fallback: Load everything if manifest doesn't exist
			wp_enqueue_style('bootstrap-all',
				get_template_directory_uri() . '/dist/wp/css/dream.css',
				[],
				wp_get_theme()->get('Version')
			);
			return;
		}

		$version = $this->manifest['version'] ?? wp_get_theme()->get('Version');

		// 1. Always enqueue critical Bootstrap
		wp_enqueue_style('bootstrap-critical',
			get_template_directory_uri() . '/dist/wp/css/bootstrap/critical.css',
			[],
			$version
		);
		$this->enqueued_components[] = 'critical';

		// 2. Detect and enqueue components from template usage
		$template_components = $this->get_template_components();
		foreach ($template_components as $component) {
			$this->enqueue_component($component, $version);
		}

		// 3. Detect and enqueue components based on page content
		if (is_singular() || is_archive() || is_home()) {
			$components = $this->detect_required_components();

			// DEBUG: Log detected components
			if (defined('WP_DEBUG') && WP_DEBUG) {
				error_log('Bootstrap Loader - Detected components: ' . print_r($components, true));
			}

			foreach ($components as $component) {
				$this->enqueue_component($component, $version);
			}
		}
	}

	/**
	 * Detect which Bootstrap components are needed for current page
	 * Caching disabled if WP_DEBUG is true
	 */
	private function detect_required_components() {
		$post_id = get_queried_object_id();

		if (!$post_id) {
			return [];
		}

		$cache_key = "bootstrap_components_{$post_id}";

		// Check cache (skip if WP_DEBUG is enabled)
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			$cached = get_transient($cache_key);
			if (false !== $cached) {
				return $cached;
			}
		}

		$components = [];

		// Get post content
		$post = get_post($post_id);
		if (!$post) {
			return [];
		}

		$content = $post->post_content ?? '';

		// Parse blocks from content
		$blocks = parse_blocks($content);
		$components = $this->get_components_from_blocks($blocks);

		// Pre-load components for AJAX-loaded content
		$components = array_merge($components, $this->get_ajax_preload_components($blocks));

		// Scan active widget areas for blocks
		$components = array_merge($components, $this->get_components_from_widgets());

		// Deduplicate
		$components = array_unique($components);

		// Cache for 1 day (only if not debugging)
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			set_transient($cache_key, $components, DAY_IN_SECONDS);
		}

		return $components;
	}

	/**
	 * Get Bootstrap components from template usage
	 */
	private function get_template_components() {
		if (!isset($this->manifest['templates'])) {
			return [];
		}

		$components = [];
		$templates_to_check = [];

		// Get current template hierarchy
		$template = get_page_template_slug();

		if (!empty($template)) {
			// Custom page template
			$templates_to_check[] = $template;
		} else {
			// Build template hierarchy based on WordPress template hierarchy
			// Check more specific conditions first
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
			error_log('Bootstrap Loader - Checking templates: ' . print_r($templates_to_check, true));
		}

		// Check each template in hierarchy
		foreach ($templates_to_check as $template_path) {
			if (isset($this->manifest['templates'][$template_path])) {
				$patterns = $this->manifest['templates'][$template_path];

				if (defined('WP_DEBUG') && WP_DEBUG) {
					error_log('Bootstrap Loader - Found template: ' . $template_path);
					error_log('Bootstrap Loader - Patterns: ' . print_r($patterns, true));
				}

				foreach ($patterns as $pattern) {
					if (isset($this->manifest['patterns'][$pattern])) {
						$components = array_merge($components, $this->manifest['patterns'][$pattern]);
					}
				}
			}
		}

		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('Bootstrap Loader - Template components: ' . print_r($components, true));
		}

		return array_unique($components);
	}

	/**
	 * Recursively get Bootstrap components from blocks
	 */
	private function get_components_from_blocks($blocks, &$found = []) {
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
				$this->get_components_from_blocks($block['innerBlocks'], $found);
			}
		}

		return array_unique($found);
	}

	/**
	 * Get Bootstrap components that might be loaded via AJAX
	 *
	 * NOTE: This method handles dynamic pattern loading by reading block attributes.
	 * If you add new blocks that dynamically load patterns in the future, you may need
	 * to add detection logic here. Look for blocks that:
	 * - Store pattern selection in ACF fields
	 * - Use {% include %} with variables
	 * - Load content via AJAX
	 */
	private function get_ajax_preload_components($blocks) {
		$preload = [];

		foreach ($blocks as $block) {
			// Posts-loop with load-more might AJAX-load cards/modals
			if ($block['blockName'] === 'acf/posts-loop') {
				// Check what pattern the posts-loop uses
				$pattern = $block['attrs']['data']['pattern'] ?? 'card';

				// Pre-load components for this pattern
				$patternPath = $this->get_pattern_path($pattern);
				if (isset($this->manifest['patterns'][$patternPath])) {
					$preload = array_merge($preload, $this->manifest['patterns'][$patternPath]);
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

				// Pre-load components for the selected pattern
				if ($pattern) {
					$patternPath = $this->get_pattern_path($pattern);
					if (isset($this->manifest['patterns'][$patternPath])) {
						$preload = array_merge($preload, $this->manifest['patterns'][$patternPath]);
					}
				}
			}

			// Recursively check inner blocks
			if (!empty($block['innerBlocks'])) {
				$preload = array_merge($preload, $this->get_ajax_preload_components($block['innerBlocks']));
			}
		}

		return $preload;
	}

	/**
	 * Get Bootstrap components from active widget areas
	 */
	private function get_components_from_widgets() {
		global $wp_registered_sidebars;
		$components = [];

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
						$widget_components = $this->get_components_from_blocks($blocks);
						$components = array_merge($components, $widget_components);
					}
				}
			}
		}

		return array_unique($components);
	}

	/**
	 * Convert pattern name to pattern path by searching manifest
	 * No hardcoded paths - 100% dynamic from manifest
	 */
	private function get_pattern_path($pattern) {
		// Search manifest for pattern match (any level)
		foreach ($this->manifest['patterns'] as $patternPath => $components) {
			// Match pattern name at end of path: "02-molecules/card" ends with "card"
			if (str_ends_with($patternPath, '/' . $pattern)) {
				return $patternPath;
			}
		}

		// If not found in manifest, return null (component won't be loaded)
		return null;
	}

	/**
	 * Enqueue a single Bootstrap component
	 */
	private function enqueue_component($component, $version) {
		// Prevent duplicate enqueues
		if (in_array($component, $this->enqueued_components)) {
			return;
		}

		// Enqueue CSS if exists
		$css_handle = "bootstrap-{$component}";
		$css_file = get_template_directory() . "/dist/wp/css/bootstrap/{$component}.css";

		if (file_exists($css_file)) {
			wp_enqueue_style($css_handle,
				get_template_directory_uri() . "/dist/wp/css/bootstrap/{$component}.css",
				['bootstrap-critical'], // Depend on critical
				$version
			);
		}

		// NOTE: Bootstrap JS is bundled into pattern JS files
		// No separate Bootstrap JS enqueuing needed - it loads with the patterns that use it

		$this->enqueued_components[] = $component;
	}

	/**
	 * Clear post-specific cache on save
	 */
	public function clear_post_cache($post_id) {
		delete_transient("bootstrap_components_{$post_id}");
	}

	/**
	 * Clear all post caches (when widgets change)
	 */
	public function clear_all_post_caches() {
		global $wpdb;
		$wpdb->query(
			"DELETE FROM {$wpdb->options}
			WHERE option_name LIKE '_transient_bootstrap_components_%'
			OR option_name LIKE '_transient_timeout_bootstrap_components_%'"
		);
	}
}

// Initialize loader
new Dream_Bootstrap_Loader();

/**
 * Manual function to enqueue Bootstrap component from template
 *
 * Usage in Twig: {{ function('enqueue_bootstrap_component', 'modal') }}
 * Usage in PHP: enqueue_bootstrap_component('accordion');
 *
 * For tooltip/popover support: enqueue_bootstrap_component('tooltip');
 * Note: Tooltips and popovers are scoped to button patterns by default,
 * but can be manually enqueued if needed on other elements.
 */
function enqueue_bootstrap_component($component) {
	static $loader = null;

	if (!$loader) {
		global $wp_filter;
		// Get the loader instance from the action hook
		if (isset($wp_filter['wp_enqueue_scripts']) && isset($wp_filter['wp_enqueue_scripts']->callbacks[5])) {
			foreach ($wp_filter['wp_enqueue_scripts']->callbacks[5] as $callback) {
				if (is_array($callback['function']) &&
					$callback['function'][0] instanceof Dream_Bootstrap_Loader) {
					$loader = $callback['function'][0];
					break;
				}
			}
		}
	}

	if ($loader) {
		$reflection = new ReflectionClass($loader);
		$method = $reflection->getMethod('enqueue_component');
		$method->setAccessible(true);
		$method->invoke($loader, $component, wp_get_theme()->get('Version'));
	}
}
