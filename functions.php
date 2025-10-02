<?php
/**
 * Child theme functions
 * User: P.D. Rittenhouse
 */


//Include Composer Autoload
require_once(  __DIR__ . '/vendor/autoload.php' );

//Initialize Timber
$timber = new Timber\Timber();

/**
 * Timber Error handling
 */

if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
    });

    add_filter('template_include', function( $template ) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
//Timber::$locations = array(
//  __DIR__.'/src/templates/',
//  __DIR__.'/src/patternlab/source/_patterns/',
//  __DIR__.'/dist/wp/img/',
//  dirname(__DIR__, 3)
//);
Timber::$locations = array(
  get_stylesheet_directory() . '/src/templates/',
  get_stylesheet_directory() . '/src/img/',
  get_template_directory() . '/src/templates/',
  get_template_directory() . '/src/patternlab/source/_patterns/',
  get_template_directory() . '/dist/wp/img/',
  dirname(__DIR__, 2) . '/uploads/',
  dirname(__DIR__, 3),
);

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

/**
 * Enable caching
 * Note: You can clear cache anytime from Theme Options > Cache
 */
// Enable in production, disable in development
if (!defined('WP_DEBUG') || !WP_DEBUG) {
  define('ENABLE_CACHE', true);
  define('TIMBER_CACHE', true);
} else {
  define('ENABLE_CACHE', false);
  define('TIMBER_CACHE', false);
}

define('CACHE_EXPIRATION_TIME', 3600); // 1 hour (recommended for development with cache clear button)
// define('CACHE_EXPIRATION_TIME', 86400); // 1 day
// define('CACHE_EXPIRATION_TIME', 604800); // 1 week
// define('CACHE_EXPIRATION_TIME', 2592000); // 1 month
define('TIMBER_CACHE_TIME', CACHE_EXPIRATION_TIME);

/**
 * Include settings from /src/functions
*/
$dream_includes = array(
  "paths.php",
  "config.php",
  "menus.php",
  "theme-support.php",
  "customizer.php",
  "gzip.php",
  "scripts.php",
  "styles.php",
  "vars.php",
  "data.php",
  "filters.php",
  "forms.php",
  "fields.php",
  "blocks.php",
  "block-styles.php",
  "block-patterns.php",
  "block-templates.php",
  "woocommerce.php",
  "breadcrumb.php",
  "svg.php",
  "load-more.php",
  "redirects.php",
  "rewrites.php",
  "routes.php",
  "search.php",
  "api.php"
);

foreach($dream_includes as $inc){
  include_once(get_template_directory() . "/src/functions/$inc");
}

// Disable Windodws Live Writer Manifest
remove_action( 'wp_head', 'wlwmanifest_link');

// Disable WP customizer site icon
// function remove_site_icon(){
//   global $wp_customize;
//   $wp_customize->remove_control('site_icon');
// }
// add_action( 'customize_register', 'remove_site_icon', 20 ); // Priority 20 so that we remove options only once they've been added

// TODO: Add menus programatically
// URL: https://wordpress.stackexchange.com/questions/44736/programmatically-add-a-navigation-menu-and-menu-items
