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
 * Full Page Cache Configuration
 * Caches entire rendered HTML pages for maximum performance
 * - Self-invalidating based on post modified time
 * - Automatically clears when posts are updated
 * - Integrated with the "Clear All Caches" admin button
 */
// Enable in production, disable in development (same as Timber cache)
if (!defined('WP_DEBUG') || !WP_DEBUG) {
  define('ENABLE_FULL_PAGE_CACHE', true);
} else {
  define('ENABLE_FULL_PAGE_CACHE', false);
}

// Page cache expiration (defaults to CACHE_EXPIRATION_TIME if not set)
define('PAGE_CACHE_EXPIRATION', CACHE_EXPIRATION_TIME);

// Uncomment to cache pages for logged-in users (creates separate cache per user role)
// define('CACHE_LOGGED_IN_USERS', true);

// For multilingual sites, define locales to cache separately
// define('CACHE_LOCALES', array('en_US', 'es_ES', 'fr_FR'));

/**
 * Include settings from /src/functions
*/
$dream_includes = array(
  "paths.php",
  "config.php",
  "cache.php",
  "performance.php",
  "block-helpers.php",
  "template-helpers.php",
  "menus.php",
  "theme-support.php",
  "customizer.php",
  "gzip.php",
  "bootstrap-loader.php",
  "pattern-loader.php",
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

// TODO: Build plugin for Gutenberg Pattern Asset Management
//       Add metadata system to attach CSS/JS to pattern JSON exports with conditional loading.
//       As of Oct 2025, no existing plugin provides this (GitHub issue #61881 still open).
//       Better suited as editor-level feature than theme implementation.
