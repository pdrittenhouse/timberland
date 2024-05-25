<?php

function requireEndpointAuthentication($result) {
  // Enable WordPress API endpoint authentication
  $restrictEndpoints = false;

  // Get the current REST request.
  $current_route = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

  // Define the routes that should be accessible even if the user is logged out.
  $open_routes = [
    home_url('/wp-json/wp/v2/posts'),
//    home_url('/wp-json/wp/v2/posts/<id>/revisions'),
    home_url('/wp-json/wp/v2/categories'),
    home_url('/wp-json/wp/v2/tags'),
    home_url('/wp-json/wp/v2/pages'),
//    home_url('/wp-json/wp/v2/pages/<id>/revisions'),
    home_url('/wp-json/wp/v2/comments'),
    home_url('/wp-json/wp/v2/taxonomies'),
    home_url('/wp-json/wp/v2/media'),
//    home_url('/wp-json/wp/v2/users'),
    home_url('/wp-json/wp/v2/types'),
//    home_url('/wp-json/wp/v2/statuses'),
//    home_url('/wp-json/wp/v2/settings'),
//    home_url('/wp-json/wp/v2/themes'),
    home_url('/wp-json/wp/v2/search'),
//    home_url('/wp-json/wp/v2/block-types'),
//    home_url('/wp-json/wp/v2/blocks'),
//    home_url('/wp-json/wp/v2/blocks/<id>/autosaves/'),
//    home_url('/wp-json/wp/v2/block-renderer'),
//    home_url('/wp-json/wp/v2/block-directory/search'),
//    home_url('/wp-json/wp/v2/plugins'),
  ];

  if ($restrictEndpoints === true) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if (true === $result || is_wp_error($result)) {
      return $result;
    }

    // Check if the current route is one of the open routes.
    foreach ($open_routes as $route) {
      if (strpos(parse_url($route, PHP_URL_PATH), parse_url($current_route, PHP_URL_PATH)) !== false) {
        return $result;
      }
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if (!is_user_logged_in()) {
      $error = new WP_Error(
        'rest_not_logged_in',
        __('You are not currently logged in.'),
        array('status' => 401)
      );
      return $error;
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
  }
}
add_filter( 'rest_authentication_errors', 'requireEndpointAuthentication', 0, 2);
