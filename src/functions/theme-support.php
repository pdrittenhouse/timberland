<?php

function dream_theme_support() {

  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'post-formats', array(
    'aside',
    'gallery',
    'link',
    'image',
    'quote',
    'status',
    'video',
    'audio',
    'chat'
  ) );

  add_theme_support( 'custom-background', array(
    'default-color'      => 'fff',
    'default-image'      => get_template_directory_uri() . '/dist/wp/img/background.jpg',
    'default-position-x' => 'center',
    'default-position-y' => 'top',
    'default-repeat'     => 'no-repeat',
    'default-size'       => 'cover',
    'default-preset'     => 'fill',
    'default-attachment'     => 'scroll'
  ) );

  add_theme_support( 'custom-header', array(
    'default-image'      => get_template_directory_uri() . '/dist/wp/img/header.jpg',
    'default-text-color' => '000',
    'width'              => 1440,
    'height'             => 300,
    'flex-width'         => true,
    'flex-height'        => true,
  ) );

  register_default_headers( array(
    'banner1' => array(
      'url'           => get_template_directory_uri() . '/dist/wp/img/header1.jpg',
      'thumbnail_url' => get_template_directory_uri() . '/dist/wp/img/header1.jpg',
      'description'   => esc_html__( 'Banner1', 'theme-textdomain' )
    ),
    'banner2' => array(
      'url'           => get_template_directory_uri() . '/dist/wp/img/header2.jpg',
      'thumbnail_url' => get_template_directory_uri() . '/dist/wp/img/header2.jpg',
      'description'   => esc_html__( 'Banner2', 'theme-textdomain' )
    ),
    'banner-3' => array(
      'url'           => get_template_directory_uri() . '/dist/wp/img/header3.jpg',
      'thumbnail_url' => get_template_directory_uri() . '/dist/wp/img/header3.jpg',
      'description'   => esc_html__( 'Banner3', 'theme-textdomain' )
    )
  ) );

  add_theme_support( 'custom-logo', array(
    'height'               => 279,
    'width'                => 173,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true,
  ) );

  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
  ) );

  add_theme_support( 'responsive-embeds' );

  add_theme_support( 'title-tag' );

  add_theme_support( 'customize-selective-refresh-widgets' );

//  add_theme_support( 'wp-block-styles' );

  add_theme_support( 'align-wide' );

  add_theme_support( 'custom-line-height' );

  add_theme_support( 'editor-color-palette', array(
    array(
      'name' => esc_attr__( 'primary', 'dream' ),
      'slug' => 'primary',
      'color' => 'var(--primary)',
    ),
    array(
      'name' => esc_attr__( 'secondary', 'dream' ),
      'slug' => 'secondary',
      'color' => 'var(--secondary)',
    ),
    array(
      'name' => esc_attr__( 'tertiary', 'dream' ),
      'slug' => 'tertiary',
      'color' => 'var(--tertiary)',
    ),
    array(
      'name' => esc_attr__( 'quaternary', 'dream' ),
      'slug' => 'quaternary',
      'color' => 'var(--quaternary)',
    ),
    array(
      'name' => esc_attr__( 'quinary', 'dream' ),
      'slug' => 'quinary',
      'color' => 'var(--quinary)',
    ),
    array(
      'name' => esc_attr__( 'senary', 'dream' ),
      'slug' => 'senary',
      'color' => 'var(--senary)',
    ),
    array(
      'name' => esc_attr__( 'septenary', 'dream' ),
      'slug' => 'septenary',
      'color' => 'var(--septenary)',
    ),
    array(
      'name' => esc_attr__( 'octonary', 'dream' ),
      'slug' => 'octonary',
      'color' => 'var(--octonary)',
    ),
    array(
      'name' => esc_attr__( 'nonary', 'dream' ),
      'slug' => 'nonary',
      'color' => 'var(--nonary)',
    ),
    array(
      'name' => esc_attr__( 'denary', 'dream' ),
      'slug' => 'denary',
      'color' => 'var(--denary)',
    ),
    array(
      'name' => esc_attr__( 'light', 'dream' ),
      'slug' => 'light',
      'color' => 'var(--light)',
    ),
    array(
      'name' => esc_attr__( 'dark', 'dream' ),
      'slug' => 'dark',
      'color' => 'var(--dark)',
    ),
    array(
      'name' => esc_attr__( 'white', 'dream' ),
      'slug' => 'white',
      'color' => 'var(--white)',
    ),
    array(
      'name' => esc_attr__( 'black', 'dream' ),
      'slug' => 'black',
      'color' => 'var(--black)',
    ),
    array(
      'name' => esc_attr__( 'transparent', 'dream' ),
      'slug' => 'transparent',
      'color' => 'transparent',
    ),
  ) );

  add_theme_support('editor-gradient-presets', array(
    array(
      'name'     => esc_attr__( 'Primary to Secondary Horizontal', 'dream' ),
      'gradient' => 'var(--primary-secondary-horizontal)',
      'slug'     => 'primary-secondary-horizontal'
    ),
    array(
      'name'     => esc_attr__( 'Tertiary to Quaternary Vertical', 'dream' ),
      'gradient' => 'var(--tertiary-quaternary-vertical)',
      'slug'     =>  'tertiary-quaternary-vertical',
    ),
    array(
      'name'     => esc_attr__( 'Quinary to Senary Diagonal Down', 'dream' ),
      'gradient' => 'var(--quinary-senary-diagonal-up)',
      'slug'     => 'quinary-senary-diagonal-up',
    ),
    array(
      'name'     => esc_attr__( 'Septenary to Octonary Diagonal Down', 'dream' ),
      'gradient' => 'var(--septenary-octonary-diagonal-down)',
      'slug'     => 'septenary-octonary-diagonal-down',
    ),
    array(
      'name'     => esc_attr__( 'Nonary to Denary Diagonal Down', 'dream' ),
      'gradient' => 'var(--nonary-denary-diagonal-down)',
      'slug'     => 'nonary-denary-diagonal-down',
    ),
    array(
      'name'     => esc_attr__( 'Primary to Secondary Radial', 'dream' ),
      'gradient' => 'var(--primary-secondary-radial)',
      'slug'     => 'primary-secondary-radial',
    ),
  ) );

  add_theme_support( 'editor-font-sizes', array(
    array(
      'name' => esc_attr__( 'Tiny', 'dream' ),
      'size' => 12,
      'slug' => 'small'
    ),
    array(
      'name' => esc_attr__( 'Normal', 'dream' ),
      'size' => 16,
      'slug' => 'regular'
    ),
    array(
      'name' => esc_attr__( 'Large', 'dream' ),
      'size' => 20,
      'slug' => 'large'
    ),
    array(
      'name' => esc_attr__( 'Big', 'dream' ),
      'size' => 32,
      'slug' => 'extralarge'
    ),
    array(
      'name' => esc_attr__( 'Huge', 'dream' ),
      'size' => 54,
      'slug' => 'huge'
    )
  ) );

//  add_theme_support( 'disable-custom-font-sizes' );

//  add_theme_support( 'disable-custom-colors' );

//  add_theme_support( 'disable-custom-gradients' );

//  remove_theme_support( 'core-block-patterns' );

  add_theme_support( 'editor-styles' );

//  add_editor_style( 'style-editor.css' );

  add_theme_support('custom-spacing');

  add_theme_support('experimental-link-color');

}
add_action( 'after_setup_theme', 'dream_theme_support' );

// Add excerpts to pages
add_post_type_support( 'page', 'excerpt' );

// CPT Date Archives
/**
 * Custom post type specific rewrite rules
 * @return wp_rewrite Rewrite rules handled by Wordpress
 * @link https://clubmate.fi/date-archives-for-wordpress-custom-post-types
 */
add_action('cptui_post_register_post_types', 'cpt_archives');
function cpt_archives () {
  foreach ( get_post_types( '', 'names' ) as $post_type ) {
    if ($post_type !== 'post' && $post_type !== 'page' && $post_type !== 'attachment' && $post_type !== 'revision' && $post_type !== 'nav_menu_item' && $post_type !== 'custom_css' && $post_type !== 'customize_changeset' && $post_type !== 'oembed_cache' && $post_type !== 'user_request' && $post_type !== 'wp_block' && $post_type !== 'wp_template' && $post_type !== 'wp_template_part' && $post_type !== 'wp_global_styles' && $post_type !== 'wp_navigation' && $post_type !== 'acf-field-group' && $post_type !== 'acf-field') {

      add_action('generate_rewrite_rules', function ($wp_rewrite) use ($post_type)
      {
        // Here we're hardcoding the CPT in, article in this case
        $rules = cpt_generate_date_archives($post_type, $wp_rewrite);
        $wp_rewrite->rules = $rules + $wp_rewrite->rules;
        return $wp_rewrite;
      });

      // Make wp_get_archives() work with CPTs
//      add_filter('getarchives_where', function ($where) use ($post_type) {
//        return str_replace("WHERE post_type = 'post'", "WHERE post_type IN (" . $post_type . ")", $where);
//      });

    }
  }
}

/**
 * Generate date archive rewrite rules for a given custom post type
 * @param  string $cpt slug of the custom post type
 * @return rules       returns a set of rewrite rules for Wordpress to handle
 */
function cpt_generate_date_archives($cpt, $wp_rewrite)
{
  $rules = array();

  $post_type = get_post_type_object($cpt);
  $slug_archive = $post_type->has_archive;
  if ($slug_archive === false) {
    return $rules;
  }
  if ($slug_archive === true) {
    // Here's my edit to the original function, let's pick up
    // custom slug from the post type object if user has
    // specified one.
    $slug_archive = $post_type->rewrite['slug'];
  }

  $dates = array(
    array(
      'rule' => "([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})",
      'vars' => array('year', 'monthnum', 'day')
    ),
    array(
      'rule' => "([0-9]{4})/([0-9]{1,2})",
      'vars' => array('year', 'monthnum')
    ),
    array(
      'rule' => "([0-9]{4})",
      'vars' => array('year')
    )
  );

  foreach ($dates as $data) {
    $query = 'index.php?post_type='.$cpt;
    $rule = $slug_archive.'/'.$data['rule'];

    $i = 1;
    foreach ($data['vars'] as $var) {
      $query.= '&'.$var.'='.$wp_rewrite->preg_index($i);
      $i++;
    }

    $rules[$rule."/?$"] = $query;
    $rules[$rule."/feed/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
    $rules[$rule."/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
    $rules[$rule."/page/([0-9]{1,})/?$"] = $query."&paged=".$wp_rewrite->preg_index($i);
  }

  return $rules;
}

/**
 * Hide metabox
 * @link https://github.com/WordPress/gutenberg/issues/13816#issuecomment-470137667
 */
add_filter( 'rest_prepare_taxonomy', function( $response, $taxonomy, $request ){
  $context = ! empty( $request['context'] ) ? $request['context'] : 'view';

  // Context is edit in the editor
  if( $context === 'edit' && $taxonomy->meta_box_cb === false ){

    $data_response = $response->get_data();

    $data_response['visibility']['show_ui'] = false;

    $response->set_data( $data_response );
  }

  return $response;
}, 10, 3 );

/**
 * Remove Excerpt Ellipsis
 * @link: https://www.ronvangorp.com/how-to-change-wordpress-excerpt-ellipsis/
 */
function new_excerpt_more($more) {
  return '';
}
add_filter('excerpt_more', 'new_excerpt_more');
