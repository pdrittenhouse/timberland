<?php

/**
 * Shared Helper Functions
 *
 * Utility functions used across multiple files
 */

/**
 * ========================================
 * Block Helper Functions
 * ========================================
 */

/**
 * Filter block directory entries
 * Used by: blocks.php, scripts.php, styles.php
 */
function filter_block_dir($file) {
	return !str_starts_with($file, '.') && !str_ends_with($file, '.twig');
}

/**
 * Block Detection Caching Helpers
 * Used by: scripts.php, styles.php
 */

/**
 * Get cached block metadata for PARENT theme only
 * Child theme has its own dream_get_child_blocks_metadata() function
 * Returns array of ['block-slug' => 'acf/block-name', ...]
 */
function dream_get_blocks_metadata() {
	$blocks_metadata = get_transient('dream_blocks_metadata');

	// Temporary debug logging
	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('dream_get_blocks_metadata - Called, cache hit: ' . ($blocks_metadata !== false ? 'YES' : 'NO'));
	}

	if (false === $blocks_metadata) {
		$blocks_metadata = [];

		// Scan parent theme blocks ONLY
		$blocks_path = dirname(__DIR__) . '/templates/blocks';

		// Temporary debug logging
		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('dream_get_blocks_metadata - Scanning PARENT theme blocks from: ' . $blocks_path);
		}

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

		// Temporary debug logging
		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('dream_get_blocks_metadata - Found ' . count($blocks_metadata) . ' parent theme blocks');
			error_log('dream_get_blocks_metadata - Blocks: ' . print_r($blocks_metadata, true));
		}

		// Cache for 1 week
		set_transient('dream_blocks_metadata', $blocks_metadata, WEEK_IN_SECONDS);
	}

	return $blocks_metadata;
}

/**
 * Recursively extract all block names from parsed block tree
 */
function dream_extract_block_names_recursive($blocks, &$block_names = []) {
	foreach ($blocks as $block) {
		if (!empty($block['blockName'])) {
			$block_names[] = $block['blockName'];
		}

		// Recursively process inner blocks
		if (!empty($block['innerBlocks'])) {
			dream_extract_block_names_recursive($block['innerBlocks'], $block_names);
		}
	}

	return $block_names;
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

			// Parse blocks using WordPress parse_blocks() for reliable detection
			$parsed_blocks = parse_blocks($pattern_content);
			$block_names_in_content = dream_extract_block_names_recursive($parsed_blocks);

			// Match against our block metadata
			foreach ($blocks_metadata as $block_slug => $block_name) {
				if (in_array($block_name, $block_names_in_content)) {
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

	// Temporary debug logging
	if (defined('WP_DEBUG') && WP_DEBUG) {
		error_log('dream_get_post_used_blocks - Post ID: ' . $post_id);
		error_log('dream_get_post_used_blocks - Cache hit: ' . ($used_blocks !== false ? 'YES' : 'NO'));
		if ($used_blocks !== false) {
			error_log('dream_get_post_used_blocks - Cached blocks: ' . print_r($used_blocks, true));
		}
	}

	if (false === $used_blocks) {
		$used_blocks = [];
		$post = get_post($post_id);

		// Temporary debug logging
		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('dream_get_post_used_blocks - Cache MISS, rescanning post');
			error_log('dream_get_post_used_blocks - Post object: ' . ($post ? 'Found' : 'NULL'));
		}

		if ($post) {
			$post_content = $post->post_content;

			// Temporary debug logging
			if (defined('WP_DEBUG') && WP_DEBUG) {
				error_log('dream_get_post_used_blocks - Post content length: ' . strlen($post_content));
				error_log('dream_get_post_used_blocks - Post content first 500 chars: ' . substr($post_content, 0, 500));
				error_log('dream_get_post_used_blocks - Blocks metadata count: ' . count($blocks_metadata));
				error_log('dream_get_post_used_blocks - Blocks metadata: ' . print_r($blocks_metadata, true));
			}

			// Parse blocks using WordPress parse_blocks() for reliable detection
			$parsed_blocks = parse_blocks($post_content);
			$block_names_in_content = dream_extract_block_names_recursive($parsed_blocks);

			// Temporary debug logging
			if (defined('WP_DEBUG') && WP_DEBUG) {
				error_log('dream_get_post_used_blocks - Parsed block names: ' . print_r($block_names_in_content, true));
			}

			// Match against our block metadata
			foreach ($blocks_metadata as $block_slug => $block_name) {
				$found = in_array($block_name, $block_names_in_content);

				// Temporary debug logging
				if (defined('WP_DEBUG') && WP_DEBUG) {
					error_log('dream_get_post_used_blocks - Checking block: ' . $block_slug . ' (' . $block_name . ') - Result: ' . ($found ? 'FOUND' : 'NOT FOUND'));
				}

				if ($found) {
					$used_blocks[] = $block_slug;
				}
			}

			// Check for referenced patterns and get their blocks
			if (preg_match_all('/<!-- wp:block {"ref":(\d+)} \/-->/', $post_content, $matches)) {
				// Temporary debug logging
				if (defined('WP_DEBUG') && WP_DEBUG) {
					error_log('dream_get_post_used_blocks - Found pattern references: ' . print_r($matches[1], true));
				}

				foreach ($matches[1] as $pattern_id) {
					$pattern_blocks = dream_get_pattern_used_blocks($pattern_id, $blocks_metadata);
					$used_blocks = array_merge($used_blocks, $pattern_blocks);
				}
			}

			// Remove duplicates
			$used_blocks = array_unique($used_blocks);
		}

		// Temporary debug logging
		if (defined('WP_DEBUG') && WP_DEBUG) {
			error_log('dream_get_post_used_blocks - Detected blocks: ' . print_r($used_blocks, true));
			error_log('dream_get_post_used_blocks - Setting cache key: ' . $cache_key);
		}

		// Cache for 1 day
		set_transient($cache_key, $used_blocks, DAY_IN_SECONDS);
	}

	return $used_blocks;
}

/**
 * ========================================
 * Other Helper Functions
 * ========================================
 */

// Add additional non-block helper functions below as needed
