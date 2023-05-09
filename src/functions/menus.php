<?php

/**
 * Primary
 */
if( !wp_get_nav_menu_object( 'Primary' )) {
  $menu_id = wp_create_nav_menu('Primary');

  // Add Primary Menu Items
//  wp_update_nav_menu_item($menu_id, 0, array(
//      'menu-item-title' =>  __(''),
//      'menu-item-classes' => '',
//      'menu-item-url' => home_url( '' ),
//      'menu-item-status' => 'publish')
//  );

  if( !has_nav_menu( 'primary' ) ){
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

}

/**
 * Secondary
 */
if( !wp_get_nav_menu_object( 'Secondary' )) {
  $menu_id = wp_create_nav_menu('Secondary');

  // Add Secondary Menu Items
//  wp_update_nav_menu_item($menu_id, 0, array(
//      'menu-item-title' =>  __(''),
//      'menu-item-classes' => '',
//      'menu-item-url' => home_url( '' ),
//      'menu-item-status' => 'publish')
//  );

  if( !has_nav_menu( 'secondary' ) ){
    $locations = get_theme_mod('nav_menu_locations');
    $locations['secondary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

}

/**
 * Social
 */
if( !wp_get_nav_menu_object( 'Social' )) {
  $menu_id = wp_create_nav_menu('Social');

  // Add Social Menu Items
  wp_update_nav_menu_item($menu_id, 0, array(
      'menu-item-title' => 'fab fa-facebook-square',
      'menu-item-classes' => 'fab fa-facebook-square',
      'menu-item-url' => 'https://www.facebook.com/',
      'menu-item-status' => 'publish')
  );

  wp_update_nav_menu_item($menu_id, 0, array(
      'menu-item-title' => 'fab fa-twitter-square',
      'menu-item-classes' => 'fab fa-twitter-square',
      'menu-item-url' => 'http://twitter.com/',
      'menu-item-status' => 'publish')
  );

  wp_update_nav_menu_item($menu_id, 0, array(
      'menu-item-title' => 'fab fa-instagram-square',
      'menu-item-classes' => 'fab fa-instagram-square',
      'menu-item-url' => 'https://www.instagram.com/',
      'menu-item-status' => 'publish')
  );

  if( !has_nav_menu( 'social' ) ){
    $locations = get_theme_mod('nav_menu_locations');
    $locations['social'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }

}

/**
 * Utility
 */
if( !wp_get_nav_menu_object( 'Utility' )) {
  $menu_id = wp_create_nav_menu('Utility');

  // Add Social Menu Items
//  wp_update_nav_menu_item($menu_id, 0, array(
//      'menu-item-title' =>  __(''),
//      'menu-item-classes' => '',
//      'menu-item-url' => home_url( '' ),
//      'menu-item-status' => 'publish')
//  );

  if( !has_nav_menu( 'utility' ) ){
    $locations = get_theme_mod('nav_menu_locations');
    $locations['utility'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }
}

/**
 * Footer
 */
if( !wp_get_nav_menu_object( 'Footer' )) {
  $menu_id = wp_create_nav_menu('Footer');

  // Add Footer Menu Items
//  wp_update_nav_menu_item($menu_id, 0, array(
//      'menu-item-title' =>  __(''),
//      'menu-item-classes' => '',
//      'menu-item-url' => home_url( '' ),
//      'menu-item-status' => 'publish')
//  );

  if( !has_nav_menu( 'footer' ) ){
    $locations = get_theme_mod('nav_menu_locations');
    $locations['footer'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
  }
}
