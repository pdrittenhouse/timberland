<?php

/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 * @link https://www.codexworld.com/wordpress-how-to-display-breadcrumb-without-plugin/
 * @usage show_breadcrumb();
 * @usage {{ function('show_breadcrumb') }}
 */
function show_breadcrumb($label = '', $delimiter = '&nbsp;&nbsp;&#187;&nbsp;&nbsp;', $showCategory = false, $home = 'Home', $error = '404', $before = '<span class="current">', $after = '</span>' ) {
  $homeLink = home_url();

  // TODO: Add custom parent for posts/pages

  if (!is_home() && !is_front_page() || is_paged()) {

    global $post;

    echo '<a href="'. $homeLink .'" rel="nofollow">' . $home . '</a>';
    if (is_category()) {
      // Category
      echo $delimiter . ' ';

      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      // $parentCat = get_category($thisCat->parent);

      if ($thisCat->parent != 0) {
        $cat_parent_id = $thisCat->category_parent;
        $parents = array();
        while ($cat_parent_id) {
          $category = get_category($cat_parent_id);
          $parents[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
          $cat_parent_id = $category->parent;
        }
        $parents = array_reverse($parents);
        foreach ($parents as $parent) {
          echo $parent . ' ' . $delimiter . ' ';
        }
      }

      echo $before . $label . single_cat_title('', false) . $after;
    } elseif (is_tag()) {
      // Tag

      echo $delimiter . ' ';
      echo $before . $label . single_tag_title('', false) . $after;

    } elseif (is_day()) {
      // Day Archive

      echo $delimiter . ' ';
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . $label . get_the_time('d') . $after;

    } elseif (is_month()) {
      // Month Archive

      echo $delimiter . ' ';
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . $label . get_the_time('F') . $after;

    } elseif (is_year()) {
      // Year Archive

      echo $delimiter . ' ';
      echo $before . $label . get_the_time('Y') . $after;

    } elseif (is_single() && !is_attachment()) {
      // Post
      echo $delimiter . ' ';

      if (get_post_type() != 'post') {

        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;

        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;

      } else {
        $cats = get_the_category();

        if ($showCategory === true && !empty($cats)) {
//          $cat = $cats[0];

          $counter = 0;
          foreach ($cats as $cat) {
            echo '<a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a>';
            if( $counter !== count( $cats ) - 1) {
              echo ',';
            }
            $counter = $counter + 1;
          }

//          echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          echo $delimiter . ' ';
        }

        echo $before . $label . get_the_title() . $after;

      }

    } elseif (is_attachment()) {
      // Attachments
      echo $delimiter . ' ';

      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID);

      if ($showCategory === true && !empty($cat)) {
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      }

      if ($parent->post_title !== get_the_title()) {
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      }

      echo $before . $label . get_the_title() . $after;

    } elseif (is_page()) {
      // Page
      echo $delimiter . ' ';

      $parent_id  = $post->post_parent;

      if ($parent_id) {
        $breadcrumbs = array();

        while ($parent_id) {
          $page = get_post($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);

        foreach ($breadcrumbs as $crumb) {
          echo $crumb . ' ' . $delimiter . ' ';
        }
      }

      echo $before . $label . get_the_title() . $after;
    } elseif (is_search()) {
      // Search

      echo $delimiter . ' ';
      echo $before . $label . get_search_query() . $after;

    } elseif (is_author()) {

      global $author;

      echo $delimiter . ' ';
      echo $before . $label . $author->display_name . $after;

    } elseif (is_404()) {

      echo $delimiter . ' ';
      echo $before . $label . $error . $after;

    }

  }

  // Paging
  if (get_query_var('paged')) {

    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
      echo ' (';
    }

    echo __('Page') . ' ' . get_query_var('paged');

    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
      echo ')';
    }

  }

}


function get_breadcrumb($showCategory = false, $home = 'Home', $error = '404' ) {
  $homeLink = home_url();

  $homeLink = (object) [
    'text' => $homeLink,
    'url' => $home
  ];

  $breadcrumbList = [$homeLink];

  // TODO: Add custom parent for posts/pages

  if (!is_home() && !is_front_page() || is_paged()) {

    global $post;

    if (is_category()) {
      // Category
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      // $parentCat = get_category($thisCat->parent);

      if ($thisCat->parent != 0) {
        $cat_parent_id = $thisCat->category_parent;
        $parents = array();
        while ($cat_parent_id) {
          $category = get_category($cat_parent_id);
          $parents[] = (object) [
            'text' => $category->name,
            'url' => get_category_link($category->term_id)
          ];
          $cat_parent_id = $category->parent;
        }
        $parents = array_reverse($parents);
        foreach ($parents as $parent) {
          array_push($breadcrumbList, $parent);
        }
      }

      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
              $item = (object) [
                'text' => single_cat_title('', false) . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
              ];
        } else {
              $item = (object) [
                'text' => single_cat_title('', false) . __('Page') . ' ' . get_query_var('paged'),
              ];
        }
      } else {
        $item = (object) [
          'text' => single_cat_title('', false),
        ];
      }

      array_push($breadcrumbList, $item);
    } elseif (is_tag()) {
      // Tag

      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
          $item = (object) [
            'text' => single_tag_title('', false) . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
          ];
        } else {
          $item = (object) [
            'text' => single_tag_title('', false) . __('Page') . ' ' . get_query_var('paged'),
          ];
        }
      } else {
        $item = (object) [
          'text' => single_tag_title('', false),
        ];
      }

      array_push($breadcrumbList, $item);

    } elseif (is_day()) {
      // Day Archive
      $year = (object) [
        'text' => get_the_time('Y'),
        'url' => get_year_link(get_the_time('Y'))
      ];

      $month = (object) [
        'text' => get_the_time('F'),
        'url' => get_month_link(get_the_time('Y'),get_the_time('m'))
      ];

      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
          $day = (object) [
            'text' => get_the_time('d') . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
          ];
        } else {
          $day = (object) [
            'text' => get_the_time('d') . __('Page') . ' ' . get_query_var('paged'),
          ];
        }
      } else {
        $day = (object) [
          'text' => get_the_time('d'),
        ];
      }

      array_push($breadcrumbList, $year, $month, $day);

    } elseif (is_month()) {
      // Month Archive
      $year = (object) [
        'text' => get_the_time('Y'),
        'url' => get_year_link(get_the_time('Y'))
      ];

      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
          $month = (object) [
            'text' => get_the_time('F') . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
          ];
        } else {
          $month = (object) [
            'text' => get_the_time('F') . __('Page') . ' ' . get_query_var('paged'),
          ];
        }
      } else {
        $month = (object) [
          'text' => get_the_time('F'),
        ];
      }

      array_push($breadcrumbList, $year, $month);

    } elseif (is_year()) {
      // Year Archive
      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
          $year = (object) [
            'text' => get_the_time('Y') . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
          ];
        } else {
          $year = (object) [
            'text' => get_the_time('Y') . __('Page') . ' ' . get_query_var('paged'),
          ];
        }
      } else {
        $year = (object) [
          'text' => get_the_time('Y'),
        ];
      }

      array_push($breadcrumbList, $year);

    } elseif (is_single() && !is_attachment()) {
      // Post

      if (get_post_type() != 'post') {

        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;

        $parent = (object) [
          'text' => $post_type->labels->singular_name,
          'url' => $homeLink . '/' . $slug['slug']
        ];

        $item = (object) [
          'text' => get_the_title(),
        ];

        array_push($breadcrumbList, $parent, $item);

      } else {
        $cats = get_the_category();

        if ($showCategory === true && !empty($cats)) {
//          $cat = $cats[0];
          foreach ($cats as $cat) {
            $catItem = (object) [
              'text' => $cat->name,
              'url' => get_category_link($cat->term_id)
            ];
            array_push($breadcrumbList, $catItem);
          }

//          echo get_category_parents($cat, FALSE, );
        }

        $item = (object) [
          'text' => get_the_title()
        ];
        array_push($breadcrumbList, $item);

      }

    } elseif (is_attachment()) {
      // Attachments

      $parent = get_post($post->post_parent);
      $cats = get_the_category($parent->ID);

      if ($showCategory === true && !empty($cats)) {
//        $cat = $cat[0];

        foreach ($cats as $cat) {
          $catItem = (object) [
            'text' => $cat->name,
            'url' => get_category_link($cat->term_id)
          ];
          array_push($breadcrumbList, $catItem);
        }

//        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      }

      if ($parent->post_title !== get_the_title()) {
        $parentItem = (object) [
          'text' => $parent->post_title,
          'url' =>  get_permalink($parent)
        ];
        array_push($breadcrumbList, $parentItem);
//        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      }

      $item = (object) [
        'text' => get_the_title()
      ];
      array_push($breadcrumbList, $item);

//      echo $before . $label . get_the_title() . $after;

    } elseif (is_page()) {
      // Page
      $parent_id  = $post->post_parent;

      if ($parent_id) {
        $breadcrumbs = array();

        while ($parent_id) {
          $page = get_post($parent_id);
          $breadcrumbs[] = (object) [
            'text' => get_the_title($page->ID),
            'url' => get_permalink($page->ID)
          ];
          $parent_id  = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);

        foreach ($breadcrumbs as $crumb) {
          array_push($breadcrumbList, $crumb);
        }
      }

      $item = (object) [
        'text' => get_the_title(),
      ];

      array_push($breadcrumbList, $item);
    } elseif (is_search()) {
      // Search
      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
          $item = (object) [
            'text' => get_search_query() . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
          ];
        } else {
          $item = (object) [
            'text' => get_search_query() . __('Page') . ' ' . get_query_var('paged'),
          ];
        }
      } else {
        $item = (object) [
          'text' => get_search_query(),
        ];
      }

      array_push($breadcrumbList, $item);

    } elseif (is_author()) {

      global $author;

      if (get_query_var('paged')) { // Paging
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
          $item = (object) [
            'text' => $author->display_name . ' (' .  __('Page') . ' ' . get_query_var('paged') . ')',
          ];
        } else {
          $item = (object) [
            'text' => $author->display_name . __('Page') . ' ' . get_query_var('paged'),
          ];
        }
      } else {
        $item = (object) [
          'text' => $author->display_name,
        ];
      }

      array_push($breadcrumbList, $item);

    } elseif (is_404()) {

      $item = (object) [
        'text' => $error,
      ];

      array_push($breadcrumbList, $item);

    }

  }

  return $breadcrumbList;

}
