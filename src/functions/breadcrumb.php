<?php

/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 * @link https://www.codexworld.com/wordpress-how-to-display-breadcrumb-without-plugin/
 */
function get_breadcrumb() {
  $delimiter = '&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
  $home = 'Home'; // Text for the 'Home' link
  $before = '<span>';
  $after = '</span>';

  if (!is_home() && !is_front_page() || is_paged()) {

    global $post;

    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
      echo $delimiter;
      the_category(' &bull; ');
      if (is_single()) {
        echo $delimiter;
        the_title();
      }
    }  elseif (is_page() && !$post->post_parent)  {
      echo $delimiter;
      echo the_title();
    } elseif (is_page() && $post->post_parent) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();

      while ($parent_id) {
        $page = get_post($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }

      $breadcrumbs = array_reverse($breadcrumbs);

      foreach ($breadcrumbs as $crumb) {
        echo $delimiter . $crumb . $delimiter;
      }

      echo $before . get_the_title() . $after;
    } elseif (is_search()) {
      echo $delimiter . "Search Results for... ";
      echo '"<em>';
      echo the_search_query();
      echo '</em>"';
    }

  }

}
