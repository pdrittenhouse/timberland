<?php

/**
 * Save Fields
*/
add_filter('acf/settings/save_json', 'acf_json_save_point');

function acf_json_save_point($path)
{

    // update path
    $path = get_template_directory() . '/src/fields';


    // return
    return $path;
}


/**
 * Load Fields
*/
add_filter('acf/settings/load_json', 'acf_json_load_point');

function acf_json_load_point($paths)
{

    // remove original path
    unset($paths[0]);


    // append path
    $paths[] = get_template_directory() . '/src/fields';


    // return
    return $paths;
}


/**
 * ID Fields
 */

// ACF Unique ID Field
// @link https://github.com/philipnewcomer/ACF-Unique-ID-Field
if ( class_exists('acf_field') ) {
    PhilipNewcomer\ACF_Unique_ID_Field\ACF_Field_Unique_ID::init();
}



/**
 * Options Pages
 */

if( function_exists('acf_add_options_page') ) {

  // Options Pages
  acf_add_options_page(array(
    'page_title'    => 'Theme General Options',
    'menu_title'    => 'Theme Options',
    'menu_slug'     => 'theme-general-options',
    'capability'    => 'edit_posts',
    'icon_url'      => 'dashicons-admin-settings',
    'redirect'      => false,
    'position'      => 7
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Theme Header Options',
    'menu_title'    => 'Header Options',
    'parent_slug'   => 'theme-general-options',
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Theme Footer Options',
    'menu_title'    => 'Footer Options',
    'parent_slug'   => 'theme-general-options',
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Cache Options',
    'menu_title'    => 'Cache Options',
    'parent_slug'   => 'theme-general-options',
  ));

  // Hidden Fields
  acf_add_options_page(array(
    'page_title'    => 'Block Modules',
    'menu_title'    => 'Block Modules',
    'menu_slug'     => 'block-modules',
    'capability'    => 'manage_options',
    'icon_url'      => 'dashicons-block-default',
    'redirect'      => false
  ));

}

/**
 * Cache Management
 */

// Clear Timber cache
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

  // Clear any WordPress object cache
  if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
  }

  return true;
}

// Handle cache clear action
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

// Add cache clear buttons to ACF options page
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
          buttonsHtml += '<a href="<?php echo wp_nonce_url(admin_url("admin-post.php?action=dream_clear_timber_cache"), "dream_clear_timber_cache"); ?>" class="button button-secondary" style="margin-right: 10px;">Clear Timber Cache</a>';
          buttonsHtml += '<p class="description">Clear the Timber/Twig template cache to see template changes immediately.</p>';
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
      $('<div class="notice notice-success is-dismissible"><p>Timber cache cleared successfully!</p></div>').insertAfter('.wrap h1');
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
 * Add options to timber context
 */
add_filter( 'timber_context', 'dream_timber_context'  );
function dream_timber_context( $context ) {
  if (class_exists('ACF')) {
    $context['options'] = get_fields('option');
  }
  return $context;
}

/**
 * Add admin only global field setting
*/
function my_admin_only_render_field_settings( $field ) {
  acf_render_field_setting( $field, array(
    'label'        => __( 'Admin Only?', 'my-textdomain' ),
    'instructions' => '',
    'name'         => 'admin_only',
    'type'         => 'true_false',
    'ui'           => 1,
  ), true ); // If adding a setting globally, you MUST pass true as the third parameter!
}
add_action( 'acf/render_field_settings', 'my_admin_only_render_field_settings' );

function my_admin_only_prepare_field( $field ) {
  // Bail early if no 'admin_only' setting or if set to false.
  if ( empty( $field['admin_only'] ) ) {
    return $field;
  }

  // Prevent field from displaying if current user is not an admin.
  if ( ! current_user_can( 'manage_options' ) ) {
    return false;
  }

  // Return the original field otherwise.
  return $field;
}
add_filter( 'acf/prepare_field', 'my_admin_only_prepare_field' );

/**
 * Add ACF post type selection field
 * @link: https://stackoverflow.com/questions/35997249/populate-acf-checkboxes-with-post-types
 */
add_filter('acf/load_field/name=post_type', 'acf_load_post_types');

function acf_load_post_types($field) {
  foreach ( get_post_types( '', 'names' ) as $post_type ) {
    if ($post_type !== 'attachment' && $post_type !== 'revision' && $post_type !== 'nav_menu_item' && $post_type !== 'custom_css' && $post_type !== 'customize_changeset' && $post_type !== 'oembed_cache' && $post_type !== 'user_request' && $post_type !== 'wp_block' && $post_type !== 'wp_template' && $post_type !== 'wp_template_part' && $post_type !== 'wp_global_styles' && $post_type !== 'wp_navigation' && $post_type !== 'acf-field-group' && $post_type !== 'acf-field') {
      $field['choices'][$post_type] = $post_type;
    }
  }

  // return the field
  return $field;
}

/**
 * Add ACF taxonomy selection field
 * @link: https://stackoverflow.com/questions/35997249/populate-acf-checkboxes-with-post-types
 */
add_filter('acf/load_field/name=taxonomy', 'acf_load_taxonomies');

function acf_load_taxonomies($field) {
  foreach (get_taxonomies('', 'names' ) as $taxonomy) {
    if ($taxonomy !== 'category' && $taxonomy !== 'post_tag' && $taxonomy !== 'nav_menu' && $taxonomy !== 'link_category' && $taxonomy !== 'post_format' && $taxonomy !== 'wp_theme' && $taxonomy !== 'wp_template_part_area') {
      $field['choices'][$taxonomy] = $taxonomy;
    }
  }

  // return the field
  return $field;
}

/**
 * Add ACF terms selection field
 * @link: https://stackoverflow.com/questions/35997249/populate-acf-checkboxes-with-post-types
 */
//add_filter('acf/load_field/name=terms', 'acf_load_terms');
//
//function acf_load_terms($field) {
//  global $post;
////  foreach (get_terms(get_field('taxonomy',$post->ID)) as $term) {
////    print_r('<pre>');
////    print_r($term);
////    print_r('</pre>');
////    $field['choices'][$term->slug] = $term->slug;
////  }
//
//  // get the value from AJAX or from the field value
//  $taxonomy = $_POST['selected_taxonomy'] ?? get_field( 'taxonomy', $post->ID);
//
//  // change the query according to your model
//  if ( null !== $taxonomy ) {
//    $field['choices'][$taxonomy] = $taxonomy;
//  }
//
//  return $field;
//}

/**
 * Exclude ACF attachment post type in relationship field
 * @link: https://support.advancedcustomfields.com/forums/topic/exclude-posts-from-relationship-field/
 * @link: https://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
 */
add_filter('acf/fields/relationship/query/name=select_posts', 'acf_exclude_media_post_type', 10, 3);
function acf_exclude_media_post_type($args, $field, $post_id) {
//  print_r(get_field( 'post_type'));
  if (($key = array_search('attachment', $args['post_type'])) !== false) {
    unset($args['post_type'][$key]);
  }
  return $args;
}

/**
 * Set default posts loop layout
 */
add_filter('acf/load_value/name=posts_query_layout', 'add_default_layouts', 10, 3);
function  add_default_layouts($value, $post_id, $field) {

  if ($value !== NULL) {
    // $value will only be NULL on a new post
    return $value;
  }

  // add default layouts
  $value = array(
    array(
      'acf_fc_layout' => 'featured_image'
    ),
    array(
      'acf_fc_layout' => 'post_title'
    ),
    array(
      'acf_fc_layout' => 'post_excerpt',
      'field_63f12f3bb3c0d' => 'Read More',
      'field_63f12f57b3c0e' => '50'
    ),
    array(
      'acf_fc_layout' => 'post_date'
    ),
    array(
      'acf_fc_layout' => 'post_author',
      'field_63ee9ab57cf00' => array(
        array(
          'acf_fc_layout' => 'gravatar'
        ),
        array(
          'acf_fc_layout' => 'name'
        ),
        array(
          'acf_fc_layout' => 'email'
        )
      )
    )
  );

  return $value;
}

/**
 * Set default posts loop author elements
 */
//add_filter('acf/load_value/name=author_elements', 'add_default_author_elements', 10, 3);
//function  add_default_author_elements($value, $post_id, $field) {
//
//  if ($value !== NULL) {
//    // $value will only be NULL on a new post
//    return $value;
//  }
//
//  // add default layouts
//  $value = array(
//    array(
//      'acf_fc_layout' => 'gravatar'
//    ),
//    array(
//      'acf_fc_layout' => 'name'
//    ),
//    array(
//      'acf_fc_layout' => 'email'
//    )
//  );
//
//  return $value;
//}

/**
 * Add menu select options
 */
add_filter('acf/load_field/name=menu', 'acf_load_menus');

function acf_load_menus($field) {
  $menus = get_registered_nav_menus();
  unset($menus['social']);
  $field['choices'] = $menus;

  // return the field
  return $field;
}

/**
 * Sidebars
 */
add_filter('acf/load_field/name=sidebar', 'acf_load_sidebars');

function acf_load_sidebars($field)
{
  global $wp_registered_sidebars;

  foreach($wp_registered_sidebars as $sidebar) {
    $field['choices'][$sidebar['id']] = $sidebar['name'];
  }

  // return the field
  return $field;
}
