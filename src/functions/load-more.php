<?php

// @link: https://weichie.com/blog/load-more-posts-ajax-wordpress/

function dream_post_loop_load_more()
{
    // Enqueue Bootstrap components used in AJAX-loaded card patterns
    enqueue_bootstrap_component('card');

    $rendered_posts = !empty($_POST['posts_per_page']) ? absint($_POST['posts_per_page']) : absint(get_option('posts_per_page'));
    $display_posts = !empty($_POST['posts_per_page']) ? $rendered_posts : 0;
    $load_posts = !empty($_POST['load_posts']) ? absint($_POST['load_posts']) : $rendered_posts;
    $offset = !empty($_POST['offset']) ? absint($_POST['offset']) : 0;
    $page = absint($_POST['paged']);

    if (!empty($_POST['load_posts'])) {
        $display_posts = $load_posts;
    }

    if (absint($_POST['paged']) <= 2) {
        $offset = $offset + $rendered_posts;
    } else {
        $offset = $offset + $rendered_posts + ($load_posts * ($page - 2));
    }

    $ajaxpostargs = [
        'paged' => isset($_POST['paged']) ? absint($_POST['paged']) : '',
        'page' => isset($_POST['paged']) ? absint($_POST['paged']) : '',
        'post_type' => isset($_POST['post_type']) ? $_POST['post_type'] : [],
        'order' => isset($_POST['order']) ? $_POST['order'] : '',
        'order_by' => isset($_POST['order_by']) ? $_POST['order_by'] : '',
        'ignore_sticky_posts' => isset($_POST['ignore_sticky_posts']) && ($_POST['ignore_sticky_posts'] === 'true') ? true : false,
        // 'posts_per_page' => isset($_POST['posts_per_page']) ? absint($_POST['posts_per_page']) : 0,
        'posts_per_page' => $display_posts,
        'posts_per_archive_page' => isset($_POST['posts_per_archive_page']) ? absint($_POST['posts_per_archive_page']) : '',
        'nopaging' => isset($_POST['nopaging']) && ($_POST['nopaging'] === 'true') ? true : false,
        // 'offset' => isset($_POST['offset']) ? $_POST['offset'] : '',
        'offset' => $offset,
        'post_parent_in' => isset($_POST['post_parent_in']) ? absint($_POST['post_parent_in']) : [],
        'post_parent_not_in' => isset($_POST['post_parent_not_in']) ? $_POST['post_parent_not_in'] : [],
        'year' => isset($_POST['year']) ? $_POST['year'] : '',
        'monthnum' => isset($_POST['monthnum']) ? $_POST['monthnum'] : '',
        'w' => isset($_POST['w']) ? $_POST['w'] : '',
        'day' => isset($_POST['day']) ? $_POST['day'] : '',
        'hour' => isset($_POST['hour']) ? $_POST['hour'] : '',
        'minute' => isset($_POST['minute']) ? $_POST['minute'] : '',
        'second' => isset($_POST['second']) ? $_POST['second'] : '',
        'm' => isset($_POST['m']) ? $_POST['m'] : '',
        'date_query' => isset($_POST['date_query']) ? $_POST['date_query'] : [],
        'meta_key' => isset($_POST['meta_key']) ? $_POST['meta_key'] : '',
        'meta_value' => isset($_POST['meta_value']) ? $_POST['meta_value'] : '',
        'meta_value_num' => isset($_POST['meta_value_num']) ? $_POST['meta_value_num'] : '',
        'meta_compare' => isset($_POST['meta_compare']) ? $_POST['meta_compare'] : '',
        'meta_query' => isset($_POST['meta_query']) ? $_POST['meta_query'] : [],
        'tax_query' => isset($_POST['tax_query']) ? $_POST['tax_query'] : [],
        'category_in' => isset($_POST['category_in']) ? $_POST['category_in'] : [],
        'category_not_in' => isset($_POST['category_not_in']) ? $_POST['category_not_in'] : [],
        'tag_in' => isset($_POST['tag_in']) ? $_POST['tag_in'] : [],
        'tag_not_in' => isset($_POST['tag_not_in']) ? $_POST['tag_not_in'] : [],
        'author_in' => isset($_POST['author_in']) ? $_POST['author_in'] : [],
        'author_not_in' => isset($_POST['author_not_in']) ? $_POST['author_not_in'] : [],
        'comment_count' => isset($_POST['comment_count']) ? $_POST['comment_count'] : '',
        'post_status' => !empty($_POST['post_status']) ? $_POST['post_status'] : 'publish',
        'has_password' => isset($_POST['has_password']) && ($_POST['has_password'] === 'true') ? true : false,
        'post_password' => isset($_POST['post_password']) ? $_POST['post_password'] : '',
        'post_mime_type' => isset($_POST['post_mime_type']) ? $_POST['post_mime_type'] : '',
        'perm' => isset($_POST['perm']) ? $_POST['perm'] : '',
        's' => isset($_POST['s']) ? $_POST['s'] : '',
        'exact' => isset($_POST['exact']) && ($_POST['exact'] === 'true') ? true : false,
        'sentence' => isset($_POST['sentence']) && ($_POST['sentence'] === 'true') ? true : false,
        'post_in' => isset($_POST['post_in']) ? $_POST['post_in'] : [],
    ];

    $pattern = $_POST['pattern'];
    $pattern_path = $_POST['pattern_path'];


    $ajaxposts = new Timber\PostQuery($ajaxpostargs);

    $response = [];
    $max_pages = ($ajaxpostargs['posts_per_page'] * $ajaxpostargs['paged']);

    foreach ($ajaxposts as $post) {

        $context = [
            'parent' => isset($_POST['parent']) ? $_POST['parent'] : '',
            'card' => isset($_POST['card']) ? $_POST['card'] : '',
            'link_items' => isset($_POST['link_items']) ? 'true' : 'false',
            'elements' => isset($_POST['elements']) ? $_POST['elements'] : '',
            'element_excerpt' => isset($_POST['element_excerpt']) ? $_POST['element_excerpt'] : '',
            'element_author' => isset($_POST['element_author']) ? $_POST['element_author'] : '',
            'element_date' => isset($_POST['element_date']) ? $_POST['element_date'] : '',
            'element_modified' => isset($_POST['element_modified']) ? $_POST['element_modified'] : '',
            'element_post_parent' => isset($_POST['element_post_parent']) ? $_POST['element_post_parent'] : '',
            'element_children' => isset($_POST['element_children']) ? $_POST['element_children'] : '',
            'element_post_type' => isset($_POST['element_post_type']) ? $_POST['element_post_type'] : '',
            'element_comment_count' => isset($_POST['element_comment_count']) ? $_POST['element_comment_count'] : '',
            'element_link' => isset($_POST['element_link']) ? 'true' : 'false',
            'element_terms' => isset($_POST['element_terms']) ? $_POST['element_terms'] : '',
            'element_categories' => isset($_POST['element_categories']) ? $_POST['element_categories'] : '',
            'element_tags' => isset($_POST['element_tags']) ? $_POST['element_tags'] : '',
            'card_footer_layout' => isset($_POST['card_footer_layout']) ? $_POST['card_footer_layout'] : '',
            'card_back_layout' => isset($_POST['card_back_layout']) ? $_POST['card_back_layout'] : '',
            'card_featured_image' => isset($_POST['card_featured_image']) ? $_POST['card_featured_image'] : '',
            'title' => $post->title(),
            'content' => $post->content(),
            'authors' => $post->authors(),
            'date' => $post->date(),
            'modified_date' => $post->modified_date(),
            'type' => $post->type(),
            'post_type' => $post->post_type(),
            'comment_count' => $post->comment_count(),
            'terms' => $post->terms(),
            'categories' => $post->categories(),
            'tags' => $post->tags(),
            'parent' => $post->parent(),
            'children' => $post->children(),
            'link' => $post->link(),
            'post_title' => $post->post_title(),
            'ID' => $post->ID(),
            'modified_author' => $post->modified_author(),
            'preview' => $post->preview(),
            'thumbnail' => $post->thumbnail(),
            'post' => $post,
            'grid_type' => isset($_POST['grid_type']) ? $_POST['grid_type'] : ''
        ];

        $rendered = Timber::compile_string(
            "{# Set custom card styles #}
            {% set card_bg_color = card.card_bg_color['bg_color'] == 'custom' and card.card_bg_color['bg_custom_color'] ? 'background-color: ' ~ card.card_bg_color['bg_custom_color'] ~ ';' %}
            
            {% if card.remove_card_border != true %}
              {% set card_border_top_width = card.card_border['top']['width'] is not empty ? 'border-top-width: ' ~ card.card_border['top']['width'] ~ 'px;' %}
              {% set card_border_top_style = card.card_border['top']['style'] ? 'border-top-style: ' ~ card.card_border['top']['style'] ~ ';' %}
              {% set card_border_top_color = card.card_border['top']['color'] == 'custom' and card.card_border['top']['custom_color'] ? 'border-top-color: ' ~ card.card_border['top']['custom_color'] ~ ';' : card.card_border['top']['color'] == 'palette' and card.card_border['top']['theme_color'] ? 'border-top-color: var(--' ~ card.card_border['top']['theme_color'] ~ ');' %}
              {% set card_border_bottom_width = card.card_border['bottom']['width'] is not empty ? 'border-bottom-width: ' ~ card.card_border['bottom']['width'] ~ 'px;' %}
              {% set card_border_bottom_style = card.card_border['bottom']['style'] ? 'border-bottom-style: ' ~ card.card_border['bottom']['style'] ~ ';' %}
              {% set card_border_bottom_color = card.card_border['bottom']['color'] == 'custom' and card.card_border['bottom']['custom_color'] ? 'border-bottom-color: ' ~ card.card_border['bottom']['custom_color'] ~ ';' : card.card_border['bottom']['color'] == 'palette' and card.card_border['bottom']['theme_color'] ? 'border-bottom-color: var(--' ~ card.card_border['bottom']['theme_color'] ~ ');' %}
              {% set card_border_left_width = card.card_border['left']['width'] is not empty ? 'border-left-width: ' ~ card.card_border['left']['width'] ~ 'px;' %}
              {% set card_border_left_style = card.card_border['left']['style'] ? 'border-left-style: ' ~ card.card_border['left']['style'] ~ ';' %}
              {% set card_border_left_color = card.card_border['left']['color'] == 'custom' and card.card_border['left']['custom_color'] ? 'border-left-color: ' ~ card.card_border['left']['custom_color'] ~ ';' : card.card_border['left']['color'] == 'palette' and card.card_border['left']['theme_color'] ? 'border-left-color: var(--' ~ card.card_border['left']['theme_color'] ~ ');' %}
              {% set card_border_right_width = card.card_border['right']['width'] is not empty ? 'border-right-width: ' ~ card.card_border['right']['width'] ~ 'px;' %}
              {% set card_border_right_style = card.card_border['right']['style'] ? 'border-right-style: ' ~ card.card_border['right']['style'] ~ ';' %}
              {% set card_border_right_color = card.card_border['right']['color'] == 'custom' and card.card_border['right']['custom_color'] ? 'border-right-color: ' ~ card.card_border['right']['custom_color'] ~ ';' : card.card_border['right']['color'] == 'palette' and card.card_border['right']['theme_color'] ? 'border-right-color: var(--' ~ card.card_border['right']['theme_color'] ~ ');' %}
              {% set card_back_border_top_width = card.card_back_border['top']['width'] is not empty ? 'border-top-width: ' ~ card.card_back_border['top']['width'] ~ 'px;' %}
              {% set card_back_border_top_style = card.card_back_border['top']['style'] ? 'border-top-style: ' ~ card.card_back_border['top']['style'] ~ ';' %}
              {% set card_back_border_top_color = card.card_back_border['top']['color'] == 'custom' and card.card_back_border['top']['custom_color'] ? 'border-top-color: ' ~ card.card_back_border['top']['custom_color'] ~ ';' : card.card_back_border['top']['color'] == 'palette' and card.card_back_border['top']['theme_color'] ? 'border-top-color: var(--' ~ card.card_back_border['top']['theme_color'] ~ ');' %}
              {% set card_back_border_bottom_width = card.card_back_border['bottom']['width'] is not empty ? 'border-bottom-width: ' ~ card.card_back_border['bottom']['width'] ~ 'px;' %}
              {% set card_back_border_bottom_style = card.card_back_border['bottom']['style'] ? 'border-bottom-style: ' ~ card.card_back_border['bottom']['style'] ~ ';' %}
              {% set card_back_border_bottom_color = card.card_back_border['bottom']['color'] == 'custom' and card.card_back_border['bottom']['custom_color'] ? 'border-bottom-color: ' ~ card.card_back_border['bottom']['custom_color'] ~ ';' : card.card_back_border['bottom']['color'] == 'palette' and card.card_back_border['bottom']['theme_color'] ? 'border-bottom-color: var(--' ~ card.card_back_border['bottom']['theme_color'] ~ ');' %}
              {% set card_back_border_left_width = card.card_back_border['left']['width'] is not empty ? 'border-left-width: ' ~ card.card_back_border['left']['width'] ~ 'px;' %}
              {% set card_back_border_left_style = card.card_back_border['left']['style'] ? 'border-left-style: ' ~ card.card_back_border['left']['style'] ~ ';' %}
              {% set card_back_border_left_color = card.card_back_border['left']['color'] == 'custom' and card.card_back_border['left']['custom_color'] ? 'border-left-color: ' ~ card.card_back_border['left']['custom_color'] ~ ';' : card.card_back_border['left']['color'] == 'palette' and card.card_back_border['left']['theme_color'] ? 'border-left-color: var(--' ~ card.card_back_border['left']['theme_color'] ~ ');' %}
              {% set card_back_border_right_width = card.card_back_border['right']['width'] is not empty ? 'border-right-width: ' ~ card.card_back_border['right']['width'] ~ 'px;' %}
              {% set card_back_border_right_style = card.card_back_border['right']['style'] ? 'border-right-style: ' ~ card.card_back_border['right']['style'] ~ ';' %}
              {% set card_back_border_right_color = card.card_back_border['right']['color'] == 'custom' and card.card_back_border['right']['custom_color'] ? 'border-right-color: ' ~ card.card_back_border['right']['custom_color'] ~ ';' : card.card_back_border['right']['color'] == 'palette' and card.card_back_border['right']['theme_color'] ? 'border-right-color: var(--' ~ card.card_back_border['right']['theme_color'] ~ ');' %}
            {% endif %}

            {% set card_text_color = card.card_text_color['color'] == 'custom' and card.card_text_color['custom_color'] ? 'color: ' ~ card.card_text_color['custom_color'] ~ ';' %}
            {% set card_back_bg_color = card.back_bg_color['bg_color'] == 'custom' ? 'background-color: ' ~ card.back_bg_color['bg_custom_color'] ~ ';' %}
            {% set card_back_border_color = card.back_border_color['color'] == 'custom' ? 'border-color: ' ~ card.back_border_color['custom_color'] ~ ';' %}
            {% set card_back_text_color = card.back_text_color['color'] == 'custom' ? 'color: ' ~ card.back_text_color['custom_color'] ~ ';' %}
            {% set card_width = card.width.width['width']['value'] is not empty ? 'width: ' ~ card.width.width['width']['value']  ~ card.width.width['width']['unit'] ~  ';' %}
            {% set card_min_width = card.width.width['min_width'] is not empty ? 'min-width: ' ~ card.width.width['min_width']  ~ 'px;' %}
            {% set card_max_width = card.width.width['max_width'] is not empty ? 'max-width: ' ~ card.width.width['max_width']  ~ 'px;' %}
            {% set card_height = card.height.height['height']['value'] is not empty ? 'height: ' ~ card.height.height['height']['value']  ~ card.height.height['height']['unit'] ~  ';' %}
            {% set card_min_height = card.height.height['min_height'] is not empty ? 'min-height: ' ~ card.height.height['min_height']  ~ 'px;' %}
            {% set card_max_height = card.height.height['max_height'] is not empty ? 'max-height: ' ~ card.height.height['max_height']  ~ 'px;' %}
            {% set card_margin_top = parent['name'] != 'acf/card-grid' and card.margin['margin']['top']['auto'] == 'true' ? 'margin-top: auto;' : parent['name'] != 'acf/card-grid' and card.margin['margin']['top']['top'] is not empty ? 'margin-top: ' ~ card.margin['margin']['top']['top'] ~ 'px;' %}
            {% set card_margin_bottom = parent['name'] != 'acf/card-grid' and card.margin['margin']['bottom']['auto'] == 'true' ? 'margin-bottom: auto;' : parent['name'] != 'acf/card-grid' and card.margin['margin']['bottom']['bottom'] is not empty ? 'margin-bottom: ' ~ card.margin['margin']['bottom']['bottom'] ~ 'px;' %}
            {% set card_margin_left = parent['name'] != 'acf/card-grid' and card.margin['margin']['left']['auto'] == 'true' ? 'margin-left: auto;' : parent['name'] != 'acf/card-grid' and card.margin['margin']['left']['left'] is not empty ? 'margin-left: ' ~ card.margin['margin']['left']['left'] ~ 'px;' %}
            {% set card_margin_right = parent['name'] != 'acf/card-grid' and card.margin['margin']['right']['auto'] == 'true' ? 'margin-right: auto;' : parent['name'] != 'acf/card-grid' and card.margin['margin']['right']['right'] is not empty ? 'margin-right: ' ~ card.margin['margin']['right']['right'] ~ 'px;' %}
            {% set card_padding_top  = card.card_padding['padding']['top'] is not empty ? 'padding-top: ' ~ card.card_padding['padding']['top'] ~ 'px;' %}
            {% set card_padding_bottom = card.card_padding['padding']['bottom'] is not empty ? 'padding-bottom: ' ~ card.card_padding['padding']['bottom'] ~ 'px;' %}
            {% set card_padding_left = card.card_padding['padding']['left'] is not empty ? 'padding-left: ' ~ card.card_padding['padding']['left'] ~ 'px;' %}
            {% set card_padding_right = card.card_padding['padding']['right'] is not empty ? 'padding-right: ' ~ card.card_padding['padding']['right'] ~ 'px;' %}
            {% set card_border_top_left_radius = card.card_border_radius['top_left'] is not empty ? 'border-top-left-radius: ' ~ card.card_border_radius['top_left'] ~ 'px;' %}
            {% set card_border_top_right_radius = card.card_border_radius['top_right'] is not empty ? 'border-top-right-radius: ' ~ card.card_border_radius['top_right'] ~ 'px;' %}
            {% set card_border_bottom_left_radius = card.card_border_radius['bottom_left'] is not empty ? 'border-bottom-left-radius: ' ~ card.card_border_radius['bottom_left'] ~ 'px;' %}
            {% set card_border_bottom_right_radius = card.card_border_radius['bottom_right'] is not empty ? 'border-bottom-right-radius: ' ~ card.card_border_radius['bottom_right'] ~ 'px;' %}
            {% set card_box_shadow_color = card.card_box_shadow['color']['color'] == 'palette' and card.card_box_shadow['color']['theme_color'] ? 'var(--' ~ card.card_box_shadow['color']['theme_color'] ~ ')' : card.card_box_shadow['color']['color'] == 'custom' and card.card_box_shadow['color']['custom_color'] ? card.card_box_shadow['color']['custom_color'] %}
            {% set card_box_shadow_inset = card.card_box_shadow['inset'] == 'true' ? 'inset' %}
            {% set card_box_shadow = card.card_box_shadow['horizontal_offset'] is not empty or card.card_box_shadow['vertical_offset'] is not empty or card.card_box_shadow['blur'] is not empty or card.card_box_shadow['spread'] is not empty or box_shadow_color or box_shadow_inset == 'true' ? 'box-shadow: ' ~ card.card_box_shadow['horizontal_offset'] ~ 'px ' ~ card.card_box_shadow['vertical_offset'] ~ 'px ' ~ card.card_box_shadow['blur'] ~ 'px ' ~ card.card_box_shadow['spread'] ~ 'px ' ~ box_shadow_color ~ ' ' ~ box_shadow_inset ~ ';' %}
            {% set card_back_border_top_left_radius = card.back_border_radius['top_left'] is not empty ? 'border-top-left-radius: ' ~ card.back_border_radius['top_left'] ~ 'px;' %}
            {% set card_back_border_top_right_radius = card.back_border_radius['top_right'] is not empty ? 'border-top-right-radius: ' ~ card.back_border_radius['top_right'] ~ 'px;' %}
            {% set card_back_border_bottom_left_radius = card.back_border_radius['bottom_left'] is not empty ? 'border-bottom-left-radius: ' ~ card.back_border_radius['bottom_left'] ~ 'px;' %}
            {% set card_back_border_bottom_right_radius = card.back_border_radius['bottom_right'] is not empty ? 'border-bottom-right-radius: ' ~ card.back_border_radius['bottom_right'] ~ 'px;' %}

            {# Background image styles #}
            {% set card_bg_image = card_featured_image == 'bg' and function('get_the_post_thumbnail_url', ID) ? function('get_the_post_thumbnail_url', ID) : card.card_bg_image['bg_image_type'] == 'file' and card.card_bg_image['bg_image']['url'] ? card.card_bg_image['bg_image']['url'] : card.card_bg_image['bg_image_type'] == 'url' and card.card_bg_image['bg_image_url'] ? card.card_bg_image['bg_image_url'] %}
            {% set card_bg_image_size = card.card_bg_image['bg_size'] == 'custom' and card.card_bg_image['custom_bg_size'] ? 'background-size: ' ~ card.card_bg_image['custom_bg_size'] ~ ';' : card.card_bg_image['bg_size'] ? 'background-size: ' ~ card.card_bg_image['bg_size'] ~ ';' %}
            {% set card_bg_hor_pos = card.card_bg_image['bg_horizontal_position'] == 'custom' ? card.card_bg_image['custom_bg_horizontal_position'] : card.card_bg_image['bg_horizontal_position'] ? card.card_bg_image['bg_horizontal_position'] %}
            {% set card_bg_ver_pos = card.card_bg_image['bg_vertical_position'] == 'custom' ? card.card_bg_image['custom_bg_vertical_position'] : card.card_bg_image['bg_vertical_position'] ? card.card_bg_image['bg_vertical_position'] %}
            {% set card_bg_position = card_bg_hor_pos or card_bg_ver_pos ? 'background-position: ' ~ card_bg_hor_pos ~ ' ' ~ card_bg_ver_pos ~ ';' %}
            {% set card_bg_repeat = card.card_bg_image['bg_repeat'] ? 'background-repeat: ' ~ card.card_bg_image['bg_repeat'] ~ ';' %}
            {% set card_bg_attachment = card.card_bg_image['bg_attachment'] ? 'background-attachment: ' ~ card.card_bg_image['bg_attachment'] ~ ';' %}

            {# Back background image styles #}
            {% set card_back_bg_image = card_featured_image == 'back' and function('get_the_post_thumbnail_url', ID) ? function('get_the_post_thumbnail_url', ID) : card.back_bg_image['bg_image_type'] == 'file' and card.back_bg_image['bg_image']['url'] ? card.back_bg_image['bg_image']['url'] : card.back_bg_image['bg_image_type'] == 'url' and card.back_bg_image['bg_image_url'] ? card.back_bg_image['bg_image_url'] %}
            {% set card_back_bg_image_size = card.back_bg_image['bg_size'] == 'custom' and card.back_bg_image['custom_bg_size'] ? 'background-size: ' ~ card.back_bg_image['custom_bg_size'] ~ ';' : card.back_bg_image['bg_size'] ? 'background-size: ' ~ card.back_bg_image['bg_size'] ~ ';' %}
            {% set card_back_bg_hor_pos = card.back_bg_image['bg_horizontal_position'] == 'custom' ? card.back_bg_image['custom_bg_horizontal_position'] : card.back_bg_image['bg_horizontal_position'] ? card.back_bg_image['bg_horizontal_position'] %}
            {% set card_back_bg_ver_pos = card.back_bg_image['bg_vertical_position'] == 'custom' ? card.back_bg_image['custom_bg_vertical_position'] : card.back_bg_image['bg_vertical_position'] ? card.back_bg_image['bg_vertical_position'] %}
            {% set card_back_bg_position = back_bg_hor_pos or back_bg_ver_pos ? 'background-position: ' ~ back_bg_hor_pos ~ ' ' ~ back_bg_ver_pos ~ ';' %}
            {% set card_back_bg_repeat = card.back_bg_image['bg_repeat'] ? 'background-repeat: ' ~ card.back_bg_image['bg_repeat'] ~ ';' %}
            {% set card_back_bg_attachment = card.back_bg_image['bg_attachment'] ? 'background-attachment: ' ~ card.back_bg_image['bg_attachment'] ~ ';' %}

            {# Set custom button styles #}
            {% if card.footer_button.close != 'black' and card.footer_button.close != 'white' and card.button.style == 'custom' %}
            {% set card_btn_bg_color = card.button.background_color['bg_color'] == 'custom' ? 'background-color: ' ~ card.button.background_color['bg_custom_color'] ~ ';' %}
            {% set card_btn_text_color = card.button.text_color['color'] == 'custom' ? 'color: ' ~ card.button.text_color['custom_color'] ~ ';' %}
            {% set card_btn_transform = card.button['text_transform']['text_transform'] ? 'text-transform: ' ~ card.button['text_transform']['text_transform'] ~ ';' %}
            {% set card_btn_padding_top  = card.button['padding']['padding']['top'] is not empty ? 'padding-top: ' ~ card.button['padding']['padding']['top'] ~ 'px;' %}
            {% set card_btn_padding_bottom = card.button['padding']['padding']['bottom'] is not empty ? 'padding-bottom: ' ~ card.button['padding']['padding']['bottom'] ~ 'px;' %}
            {% set card_btn_padding_left = card.button['padding']['padding']['left'] is not empty ? 'padding-left: ' ~ card.button['padding']['padding']['left'] ~ 'px;' %}
            {% set card_btn_padding_right = card.button['padding']['padding']['right'] is not empty ? 'padding-right: ' ~ card.button['padding']['padding']['right'] ~ 'px;' %}
            {% set card_btn_border_top_width = card.button['border']['top']['width'] is not empty ? 'border-top-width: ' ~ card.button['border']['top']['width'] ~ 'px;' %}
            {% set card_btn_border_top_style = card.button['border']['top']['style'] ? 'border-top-style: ' ~ card.button['border']['top']['style'] ~ ';' %}
            {% set card_btn_border_top_color = card.button['border']['top']['color'] == 'custom' and card.button['border']['top']['custom_color'] ? 'border-top-color: ' ~ card.button['border']['top']['custom_color'] ~ ';' : card.button['border']['top']['color'] == 'palette' and card.button['border']['top']['theme_color'] ? 'border-top-color: var(--' ~ card.button['border']['top']['theme_color'] ~ ');' %}
            {% set card_btn_border_bottom_width = card.button['border']['bottom']['width'] is not empty ? 'border-bottom-width: ' ~ card.button['border']['bottom']['width'] ~ 'px;' %}
            {% set card_btn_border_bottom_style = card.button['border']['bottom']['style'] ? 'border-bottom-style: ' ~ card.button['border']['bottom']['style'] ~ ';' %}
            {% set card_btn_border_bottom_color = card.button['border']['bottom']['color'] == 'custom' and card.button['border']['bottom']['custom_color'] ? 'border-bottom-color: ' ~ card.button['border']['bottom']['custom_color'] ~ ';' : card.button['border']['bottom']['color'] == 'palette' and card.button['border']['bottom']['theme_color'] ? 'border-bottom-color: var(--' ~ card.button['border']['bottom']['theme_color'] ~ ');' %}
            {% set card_btn_border_left_width = card.button['border']['left']['width'] is not empty ? 'border-left-width: ' ~ card.button['border']['left']['width'] ~ 'px;' %}
            {% set card_btn_border_left_style = card.button['border']['left']['style'] ? 'border-left-style: ' ~ card.button['border']['left']['style'] ~ ';' %}
            {% set card_btn_border_left_color = card.button['border']['left']['color'] == 'custom' and card.button['border']['left']['custom_color'] ? 'border-left-color: ' ~ card.button['border']['left']['custom_color'] ~ ';' : card.button['border']['left']['color'] == 'palette' and card.button['border']['left']['theme_color'] ? 'border-left-color: var(--' ~ card.button['border']['left']['theme_color'] ~ ');' %}
            {% set card_btn_border_right_width = card.button['border']['right']['width'] is not empty ? 'border-right-width: ' ~ card.button['border']['right']['width'] ~ 'px;' %}
            {% set card_btn_border_right_style = card.button['border']['right']['style'] ? 'border-right-style: ' ~ card.button['border']['right']['style'] ~ ';' %}
            {% set card_btn_border_right_color = card.button['border']['right']['color'] == 'custom' and card.button['border']['right']['custom_color'] ? 'border-right-color: ' ~ card.button['border']['right']['custom_color'] ~ ';' : card.button['border']['right']['color'] == 'palette' and card.button['border']['right']['theme_color'] ? 'border-right-color: var(--' ~ card.button['border']['right']['theme_color'] ~ ');' %}
            {% set card_btn_border_top_left_radius = card.button['border_radius']['top_left'] is not empty ? 'border-top-left-radius: ' ~ card.button['border_radius']['top_left'] ~ 'px;' %}
            {% set card_btn_border_top_right_radius = card.button['border_radius']['top_right'] is not empty ? 'border-top-right-radius: ' ~ card.button['border_radius']['top_right'] ~ 'px;' %}
            {% set card_btn_border_bottom_left_radius = card.button['border_radius']['bottom_left'] is not empty ? 'border-bottom-left-radius: ' ~ card.button['border_radius']['bottom_left'] ~ 'px;' %}
            {% set card_btn_border_bottom_right_radius = card.button['border_radius']['bottom_right'] is not empty ? 'border-bottom-right-radius: ' ~ card.button['border_radius']['bottom_right'] ~ 'px;' %}
            {% set card_btn_box_shadow_color = card.button['box_shadow']['color']['color'] == 'palette' and card.button['box_shadow']['color']['theme_color'] ? 'var(--' ~ card.button['box_shadow']['color']['theme_color'] ~ ')' : card.button['box_shadow']['color']['color'] == 'custom' and card.button['box_shadow']['color']['custom_color'] ? card.button['box_shadow']['color']['custom_color'] %}
            {% set card_btn_box_shadow_inset = card.button['box_shadow']['inset'] == 'true' ? 'inset' %}
            {% set card_btn_box_shadow = card.button['box_shadow']['horizontal_offset'] is not empty or card.button['box_shadow']['vertical_offset'] is not empty or card.button['box_shadow']['blur'] is not empty or card.button['box_shadow']['spread'] is not empty or btn_box_shadow_color or btn_box_shadow_inset ? 'box-shadow: ' ~ card.button['box_shadow']['horizontal_offset'] ~ 'px ' ~ card.button['box_shadow']['vertical_offset'] ~ 'px ' ~ card.button['box_shadow']['blur'] ~ 'px ' ~ card.button['box_shadow']['spread'] ~ 'px ' ~ btn_box_shadow_color ~ ' ' ~ btn_box_shadow_inset ~ ';' %}
            {% set card_btn_text_shadow_color = card.button['text_shadow']['color']['color'] == 'palette' and card.button['text_shadow']['color']['theme_color'] ? 'var(--' ~ card.button['text_shadow']['color']['theme_color'] ~ ')' : card.button['text_shadow']['color']['color'] == 'custom' and card.button['text_shadow']['color']['custom_color'] ? card.button['text_shadow']['color']['custom_color'] %}
            {% set card_btn_text_shadow = card.button['text_shadow']['horizontal_offset'] is not empty or card.button['text_shadow']['vertical_offset'] is not empty or card.button['text_shadow']['blur'] is not empty or btn_text_shadow_color ? 'text-shadow: ' ~ card.button['text_shadow']['horizontal_offset'] ~ 'px ' ~ card.button['text_shadow']['vertical_offset'] ~ 'px ' ~ card.button['text_shadow']['blur'] ~ 'px ' ~ btn_text_shadow_color ~ ';' %}
            {% endif %}
            {% set card_btn_fontsize = card.button['font_size']['font_size']['value'] is not empty ? 'font-size: ' ~ card.button['font_size']['font_size']['value'] ~ card.button['font_size']['font_size']['unit'] ~ ';' %}
            {% set card_btn_width = card.button.button_width.width['width']['value'] is not empty ? 'width: ' ~ card.button.button_width.width['width']['value']  ~ card.button.button_width.width['width']['unit'] ~  ';' %}
            {% set card_btn_min_width = card.button.button_width.width['min_width'] is not empty ? 'min-width: ' ~ card.button.button_width.width['min_width']  ~ 'px;' %}
            {% set card_btn_max_width = card.button.button_width.width['max_width'] is not empty ? 'max-width: ' ~ card.button.button_width.width['max_width']  ~ 'px;' %}
            {% set card_btn_margin_top = card.button.margin['margin']['top']['auto'] == 'true' ? 'margin-top: auto;' : card.button.margin['margin']['top']['top'] is not empty ? 'margin-top: ' ~ card.button.margin['margin']['top']['top'] ~ 'px;' %}
            {% set card_btn_margin_bottom = card.button.margin['margin']['bottom']['auto'] == 'true' ? 'margin-bottom: auto;' : card.button.margin['margin']['bottom']['bottom'] is not empty ? 'margin-bottom: ' ~ card.button.margin['margin']['bottom']['bottom'] ~ 'px;' %}
            {% set card_btn_margin_left = card.button.margin['margin']['left']['auto'] == 'true' ? 'margin-left: auto;' : card.button.margin['margin']['left']['left'] is not empty ? 'margin-left: ' ~ card.button.margin['margin']['left']['left'] ~ 'px;' %}
            {% set card_btn_margin_right = card.button.margin['margin']['right']['auto'] == 'true' ? 'margin-right: auto;' : card.button.margin['margin']['right']['right'] is not empty ? 'margin-right: ' ~ card.button.margin['margin']['right']['right'] ~ 'px;' %}

            {% set card_template = card.horizontal == 'true' ? '_card~horizontal.tpl.twig' : '_card.tpl.twig'  %}

            {%if grid_type == 'row' %}
                <div class=\"col\">
            {% endif %}

            {% embed \"@molecules/card/\" ~ card_template with {
                post: post,
                text_color: card.card_text_color['color'] == 'palette' and card.card_text_color['theme_color'] and card.flip_card != 'true' ? card.card_text_color['theme_color'],
                card_background: card.card_bg_color['bg_color'] == 'palette' and card.card_bg_color['bg_theme_color'] and card.flip_card != 'true' ? card.card_bg_color['bg_theme_color'],
                card_border: card.card_border_color['color'] == 'palette' and card.card_border_color['theme_color'] and card.flip_card != 'true' ? card.card_border_color['theme_color'],
                no_border: card.remove_card_border == 'true' ? true : false,
                no_header_padding: card.remove_card_header_padding == 'true' ? true : false,
                no_body_padding: card.remove_card_body_padding == 'true' ? true : false,
                no_footer_padding: card.remove_card_footer_padding == 'true' ? true : false,
                card_icon: {
                svg_other_classes: 'icon',
                name: card.card_icon['icon'] ? card.card_icon['icon'],
                fill: card.card_icon['icon_color']['color'] == 'palette' and card.card_icon['icon_color']['theme_color'] ? card.card_icon['icon_color']['theme_color'],
                width: card.card_icon['size'] ? card.card_icon['size'] ~ 'px',
                height: card.card_icon['size'] ? card.card_icon['size'] ~ 'px',
                svg_styles: [
                    card.card_icon['icon_color']['color']  == 'custom' and card.card_icon['icon_color']['custom_color'] ? 'color: ' ~ card.card_icon['icon_color']['custom_color'] ~ ';',
                ]
                },
                card_label: ('post_author' in elements and authors and element_author.card_author_location == 'label') or ('post_date' in elements and date and element_date.card_date_location == 'label') or ('post_modified' in elements and modified_date and element_modified.card_modified_location == 'label') or ('post_type' in elements and type and element_post_type.card_post_type_location == 'label') or ('comment_count' in elements and comment_count and element_comment_count.card_comment_count_location == 'label') or ('terms' in elements and terms is not empty and element_terms.card_terms_location == 'label') or ('categories' in elements and categories and element_categories.card_categories_location == 'label') or ('tags' in elements and tags and element_tags.card_terms_location == 'label') or ('post_parent' in elements and parent and element_post_parent.card_post_parent_location == 'label') or ('children' in elements and children and element_children.card_children_location == 'label') or ('link' in elements and link and element_link.card_link_location == 'label') ? true,
                card_title: function('in_array', 'post_title', elements) ? title,
                card_linked: link_items == 'true' ? true : false,
                card_link: link_items == 'true' ? link,
                card_link_text: '',
                flip_card: card.flip_card == 'true' ? true : false,
                inherit_color: (card.card_text_color['color'] == 'palette' and card.card_text_color['theme_color']) or (card.card_text_color['color'] == 'custom' and card.card_text_color['custom_color']) and card.inherit_text_color == 'true' ? true : false,
                card_image_location: (card_featured_image == 'inline' and function('get_the_post_thumbnail_url', ID)) or ((card.image['image_type'] == 'file' and card.image['image']['url']) or (card.image['image_type'] == 'url' and card.image['image_url'])) and card.image_position ? card.image_position,
                card_image_overlay: ((card.image['image_type'] == 'file' and card.image['image']['url']) or (card.image['image_type'] == 'url' and card.image['image_url'])) and card.image_overlay == 'true' ? card.image_overlay,
                card_image_overlay_text: '',
                card_image: {
                variant: 'primary',
                src: card_featured_image == 'inline' and function('get_the_post_thumbnail_url', ID) ? function('get_the_post_thumbnail_url', ID) : image['image_type'] == 'file' and image['image']['url'] ? image['image']['url'] : image['image_type'] == 'url' and image['image_url'] ? image['image_url'],
                alt: card_featured_image == 'inline' and function('get_the_post_thumbnail_url', ID) and post_title ? post_title : image['image_type'] == 'file' and image['image']['alt'] ? image['image']['alt']
                },
                card_footer: card_footer_layout ? true,
                card_classes: [
                'posts-loop--post',
                'posts-loop--card',
                card.horizontal != 'true' and card.layout.card_layout != 'default' ? 'card-' ~ card.layout.card_layout : card.horizontal == 'true' and card.horizontal_layout.horizontal_card_layout != 'default' ? 'card-' ~ card.horizontal_layout.horizontal_card_layout,
                card.text_align is not empty and card.text_align != 'null' ? 'text-' ~ card.text_align
                ],
                card_styles: [
                card.flip_card != 'true' ? card_bg_image_size,
                card.flip_card != 'true' ? card_bg_position,
                card.flip_card != 'true' ? card_bg_repeat,
                card.flip_card != 'true' ? card_bg_attachment,
                card.flip_card != 'true' or card.image_overlay_text is empty ? card_border_top_left_radius,
                card.flip_card != 'true' or card.image_overlay_text is empty ? card_border_top_right_radius,
                card.flip_card != 'true' or card.image_overlay_text is empty ? card_border_bottom_left_radius,
                card.flip_card != 'true' or card.image_overlay_text is empty ? card_border_bottom_right_radius,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_top_width,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_top_style,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_top_color,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_bottom_width,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_bottom_style,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_bottom_color,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_left_width,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_left_style,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_left_color,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_right_width,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_right_style,
                card.flip_card != true or card.image_overlay_text is empty ? card_border_right_color,
                card.flip_card != 'true' ? card_bg_color,
                card.flip_card != 'true' ? card_text_color,
                card.flip_card != 'true' ? card_padding_top,
                card.flip_card != 'true' ? card_padding_bottom,
                card.flip_card != 'true' ? card_padding_left,
                card.flip_card != 'true' ? card_padding_right,
                card_width,
                card_min_width,
                card_max_width,
                card_height,
                card_min_height,
                card_max_height,
                card_margin_top,
                card_margin_bottom,
                card_margin_left,
                card_margin_right,
                card_box_shadow
                ],
                card_attributes: [
                card.link_card == 'true' and card.trigger_modal == 'true' ? 'data-toggle=\"modal\"',
                card.link_card == 'true' and card.trigger_modal == 'true' ? 'data-target=\"#' ~ card.modal_id ~ '\"'
                ],
                background_image: card_bg_image,
                card_front_classes: [
                card.card_text_color['color'] == 'palette' and card.card_text_color['theme_color'] and card.flip_card == 'true' ? 'text-' ~ card.card_text_color['theme_color'],
                card.card_bg_color['bg_color'] == 'palette' and card.card_bg_color['bg_theme_color'] and card.flip_card == 'true' ? 'bg-' ~ card.card_bg_color['bg_theme_color'],
                card.card_border_color['color'] == 'palette' and card.card_border_color['theme_color'] and card.flip_card == 'true' ? 'border border-' ~ card.card_border_color['theme_color'],
                card.flip_card == 'true' and border_color ? 'has-border'
                ],
                card_front_styles: [
                card.flip_card == 'true' ? card_bg_image_size,
                card.flip_card == 'true' ? card_bg_position,
                card.flip_card == 'true' ? card_bg_repeat,
                card.flip_card == 'true' ? card_bg_attachment,
                card.flip_card == 'true' or card.image_overlay_text ? card_border_top_left_radius,
                card.flip_card == 'true' or card.image_overlay_text ? card_border_top_right_radius,
                card.flip_card == 'true' or card.image_overlay_text ? card_border_bottom_left_radius,
                card.flip_card == 'true' or card.image_overlay_text ? card_border_bottom_right_radius,
                card.flip_card == true ? card_border_top_width,
                card.flip_card == true ? card_border_top_style,
                card.flip_card == true ? card_border_top_color,
                card.flip_card == true ? card_border_bottom_width,
                card.flip_card == true ? card_border_bottom_style,
                card.flip_card == true ? card_border_bottom_color,
                card.flip_card == true ? card_border_left_width,
                card.flip_card == true ? card_border_left_style,
                card.flip_card == true ? card_border_left_color,
                card.flip_card == true ? card_border_right_width,
                card.flip_card == true ? card_border_right_style,
                card.flip_card == true ? card_border_right_color,
                card.flip_card == 'true' ? card_border_color,
                card.flip_card == 'true' ? card_bg_color,
                card.flip_card == 'true' ? card_text_color,
                card.flip_card == 'true' ? card_padding_top,
                card.flip_card == 'true' ? card_padding_bottom,
                card.flip_card == 'true' ? card_padding_left,
                card.flip_card == 'true' ? card_padding_right,
                ],
                back_background_image: back_bg_image,
                card_back_classes: [
                card.back_text_color['color'] == 'palette' and card.back_text_color['theme_color'] and card.flip_card == 'true' ? 'text-' ~ card.back_text_color['theme_color'],
                card.back_bg_color['bg_color'] == 'palette' and card.back_bg_color['bg_theme_color'] and card.flip_card == 'true' ? 'bg-' ~ card.back_bg_color['bg_theme_color'],
                card.back_border_color['color'] == 'palette' and card.back_border_color['theme_color'] and card.flip_card == 'true' ? 'border border-' ~ card.back_border_color['theme_color'],
                card.flip_card == 'true' and card_back_border_color ? 'has-border'
                ],
                card_back_styles: [
                card.flip_card == 'true' ? card_back_bg_image_size,
                card.flip_card == 'true' ? card_back_bg_position,
                card.flip_card == 'true' ? card_back_bg_repeat,
                card.flip_card == 'true' ? card_back_bg_attachment,
                card.flip_card == 'true' ? card_back_border_top_left_radius,
                card.flip_card == 'true' ? card_back_border_top_right_radius,
                card.flip_card == 'true' ? card_back_border_bottom_left_radius,
                card.flip_card == 'true' ? card_back_border_bottom_right_radius,
                card.flip_card == true ? card_back_border_top_width,
                card.flip_card == true ? card_back_border_top_style,
                card.flip_card == true ? card_back_border_top_color,
                card.flip_card == true ? card_back_border_bottom_width,
                card.flip_card == true ? card_back_border_bottom_style,
                card.flip_card == true ? card_back_border_bottom_color,
                card.flip_card == true ? card_back_border_left_width,
                card.flip_card == true ? card_back_border_left_style,
                card.flip_card == true ? card_back_border_left_color,
                card.flip_card == true ? card_back_border_right_width,
                card.flip_card == true ? card_back_border_right_style,
                card.flip_card == true ? card_back_border_right_color,
                card.flip_card == 'true' ? card_back_border_color,
                card.flip_card == 'true' ? card_back_bg_color,
                card.flip_card == 'true' ? card_back_text_color,
                card.flip_card == 'true' ? card_padding_top,
                card.flip_card == 'true' ? card_padding_bottom,
                card.flip_card == 'true' ? card_padding_left,
                card.flip_card == 'true' ? card_padding_right,
                ]
            } %}
            {% block card_label %}
            {% if (function('in_array', 'post_author', elements) and authors and element_author.card_author_location == 'label') or (function('in_array', 'post_date', elements) and date and element_date.card_date_location == 'label') or (function('in_array', 'post_modified', elements) and modified_date and element_modified.card_modified_location == 'label') or (function('in_array', 'post_type', elements) and type and element_post_type.card_post_type_location == 'label') or (function('in_array', 'comment_count', elements) and comment_count and element_comment_count.card_comment_count_location == 'label') or (function('in_array', 'terms', elements) and terms is not empty and element_terms.card_terms_location == 'label') or (function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'label') or (function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'label') or (function('in_array', 'tags', elements) and tags and element_tags.card_terms_location == 'label') or (function('in_array', 'post_parent', elements) and parent and element_post_parent.card_post_parent_location == 'label') or (function('in_array', 'children', elements) and children and element_children.card_children_location == 'label') or (function('in_array', 'link', elements) and link and element_link.card_link_location == 'label') %}
            <span class=\"card-label {{ inherit_color == 'true' ? 'text-reset' }}\">
                {# Post Author #}
                {% if function('in_array', 'post_author', elements) and authors and element_author.card_author_location == 'label' %}
                <div class=\"posts-loop--post-author\">
                    {% for author in authors %}
                    {% if function('in_array', 'gravatar', element_author.author_elements) and author.avatar %}
                    {% if link_items != 'true' and element_author.link_author == 'true' %}
                    <a class=\"posts-loop--post-author--link posts-loop--post-author--gravatar\" href=\"{{ author.link }}\">
                        {% else %}
                        <span class=\"posts-loop--post-author--gravatar\">
                            {% endif %}
                            <img src=\"{{ author.avatar }}\" alt=\"{{ author.name }}\">
                            {% if link_items != 'true' and element_author.link_author == 'true' %}
                    </a>
                    {% else %}
            </span>
            {% endif %}
            {% endif %}
            {% if function('in_array', 'name', element_author.author_elements) and author.name %}
            {% if element_author.label %}
            <span class=\"posts-loop--post-author--label\">{{ element_author.label }}</span>
            {% endif %}
            {% if link_items != 'true' and element_author.link_author == 'true' %}
            <a class=\"posts-loop--post-author--link posts-loop--post-author--name\" href=\"{{ author.link }}\">
                {% else %}
                <span class=\"posts-loop--post-author--name\">
                    {% endif %}
                    {{ author.name }}
                    {% if link_items != 'true' and element_author.link_author == 'true' %}
            </a>
            {% else %}
            </span>
            {% endif %}
            {% endif %}
            {% if function('in_array', 'email', element_author.author_elements) and function('get_user_by', 'id', author.id).data.user_email %}
            {% if link_items != 'true' %}
            <a class=\"posts-loop--post-author--link posts-loop--post-author--email\" href=\"mailto:{{ function('get_user_by', 'id', author.id).data.user_email }}\">
                {% else %}
                <span class=\"posts-loop--post-author--email\">
                    {% endif %}
                    {{ function('get_user_by', 'id', author.id).data.user_email }}
                    {% if link_items != 'true' %}
            </a>
            {% else %}
            </span>
            {% endif %}
            {% endif %}

            {% endfor %}
            </div>
            {% endif %}

            {# Post Date #}
            {% if function('in_array', 'post_date', elements) and date and element_date.card_date_location == 'label' %}
            {% if element_date.label %}
            <span class=\"posts-loop--post-date--label\">{{ element_date.label }}</span>
            {% endif %}
            {% if link_items != 'true' and element_date.link_date == 'true' and type.slug == 'post' %}
            <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ date|date('Y') }}{{ element_date.link_to == 'month' or element_date.link_to == 'day' ? '/' ~ date|date('m') }}{{ element_date.link_to == 'day' ? '/' ~ date|date('d') }}\">
                {% elseif link_items != 'true' and element_date.link_date == 'true' and type.has_archive %}
                <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ type.has_archive }}/{{ date|date('Y') }}{{ element_date.link_to == 'month' or element_date.link_to == 'day' ? '/' ~ date|date('m') }}{{ element_date.link_to == 'day' ? '/' ~ date|date('d') }}\">
                    {% else %}
                    <span class=\"posts-loop--post-date\">
                        {% endif %}
                        {{ date|date(element_date.date_format) }}
                        {% if link_items != 'true' and element_date.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                </a>
                {% else %}
                </span>
                {% endif %}
                {% endif %}

                {# Post Modified #}
                {% if function('in_array', 'post_modified', elements) and modified_date and element_modified.card_modified_location == 'label' %}
                <div class=\"posts-loop--post-modified--wrapper\">
                    {% if function('in_array', 'label', element_modified.modified_elements) and element_modified.label %}
                    <span class=\"posts-loop--post-modified--label\">{{ element_modified.label }}</span>
                    {% endif %}
                    {% if function('in_array', 'date', element_modified.modified_elements) and modified_date %}
                    {% if link_items != 'true' and element_modified.link_date == 'true' and type.slug == 'post' %}
                    <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ modified_date|date('Y') }}{{ element_modified.link_to == 'month' or element_modified.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element_modified.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                        {% elseif link_items != 'true' and element_modified.link_date == 'true' and type.has_archive %}
                        <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ type.has_archive }}/{{ modified_date|date('Y') }}{{ element_modified.link_to == 'month' or element_modified.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element_modified.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                            {% else %}
                            <span class=\"posts-loop--post-modified--date\">
                                {% endif %}
                                {{ modified_date|date(element_modified.date_format) }}
                                {% if link_items != 'true' and element_modified.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}

                        {% endif %}
                        {% if function('in_array', 'author', element_modified.modified_elements) and  element_modified.separator %}
                        <span class=\"posts-loop--post-modified--separator\">{{ element_modified.separator }}</span>
                        {% endif %}
                        {% if function('in_array', 'author', element_modified.modified_elements) and modified_author %}
                        {% if link_items != 'true' and element_modified.link_author == 'true' %}
                        <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author\" href=\"{{ modified_author.link }}\">
                            {% else %}
                            <span class=\"posts-loop--post-modified--author\">
                                {% endif %}
                                {{ modified_author.name }}
                                {% if link_items != 'true' and element_modified.link_author == 'true' %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}
                        {% endif %}
                        {% if function('in_array', 'email', element_modified.modified_elements) and function('get_user_by', 'id', modified_author.id).data.user_email %}
                        {% if link_items != 'true' %}
                        <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author-email\" href=\"mailto:{{ function('get_user_by', 'id', modified_author.id).data.user_email }}\">
                            {% else %}
                            <span class=\"posts-loop--post-modified--author-email\">
                                {% endif %}
                                {{ function('get_user_by', 'id', modified_author.id).data.user_email }}
                                {% if link_items != 'true' %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}
                        {% endif %}
                </div>
                {% endif %}

                {# Post Type #}
                {% if function('in_array', 'post_type', elements) and type and element_post_type.card_post_type_location == 'label' %}
                <div class=\"posts-loop--post-type--wrapper\">
                    {% if element_post_type.label %}
                    <span class=\"posts-loop--post-type--label\">{{ element_post_type.label }}</span>
                    {% endif %}
                    {% if link_items != 'true' and element_post_type.link_post_type == 'true' and type.has_archive %}
                    <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"/{{ type.has_archive }}\">
                        {% elseif link_items != 'true' and element_post_type.link_post_type == 'true' %}
                        <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"{{ function('get_post_type_archive_link', type.slug) }}\">
                            {% else %}
                            <span class=\"posts-loop--post-type\">
                                {% endif %}
                                {% if element_post_type.name_format == 'name' %}
                                {{ type.labels.name }}
                                {% elseif element_post_type.name_format == 'singular_name' %}
                                {{ type.labels.singular_name }}
                                {% elseif element_post_type.name_format == 'menu_name' %}
                                {{ type.labels.menu_name }}
                                {% elseif element_post_type.name_format == 'name_admin_bar' %}
                                {{ type.labels.name_admin_bar }}
                                {% endif %}
                                {% if link_items != 'true' and element_post_type.link_post_type == 'true' %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}
                </div>
                {% endif %}

                {# Comment Count #}
                {% if function('in_array', 'comment_count', elements) and comment_count and element_comment_count.card_comment_count_location == 'label' %}
                <div class=\"posts-loop--comment-count--wrapper\">
                    {% if element_comment_count.element_comment_count_label %}
                    <span class=\"posts-loop--comment-count--label\">{{ element_comment_count.element_comment_count_label }}</span>
                    {% endif %}
                    <span class=\"posts-loop--comment-count\">{{ comment_count }}</span>
                </div>
                {% endif %}

                {# Terms #}
                {% if function('in_array', 'terms', elements) and terms is not empty and element_terms.card_terms_location == 'label' %}
                <div class=\"posts-loop--terms--wrapper\">
                    {% if element_terms.label %}
                    <span class=\"posts-loop--terms--label\">{{ element_terms.label }}</span>
                    {% endif %}
                    {% for term in terms %}
                    {% if link_items != 'true' and element_terms.link_terms == 'true' %}<a class=\"posts-loop--term--link posts-loop--term\" href=\"/{{ term.taxonomy }}/{{ term.slug }}\">{% else %}<span class=\"posts-loop--term\">{% endif %}{{ term.name }}{% if link_items != 'true' and element_terms.link_terms == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                    {% endfor %}
                </div>
                {% endif %}

                {# Categories #}
                {% if function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'label' %}
                <div class=\"posts-loop--categories--wrapper\">
                    {% if element_categories.label %}
                    <span class=\"posts-loop--categories--label\">{{ element_categories.label }}</span>
                    {% endif %}
                    {% for category in categories %}
                    {% if link_items != 'true' and element_categories.link_categories == 'true' %}<a class=\"posts-loop--category--link posts-loop--category\" href=\"/{{ category.taxonomy }}/{{ category.slug }}\">{% else %}<span class=\"posts-loop--category\">{% endif %}{{ category.name }}{% if link_items != 'true' and element_categories.link_categories == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                    {% endfor %}
                </div>
                {% endif %}

                {# Tags #}
                {% if function('in_array', 'tags', elements) and tags and element_tags.card_terms_location == 'label' %}
                <div class=\"posts-loop--tags--wrapper\">
                    {% if element_tags.label %}
                    <span class=\"posts-loop--tags--label\">{{ element_tags.label }}</span>
                    {% endif %}
                    {% for tag in tags %}
                    {% if link_items != 'true' and element_tags.link_tags == 'true' %}<a class=\"posts-loop--tag--link posts-loop--tag\" href=\"/tag/{{ tag.slug }}\">{% else %}<span class=\"posts-loop--tag\">{% endif %}{{ tag.name }}{% if link_items != 'true' and element_tags.link_tags == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                    {% endfor %}
                </div>
                {% endif %}

                {# Post Parent #}
                {% if function('in_array', 'post_parent', elements) and parent and element_post_parent.card_post_parent_location == 'label' %}
                <div class=\"posts-loop--post-parent--wrapper\">
                    {% if element_post_parent.label %}
                    <span class=\"posts-loop--post-parent--label\">{{ element_post_parent.label }}</span>
                    {% endif %}
                    {% if link_items != 'true' and element_post_parent.link_parent == 'true' %}
                    <a class=\"posts-loop--post-parent-link posts-loop--post-parent\" href=\"{{ parent.link }}\">
                        {% else %}
                        <span class=\"posts-loop--post-parent\">
                            {% endif %}
                            {{ parent.title }}
                            {% if link_items != 'true' and element_post_parent.link_link == 'true' %}
                    </a>
                    {% else %}
                    </span>
                    {% endif %}
                </div>
                {% endif %}

                {# Children #}
                {% if function('in_array', 'children', elements) and children and element_children.card_children_location == 'label' %}
                <div class=\"posts-loop--post-children--wrapper\">
                    {% if element_children.label %}
                    <span class=\"posts-loop--children--label\">{{ element_children.label }}</span>
                    {% endif %}
                    {% for child in children %}
                    {% if link_items != 'true' and element_children.link_children == 'true' %}<a class=\"posts-loop--child--link posts-loop--child\" href=\"/child/{{ child.slug }}\">{% else %}<span class=\"posts-loop--child\">{% endif %}{{ child.name }}{% if link_items != 'true' and element_children.link_children == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                    {% endfor %}
                </div>
                {% endif %}

                {# Post Link #}
                {% if function('in_array', 'link', elements) and link and element_link.card_link_location == 'label' %}
                <div class=\"posts-loop--post-link--wrapper\">
                    {% if  element_link.label %}
                    <span class=\"posts-loop--post-link--label\">{{ element_link.label }}</span>
                    {% endif %}
                    {% if link_items != 'true' and  element_link.link_link == 'true' %}
                    <a href=\"{{ link }}\" class=\"posts-loop--post-link posts-loop--post-url\">
                        {% else %}
                        <span class=\"posts-loop--post-url\">
                            {% endif %}
                            {{ link }}
                            {% if link_items != 'true' and  element_link.link_link == 'true' %}
                    </a>
                    {% else %}
                    </span>
                    {% endif %}
                </div>
                {% endif %}

                </span>
                {% endif %}
                {% endblock card_label %}

                {% block card_intro %}
                {% if card_title or (function('in_array', 'post_author', elements) and authors and element_author.card_author_location == 'subtitle') or (function('in_array', 'post_date', elements) and date and element_date.card_date_location == 'subtitle') or (function('in_array', 'post_modified', elements) and modified_date and element_modified.card_modified_location == 'subtitle') or (function('in_array', 'post_type', elements) and type and element_post_type.card_post_type_location == 'subtitle') or (function('in_array', 'comment_count', elements) and comment_count and element_comment_count.card_comment_count_location == 'subtitle') or (function('in_array', 'terms', elements) and terms is not empty and element_terms.card_terms_location == 'subtitle') or (function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'subtitle') or (function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'subtitle') or (function('in_array', 'tags', elements) and tags and element_tags.card_terms_location == 'subtitle') or (function('in_array', 'post_parent', elements) and parent and element_post_parent.card_post_parent_location == 'subtitle') or (function('in_array', 'children', elements) and children and element_children.card_children_location == 'subtitle') or (function('in_array', 'link', elements) and link and element_link.card_link_location == 'subtitle') %}
                <div class=\"card-intro {{ no_body_padding == 'true' ? 'p-0' }}\">
                    {% if card_title %}
                    <h4 class=\"card-title {{ inherit_color == 'true' ? 'text-reset' }}\">{{ card_title }}</h4>
                    {% endif %}
                    {% if (function('in_array', 'post_author', elements) and authors and element_author.card_author_location == 'subtitle') or (function('in_array', 'post_date', elements) and date and element_date.card_date_location == 'subtitle') or (function('in_array', 'post_modified', elements) and modified_date and element_modified.card_modified_location == 'subtitle') or (function('in_array', 'post_type', elements) and type and element_post_type.card_post_type_location == 'subtitle') or (function('in_array', 'comment_count', elements) and comment_count and element_comment_count.card_comment_count_location == 'subtitle') or (function('in_array', 'terms', elements) and terms is not empty and element_terms.card_terms_location == 'subtitle') or (function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'subtitle') or (function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'subtitle') or (function('in_array', 'tags', elements) and tags and element_tags.card_terms_location == 'subtitle') or (function('in_array', 'post_parent', elements) and parent and element_post_parent.card_post_parent_location == 'subtitle') or (function('in_array', 'children', elements) and children and element_children.card_children_location == 'subtitle') or (function('in_array', 'link', elements) and link and element_link.card_link_location == 'subtitle') %}
                    <h6 class=\"card-subtitle {{ inherit_color == 'true' ? 'text-reset' }}\">
                        {# Post Author #}
                        {% if function('in_array', 'post_author', elements) and authors and element_author.card_author_location == 'subtitle' %}
                        <div class=\"posts-loop--post-author\">
                            {% for author in authors %}
                            {% if function('in_array', 'gravatar', element_author.author_elements) and author.avatar %}
                            {% if link_items != 'true' and element_author.link_author == 'true' %}
                            <a class=\"posts-loop--post-author--link posts-loop--post-author--gravatar\" href=\"{{ author.link }}\">
                                {% else %}
                                <span class=\"posts-loop--post-author--gravatar\">
                                    {% endif %}
                                    <img src=\"{{ author.avatar }}\" alt=\"{{ author.name }}\">
                                    {% if link_items != 'true' and element_author.link_author == 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}
                            {% if function('in_array', 'name', element_author.author_elements) and author.name %}
                            {% if element_author.label %}
                            <span class=\"posts-loop--post-author--label\">{{ element_author.label }}</span>
                            {% endif %}
                            {% if link_items != 'true' and element_author.link_author == 'true' %}
                            <a class=\"posts-loop--post-author--link posts-loop--post-author--name\" href=\"{{ author.link }}\">
                                {% else %}
                                <span class=\"posts-loop--post-author--name\">
                                    {% endif %}
                                    {{ author.name }}
                                    {% if link_items != 'true' and element_author.link_author == 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}
                            {% if function('in_array', 'email', element_author.author_elements) and function('get_user_by', 'id', author.id).data.user_email %}
                            {% if link_items != 'true' %}
                            <a class=\"posts-loop--post-author--link posts-loop--post-author--email\" href=\"mailto:{{ function('get_user_by', 'id', author.id).data.user_email }}\">
                                {% else %}
                                <span class=\"posts-loop--post-author--email\">
                                    {% endif %}
                                    {{ function('get_user_by', 'id', author.id).data.user_email }}
                                    {% if link_items != 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}

                            {% endfor %}
                        </div>
                        {% endif %}

                        {# Post Date #}
                        {% if function('in_array', 'post_date', elements) and date and element_date.card_date_location == 'subtitle' %}
                        {% if element_date.label %}
                        <span class=\"posts-loop--post-date--label\">{{ element_date.label }}</span>
                        {% endif %}
                        {% if link_items != 'true' and element_date.link_date == 'true' and type.slug == 'post' %}
                        <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ date|date('Y') }}{{ element_date.link_to == 'month' or element_date.link_to == 'day' ? '/' ~ date|date('m') }}{{ element_date.link_to == 'day' ? '/' ~ date|date('d') }}\">
                            {% elseif link_items != 'true' and element_date.link_date == 'true' and type.has_archive %}
                            <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ type.has_archive }}/{{ date|date('Y') }}{{ element_date.link_to == 'month' or element_date.link_to == 'day' ? '/' ~ date|date('m') }}{{ element_date.link_to == 'day' ? '/' ~ date|date('d') }}\">
                                {% else %}
                                <span class=\"posts-loop--post-date\">
                                    {% endif %}
                                    {{ date|date(element_date.date_format) }}
                                    {% if link_items != 'true' and element_date.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}

                            {# Post Modified #}
                            {% if function('in_array', 'post_modified', elements) and modified_date and element_modified.card_modified_location == 'subtitle' %}
                            <div class=\"posts-loop--post-modified--wrapper\">
                                {% if function('in_array', 'label', element_modified.modified_elements) and element_modified.label %}
                                <span class=\"posts-loop--post-modified--label\">{{ element_modified.label }}</span>
                                {% endif %}
                                {% if function('in_array', 'date', element_modified.modified_elements) and modified_date %}
                                {% if link_items != 'true' and element_modified.link_date == 'true' and type.slug == 'post' %}
                                <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ modified_date|date('Y') }}{{ element_modified.link_to == 'month' or element_modified.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element_modified.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                                    {% elseif link_items != 'true' and element_modified.link_date == 'true' and type.has_archive %}
                                    <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ type.has_archive }}/{{ modified_date|date('Y') }}{{ element_modified.link_to == 'month' or element_modified.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element_modified.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-modified--date\">
                                            {% endif %}
                                            {{ modified_date|date(element_modified.date_format) }}
                                            {% if link_items != 'true' and element_modified.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}

                                    {% endif %}
                                    {% if function('in_array', 'author', element_modified.modified_elements) and  element_modified.separator %}
                                    <span class=\"posts-loop--post-modified--separator\">{{ element_modified.separator }}</span>
                                    {% endif %}
                                    {% if function('in_array', 'author', element_modified.modified_elements) and modified_author %}
                                    {% if link_items != 'true' and element_modified.link_author == 'true' %}
                                    <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author\" href=\"{{ modified_author.link }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-modified--author\">
                                            {% endif %}
                                            {{ modified_author.name }}
                                            {% if link_items != 'true' and element_modified.link_author == 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                                    {% endif %}
                                    {% if function('in_array', 'email', element_modified.modified_elements) and function('get_user_by', 'id', modified_author.id).data.user_email %}
                                    {% if link_items != 'true' %}
                                    <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author-email\" href=\"mailto:{{ function('get_user_by', 'id', modified_author.id).data.user_email }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-modified--author-email\">
                                            {% endif %}
                                            {{ function('get_user_by', 'id', modified_author.id).data.user_email }}
                                            {% if link_items != 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                                    {% endif %}
                            </div>
                            {% endif %}

                            {# Post Type #}
                            {% if function('in_array', 'post_type', elements) and type and element_post_type.card_post_type_location == 'subtitle' %}
                            <div class=\"posts-loop--post-type--wrapper\">
                                {% if element_post_type.label %}
                                <span class=\"posts-loop--post-type--label\">{{ element_post_type.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and element_post_type.link_post_type == 'true' and type.has_archive %}
                                <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"/{{ type.has_archive }}\">
                                    {% elseif link_items != 'true' and element_post_type.link_post_type == 'true' %}
                                    <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"{{ function('get_post_type_archive_link', type.slug) }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-type\">
                                            {% endif %}
                                            {% if element_post_type.name_format == 'name' %}
                                            {{ type.labels.name }}
                                            {% elseif element_post_type.name_format == 'singular_name' %}
                                            {{ type.labels.singular_name }}
                                            {% elseif element_post_type.name_format == 'menu_name' %}
                                            {{ type.labels.menu_name }}
                                            {% elseif element_post_type.name_format == 'name_admin_bar' %}
                                            {{ type.labels.name_admin_bar }}
                                            {% endif %}
                                            {% if link_items != 'true' and element_post_type.link_post_type == 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                            </div>
                            {% endif %}

                            {# Comment Count #}
                            {% if function('in_array', 'comment_count', elements) and comment_count and element_comment_count.card_comment_count_location == 'subtitle' %}
                            <div class=\"posts-loop--comment-count--wrapper\">
                                {% if element_comment_count.element_comment_count_label %}
                                <span class=\"posts-loop--comment-count--label\">{{ element_comment_count.element_comment_count_label }}</span>
                                {% endif %}
                                <span class=\"posts-loop--comment-count\">{{ comment_count }}</span>
                            </div>
                            {% endif %}

                            {# Terms #}
                            {% if function('in_array', 'terms', elements) and terms is not empty and element_terms.card_terms_location == 'subtitle' %}
                            <div class=\"posts-loop--terms--wrapper\">
                                {% if element_terms.label %}
                                <span class=\"posts-loop--terms--label\">{{ element_terms.label }}</span>
                                {% endif %}
                                {% for term in terms %}
                                {% if link_items != 'true' and element_terms.link_terms == 'true' %}<a class=\"posts-loop--term--link posts-loop--term\" href=\"/{{ term.taxonomy }}/{{ term.slug }}\">{% else %}<span class=\"posts-loop--term\">{% endif %}{{ term.name }}{% if link_items != 'true' and element_terms.link_terms == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% endif %}

                            {# Categories #}
                            {% if function('in_array', 'categories', elements) and categories and element_categories.card_categories_location == 'subtitle' %}
                            <div class=\"posts-loop--categories--wrapper\">
                                {% if element_categories.label %}
                                <span class=\"posts-loop--categories--label\">{{ element_categories.label }}</span>
                                {% endif %}
                                {% for category in categories %}
                                {% if link_items != 'true' and element_categories.link_categories == 'true' %}<a class=\"posts-loop--category--link posts-loop--category\" href=\"/{{ category.taxonomy }}/{{ category.slug }}\">{% else %}<span class=\"posts-loop--category\">{% endif %}{{ category.name }}{% if link_items != 'true' and element_categories.link_categories == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% endif %}

                            {% if function('in_array', 'tags', elements) and tags and element_tags.card_terms_location == 'subtitle' %}
                            <div class=\"posts-loop--tags--wrapper\">
                                {% if element_tags.label %}
                                <span class=\"posts-loop--tags--label\">{{ element_tags.label }}</span>
                                {% endif %}
                                {% for tag in tags %}
                                {% if link_items != 'true' and element_tags.link_tags == 'true' %}<a class=\"posts-loop--tag--link posts-loop--tag\" href=\"/tag/{{ tag.slug }}\">{% else %}<span class=\"posts-loop--tag\">{% endif %}{{ tag.name }}{% if link_items != 'true' and element_tags.link_tags == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% endif %}

                            {# Post Parent #}
                            {% if function('in_array', 'post_parent', elements) and parent and element_post_parent.card_post_parent_location == 'subtitle' %}
                            <div class=\"posts-loop--post-parent--wrapper\">
                                {% if element_post_parent.label %}
                                <span class=\"posts-loop--post-parent--label\">{{ element_post_parent.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and element_post_parent.link_parent == 'true' %}
                                <a class=\"posts-loop--post-parent-link posts-loop--post-parent\" href=\"{{ parent.link }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-parent\">
                                        {% endif %}
                                        {{ parent.title }}
                                        {% if link_items != 'true' and element_post_parent.link_link == 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                            </div>
                            {% endif %}

                            {# Children #}
                            {% if function('in_array', 'children', elements) and children and element_children.card_children_location == 'subtitle' %}
                            <div class=\"posts-loop--post-children--wrapper\">
                                {% if element_children.label %}
                                <span class=\"posts-loop--children--label\">{{ element_children.label }}</span>
                                {% endif %}
                                {% for child in children %}
                                {% if link_items != 'true' and element_children.link_children == 'true' %}<a class=\"posts-loop--child--link posts-loop--child\" href=\"/child/{{ child.slug }}\">{% else %}<span class=\"posts-loop--child\">{% endif %}{{ child.name }}{% if link_items != 'true' and element_children.link_children == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% endif %}

                            {# Post Link #}
                            {% if function('in_array', 'link', elements) and link and element_link.card_link_location == 'subtitle' %}
                            <div class=\"posts-loop--post-link--wrapper\">
                                {% if  element_link.label %}
                                <span class=\"posts-loop--post-link--label\">{{ element_link.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and  element_link.link_link == 'true' %}
                                <a href=\"{{ link }}\" class=\"posts-loop--post-link posts-loop--post-url\">
                                    {% else %}
                                    <span class=\"posts-loop--post-url\">
                                        {% endif %}
                                        {{ link }}
                                        {% if link_items != 'true' and  element_link.link_link == 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                            </div>
                            {% endif %}

                    </h6>
                    {% endif %}
                </div>
                {% endif %}
                {% endblock card_intro %}

                {% block card_body %}
                <div class=\"card-body {{ no_body_padding == 'true' ? 'p-0' }}\">
                    {% block card_text %}
                    <div class=\"card-text {{ inherit_color == 'true' ? 'text-reset' }}\">

                        {% if function('in_array', 'post_excerpt', elements) and link_items != true %}
                            <div class=\"posts-loop--post-excerpt\"><span class=\"post-excerpt\">{{ function('wp_trim_words', function('get_the_excerpt'), element_excerpt.element_excerpt_length|number_format) }}</span> {% if element_excerpt.element_read_more_label %}<a href=\"{{ post.link }}\" class=\"read-more-link read-more\">{{ element_excerpt.element_read_more_label }}</a>{% endif %}</div>
                        {% elseif function('in_array', 'post_excerpt', elements) %}
                            <div class=\"posts-loop--post-excerpt\"><span class=\"post-excerpt\">{{ function('wp_trim_words', function('get_the_excerpt'), element_excerpt.element_excerpt_length|number_format) }}</span> {% if element_excerpt.element_read_more_label %}<span class=\"read-more-link read-more\">{{ element_excerpt.element_read_more_label }}</span>{% endif %}</div>
                        {% endif %}

                        {% if function('in_array', 'post_content', elements) %}
                        <div class=\"posts-loop--post-content\">{{ content }}</div>
                        {% endif %}
                    </div>
                    {% endblock %}

                    {% if card.link and card.link_card != 'true' and card.show_button != 'true' %}
                    <a href=\"{{ card.link['url'] }}\" class=\"card-link {{ inherit_color == 'true' ? 'text-reset' }}\" target=\"{{ card.link['target'] ? card.link['target'] : '_self' }}\">{{ card.link['title'] }}</a>
                    {% endif %}
                    {% if card.show_button == 'true' %}
                        {% include \"@atoms/button/_button.tpl.twig\" with {
                            button_element: card.link_card == 'true' ? 'button' : card.button.element,
                            button_text: card.link['title'],
                            button_link: card.link_card != 'true' and card.trigger_modal != 'true' ? card.link['url'] : card.link_card != 'true' and card.trigger_modal == 'true' ? 'javascript:void(0);',
                            button_target: card.trigger_modal == 'true' ? '#' ~ card.modal_id : card.link['target'],
                            button_color: card.button.close != 'black' and card.button.close != 'white' and card.button.style != 'custom' ? card.button.style,
                            button_size: card.button.size,
                            button_outline: card.button.outline,
                            button_block: card.button.full_width,
                            button_toggle: card.trigger_modal == 'true' ? 'modal' : card.button.toggle ? card.button.toggle,
                            button_controls: card.trigger_modal == 'true' ? card.modal_id,
                            button_disabled: card.button.disabled,
                            button_value: card.button.value,
                            nowrap: card.button.nowrap,
                            contextual_content: card.button.toggle == 'tooltip' or card.button.toggle == 'popover' ? card.button.toggle,
                            title: card.button.context['title'],
                            popover_content: card.button.context['content'],
                            context_placement: card.button.context['placement'],
                            context_container: card.button.context['container'],
                            close_button: card.button.close,
                            hide_label: card.button.hide_label,
                            button_classes: [
                                card.button.close != 'black' and card.button.close != 'white' and card.button.background_color['bg_color'] == 'palette' and card.button.background_color['bg_theme_color'] ? 'bg-' ~ card.button.background_color['bg_theme_color'],
                                card.button.close != 'black' and card.button.close != 'white' and card.button.text_color['color'] == 'palette' and card.button.text_color['theme_color'] ? 'text-' ~ card.button.text_color['theme_color'],
                                card.button.full_width != 'true' and card.button.display['display'] is not null ? card.button.display['display'],
                                inherit_color == true ? 'text-reset'
                            ],
                            button_other_classes: card.button.classes,
                            button_attributes: [
                            card.trigger_modal == 'true' ? 'data-bs-target=\"#' ~ card.modal_id ~ '\"',
                            card_btn_bg_color or card_btn_text_color or card_btn_transform or card_btn_padding_top or card_btn_padding_bottom or card_btn_padding_left or card_btn_padding_right or card_btn_border_top_width or card_btn_border_top_style or card_btn_border_top_color or card_btn_border_bottom_width or card_btn_border_bottom_style or card_btn_border_bottom_color or card_btn_border_left_width or card_btn_border_left_style or card_btn_border_left_color or card_btn_border_right_width or card_btn_border_right_style or card_btn_border_right_color or card_btn_border_top_left_radius or card_btn_border_top_right_radius or card_btn_border_bottom_left_radius or card_btn_border_bottom_right_radius or card_btn_box_shadow or card_btn_text_shadow or card_btn_fontsize or card_btn_width or card_btn_min_width or card_btn_max_width or card_btn_margin_top or card_btn_margin_bottom or card_btn_margin_left or card_btn_margin_right ? 'style=\"' ~ card_btn_bg_color ~ card_btn_text_color ~ card_btn_fontsize ~ card_btn_transform ~ card_btn_padding_top ~ card_btn_padding_bottom ~ card_btn_padding_left ~ card_btn_padding_right ~ card_btn_border_top_width ~ card_btn_border_top_style ~ card_btn_border_top_color ~ card_btn_border_bottom_width ~ card_btn_border_bottom_style ~ card_btn_border_bottom_color ~ card_btn_border_left_width ~ card_btn_border_left_style ~ card_btn_border_left_color ~ card_btn_border_right_width ~ card_btn_border_right_style ~ card_btn_border_right_color ~ card_btn_border_top_left_radius ~ card_btn_border_top_right_radius ~ card_btn_border_bottom_left_radius ~ card_btn_border_bottom_right_radius ~ card_btn_box_shadow ~ card_btn_text_shadow ~ card_btn_width ~ card_btn_min_width ~ card_btn_max_width ~ card_btn_margin_top ~ card_btn_margin_bottom ~ card_btn_margin_left ~ card_btn_margin_right ~ '\"'
                            ]
                        } %}
                    {% endif %}
                </div>
                {% endblock %}

                {% block card_footer %}
                {% if card_footer_layout %}
                <div class=\"card-footer-content {{ inherit_color == true ? 'text-reset' }}\">
                    {% for element in card_footer_layout %}
                    {% if element.acf_fc_layout == 'featured_image' and thumbnail.src %}
                    {# Featured Image #}
                    <div class=\"posts-loop--featured-image--wrapper\">
                        {% if link_items != 'true' and element.link_image == 'true' %}
                        <a class=\"posts-loop--post-thumbnail\" href=\"{{ link }}\">
                            {% else %}
                            <span class=\"posts-loop--post-thumbnail\">
                                {% endif %}
                                <img src=\"{{ thumbnail.src }}\" alt=\"{{ thumbnail.alt }}\">
                                {% if link_items != 'true' and element.link_image == 'true' %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_title' and post_title %}
                    {# Post Title #}
                    <div class=\"posts-loop--post-title--wrapper\">
                        {% if link_items != 'true' and element.link_title == 'true' %}
                        <a href=\"{{ link }}\">
                            {% endif %}
                            <{{ element.title_element}} class=\"posts-loop--post-title\">{{ title }}</{{ element.title_element }}>
                            {% if link_items != 'true' and element.link_title == 'true' %}
                        </a>
                        {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_excerpt' and (preview or function('get_the_excerpt')) %}
                    {# Post Excerpt #}
                    <div class=\"posts-loop--post-excerpt--wrapper\">
                        {% if post_type == 'page' %}
                        <div class=\"posts-loop--post-excerpt\">{{ function('get_the_excerpt') }}</div>
                        {% elseif link_items != 'true' %}
                        <div class=\"posts-loop--post-excerpt\">{{ preview.read_more(element.read_more_label).length(element.length|number_format).force }}</div>
                        {% else %}
                        <div class=\"posts-loop--post-excerpt\">{{ preview.read_more('').length(element.length|number_format) }}</div>
                        {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_content' and content %}
                    {# Post Content #}
                    <div class=\"posts-loop--post-content--wrapper\">
                        <div class=\"posts-loop--post-content\">{{ content }}</div>
                    </div>
                    {% elseif element.acf_fc_layout == 'link' and link %}
                    {# Post Link #}
                    <div class=\"posts-loop--post-link--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--post-link--label\">{{ element.label }}</span>
                        {% endif %}
                        {% if link_items != 'true' and element.link_link == 'true' %}
                        <a href=\"{{ link }}\" class=\"posts-loop--post-link posts-loop--post-url\">
                            {% else %}
                            <span class=\"posts-loop--post-url\">
                                {% endif %}
                                {{ link }}
                                {% if link_items != 'true' and element.link_link == 'true' %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_author' and authors %}
                    {# Post Author #}
                    <div class=\"posts-loop--post-author--wrapper\">
                        <div class=\"posts-loop--post-author\">
                            {% for author in authors %}
                            {% for author_element in element.author_elements %}
                            {% if author_element.acf_fc_layout == 'gravatar' and author.avatar %}
                            {% if link_items != 'true' and element.link_author == 'true' %}
                            <a class=\"posts-loop--post-author--link posts-loop--post-author--gravatar\" href=\"{{ author.link }}\">
                                {% else %}
                                <span class=\"posts-loop--post-author--gravatar\">
                                    {% endif %}
                                    <img src=\"{{ author.avatar }}\" alt=\"{{ author.name }}\">
                                    {% if link_items != 'true' and element.link_author == 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% elseif author_element.acf_fc_layout == 'name' and author.name %}
                            {% if author_element.label %}
                            <span class=\"posts-loop--post-author--label\">{{ author_element.label }}</span>
                            {% endif %}
                            {% if link_items != 'true' and element.link_author == 'true' %}
                            <a class=\"posts-loop--post-author--link posts-loop--post-author--name\" href=\"{{ author.link }}\">
                                {% else %}
                                <span class=\"posts-loop--post-author--name\">
                                    {% endif %}
                                    {{ author.name }}
                                    {% if link_items != 'true' and element.link_author == 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% elseif author_element.acf_fc_layout == 'email' and function('get_user_by', 'id', author.id).data.user_email %}
                            {% if link_items != 'true' %}
                            <a class=\"posts-loop--post-author--link posts-loop--post-author--email\" href=\"mailto:{{ function('get_user_by', 'id', author.id).data.user_email }}\">
                                {% else %}
                                <span class=\"posts-loop--post-author--email\">
                                    {% endif %}
                                    {{ function('get_user_by', 'id', author.id).data.user_email }}
                                    {% if link_items != 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}
                            {% endfor %}
                            {% endfor %}
                        </div>
                    </div>
                    {% elseif element.acf_fc_layout == 'post_date' and date %}
                    {# Post Date #}
                    <div class=\"posts-loop--post-date--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--post-date--label\">{{ element.label }}</span>
                        {% endif %}
                        {% if link_items != 'true' and element.link_date == 'true' and type.slug == 'post' %}
                        <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ date|date('m') }}{{ element.link_to == 'day' ? '/' ~ date|date('d') }}\">
                            {% elseif link_items != 'true' and element.link_date == 'true' and type.has_archive %}
                            <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ type.has_archive }}/{{ date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ date|date('m') }}{{ element.link_to == 'day' ? '/' ~ date|date('d') }}\">
                                {% else %}
                                <span class=\"posts-loop--post-date\">
                                    {% endif %}
                                    {{ date|date(element.date_format) }}
                                    {% if link_items != 'true' and element.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_modified' and (modified_date or modified_author) %}
                    {# Post Modified #}
                    <div class=\"posts-loop--post-modified--wrapper\">
                        {% if function('in_array', 'label', element.modified_elements) and element.label %}
                        <span class=\"posts-loop--post-modified--label\">{{ element.label }}</span>
                        {% endif %}
                        {% if function('in_array', 'date', element.modified_elements) and modified_date %}
                        {% if link_items != 'true' and element.link_date == 'true' and type.slug == 'post' %}
                        <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ modified_date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                            {% elseif link_items != 'true' and element.link_date == 'true' and type.has_archive %}
                            <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ type.has_archive }}/{{ modified_date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                                {% else %}
                                <span class=\"posts-loop--post-modified--date\">
                                    {% endif %}
                                    {{ modified_date|date(element.date_format) }}
                                    {% if link_items != 'true' and element.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}

                            {% endif %}
                            {% if function('in_array', 'author', element.modified_elements) and  element.separator %}
                            <span class=\"posts-loop--post-modified--separator\">{{ element.separator }}</span>
                            {% endif %}
                            {% if function('in_array', 'author', element.modified_elements) and modified_author %}
                            {% if link_items != 'true' and element.link_author == 'true' %}
                            <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author\" href=\"{{ modified_author.link }}\">
                                {% else %}
                                <span class=\"posts-loop--post-modified--author\">
                                    {% endif %}
                                    {{ modified_author.name }}
                                    {% if link_items != 'true' and element.link_author == 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}
                            {% if function('in_array', 'email', element.modified_elements) and function('get_user_by', 'id', modified_author.id).data.user_email %}
                            {% if link_items != 'true' %}
                            <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author-email\" href=\"mailto:{{ function('get_user_by', 'id', modified_author.id).data.user_email }}\">
                                {% else %}
                                <span class=\"posts-loop--post-modified--author-email\">
                                    {% endif %}
                                    {{ function('get_user_by', 'id', modified_author.id).data.user_email }}
                                    {% if link_items != 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                            {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_type' and type %}
                    {# Post Type #}
                    <div class=\"posts-loop--post-type--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--post-type--label\">{{ element.label }}</span>
                        {% endif %}
                        {% if link_items != 'true' and element.link_post_type == 'true' and type.has_archive %}
                        <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"/{{ type.has_archive }}\">
                            {% elseif link_items != 'true' and element.link_post_type == 'true' %}
                            <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"{{ function('get_post_type_archive_link', type.slug) }}\">
                                {% else %}
                                <span class=\"posts-loop--post-type\">
                                    {% endif %}
                                    {% if element.name_format == 'name' %}
                                    {{ type.labels.name }}
                                    {% elseif element.name_format == 'singular_name' %}
                                    {{ type.labels.singular_name }}
                                    {% elseif element.name_format == 'menu_name' %}
                                    {{ type.labels.menu_name }}
                                    {% elseif element.name_format == 'name_admin_bar' %}
                                    {{ type.labels.name_admin_bar }}
                                    {% endif %}
                                    {% if link_items != 'true' and element.link_post_type == 'true' %}
                            </a>
                            {% else %}
                            </span>
                            {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'post_parent' and parent %}
                    {# Post Parent #}
                    <div class=\"posts-loop--post-parent--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--post-parent--label\">{{ element.label }}</span>
                        {% endif %}
                        {% if link_items != 'true' and element.link_parent == 'true' %}
                        <a class=\"posts-loop--post-parent-link posts-loop--post-parent\" href=\"{{ parent.link }}\">
                            {% else %}
                            <span class=\"posts-loop--post-parent\">
                                {% endif %}
                                {{ parent.title }}
                                {% if link_items != 'true' and element.link_link == 'true' %}
                        </a>
                        {% else %}
                        </span>
                        {% endif %}
                    </div>
                    {% elseif element.acf_fc_layout == 'children' and children %}
                    {# Children #}
                    <div class=\"posts-loop--post-children--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--children--label\">{{ element.label }}</span>
                        {% endif %}
                        {% for child in children %}
                        {% if link_items != 'true' and element.link_children == 'true' %}<a class=\"posts-loop--child--link posts-loop--child\" href=\"/child/{{ child.slug }}\">{% else %}<span class=\"posts-loop--child\">{% endif %}{{ child.name }}{% if link_items != 'true' and element.link_children == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                        {% endfor %}
                    </div>
                    {% elseif element.acf_fc_layout == 'comment_count' and comment_count %}
                    {# Comment Count #}
                    <div class=\"posts-loop--comment-count--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--comment-count--label\">{{ element.label }}</span>
                        {% endif %}
                        <span class=\"posts-loop--comment-count\">{{ comment_count }}</span>
                    </div>
                    {% elseif element.acf_fc_layout == 'terms' and terms is not empty %}
                    {# Terms #}
                    <div class=\"posts-loop--terms--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--terms--label\">{{ element.label }}</span>
                        {% endif %}
                        {% for term in terms %}
                        {% if link_items != 'true' and element.link_terms == 'true' %}<a class=\"posts-loop--term--link posts-loop--term\" href=\"/{{ term.taxonomy }}/{{ term.slug }}\">{% else %}<span class=\"posts-loop--term\">{% endif %}{{ term.name }}{% if link_items != 'true' and element.link_terms == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                        {% endfor %}
                    </div>
                    {% elseif element.acf_fc_layout == 'categories' and categories %}
                    {# Categories #}
                    <div class=\"posts-loop--categories--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--categories--label\">{{ element.label }}</span>
                        {% endif %}
                        {% for category in categories %}
                        {% if link_items != 'true' and element.link_categories == 'true' %}<a class=\"posts-loop--category--link posts-loop--category\" href=\"/{{ category.taxonomy }}/{{ category.slug }}\">{% else %}<span class=\"posts-loop--category\">{% endif %}{{ category.name }}{% if link_items != 'true' and element.link_categories == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                        {% endfor %}
                    </div>
                    {% elseif element.acf_fc_layout == 'tags' and tags %}
                    {# Tags #}
                    <div class=\"posts-loop--tags--wrapper\">
                        {% if element.label %}
                        <span class=\"posts-loop--tags--label\">{{ element.label }}</span>
                        {% endif %}
                        {% for tag in tags %}
                        {% if link_items != 'true' and element.link_tags == 'true' %}<a class=\"posts-loop--tag--link posts-loop--tag\" href=\"/tag/{{ tag.slug }}\">{% else %}<span class=\"posts-loop--tag\">{% endif %}{{ tag.name }}{% if link_items != 'true' and element.link_tags == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                        {% endfor %}
                    </div>
                    {% endif %}
                    {% endfor %}
                </div>
                {% endif %}
                {% endblock card_footer %}

                {% block back %}
                    {% if card_back_layout and card.flip_card == 'true' %}
                        <div class=\"card-back-content {{ inherit_color == true ? 'text-reset' }}\">
                            {% for element in card_back_layout %}
                            {% if element.acf_fc_layout == 'featured_image' and thumbnail.src %}
                            {# Featured Image #}
                            <div class=\"posts-loop--featured-image--wrapper\">
                                {% if link_items != 'true' and element.link_image == 'true' %}
                                <a class=\"posts-loop--post-thumbnail\" href=\"{{ link }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-thumbnail\">
                                        {% endif %}
                                        <img src=\"{{ thumbnail.src }}\" alt=\"{{ thumbnail.alt }}\">
                                        {% if link_items != 'true' and element.link_image == 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_title' and post_title %}
                            {# Post Title #}
                            <div class=\"posts-loop--post-title--wrapper\">
                                {% if link_items != 'true' and element.link_title == 'true' %}
                                <a href=\"{{ link }}\">
                                    {% endif %}
                                    <{{ element.title_element}} class=\"posts-loop--post-title\">{{ title }}</{{ element.title_element }}>
                                    {% if link_items != 'true' and element.link_title == 'true' %}
                                </a>
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_excerpt' and (preview or function('get_the_excerpt')) %}
                            {# Post Excerpt #}
                            <div class=\"posts-loop--post-excerpt--wrapper\">
                                {% if post_type == 'page' %}
                                <div class=\"posts-loop--post-excerpt\">{{ function('get_the_excerpt') }}</div>
                                {% elseif link_items != 'true' %}
                                <div class=\"posts-loop--post-excerpt\">{{ preview.read_more(element.read_more_label).length(element.length|number_format).force }}</div>
                                {% else %}
                                <div class=\"posts-loop--post-excerpt\">{{ preview.read_more('').length(element.length|number_format) }}</div>
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_content' and content %}
                            {# Post Content #}
                            <div class=\"posts-loop--post-content--wrapper\">
                                <div class=\"posts-loop--post-content\">{{ content }}</div>
                            </div>
                            {% elseif element.acf_fc_layout == 'link' and link %}
                            {# Post Link #}
                            <div class=\"posts-loop--post-link--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--post-link--label\">{{ element.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and element.link_link == 'true' %}
                                <a href=\"{{ link }}\" class=\"posts-loop--post-link posts-loop--post-url\">
                                    {% else %}
                                    <span class=\"posts-loop--post-url\">
                                        {% endif %}
                                        {{ link }}
                                        {% if link_items != 'true' and element.link_link == 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_author' and authors %}
                            {# Post Author #}
                            <div class=\"posts-loop--post-author--wrapper\">
                                <div class=\"posts-loop--post-author\">
                                    {% for author in authors %}
                                    {% for author_element in element.author_elements %}
                                    {% if author_element.acf_fc_layout == 'gravatar' and author.avatar %}
                                    {% if link_items != 'true' and element.link_author == 'true' %}
                                    <a class=\"posts-loop--post-author--link posts-loop--post-author--gravatar\" href=\"{{ author.link }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-author--gravatar\">
                                            {% endif %}
                                            <img src=\"{{ author.avatar }}\" alt=\"{{ author.name }}\">
                                            {% if link_items != 'true' and element.link_author == 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                                    {% elseif author_element.acf_fc_layout == 'name' and author.name %}
                                    {% if author_element.label %}
                                    <span class=\"posts-loop--post-author--label\">{{ author_element.label }}</span>
                                    {% endif %}
                                    {% if link_items != 'true' and element.link_author == 'true' %}
                                    <a class=\"posts-loop--post-author--link posts-loop--post-author--name\" href=\"{{ author.link }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-author--name\">
                                            {% endif %}
                                            {{ author.name }}
                                            {% if link_items != 'true' and element.link_author == 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                                    {% elseif author_element.acf_fc_layout == 'email' and function('get_user_by', 'id', author.id).data.user_email %}
                                    {% if link_items != 'true' %}
                                    <a class=\"posts-loop--post-author--link posts-loop--post-author--email\" href=\"mailto:{{ function('get_user_by', 'id', author.id).data.user_email }}\">
                                        {% else %}
                                        <span class=\"posts-loop--post-author--email\">
                                            {% endif %}
                                            {{ function('get_user_by', 'id', author.id).data.user_email }}
                                            {% if link_items != 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                                    {% endif %}
                                    {% endfor %}
                                    {% endfor %}
                                </div>
                            </div>
                            {% elseif element.acf_fc_layout == 'post_date' and date %}
                            {# Post Date #}
                            <div class=\"posts-loop--post-date--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--post-date--label\">{{ element.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and element.link_date == 'true' and type.slug == 'post' %}
                                <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ date|date('m') }}{{ element.link_to == 'day' ? '/' ~ date|date('d') }}\">
                                {% elseif link_items != 'true' and element.link_date == 'true' and type.has_archive %}
                                <a class=\"posts-loop--date--link posts-loop--post-date\" href=\"/{{ type.has_archive }}/{{ date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ date|date('m') }}{{ element.link_to == 'day' ? '/' ~ date|date('d') }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-date\">
                                        {% endif %}
                                        {{ date|date(element.date_format) }}
                                        {% if link_items != 'true' and element.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_modified' and (modified_date or modified_author) %}
                            {# Post Modified #}
                            <div class=\"posts-loop--post-modified--wrapper\">
                                {% if function('in_array', 'label', element.modified_elements) and element.label %}
                                <span class=\"posts-loop--post-modified--label\">{{ element.label }}</span>
                                {% endif %}
                                {% if function('in_array', 'date', element.modified_elements) and modified_date %}
                                {% if link_items != 'true' and element.link_date == 'true' and type.slug == 'post' %}
                                <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ modified_date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                                {% elseif link_items != 'true' and element.link_date == 'true' and type.has_archive %}
                                <a class=\"posts-loop--post-modified--link posts-loop--post-modified--date\" href=\"/{{ type.has_archive }}/{{ modified_date|date('Y') }}{{ element.link_to == 'month' or element.link_to == 'day' ? '/' ~ modified_date|date('m') }}{{ element.link_to == 'day' ? '/' ~ modified_date|date('d') }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-modified--date\">
                                        {% endif %}
                                        {{ modified_date|date(element.date_format) }}
                                        {% if link_items != 'true' and element.link_date == 'true' and (type.slug == 'post' or type.has_archive) %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}

                                {% endif %}
                                {% if function('in_array', 'author', element.modified_elements) and  element.separator %}
                                <span class=\"posts-loop--post-modified--separator\">{{ element.separator }}</span>
                                {% endif %}
                                {% if function('in_array', 'author', element.modified_elements) and modified_author %}
                                {% if link_items != 'true' and element.link_author == 'true' %}
                                <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author\" href=\"{{ modified_author.link }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-modified--author\">
                                        {% endif %}
                                        {{ modified_author.name }}
                                        {% if link_items != 'true' and element.link_author == 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                                {% endif %}
                                {% if function('in_array', 'email', element.modified_elements) and function('get_user_by', 'id', modified_author.id).data.user_email %}
                                {% if link_items != 'true' %}
                                <a class=\"posts-loop--post-modified--link posts-loop--post-modified--author-email\" href=\"mailto:{{ function('get_user_by', 'id', modified_author.id).data.user_email }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-modified--author-email\">
                                        {% endif %}
                                        {{ function('get_user_by', 'id', modified_author.id).data.user_email }}
                                        {% if link_items != 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_type' and type %}
                            {# Post Type #}
                            <div class=\"posts-loop--post-type--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--post-type--label\">{{ element.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and element.link_post_type == 'true' and type.has_archive %}
                                <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"/{{ type.has_archive }}\">
                                    {% elseif link_items != 'true' and element.link_post_type == 'true' %}
                                    <a class=\"posts-loop--post-type--link posts-loop--post-type\" href=\"{{ function('get_post_type_archive_link', type.slug) }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-type\">
                                        {% endif %}
                                        {% if element.name_format == 'name' %}
                                        {{ type.labels.name }}
                                        {% elseif element.name_format == 'singular_name' %}
                                        {{ type.labels.singular_name }}
                                        {% elseif element.name_format == 'menu_name' %}
                                        {{ type.labels.menu_name }}
                                        {% elseif element.name_format == 'name_admin_bar' %}
                                        {{ type.labels.name_admin_bar }}
                                        {% endif %}
                                        {% if link_items != 'true' and element.link_post_type == 'true' %}
                                    </a>
                                    {% else %}
                                    </span>
                                    {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'post_parent' and parent %}
                            {# Post Parent #}
                            <div class=\"posts-loop--post-parent--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--post-parent--label\">{{ element.label }}</span>
                                {% endif %}
                                {% if link_items != 'true' and element.link_parent == 'true' %}
                                <a class=\"posts-loop--post-parent-link posts-loop--post-parent\" href=\"{{ parent.link }}\">
                                    {% else %}
                                    <span class=\"posts-loop--post-parent\">
                                        {% endif %}
                                        {{ parent.title }}
                                        {% if link_items != 'true' and element.link_link == 'true' %}
                                </a>
                                {% else %}
                                </span>
                                {% endif %}
                            </div>
                            {% elseif element.acf_fc_layout == 'children' and children %}
                            {# Children #}
                            <div class=\"posts-loop--post-children--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--children--label\">{{ element.label }}</span>
                                {% endif %}
                                {% for child in children %}
                                {% if link_items != 'true' and element.link_children == 'true' %}<a class=\"posts-loop--child--link posts-loop--child\" href=\"/child/{{ child.slug }}\">{% else %}<span class=\"posts-loop--child\">{% endif %}{{ child.name }}{% if link_items != 'true' and element.link_children == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% elseif element.acf_fc_layout == 'comment_count' and comment_count %}
                            {# Comment Count #}
                            <div class=\"posts-loop--comment-count--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--comment-count--label\">{{ element.label }}</span>
                                {% endif %}
                                <span class=\"posts-loop--comment-count\">{{ comment_count }}</span>
                            </div>
                            {% elseif element.acf_fc_layout == 'terms' and terms is not empty %}
                            {# Terms #}
                            <div class=\"posts-loop--terms--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--terms--label\">{{ element.label }}</span>
                                {% endif %}
                                {% for term in terms %}
                                {% if link_items != 'true' and element.link_terms == 'true' %}<a class=\"posts-loop--term--link posts-loop--term\" href=\"/{{ term.taxonomy }}/{{ term.slug }}\">{% else %}<span class=\"posts-loop--term\">{% endif %}{{ term.name }}{% if link_items != 'true' and element.link_terms == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% elseif element.acf_fc_layout == 'categories' and categories %}
                            {# Categories #}
                            <div class=\"posts-loop--categories--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--categories--label\">{{ element.label }}</span>
                                {% endif %}
                                {% for category in categories %}
                                {% if link_items != 'true' and element.link_categories == 'true' %}<a class=\"posts-loop--category--link posts-loop--category\" href=\"/{{ category.taxonomy }}/{{ category.slug }}\">{% else %}<span class=\"posts-loop--category\">{% endif %}{{ category.name }}{% if link_items != 'true' and element.link_categories == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% elseif element.acf_fc_layout == 'tags' and tags %}
                            {# Tags #}
                            <div class=\"posts-loop--tags--wrapper\">
                                {% if element.label %}
                                <span class=\"posts-loop--tags--label\">{{ element.label }}</span>
                                {% endif %}
                                {% for tag in tags %}
                                {% if link_items != 'true' and element.link_tags == 'true' %}<a class=\"posts-loop--tag--link posts-loop--tag\" href=\"/tag/{{ tag.slug }}\">{% else %}<span class=\"posts-loop--tag\">{% endif %}{{ tag.name }}{% if link_items != 'true' and element.link_tags == 'true' %}</a>{% else %}</span>{% endif %}{% if not loop.last %}, {% endif %}
                                {% endfor %}
                            </div>
                            {% endif %}
                            {% endfor %}
                        </div>
                    {% endif %}
                {% endblock back %}

                {% endembed %}

                {%if grid_type == 'row' %}
                    </div>
                {% endif %}",
            $context
        );
        
        $response[] = $rendered;
    }

    // print_r('1');
    // print_r(count($ajaxposts));
    // print_r($ajaxposts->found_posts);
    // print_r(count($ajaxposts) < $ajaxpostargs['posts_per_page']);
    // print_r($ajaxposts->found_posts <= $max_pages);

    $last = false;

    if (count($ajaxposts) < $ajaxpostargs['posts_per_page'] || $ajaxposts->found_posts <= $max_pages) {
        $last = true;
    }

    // if ($ajaxposts->found_posts <= $max_pages) {
    //     if ($last === false) {
    //         echo implode('', $response);
    //         $last = true;
    //     } else {
    //         echo false;
    //     }
    // } else {
    //     echo implode('', $response);
    // }

    $result = [
        'max' => $max_pages,
        'posts' => count($ajaxposts),
        'last' => $last,
        'html' => implode('', $response),
        'offset' => $offset,
    ];

    echo json_encode($result);

    // echo implode('', $response);

    exit;
}
add_action('wp_ajax_dream_post_loop_load_more', 'dream_post_loop_load_more');
add_action('wp_ajax_nopriv_dream_post_loop_load_more', 'dream_post_loop_load_more');
