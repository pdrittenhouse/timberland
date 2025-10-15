<?php

// NOTE: Blocks are restricted to parent in admin.js

/**
 * Block Category
 */
function dream_block_categories($categories)
{
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'timberland',
                'title' => __('Timberland', 'timberland'),
            ]
        ]
    );
}

if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
  add_action('block_categories_all', 'dream_block_categories', 10, 2);
} else {
  add_action('block_categories', 'dream_block_categories', 10, 2);
}

/**
 * Register Blocks
 */

/**
 *  ACF 6+ BLOCKS
 */
// Ragister blocks
add_action( 'init', 'dream_register_blocks', 5 );
function dream_register_blocks() {
  $blocks_path = dirname(__DIR__) . '/templates/blocks';
  $blocks = array_filter(scandir($blocks_path), 'filter_block_dir'); // Helper function from block-helpers.php
  foreach ($blocks as $block) {
    if ( file_exists( $blocks_path . '/' . $block . '/block.json' ) ) {
      register_block_type($blocks_path . '/' . $block);
    }
  }

  if (is_child_theme()) {
    $child_theme_blocks_path = dirname(__DIR__, 2) . '-child/src/templates/blocks';
    $child_theme_blocks = array_filter(scandir($child_theme_blocks_path), 'filter_block_dir'); // Helper function from block-helpers.php

    foreach ($child_theme_blocks as $block) {
      if ( file_exists( $child_theme_blocks_path . '/' . $block . '/block.json' ) ) {
        register_block_type($child_theme_blocks_path . '/' . $block);
      }
    }
  }
}

// Get parent block data in innerBlocks
// Hook to add parent block data to parsed block
add_filter( 'render_block_data', 'gets_the_block_parent_data', 999, 3 );
function gets_the_block_parent_data( $parsed_block, $source_block, $parent_block ) {
  if (!empty($parent_block->parsed_block[ 'attrs' ])) {
    $parsed_block[ 'parent_block_data' ] = $parent_block->parsed_block[ 'attrs' ];
  }
  return $parsed_block;
}

// Replace ACF field ID's with names in parent block data
function replace_acf_keys_with_names( $data ) {
  // Static cache to avoid repeated get_field_object() calls
  static $field_cache = [];

  $data_with_names = array();

  foreach( $data as $key => $val ) {
    if( is_array( $val ) ) {
      // Check cache first
      if (!isset($field_cache[$key])) {
        $field_cache[$key] = get_field_object( $key );
      }
      $field_obj = $field_cache[$key];

      if( $field_obj ) {
        $data_with_names[ $field_obj[ 'name' ] ] = replace_acf_keys_with_names( $val );
      }
    }
    else {
      if( strpos( $key, '_field' ) !== false ) {
        $field_full_key = $key;
        $field_keys_arr = explode( "_", $field_full_key );
        $child_field_key = $field_keys_arr[2]."_".$field_keys_arr[3];

        // Check cache first
        if (!isset($field_cache[$child_field_key])) {
          $field_cache[$child_field_key] = get_field_object( $child_field_key );
        }
        $field_obj = $field_cache[$child_field_key];

        if( $field_obj ) {
          $data_with_names[ $field_obj[ 'name' ] ] = $data[ $key ];
        }
      }
      else if( substr( $key, 0, 1 ) == "_" ) {
        $data_with_names = $data;
        break;
      }
      else if( substr( $key, 0, 5 ) == "field" ) {
        // Check cache first
        if (!isset($field_cache[$key])) {
          $field_cache[$key] = get_field_object( $key );
        }
        $field_obj = $field_cache[$key];

        if( $field_obj ) {
          $data_with_names[ $field_obj[ 'name' ] ] = $data[ $key ];
        }
      }
    }
  }

  return $data_with_names;

}

/**
 * Get base block context (cached statically to avoid rebuilding for every block)
 *
 * @return array Base context with menus and paths
 */
function get_block_context_base() {
	static $base_context = null;

	if ($base_context === null) {
		$base_context = array_merge(
			// Menus - shared config from StarterSite::get_theme_menus()
			StarterSite::get_theme_menus(),
			[
				// Paths - shared config from StarterSite::get_theme_paths()
				'paths' => StarterSite::get_theme_paths()
			]
		);
	}

	return $base_context;
}

/**
 * Build WP_Query arguments for posts loop block
 *
 * @param array $data Posts loop block field data
 * @return array WP_Query arguments
 */
function build_posts_loop_query($data) {
	// WP Query Args
	$queryArgs = array(
		'post_type' => $data['post_type'],
		'order'     => !empty($data['sort']) ? $data['sort']['order'] : '',
		'orderby' => !empty($data['sort']) ? $data['sort']['order_by'] : '',
	);

	// Ignore Sticky Posts
	if ($data['ignore_sticky_posts'] === true) {
		$queryArgs['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
	}

	// Set Pagination Paramerters
	if ( !is_archive() && !empty($data['pagination']) ) {
		$queryArgs['posts_per_page'] = $data['pagination']['posts_per_page'];
	} elseif ( !empty($data['pagination']) ) {
		$queryArgs['posts_per_archive_page'] = $data['pagination']['posts_per_page'];
	}
	if ( !empty($data['pagination']) && $data['pagination']['nopaging'] === true ) {
		$queryArgs['nopaging'] = $data['pagination']['nopaging'];
	}
	if ( !empty($data['pagination']) && !empty($data['pagination']['offset']) ) {
		$queryArgs['offset'] = intval($data['pagination']['offset']);
	}
	global $paged;
	if (!isset($paged) || !$paged) {
		$paged = 1;
	}
	if ( !empty($data['pagination']) && !empty($data['pagination']['page']) && !is_page() ) {
		$queryArgs['paged'] = $paged;
	} elseif ( !empty($data['pagination']) && !empty($data['pagination']['page']) && is_page() ) {
		$queryArgs['paged'] = $paged;
	}

	// If the selection type is "query", set query specific parameters
	if ( $data['selection_type'] == 'query' ) {}

	// If the selection type is "query", set parent parameters
	if ( $data['selection_type'] == 'query' && !empty($data['post_parent']['parent']) && $data['post_parent']['include_parent'] === 'inc' ) {
		$queryArgs['post_parent__in'] = $data['post_parent']['parent'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['post_parent']['parent']) && $data['post_parent']['include_parent'] === 'exc' ) {
		$queryArgs['post_parent__not_in'] = $data['post_parent']['parent'];
	}

	// If the selection type is "query", set date parameters
	if ( $data['selection_type'] == 'query' && !empty($data['date']['year']) ) {
		$queryArgs['year'] = intval($data['date']['year']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['monthnum']) ) {
		$queryArgs['monthnum'] = intval($data['date']['monthnum']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['w']) ) {
		$queryArgs['w'] = intval($data['date']['w']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['day']) ) {
		$queryArgs['day'] = intval($data['date']['day']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['hour']) ) {
		$queryArgs['hour'] = intval($data['date']['hour']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['minute']) ) {
		$queryArgs['minute'] = intval($data['date']['minute']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['second']) ) {
		$queryArgs['second'] = intval($data['date']['second']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['date']['m']) ) {
		$queryArgs['m'] = intval($data['date']['m']);
	}

	// date_query Array
	$dateQueryArr = array();

	// If the selection type is "query", format and set date_query parameters
	if ( $data['selection_type'] == 'query' && !empty($data['date']['date_query']['date_query'])) {
		foreach($data['date']['date_query']['date_query'] as & $date_query) {

			// date_query Args
			$dateQueryArgs = array();

			if (!empty($date_query['year'])) {
				$dateQueryArgs['year'] = intval($date_query['year']);
			}
			if (!empty($date_query['month'])) {
				$dateQueryArgs['month'] = intval($date_query['month']);
			}
			if (!empty($date_query['week'])) {
				$dateQueryArgs['week'] = intval($date_query['week']);
			}
			if (!empty($date_query['day'])) {
				$dateQueryArgs['day'] = intval($date_query['day']);
			}
			if (!empty($date_query['hour'])) {
				$dateQueryArgs['hour'] = intval($date_query['hour']);
			}
			if (!empty($date_query['minute'])) {
				$dateQueryArgs['minute'] = intval($date_query['minute']);
			}
			if (!empty($date_query['second'])) {
				$dateQueryArgs['second'] = intval($date_query['second']);
			}

			if ($date_query['after']['type'] === true) {
				$dateQueryArgs['after'] = $date_query['after']['after'];
			} else {
				// date_query['after'] Args
				$dateQueryAfterArgs = array();

				if (!empty($date_query['after']['year'])) {
					$dateQueryAfterArgs['year'] = intval($date_query['after']['year']);
				}

				if (!empty($date_query['after']['month'])) {
					$dateQueryAfterArgs['month'] = intval($date_query['after']['month']);
				}

				if (!empty($date_query['after']['day'])) {
					$dateQueryAfterArgs['day'] = intval($date_query['after']['day']);
				}

				if (!empty($date_query['after']['year']) || !empty($date_query['after']['month']) || !empty($date_query['after']['day'])) {
					array_push($dateQueryArgs, $dateQueryAfterArgs);
				}
			}

			if ($date_query['before']['type'] === true) {
				$dateQueryArgs['before'] = $date_query['before']['before'];
			} else {
				// date_query['before'] Args
				$dateQueryBeforeArgs = array();

				if (!empty($date_query['before']['year'])) {
					$dateQueryBeforeArgs['year'] = intval($date_query['before']['year']);
				}

				if (!empty($date_query['before']['month'])) {
					$dateQueryBeforeArgs['month'] = intval($date_query['before']['month']);
				}

				if (!empty($date_query['before']['day'])) {
					$dateQueryBeforeArgs['day'] = intval($date_query['before']['day']);
				}

				if (!empty($date_query['before']['year']) || !empty($date_query['before']['month']) || !empty($date_query['before']['day'])) {
					array_push($dateQueryArgs, $dateQueryBeforeArgs);
				}
			}

			array_push($dateQueryArr, $dateQueryArgs);
		}
		if (!empty($data['date']['date_query']['relation'])) {
			$dateQueryArr['relation'] = $data['date']['date_query']['relation'];
		}
		if (!empty($data['date']['date_query']['compare'])) {
			$dateQueryArr['compare'] = $data['date']['date_query']['compare'];
		}
		if (!empty($data['date']['date_query']['column'])) {
			$dateQueryArr['column'] = $data['date']['date_query']['column'];
		}
		$dateQueryArr['inclusive'] = $data['date']['date_query']['inclusive'];
		$queryArgs['date_query'] = $dateQueryArr;
	}

	// If the selection type is "query", set custom field parameters
	if ( $data['selection_type'] == 'query' && !empty($data['custom_fields']['meta_key']) ) {
		$queryArgs['meta_key'] = $data['custom_fields']['meta_key'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['custom_fields']['meta_value']) ) {
		$queryArgs['meta_value'] = $data['custom_fields']['meta_value'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['custom_fields']['meta_value_num']) ) {
		$queryArgs['meta_value_num'] = intval($data['custom_fields']['meta_value_num']);
	}
	if ( $data['selection_type'] == 'query' && !empty($data['custom_fields']['meta_compare']) && (!empty($data['custom_fields']['meta_key']) || !empty($data['custom_fields']['meta_value']) || !empty($data['custom_fields']['meta_value_num'])) ) {
		$queryArgs['meta_compare'] = $data['custom_fields']['meta_compare'];
	}

	// meta_query Array
	$metaQueryArr = array();

	// If the selection type is "query", format and set meta_query parameters
	if ( $data['selection_type'] == 'query' && !empty($data['custom_fields']['meta_query']['meta_query'])) {
		foreach($data['custom_fields']['meta_query']['meta_query'] as & $meta_query) {

			// meta_query Args
			$metaQueryArgs = array();

			if (!empty($meta_query['key'])) {
				$metaQueryArgs['key'] = $meta_query['key'];
			}
			if ( ($meta_query['compare'] === 'IN' || $meta_query['compare'] === 'NOT IN' || $meta_query['compare'] === 'BETWEEN' || $meta_query['compare'] === 'NOT BETWEEN') && !empty($meta_query['values']) ) {
				$values = array();
				foreach ($meta_query['values'] as $value) {
					array_push($values, $value['value']);
				}
				$metaQueryArgs['value'] = $values;
			} elseif (!empty($meta_query['value']) ) {
				$metaQueryArgs['value'] = $meta_query['value'];
			}
			if (!empty($meta_query['type'])) {
				$metaQueryArgs['type'] = $meta_query['type'];
			}
			if (!empty($meta_query['compare'])) {
				$metaQueryArgs['compare'] = $meta_query['compare'];
			}

			array_push($metaQueryArr, $metaQueryArgs);
		}
		if (!empty($data['custom_fields']['meta_query']['relation'])) {
			$metaQueryArr['relation'] = $data['custom_fields']['meta_query']['relation'];
		}
		$queryArgs['meta_query'] = $metaQueryArr;
	}

	// If the selection type is "query", set taxonomy parameters
	if ( $data['selection_type'] == 'query' && !empty($data['taxonomies']['taxonomies'])) {
		// Merge taxonomy terms into single array
		foreach ($data['taxonomies']['taxonomies'] as & $taxonomy) {
			if (is_array($taxonomy['terms'])) {
				$taxonomy['terms'] = array_column($taxonomy['terms'], 'term');
			}
		}
		// Prepend relation value to taxonomy array
		array_unshift($data['taxonomies']['taxonomies'], $data['taxonomies']['relation']);
		$queryArgs['tax_query'] = $data['taxonomies']['taxonomies'];
	}

	// If the selection type is "query", set category parameters
	if ( $data['selection_type'] == 'query' && !empty($data['categories']['category']) && $data['categories']['include_cats'] === 'inc' ) {
		$queryArgs['category__in'] = $data['categories']['category'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['categories']['category']) && $data['categories']['include_cats'] === 'exc' ) {
		$queryArgs['category__not_in'] = $data['categories']['category'];
	}

	// If the selection type is "query", set tag parameters
	if ( $data['selection_type'] == 'query' && !empty($data['tags']['tags']) && $data['tags']['include_tags'] === 'inc' ) {
		$queryArgs['tag__in'] = $data['tags']['tags'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['tags']['tags']) && $data['tags']['include_tags'] === 'exc' ) {
		$queryArgs['tag__not_in'] = $data['tags']['tags'];
	}

	// If the selection type is "query", set author parameters
	if ( $data['selection_type'] == 'query' && !empty($data['authors']['author']) && $data['authors']['include_author'] === 'inc' ) {
		$queryArgs['author__in'] = $data['authors']['author'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['authors']['author']) && $data['authors']['include_author'] === 'exc' ) {
		$queryArgs['author__not_in'] = $data['authors']['author'];
	}

	// If the selection type is "query", set comment count parameters
	if ( $data['selection_type'] == 'query' && !empty($data['comment_count']['value']) ) {
		$queryArgs['comment_count'] = array(
			'value' => intval($data['comment_count']['value']),
			'compare' => $data['comment_count']['compare']
		);
	}

	// If the selection type is "query", set post status parameters
	if ( !empty($data['post_status']) && $data['post_status']['all'] == true ) {
		$queryArgs['post_status'] = 'all';
	} elseif (!empty($data['post_status']['status'])) {
		$queryArgs['post_status'] = $data['post_status']['status'];
	}

	// If the selection type is "query", set password parameters
	if (!empty($data['password']) && $data['password']['has_password'] === true) {
		$queryArgs['has_password'] = $data['password']['has_password'];
	}
	if (!empty($data['password']['post_password'])) {
		$queryArgs['post_password'] = $data['password']['post_password'];
	}

	// If the selection type is "query", set mime type parameters
	if ( $data['selection_type'] == 'query' && !empty($data['post_mime_type']) ) {
		$queryArgs['post_mime_type'] = $data['post_mime_type'];
	}

	// If the selection type is "query", set permissions parameters
	if ( $data['selection_type'] == 'query' && !empty($data['permissions']) ) {
		$queryArgs['perm'] = $data['permissions'];
	}

	// If the selection type is "query", set search parameters
	if ( $data['selection_type'] == 'query' && !empty($data['search']) && $data['search']['s'] === true ) {
		$queryArgs['s'] = get_search_query();
	}
	if ( $data['selection_type'] == 'query' && !empty($data['search']) && $data['search']['exact'] === true ) {
		$queryArgs['exact'] = $data['search']['exact'];
	}
	if ( $data['selection_type'] == 'query' && !empty($data['search']) && $data['search']['sentence'] === true ) {
		$queryArgs['sentence'] = $data['search']['sentence'];
	}

	// If the selection type is "select", set selection specific parameters
	if ( $data['selection_type'] == 'select' ) {
		$queryArgs['post__in'] = $data['select_posts'];
	}

	return $queryArgs;
}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
// Render Callback Function
function dream_block_render($block, $content = '', $is_preview = false, $post_id, $wp_block, $acf_context) {

  $context = array_merge(Timber::context(), get_block_context_base());

  // Post data
  $context['block_post'] = new Timber\Post();

  // Store block values.
  $context['block'] = $block;

  // Store field values.
  $context['fields'] = get_fields($block['id']);

  // Store $is_preview value.
  $context['is_preview'] = $is_preview;

  // Store block context
  $context['block_context'] = $acf_context;

  // Replace acf keys with human readable acf field names (only if filter enabled and data exists)
  if( !empty( $context['block_context']['acf/fields'] ) && apply_filters('dream_use_acf_field_names', false) ) {
    $context['block_context']['acf/fields'] = replace_acf_keys_with_names( $context['block_context']['acf/fields'] );
  }

  // Store parent data
  if (!empty($wp_block->parsed_block[ 'parent_block_data' ])) {
    $context[ 'parent_block_data' ] = $wp_block->parsed_block[ 'parent_block_data' ];
  }

  // Replace acf keys with human readable acf field names (only if filter enabled and data exists)
  if( !empty( $context[ 'parent_block_data' ][ 'data' ] ) && apply_filters('dream_use_acf_field_names', false) ) {
    $context[ 'parent_block_data' ][ 'data' ] = replace_acf_keys_with_names( $context[ 'parent_block_data' ][ 'data' ] );
  }

  // Note: Menus and Paths are now provided by get_block_context_base() to avoid rebuilding for every block

  /**
   * Posts query data
  */

  if ( $block['name'] === 'acf/posts-loop' ) {
    // Reuse already-fetched fields from $context['fields'] (avoids 19 redundant DB queries)
    $fields = $context['fields'];

    // Field $data that gets exposed to the render template
    $data = array(
      'selection_type' => $fields['selection_type'] ?? null,
      'categories' => $fields['categories'] ?? null,
      'tags' => $fields['tags'] ?? null,
      'authors' => $fields['authors'] ?? null,
      'pagination' => $fields['pagination'] ?? null,
      'ignore_sticky_posts' => $fields['ignore_sticky_posts'] ?? null,
      'select_posts' => $fields['select_posts'] ?? null,
      'post_type' => $fields['post_type'] ?? null,
      'sort' => $fields['sort_order'] ?? null,
      'taxonomies' => $fields['taxonomies'] ?? null,
      'date' => $fields['date'] ?? null,
      'comment_count' => $fields['comment_count'] ?? null,
      'post_status' => $fields['post_status'] ?? null,
      'password' => $fields['password'] ?? null,
      'post_parent' => $fields['post_parent'] ?? null,
      'post_mime_type' => $fields['post_mime_type'] ?? null,
      'permissions' => $fields['permissions'] ?? null,
      'custom_fields' => $fields['custom_fields'] ?? null,
      'search' => $fields['search'] ?? null
    );

    // print_r('<pre>');
    // print_r($data['date']['date_query']);
    // print_r('<bre>-----------------------<br>');
    // print_r('</pre>');

    // $data['taxonomies']['terms'] = array_column($data['taxonomies']['terms']);
    // print_r('<pre>');
    // print_r($data['taxonomies']);
    // print_r('<br>--------<br>');
    // print_r(get_field( 'taxonomies'));
    // print_r('</pre>');



    // Dynamic block ID
    $block_id = 'posts-loop-block-' . $block['id'];

    // Check if a custom ID is set in the block editor
    if( !empty($block['anchor']) ) {
      $block_id = $block['anchor'];
    }

    // Block classes
    $class_name = 'posts-loop-block';
    if( !empty($block['class_name']) ) {
      $class_name .= ' ' . $block['class_name'];
    }

    $queryArgs = build_posts_loop_query($data);

    // Create a new WP_Query instance
    // $posts = new WP_Query( $queryArgs );
    $posts = new Timber\PostQuery( $queryArgs );

    // Add the response of WP_Query to the Timber context
    // $data['loop'] = $posts;
    $context['args'] = $queryArgs;
    $context['query'] = $data;
    $context['posts'] = $posts;
    // $context['query_posts'] = $data['loop']->posts;
  }

  if (false === TIMBER_CACHE) {
    // Render the block.
    Timber::render($block['path'] . '/' . implode('-', explode(' ', strtolower($block['title']))) . '.twig', $context);
  } else {
    // Generate a unique cache key based on the block's ID, title, and date.
    $cache_key = 'dream_block_' . $block['id'] . '_' . sanitize_title($block['title']) . '_' . $context['block_post']->post_date;

    // Try to get the cached template.
    $cached_template = get_transient($cache_key);

    // If the template is not cached, render and cache it.
    if (false === $cached_template) {
      // Render the block.
      ob_start();
      Timber::render($block['path'] . '/' . implode('-', explode(' ', strtolower($block['title']))) . '.twig', $context);
      $cached_template = ob_get_clean();

      // Cache the template for, let's say, 1 hour (you can adjust this).
      set_transient($cache_key, $cached_template, CACHE_EXPIRATION_TIME);
    }

    // Output the cached or newly rendered template.
    echo $cached_template;
  }
}

// Remove .acf-inner-blocks-container element
add_filter( 'acf/blocks/wrap_frontend_innerblocks', 'acf_should_wrap_innerblocks', 10, 2 );
function acf_should_wrap_innerblocks( $wrap, $name ) {
  // if ( $name == 'acf/test-block' ) {
  //   return true;
  // }
  return false;
}

/**
 *  ----------------------------------------------------------------------------------------------------------------
 */


/**
 *  ACF 5- BLOCKS
 */
// ACF v. <= 5.9 Block registation helpers
//function remove_tpls($file) {
//  return !str_ends_with($file, '.tpl.twig') && $file != '.' && $file != '..';
//}
//function get_block_data($file) {
//  $data = file_get_contents($file, false);
//  return $data;
//}
//
//function destructure_block_data($string) {
//  return explode(': ', $string);
//}
//
//function format_string(&$string) {
//  $string = trim(str_replace(array("\r", "\n"), '', $string));
//
//  if (substr($string, 0, 1) === "'" or substr($string, 0, 1) ==='"') {
//    $string = substr_replace($string, '', 0, 1);
//  }
//
//  if (substr($string, -1, 1) === "'" or substr($string, -1, 1) ==='"') {
//    $string = substr_replace($string, '', -1, 1);
//  }
//
//  return $string;
//}
//
//function filter_boolean (&$string) {
//  if (format_string($string) === 'true') {
//    $string = true;
//  } else if (format_string($string) === 'false') {
//    $string = false;
//  }
//
//  return $string;
//}
//
//function build_block_data_array($array, $data=array()) {
//  $data[$array[0]] = $array[1];
//  return $data;
//}
//
//function build_block_data($array) {
//  $data = array();
//  foreach ($array as $item) {
//    if (format_string($item[array_key_first($item)]) === 'true' || format_string($item[array_key_first($item)]) === 'false') {
//      $key = array_key_first($item);
//      $value = filter_boolean($item[array_key_first($item)]);
//      $data[format_string($key)] = $value;
//    } else {
//      $key = array_key_first($item);
//      $value = format_string($item[array_key_first($item)]);
//      $data[format_string($key)] = $value;
//    }
//  }
//  return $data;
//}
//
//function format_block_data($content) {
//  preg_match('/{% set block_data = {([^}]*)} %}/', $content, $match);
//  if (!empty($match)) {
//    $data_strings = explode(',', $match[1]);
//    $block_data = array_map('destructure_block_data', $data_strings);
//    $block_data_array = array_map('build_block_data_array', $block_data);
//    $data = build_block_data($block_data_array);
//    return $data;
//  }
//}
//
// ACF v. <= 5.9 Ragister blocks
//add_action('acf/init', 'dream_register_blocks');
//function dream_register_blocks() {
//
//  // Bail out if function
//  // doesn’t exist.
//  if (!function_exists('acf_register_block_type'))
//      return;
//
//  // Register parent theme blocks
//  $blocks_path = get_template_directory() . '/src/templates/blocks';
//  $blocks = array_filter(scandir($blocks_path), 'remove_tpls');
//  if (count($blocks) > 0) {
//    foreach ($blocks as $block) {
//      $file_path = $blocks_path . '/' . $block;
//      $file_contents = get_block_data($file_path);
//      $data = format_block_data($file_contents);
//
//      if (gettype($data) == 'array') {
//        acf_register_block_type(array(
//          'name'              => implode('-', explode(' ', strtolower($data['name']))),
//          'title'             => __(ucwords($data['name']), 'dream'),
//          'description'       => __($data['description'], 'dream'),
//          'template'          => implode('-', explode(' ', strtolower($data['name']))),
//          'render_callback'   => 'dream_block_render',
//          'category'          => $data['category'],
//          'icon'              => $data['icon'],
//          'mode'              => $data['mode'],
//          'keywords'          => [$data['category'], $data['name'], $data['name'] . 's', $data['keywords']],
//          'post_types'        => $data['post_types'],
//          'align'             => $data['align'],
//          'align_text'        => $data['align_text'],
//          'align_content'     => $data['align_content'],
//          'enqueue_style'     => $data['enqueue_style'],
//          'enqueue_script'    => $data['enqueue_script'],
//          'supports'        => [
//            'align'            => $data['supports_align'],
//            'anchor'        => $data['supports_anchor'],
//            'customClassName'    => $data['supports_className'],
//            'jsx'           => $data['supports_jsx'],
//            'align_text'        => $data['supports_align_text'],
//            'align_content'     => $data['supports_align_content'],
//            'full_height'       => $data['supports_full_height'],
//            'mode'              => $data['supports_mode'],
//            'multiple'          => $data['supports_multiple']
//          ]
//        ));
//      }
//
//    }
//  }
//
//  // Register child theme blocks
//  $child_blocks_path = get_stylesheet_directory() . '/src/templates/blocks';
//  $child_blocks = array_filter(scandir($child_blocks_path), 'remove_tpls');
//  if (count($child_blocks) > 0) {
//    foreach ($child_blocks as $child_block) {
//      $file_path = $child_blocks_path . '/' . $child_block;
//      $file_contents = get_block_data($file_path);
//      $data = format_block_data($file_contents);
//
//      if (gettype($data) == 'array') {
//        acf_register_block_type(array(
//          'name'              => implode('-', explode(' ', strtolower($data['name']))),
//          'title'             => __(ucwords($data['name']), 'dream'),
//          'description'       => __($data['description'], 'dream'),
//          'template'          => implode('-', explode(' ', strtolower($data['name']))),
//          'render_callback'   => 'dream_block_render',
//          'category'          => $data['category'],
//          'icon'              => $data['icon'],
//          'mode'              => $data['mode'],
//          'keywords'          => [$data['category'], $data['name'], $data['name'] . 's', $data['keywords']],
//          'post_types'        => $data['post_types'],
//          'align'             => $data['align'],
//          'align_text'        => $data['align_text'],
//          'align_content'     => $data['align_content'],
//          'enqueue_style'     => $data['enqueue_style'],
//          'enqueue_script'    => $data['enqueue_script'],
//          'supports'        => [
//            'align'            => $data['supports_align'],
//            'anchor'        => $data['supports_anchor'],
//            'customClassName'    => $data['supports_className'],
//            'jsx'           => $data['supports_jsx'],
//            'align_text'        => $data['supports_align_text'],
//            'align_content'     => $data['supports_align_content'],
//            'full_height'       => $data['supports_full_height'],
//            'mode'              => $data['supports_mode'],
//            'multiple'          => $data['supports_multiple']
//          ]
//        ));
//      }
//
//    }
//  }
//
//}
//
///**
// *  This is the callback that displays the block.
// *
// * @param   array  $block      The block settings and attributes.
// * @param   string $content    The block content (emtpy string).
// * @param   bool   $is_preview True during AJAX preview.
// */
// Render Callback Function -- ACF v. <= 5.9
//function dream_block_render($block, $content = '', $is_preview = false)
//{
//  $context = Timber::context();
//
//  // Post data
//  $context['block_post'] = new Timber\Post();
//
//  // Store block values.
//  $context['block'] = $block;
//
//  // Store field values.
//  $context['fields'] = get_fields();
//
//  // Store $is_preview value.
//  $context['is_preview'] = $is_preview;
//
//  // Render the block.
//  Timber::render('src/templates/blocks/'.$block['template'].'.twig', $context);
//}
//
// Get parent block data in innerBlocks -- ACF v. <= 5.9
//function get_parent_block_data($needle, $haystacks, $name, &$block_data = array()) {
//  foreach ($haystacks as $haystack) {
//    if (!empty($haystack['attrs']['id']) && $haystack['attrs']['id'] == $needle) {
//      return $block_data;
//    }
//  }
//
//  foreach ($haystacks as $haystack)  {
//    if (!empty($haystack['innerBlocks']) && $haystack['blockName'] !== $name) {
//
//      $block_data = array();
//      if (!empty($haystack['attrs']['data'])) {
//        foreach ($haystack['attrs']['data'] as $key => $value) {
//          if (substr($key, 0, 1) !== '_') {
//            $block_data[$key] = $value;
//          }
//        }
//      }
//      get_parent_block_data($needle, $haystack['innerBlocks'], $name, $block_data);
//    } else if (!empty($haystack['innerBlocks'])) {
//      get_parent_block_data($needle, $haystack['innerBlocks'], $name, $block_data);
//    }
//  }
//}
//
//function get_parent_block($id, $name) {
//  $blocks = parse_blocks(get_post()->post_content);
//  get_parent_block_data($id, $blocks, $name, $block_data);
//  return $block_data;
//}


/**
 *  ----------------------------------------------------------------------------------------------------------------
 */

// TODO: Add editor styles
// @link https://timber.github.io/docs/guides/gutenberg/

/**
 * Remove Blocks
 */

// function remove_default_blocks($allowed_blocks) {
//     // Get widget blocks and registered by plugins blocks
//     $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

//     // Disable Widgets Blocks
//     unset($registered_blocks['core/calendar']);
//     unset($registered_blocks['core/legacy-widget']);
//     unset($registered_blocks['core/rss']);
//     unset($registered_blocks['core/search']);
//     unset($registered_blocks['core/tag-cloud']);
//     unset($registered_blocks['core/latest-comments']);
//     unset($registered_blocks['core/archives']);
//     unset($registered_blocks['core/categories']);
//     unset($registered_blocks['core/latest-posts']);
//     unset($registered_blocks['core/shortcode']);

//     // Disable WooCommerce Blocks
//     unset($registered_blocks['woocommerce/handpicked-products']);
//     unset($registered_blocks['woocommerce/product-best-sellers']);
//     unset($registered_blocks['woocommerce/product-category']);
//     unset($registered_blocks['woocommerce/product-new']);
//     unset($registered_blocks['woocommerce/product-on-sale']);
//     unset($registered_blocks['woocommerce/product-top-rated']);
//     unset($registered_blocks['woocommerce/products-by-attribute']);
//     unset($registered_blocks['woocommerce/featured-product']);

//     // Now $registered_blocks contains only blocks registered by plugins, but we need keys only
//     $registered_blocks = array_keys($registered_blocks);

//     // Merge allowed core blocks with plugins blocks
//     return array_merge(array(
//         'core/image',
//         'core/paragraph',
//         'core/heading',
//         'core/list'
//     ), $registered_blocks);
// }

// add_filter('allowed_block_types', 'remove_default_blocks');
