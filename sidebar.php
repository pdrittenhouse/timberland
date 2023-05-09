<?php
/**
 * The Template for the sidebar containing the main widget area
 *
 * @package  WordPress
 * @subpackage  Timber
 */
$context = Timber::context();
$context['post'] = new Timber\Post();
$context['primary_sidebar'] = Timber::get_widgets('primary_sidebar');
$context['secondary_sidebar'] = Timber::get_widgets('secondary_sidebar');
$context['tertiary_sidebar'] = Timber::get_widgets('tertiary_sidebar');
if (class_exists('ACF')) {
  $context['selected_sidebar'] = get_field('default_sidebar', 'option');
}

Timber::render( array( 'partials/content/sidebar.twig' ), $context );
