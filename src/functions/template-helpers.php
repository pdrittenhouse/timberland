<?php

/**
 * Template Helper Functions
 *
 * Pre-calculation and caching functions for expensive Twig template operations
 * Performance optimization: Move post.meta() calls from Twig to PHP with caching
 *
 * Handles all 32 unique post.meta() fields found across 22 template files
 * Eliminates 340+ post.meta() calls per page load through caching
 */

/**
 * ========================================
 * Page Background Color Functions
 * ========================================
 */

/**
 * Calculate page background color (custom color only)
 * Handles: post.meta('page_background_color')
 */
function calculate_page_bg_color($post, $options) {
	$bg_color_field = get_field('page_background_color', $post->ID);

	if (
		isset($bg_color_field['bg_color']) &&
		$bg_color_field['bg_color'] === 'custom' &&
		!empty($bg_color_field['bg_custom_color'])
	) {
		return 'background-color: ' . $bg_color_field['bg_custom_color'] . ';';
	}

	return '';
}

/**
 * Calculate page background color class (palette only)
 * Used in body classes
 */
function calculate_page_bg_color_class($post, $options) {
	$bg_color_field = get_field('page_background_color', $post->ID);

	if (
		isset($bg_color_field['bg_color']) &&
		$bg_color_field['bg_color'] === 'palette' &&
		!empty($bg_color_field['bg_theme_color'])
	) {
		return 'bg-' . $bg_color_field['bg_theme_color'];
	}

	return '';
}

/**
 * ========================================
 * Page Text Color Functions
 * ========================================
 */

/**
 * Calculate page text color (custom color only)
 * Handles: post.meta('page_text_color')
 */
function calculate_page_text_color($post, $options) {
	$text_color_field = get_field('page_text_color', $post->ID);

	if (
		isset($text_color_field['color']) &&
		$text_color_field['color'] === 'custom' &&
		!empty($text_color_field['custom_color'])
	) {
		return 'color: ' . $text_color_field['custom_color'] . ';';
	}

	return '';
}

/**
 * Calculate page text color class (palette only)
 * Used in body classes
 */
function calculate_page_text_color_class($post, $options) {
	$text_color_field = get_field('page_text_color', $post->ID);

	if (
		isset($text_color_field['color']) &&
		$text_color_field['color'] === 'palette' &&
		!empty($text_color_field['theme_color'])
	) {
		return 'text-' . $text_color_field['theme_color'];
	}

	return '';
}

/**
 * ========================================
 * Page Background Image Functions
 * ========================================
 */

/**
 * Calculate all page background image properties
 * Handles: post.meta('bg_image') - all properties
 * Returns array with image, size, position, repeat, attachment
 */
function calculate_page_bg_image($post, $options) {
	$post_bg = get_field('bg_image', $post->ID);
	$options_bg = $options['bg_image'] ?? null;

	// Determine if post has bg image
	$post_has_image = (
		isset($post_bg['bg_image_type']) &&
		(
			($post_bg['bg_image_type'] === 'file' && !empty($post_bg['bg_image']['url'])) ||
			($post_bg['bg_image_type'] === 'url' && !empty($post_bg['bg_image_url']))
		)
	);

	// Determine if options has bg image
	$options_has_image = (
		isset($options_bg['bg_image_type']) &&
		(
			($options_bg['bg_image_type'] === 'file' && !empty($options_bg['bg_image']['url'])) ||
			($options_bg['bg_image_type'] === 'url' && !empty($options_bg['bg_image_url']))
		)
	);

	// Use post bg if exists, otherwise options bg
	$bg = $post_has_image ? $post_bg : ($options_has_image ? $options_bg : null);

	if (!$bg) {
		return [
			'bg_image' => '',
			'bg_image_size' => '',
			'bg_position' => '',
			'bg_repeat' => '',
			'bg_attachment' => ''
		];
	}

	// Background image URL
	$bg_image = '';
	if ($bg['bg_image_type'] === 'file' && !empty($bg['bg_image']['url'])) {
		$bg_image = "background-image: url('" . $bg['bg_image']['url'] . "');";
	} elseif ($bg['bg_image_type'] === 'url' && !empty($bg['bg_image_url'])) {
		$bg_image = "background-image: url('" . $bg['bg_image_url'] . "');";
	}

	// Background size
	$bg_image_size = '';
	if (!empty($bg['bg_size'])) {
		if ($bg['bg_size'] === 'custom' && !empty($bg['custom_bg_size'])) {
			$bg_image_size = 'background-size: ' . $bg['custom_bg_size'] . ';';
		} else {
			$bg_image_size = 'background-size: ' . $bg['bg_size'] . ';';
		}
	}

	// Background position
	$bg_hor_pos = '';
	if (!empty($bg['bg_horizontal_position'])) {
		$bg_hor_pos = $bg['bg_horizontal_position'] === 'custom'
			? ($bg['custom_bg_horizontal_position'] ?? '')
			: $bg['bg_horizontal_position'];
	}

	$bg_ver_pos = '';
	if (!empty($bg['bg_vertical_position'])) {
		$bg_ver_pos = $bg['bg_vertical_position'] === 'custom'
			? ($bg['custom_bg_vertical_position'] ?? '')
			: $bg['bg_vertical_position'];
	}

	$bg_position = '';
	if ($bg_hor_pos || $bg_ver_pos) {
		$bg_position = 'background-position: ' . $bg_hor_pos . ' ' . $bg_ver_pos . ';';
	}

	// Background repeat
	$bg_repeat = !empty($bg['bg_repeat']) ? 'background-repeat: ' . $bg['bg_repeat'] . ';' : '';

	// Background attachment
	$bg_attachment = !empty($bg['bg_attachment']) ? 'background-attachment: ' . $bg['bg_attachment'] . ';' : '';

	return [
		'bg_image' => $bg_image,
		'bg_image_size' => $bg_image_size,
		'bg_position' => $bg_position,
		'bg_repeat' => $bg_repeat,
		'bg_attachment' => $bg_attachment
	];
}

/**
 * ========================================
 * Content Padding Functions
 * ========================================
 */

/**
 * Calculate content padding (all 4 sides)
 * Handles: post.meta('content_padding')
 * Returns array with top, bottom, left, right
 */
function calculate_content_padding($post, $options) {
	$post_padding = get_field('content_padding', $post->ID);
	$options_padding = $options['content_padding'] ?? null;

	$result = [
		'padding_top' => '',
		'padding_bottom' => '',
		'padding_left' => '',
		'padding_right' => ''
	];

	$sides = ['top', 'bottom', 'left', 'right'];

	foreach ($sides as $side) {
		$post_value = $post_padding['padding'][$side] ?? null;
		$options_value = $options_padding['padding'][$side] ?? null;

		// Post value takes precedence (>= 0 allows for 0 padding)
		if (isset($post_value) && $post_value >= 0) {
			$result['padding_' . $side] = 'padding-' . $side . ': ' . $post_value . 'px;';
		} elseif (isset($options_value) && $options_value >= 0) {
			$result['padding_' . $side] = 'padding-' . $side . ': ' . $options_value . 'px;';
		}
	}

	return $result;
}

/**
 * ========================================
 * Sidebar Background Color Functions
 * ========================================
 */

/**
 * Calculate sidebar background color (custom color)
 * Handles: post.meta('sidebar_bg_color')
 */
function calculate_sidebar_bg_color($post, $options) {
	$post_bg = get_field('sidebar_bg_color', $post->ID);
	$options_bg = $options['sidebar_bg_color'] ?? null;

	// Post custom color
	if (
		isset($post_bg['bg_color']) &&
		$post_bg['bg_color'] === 'custom' &&
		!empty($post_bg['bg_custom_color'])
	) {
		return 'background-color: ' . $post_bg['bg_custom_color'] . ';';
	}

	// Fallback to options custom color if post is empty/null
	if (
		(
			(isset($post_bg['bg_color']) && $post_bg['bg_color'] === 'custom' && empty($post_bg['bg_custom_color'])) ||
			(isset($post_bg['bg_color']) && $post_bg['bg_color'] === 'palette' && empty($post_bg['bg_theme_color']))
		) &&
		isset($options_bg['bg_color']) &&
		$options_bg['bg_color'] === 'custom' &&
		!empty($options_bg['bg_custom_color'])
	) {
		return 'background-color: ' . $options_bg['bg_custom_color'] . ';';
	}

	return '';
}

/**
 * Calculate sidebar background color class (palette)
 */
function calculate_sidebar_bg_color_class($post, $options) {
	$post_bg = get_field('sidebar_bg_color', $post->ID);
	$options_bg = $options['sidebar_bg_color'] ?? null;

	// Post palette color
	if (
		isset($post_bg['bg_color']) &&
		$post_bg['bg_color'] === 'palette' &&
		!empty($post_bg['bg_theme_color'])
	) {
		return 'bg-' . $post_bg['bg_theme_color'];
	}

	// Fallback to options palette color
	if (
		(
			(isset($post_bg['bg_color']) && $post_bg['bg_color'] === 'custom' && empty($post_bg['bg_custom_color'])) ||
			(isset($post_bg['bg_color']) && $post_bg['bg_color'] === 'palette' && empty($post_bg['bg_theme_color']))
		) &&
		isset($options_bg['bg_color']) &&
		$options_bg['bg_color'] === 'palette' &&
		!empty($options_bg['bg_theme_color'])
	) {
		return 'bg-' . $options_bg['bg_theme_color'];
	}

	return '';
}

/**
 * ========================================
 * Sidebar Text Color Functions
 * ========================================
 */

/**
 * Calculate sidebar text color (custom color)
 * Handles: post.meta('sidebar_text_color')
 */
function calculate_sidebar_text_color($post, $options) {
	$post_text = get_field('sidebar_text_color', $post->ID);
	$options_text = $options['sidebar_text_color'] ?? null;

	// Post custom color
	if (
		isset($post_text['color']) &&
		$post_text['color'] === 'custom' &&
		!empty($post_text['custom_color'])
	) {
		return 'color: ' . $post_text['custom_color'] . ';';
	}

	// Fallback to options custom color
	if (
		(
			(isset($post_text['color']) && $post_text['color'] === 'custom' && empty($post_text['custom_color'])) ||
			(isset($post_text['color']) && $post_text['color'] === 'palette' && empty($post_text['theme_color']))
		) &&
		isset($options_text['color']) &&
		$options_text['color'] === 'custom' &&
		!empty($options_text['custom_color'])
	) {
		return 'color: ' . $options_text['custom_color'] . ';';
	}

	return '';
}

/**
 * Calculate sidebar text color class (palette)
 */
function calculate_sidebar_text_color_class($post, $options) {
	$post_text = get_field('sidebar_text_color', $post->ID);
	$options_text = $options['sidebar_text_color'] ?? null;

	// Post palette color
	if (
		isset($post_text['color']) &&
		$post_text['color'] === 'palette' &&
		!empty($post_text['theme_color'])
	) {
		return 'text-' . $post_text['theme_color'];
	}

	// Fallback to options palette color
	if (
		(
			(isset($post_text['color']) && $post_text['color'] === 'custom' && empty($post_text['custom_color'])) ||
			(isset($post_text['color']) && $post_text['color'] === 'palette' && empty($post_text['theme_color']))
		) &&
		isset($options_text['color']) &&
		$options_text['color'] === 'palette' &&
		!empty($options_text['theme_color'])
	) {
		return 'text-' . $options_text['theme_color'];
	}

	return '';
}

/**
 * ========================================
 * Sidebar Padding Functions
 * ========================================
 */

/**
 * Calculate sidebar padding (all 4 sides)
 * Handles: post.meta('sidebar_padding')
 */
function calculate_sidebar_padding($post, $options) {
	$post_padding = get_field('sidebar_padding', $post->ID);
	$options_padding = $options['sidebar_padding'] ?? null;

	$result = [
		'padding_top' => '',
		'padding_bottom' => '',
		'padding_left' => '',
		'padding_right' => ''
	];

	$sides = ['top', 'bottom', 'left', 'right'];

	foreach ($sides as $side) {
		$post_value = $post_padding['padding'][$side] ?? null;
		$options_value = $options_padding['padding'][$side] ?? null;

		// Post value takes precedence
		if (isset($post_value) && $post_value >= 0) {
			$result['padding_' . $side] = 'padding-' . $side . ': ' . $post_value . 'px;';
		} elseif (isset($options_value) && $options_value >= 0) {
			$result['padding_' . $side] = 'padding-' . $side . ': ' . $options_value . 'px;';
		}
	}

	return $result;
}

/**
 * ========================================
 * Sidebar Width Function
 * ========================================
 */

/**
 * Calculate sidebar width
 * Handles: post.meta('sidebar_width')
 */
function calculate_sidebar_width($post, $options) {
	$post_width = get_field('sidebar_width', $post->ID);
	$options_width = $options['sidebar_width'] ?? null;

	// Post width
	if (
		isset($post_width['width']['value']) &&
		$post_width['width']['value'] >= 0 &&
		isset($post_width['width']['unit'])
	) {
		return $post_width['width']['value'] . $post_width['width']['unit'];
	}

	// Options width
	if (
		isset($options_width['width']['value']) &&
		$options_width['width']['value'] >= 0 &&
		isset($options_width['width']['unit'])
	) {
		return $options_width['width']['value'] . $options_width['width']['unit'];
	}

	return '';
}

/**
 * ========================================
 * Sidebar Background Image Functions
 * ========================================
 */

/**
 * Calculate all sidebar background image properties
 * Handles: post.meta('sidebar_bg_image')
 */
function calculate_sidebar_bg_image($post, $options) {
	$post_bg = get_field('sidebar_bg_image', $post->ID);
	$options_bg = $options['sidebar_bg_image'] ?? null;

	// Determine if post has bg image
	$post_has_image = (
		isset($post_bg['bg_image_type']) &&
		(
			($post_bg['bg_image_type'] === 'file' && !empty($post_bg['bg_image']['url'])) ||
			($post_bg['bg_image_type'] === 'url' && !empty($post_bg['bg_image_url']))
		)
	);

	// Determine if options has bg image
	$options_has_image = (
		isset($options_bg['bg_image_type']) &&
		(
			($options_bg['bg_image_type'] === 'file' && !empty($options_bg['bg_image']['url'])) ||
			($options_bg['bg_image_type'] === 'url' && !empty($options_bg['bg_image_url']))
		)
	);

	// Use post bg if exists, otherwise options bg
	$bg = $post_has_image ? $post_bg : ($options_has_image ? $options_bg : null);

	if (!$bg) {
		return [
			'bg_image' => '',
			'bg_image_size' => '',
			'bg_position' => '',
			'bg_repeat' => '',
			'bg_attachment' => ''
		];
	}

	// Background image URL
	$bg_image = '';
	if ($bg['bg_image_type'] === 'file' && !empty($bg['bg_image']['url'])) {
		$bg_image = "background-image: url('" . $bg['bg_image']['url'] . "');";
	} elseif ($bg['bg_image_type'] === 'url' && !empty($bg['bg_image_url'])) {
		$bg_image = "background-image: url('" . $bg['bg_image_url'] . "');";
	}

	// Background size
	$bg_image_size = '';
	if (!empty($bg['bg_size'])) {
		if ($bg['bg_size'] === 'custom' && !empty($bg['custom_bg_size'])) {
			$bg_image_size = 'background-size: ' . $bg['custom_bg_size'] . ';';
		} else {
			$bg_image_size = 'background-size: ' . $bg['bg_size'] . ';';
		}
	}

	// Background position
	$bg_hor_pos = '';
	if (!empty($bg['bg_horizontal_position'])) {
		$bg_hor_pos = $bg['bg_horizontal_position'] === 'custom'
			? ($bg['custom_bg_horizontal_position'] ?? '')
			: $bg['bg_horizontal_position'];
	}

	$bg_ver_pos = '';
	if (!empty($bg['bg_vertical_position'])) {
		$bg_ver_pos = $bg['bg_vertical_position'] === 'custom'
			? ($bg['custom_bg_vertical_position'] ?? '')
			: $bg['bg_vertical_position'];
	}

	$bg_position = '';
	if ($bg_hor_pos || $bg_ver_pos) {
		$bg_position = 'background-position: ' . $bg_hor_pos . ' ' . $bg_ver_pos . ';';
	}

	// Background repeat
	$bg_repeat = !empty($bg['bg_repeat']) ? 'background-repeat: ' . $bg['bg_repeat'] . ';' : '';

	// Background attachment
	$bg_attachment = !empty($bg['bg_attachment']) ? 'background-attachment: ' . $bg['bg_attachment'] . ';' : '';

	return [
		'bg_image' => $bg_image,
		'bg_image_size' => $bg_image_size,
		'bg_position' => $bg_position,
		'bg_repeat' => $bg_repeat,
		'bg_attachment' => $bg_attachment
	];
}

/**
 * ========================================
 * Body Classes Helper Functions
 * ========================================
 */

/**
 * Calculate body class additions
 * Handles multiple post.meta() fields used in body classes
 */
function calculate_body_class_additions($post, $options, $body_class = '') {
	$classes = [];

	// Base body class
	if ($body_class) {
		$classes[] = $body_class;
	}

	// Post slug
	$classes[] = $post->post_name;

	// Background color class (palette)
	$bg_class = calculate_page_bg_color_class($post, $options);
	if ($bg_class) {
		$classes[] = $bg_class;
	}

	// Text color class (palette)
	$text_class = calculate_page_text_color_class($post, $options);
	if ($text_class) {
		$classes[] = $text_class;
	}

	// Container classes
	if (
		($options['remove_content_containers'] ?? null) != true &&
		get_field('remove_content_container', $post->ID) != true
	) {
		$classes[] = 'include-content-containers';
	}

	if (
		($options['remove_header_containers'] ?? null) != true &&
		get_field('remove_header_container', $post->ID) != true
	) {
		$classes[] = 'include-header-containers';
	}

	if (
		($options['remove_footer_containers'] ?? null) != true &&
		get_field('remove_footer_container', $post->ID) != true
	) {
		$classes[] = 'include-footer-containers';
	}

	if (
		($options['fluid_content_containers'] ?? null) != true &&
		get_field('fluid_content_container', $post->ID) != true
	) {
		$classes[] = 'max-width-content-container';
	}

	if (
		($options['fluid_footer_containers'] ?? null) != true &&
		get_field('fluid_footer_container', $post->ID) != true
	) {
		$classes[] = 'max-width-footer-container';
	}

	if (($options['max_width_fluid_containers'] ?? null) == true) {
		$classes[] = 'max-width-fluid-containers';
	}

	// Header position
	$header_position = get_field('header_position', $post->ID);
	if ($header_position) {
		$classes[] = $header_position . '-header-enabled';
	} elseif (!empty($options['header_position'])) {
		$classes[] = $options['header_position'] . '-header-enabled';
	}

	// Shrink header
	if (($options['shrink_header'] ?? null) == true) {
		$classes[] = 'shrink-header-enabled';
	}

	// Custom body classes from options
	if (!empty($options['body_classes'])) {
		$classes[] = $options['body_classes'];
	}

	// Custom page classes from post
	$page_classes = get_field('page_classes', $post->ID);
	if ($page_classes) {
		$classes[] = $page_classes;
	}

	// Gravity Forms layout
	if (($options['disable_gf_layout'] ?? null) == true) {
		$classes[] = 'no-gf-layout';
	}

	// Filter empty values
	return array_filter($classes);
}

/**
 * ========================================
 * Main Classes Helper Functions
 * ========================================
 */

/**
 * Calculate main element classes
 * Handles: sidebar_class, post.meta('hide_sidebar'), post.meta('left_sidebar')
 */
function calculate_main_class_additions($sidebar_class, $post, $options) {
	$classes = ['content-wrapper'];

	$hide_sidebar = get_field('hide_sidebar', $post->ID);
	$hide_sidebars = $options['hide_sidebars'] ?? null;
	$left_sidebar_post = get_field('left_sidebar', $post->ID);
	$left_sidebar_options = $options['left_sidebar'] ?? null;

	// Add sidebar class if sidebar is active
	if ($sidebar_class && $hide_sidebar != true && $hide_sidebars != true) {
		$classes[] = $sidebar_class;
	}

	// Add sidebar-left class
	if ($sidebar_class && ($left_sidebar_options == true || $left_sidebar_post == true)) {
		$classes[] = 'sidebar-left';
	}

	return array_filter($classes);
}

/**
 * ========================================
 * Sidebar Classes Helper Functions
 * ========================================
 */

/**
 * Calculate sidebar element classes
 * Handles: post.meta('page_sidebar'), sidebar color classes
 */
function calculate_sidebar_class_additions($post, $options) {
	$classes = ['sidebar'];

	// Sidebar selection
	$page_sidebar = get_field('page_sidebar', $post->ID);
	$default_sidebar = $options['default_sidebar'] ?? '';

	if (!empty($page_sidebar)) {
		$classes[] = 'sidebar-' . $page_sidebar;
	} else {
		$classes[] = 'sidebar-' . $default_sidebar;
	}

	// Sidebar background color class (palette)
	$bg_class = calculate_sidebar_bg_color_class($post, $options);
	if ($bg_class) {
		$classes[] = $bg_class;
	}

	// Sidebar text color class (palette)
	$text_class = calculate_sidebar_text_color_class($post, $options);
	if ($text_class) {
		$classes[] = $text_class;
	}

	return array_filter($classes);
}

/**
 * ========================================
 * Additional Simple Meta Field Functions
 * ========================================
 */

/**
 * Get simple boolean/string meta fields
 * These are used in various templates for conditional logic
 */
function get_simple_meta_fields($post) {
	return [
		// Boolean fields
		'hide_sidebar' => get_field('hide_sidebar', $post->ID),
		'hide_page_header' => get_field('hide_page_header', $post->ID),
		'hide_page_title' => get_field('hide_page_title', $post->ID),
		'hide_featured_image' => get_field('hide_featured_image', $post->ID),
		'hide_traveling_cta' => get_field('hide_traveling_cta', $post->ID),
		'left_sidebar' => get_field('left_sidebar', $post->ID),
		'remove_content_container' => get_field('remove_content_container', $post->ID),
		'remove_header_container' => get_field('remove_header_container', $post->ID),
		'remove_footer_container' => get_field('remove_footer_container', $post->ID),
		'remove_page_header_container' => get_field('remove_page_header_container', $post->ID),
		'fluid_content_container' => get_field('fluid_content_container', $post->ID),
		'fluid_footer_container' => get_field('fluid_footer_container', $post->ID),

		// String/complex fields
		'page_sidebar' => get_field('page_sidebar', $post->ID),
		'header_position' => get_field('header_position', $post->ID),
		'side_header_position' => get_field('side_header_position', $post->ID),

		// Layout fields
		'site_header_layout' => get_field('site_header_layout', $post->ID),
		'site_footer_layout' => get_field('site_footer_layout', $post->ID),

		// Page header styling
		'page_header_bg_color' => get_field('page_header_bg_color', $post->ID),
		'page_header_bg_image' => get_field('page_header_bg_image', $post->ID),
		'page_header_text_color' => get_field('page_header_text_color', $post->ID),
		'page_header_font_size' => get_field('page_header_font_size', $post->ID),
		'page_header_padding' => get_field('page_header_padding', $post->ID),
		'page_header_margin' => get_field('page_header_margin', $post->ID),
	];
}

/**
 * ========================================
 * Master Calculation & Caching Function
 * ========================================
 */

/**
 * Calculate and cache all page styles and meta fields
 * This is the main function called from template PHP files
 *
 * @param int $post_id Post ID
 * @return array All calculated styles and meta fields
 */
function dream_calculate_page_styles($post_id) {
	$post = new Timber\Post($post_id);
	$options = get_fields('option');

	// Use hybrid cache (wp_cache + transient fallback)
	$cache_key = 'page_styles_' . $post_id;
	$cache_time_key = 'page_styles_time_' . $post_id;

	$cached = dream_cache_get($cache_key, 'dream_templates');
	$cache_time = dream_cache_get($cache_time_key, 'dream_templates');

	$post_modified_time = strtotime($post->post_modified);
	$cache_is_stale = ($cache_time && $post_modified_time >= $cache_time);

	if (false !== $cached && !$cache_is_stale) {
		return $cached;
	}

	// Calculate all styles
	$page_bg_image = calculate_page_bg_image($post, $options);
	$sidebar_bg_image = calculate_sidebar_bg_image($post, $options);
	$content_padding = calculate_content_padding($post, $options);
	$sidebar_padding = calculate_sidebar_padding($post, $options);
	$simple_meta = get_simple_meta_fields($post);

	$styles = [
		// Page background colors
		'page_bg_color' => calculate_page_bg_color($post, $options),
		'page_bg_color_class' => calculate_page_bg_color_class($post, $options),
		'page_text_color' => calculate_page_text_color($post, $options),
		'page_text_color_class' => calculate_page_text_color_class($post, $options),

		// Page background image (all properties)
		'page_bg_image' => $page_bg_image['bg_image'],
		'page_bg_image_size' => $page_bg_image['bg_image_size'],
		'page_bg_position' => $page_bg_image['bg_position'],
		'page_bg_repeat' => $page_bg_image['bg_repeat'],
		'page_bg_attachment' => $page_bg_image['bg_attachment'],

		// Content padding (all 4 sides)
		'content_padding_top' => $content_padding['padding_top'],
		'content_padding_bottom' => $content_padding['padding_bottom'],
		'content_padding_left' => $content_padding['padding_left'],
		'content_padding_right' => $content_padding['padding_right'],

		// Sidebar colors
		'sidebar_bg_color' => calculate_sidebar_bg_color($post, $options),
		'sidebar_bg_color_class' => calculate_sidebar_bg_color_class($post, $options),
		'sidebar_text_color' => calculate_sidebar_text_color($post, $options),
		'sidebar_text_color_class' => calculate_sidebar_text_color_class($post, $options),

		// Sidebar padding (all 4 sides)
		'sidebar_padding_top' => $sidebar_padding['padding_top'],
		'sidebar_padding_bottom' => $sidebar_padding['padding_bottom'],
		'sidebar_padding_left' => $sidebar_padding['padding_left'],
		'sidebar_padding_right' => $sidebar_padding['padding_right'],

		// Sidebar width
		'sidebar_width' => calculate_sidebar_width($post, $options),

		// Sidebar background image (all properties)
		'sidebar_bg_image' => $sidebar_bg_image['bg_image'],
		'sidebar_bg_image_size' => $sidebar_bg_image['bg_image_size'],
		'sidebar_bg_position' => $sidebar_bg_image['bg_position'],
		'sidebar_bg_repeat' => $sidebar_bg_image['bg_repeat'],
		'sidebar_bg_attachment' => $sidebar_bg_image['bg_attachment'],

		// Simple meta fields (boolean/string values)
		'meta' => $simple_meta,
	];

	// Cache for 1 day (hybrid: wp_cache + transient)
	dream_cache_set($cache_key, $styles, 'dream_templates', DAY_IN_SECONDS);
	dream_cache_set($cache_time_key, $post_modified_time, 'dream_templates', DAY_IN_SECONDS);

	return $styles;
}

