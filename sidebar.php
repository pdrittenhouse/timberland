<?php
/**
 * The Template for the sidebar containing the main widget area
 *
 * @package  WordPress
 * @subpackage  Timber
 */
//$context = Timber::context();
//$context['post'] = new Timber\Post();
//$context['primary_sidebar'] = Timber::get_widgets('primary_sidebar');
//$context['secondary_sidebar'] = Timber::get_widgets('secondary_sidebar');
//$context['tertiary_sidebar'] = Timber::get_widgets('tertiary_sidebar');
//if (class_exists('ACF')) {
//  $context['selected_sidebar'] = get_field('default_sidebar', 'option');
//}
//
//Timber::render( array( 'partials/content/sidebar.twig' ), $context );

$context = Timber::context();
$context['post'] = new Timber\Post();

// Define the cache keys for each sidebar
$primary_sidebar_cache_key = 'primary_sidebar_cache';
$secondary_sidebar_cache_key = 'secondary_sidebar_cache';
$tertiary_sidebar_cache_key = 'tertiary_sidebar_cache';

// Attempt to retrieve cached output for each sidebar
$primary_sidebar = get_transient($primary_sidebar_cache_key);
$secondary_sidebar = get_transient($secondary_sidebar_cache_key);
$tertiary_sidebar = get_transient($tertiary_sidebar_cache_key);

// If cached output exists for all sidebars, use it
if ($primary_sidebar !== false && $secondary_sidebar !== false && $tertiary_sidebar !== false) {
  $context['primary_sidebar'] = $primary_sidebar;
  $context['secondary_sidebar'] = $secondary_sidebar;
  $context['tertiary_sidebar'] = $tertiary_sidebar;
} else {
  // If cached output doesn't exist, render the sidebars and cache the output
  $context['primary_sidebar'] = Timber::get_widgets('primary_sidebar');
  $context['secondary_sidebar'] = Timber::get_widgets('secondary_sidebar');
  $context['tertiary_sidebar'] = Timber::get_widgets('tertiary_sidebar');

  // Cache the output of each sidebar for a specific duration (e.g., 1 hour)
  set_transient($primary_sidebar_cache_key, $context['primary_sidebar'], CACHE_EXPIRATION_TIME);
  set_transient($secondary_sidebar_cache_key, $context['secondary_sidebar'], CACHE_EXPIRATION_TIME);
  set_transient($tertiary_sidebar_cache_key, $context['tertiary_sidebar'], CACHE_EXPIRATION_TIME);
}

// Render the sidebar template with the cached or freshly retrieved data
Timber::render('partials/content/sidebar.twig', $context);
