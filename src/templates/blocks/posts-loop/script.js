jQuery(document).ready(function ($) {

  // Load More Buttons
  const buttons = jQuery('.load-more--button');

  jQuery.each(buttons, function () {
    const button = jQuery(this);
    const wrapper = jQuery(this).parents('.posts-loop');
    const location = wrapper.find('.card').parent();
    let currentPage = parseInt(wrapper.data('paged')) || 1;

    // Increment currentPage + 1 to load the next page
    currentPage++;

    // Define ajax data
    const ajaxData = {
      action: 'dream_post_loop_load_more',
      pattern: wrapper.data('pattern'),
      parent: typeof wrapper.data('parent') !== 'undefined' && wrapper.data('parent') !== undefined ? JSON.parse(wrapper.data('parent').replace(/\'/g, '"')) : '',
      load_posts: typeof wrapper.data('load-posts') !== 'undefined' && wrapper.data('load-posts') !== undefined ? parseInt(wrapper.data('load-posts')) : '',
      card: typeof wrapper.data('card') !== 'undefined' && wrapper.data('card') !== undefined ? JSON.parse(wrapper.data('card').replace(/\'/g, '"')) : '',
      link_items: wrapper.data('link-items') === 'true' ? true : false,
      elements: typeof wrapper.data('elements') !== 'undefined' && wrapper.data('elements') !== undefined ? JSON.parse(wrapper.data('elements').replace(/\'/g, '"')) : '',
      element_excerpt: wrapper.data('element-excerpt') !== 'undefined' && wrapper.data('element-excerpt') !== undefined ? JSON.parse(wrapper.data('element-excerpt').replace(/\'/g, '"')) : '',
      element_author: wrapper.data('element-author') !== 'undefined' && wrapper.data('element-author') !== undefined ? JSON.parse(wrapper.data('element-author').replace(/\'/g, '"')) : '',
      element_date: wrapper.data('element-date') !== 'undefined' && wrapper.data('element-date') !== undefined ? JSON.parse(wrapper.data('element-date').replace(/\'/g, '"')) : '',
      element_modified: wrapper.data('element-modified') !== 'undefined' && wrapper.data('element-modified') !== undefined ? JSON.parse(wrapper.data('element-modified').replace(/\'/g, '"')) : '',
      element_post_parent: wrapper.data('element-post-parent') !== 'undefined' && wrapper.data('element-post-parent') !== undefined ? JSON.parse(wrapper.data('element-post-parent').replace(/\'/g, '"')) : '',
      element_children: wrapper.data('element-children') !== 'undefined' && wrapper.data('element-children') !== undefined ? JSON.parse(wrapper.data('element-children').replace(/\'/g, '"')) : '',
      element_post_type: wrapper.data('element-post-type') !== 'undefined' && wrapper.data('element-post-type') !== undefined ? JSON.parse(wrapper.data('element-post-type').replace(/\'/g, '"')) : '',
      element_comment_count: wrapper.data('element-comment-count') !== 'undefined' && wrapper.data('element-comment-count') !== undefined ? JSON.parse(wrapper.data('element-comment-count').replace(/\'/g, '"')) : '',
      element_link: wrapper.data('element-link') !== 'undefined' && wrapper.data('element-link') !== undefined ? JSON.parse(wrapper.data('element-link').replace(/\'/g, '"')) : '',
      element_terms: wrapper.data('element-terms') !== 'undefined' && wrapper.data('element-terms') !== undefined ? JSON.parse(wrapper.data('element-terms').replace(/\'/g, '"')) : '',
      element_categories: wrapper.data('element-categories') !== 'undefined' && wrapper.data('element-categories') !== undefined ? JSON.parse(wrapper.data('element-categories').replace(/\'/g, '"')) : '',
      element_tags: wrapper.data('element-tags') !== 'undefined' && wrapper.data('element-tags') !== undefined ? JSON.parse(wrapper.data('element-tags').replace(/\'/g, '"')) : '',
      card_footer_layout: typeof wrapper.data('card-footer-layout') !== 'undefined' && wrapper.data('card-footer-layout') !== undefined ? JSON.parse(wrapper.data('card-footer-layout').replace(/\'/g, '"')) : '',
      card_back_layout: typeof wrapper.data('card-back-layout') !== 'undefined' && wrapper.data('card-back-layout') !== undefined ? JSON.parse(wrapper.data('card-back-layout').replace(/\'/g, '"')) : '',
      card_featured_image: typeof wrapper.data('card-featured-image') !== 'undefined' && wrapper.data('card-featured-image') !== undefined ? wrapper.data('card-featured-image') : '',
      pattern_path: typeof wrapper.data('pattern-path') !== 'undefined' && wrapper.data('pattern-path') !== undefined ? wrapper.data('pattern-path') : '',
      paged: currentPage,
      post_type: typeof wrapper.data('post-type') !== 'undefined' && wrapper.data('post-type') !== undefined ? JSON.parse(wrapper.data('post-type').replace(/\'/g, '"')) : '',
      order: typeof wrapper.data('order') !== 'undefined' && wrapper.data('order') !== undefined ? wrapper.data('order') : '',
      order_by: typeof wrapper.data('order-by') !== 'undefined' && wrapper.data('order-by') !== undefined ? wrapper.data('order-by') : '',
      ignore_sticky_posts: wrapper.data('ignore-sticky-posts') === 'true' ? true : false,
      posts_per_page: typeof wrapper.data('posts-per-page') !== 'undefined' && wrapper.data('posts-per-page') !== undefined ? parseInt(wrapper.data('posts-per-page')) : '',
      posts_per_archive_page: typeof wrapper.data('posts-per-archive-page') !== 'undefined' && wrapper.data('posts-per-archive-page') !== undefined ? parseInt(wrapper.data('posts-per-archive-page')) : '',
      nopaging: wrapper.data('nopaging') === 'true' ? true : false,
      offset: typeof wrapper.data('offset') !== 'undefined' && wrapper.data('offset') !== undefined ? parseInt(wrapper.data('offset')) : '',
      post_parent_in: typeof wrapper.data('post-parent-in') !== 'undefined' && wrapper.data('post-parent-in') !== undefined ? JSON.parse(wrapper.data('post-parent-in').replace(/\'/g, '"')) : '',
      post_parent_not_in: typeof wrapper.data('post-parent-not-in') !== 'undefined' && wrapper.data('post-parent-not-in') !== undefined ? JSON.parse(wrapper.data('post-parent-not-in').replace(/\'/g, '"')) : '',
      year: typeof wrapper.data('year') !== 'undefined' && wrapper.data('year') !== undefined ? parseInt(wrapper.data('year')) : '',
      monthnum: typeof wrapper.data('monthnum') !== 'undefined' && wrapper.data('') !== undefined ? parseInt(wrapper.data('monthnum')) : '',
      w: typeof wrapper.data('w') !== 'undefined' && wrapper.data('monthnum') !== undefined ? parseInt(wrapper.data('w')) : '',
      day: typeof wrapper.data('day') !== 'undefined' && wrapper.data('day') !== undefined ? parseInt(wrapper.data('day')) : '',
      hour: typeof wrapper.data('hour') !== 'undefined' && wrapper.data('hour') !== undefined ? parseInt(wrapper.data('hour')) : '',
      minute: typeof wrapper.data('minute') !== 'undefined' && wrapper.data('minute') !== undefined ? parseInt(wrapper.data('minute')) : '',
      second: typeof wrapper.data('second') !== 'undefined' && wrapper.data('second') !== undefined ? parseInt(wrapper.data('second')) : '',
      m: typeof wrapper.data('m') !== 'undefined' && wrapper.data('m') !== undefined ? parseInt(wrapper.data('m')) : '',
      date_query: typeof wrapper.data('date-query') !== 'undefined' && wrapper.data('date-query') !== undefined ? JSON.parse(wrapper.data('date-query').replace(/\'/g, '"')) : '',
      meta_key: typeof wrapper.data('meta-key') !== 'undefined' && wrapper.data('meta-key') !== undefined ? wrapper.data('meta-key') : '',
      meta_value: typeof wrapper.data('meta-value') !== 'undefined' && wrapper.data('meta-value') !== undefined ? wrapper.data('meta-value') : '',
      meta_value_num: typeof wrapper.data('meta-value-num') !== 'undefined' && wrapper.data('meta-value-num') !== undefined ? parseInt(wrapper.data('meta-value-num')) : '',
      meta_compare: typeof wrapper.data('meta-compare') !== 'undefined' && wrapper.data('meta-compare') !== undefined ? wrapper.data('meta-compare') : '',
      meta_query: typeof wrapper.data('meta-query') !== 'undefined' && wrapper.data('meta-query') !== undefined ? JSON.parse(wrapper.data('meta-query').replace(/\'/g, '"')) : '',
      tax_query: typeof wrapper.data('tax-query') !== 'undefined' && wrapper.data('tax-query') !== undefined ? JSON.parse(wrapper.data('tax-query').replace(/\'/g, '"')) : '',
      category_in: typeof wrapper.data('category-in') !== 'undefined' && wrapper.data('category-in') !== undefined ? JSON.parse(JSON.stringify(wrapper.data('category-in'))) : '',
      category_not_in: typeof wrapper.data('category-not-in') !== 'undefined' && wrapper.data('category-not-in') !== undefined ? JSON.parse(JSON.stringify(wrapper.data('category-not-in'))) : '',
      tag_in: typeof wrapper.data('tag-in') !== 'undefined' && wrapper.data('tag-in') !== undefined ? JSON.parse(JSON.stringify(wrapper.data('tag-in'))) : '',
      tag_not_in: typeof wrapper.data('tag-not-in') !== 'undefined' && wrapper.data('tag-not-in') !== undefined ? JSON.parse(JSON.stringify(wrapper.data('tag-not-in'))) : '',
      author_in: typeof wrapper.data('author-in') !== 'undefined' && wrapper.data('author-in') !== undefined ? JSON.parse(JSON.stringify(wrapper.data('author-in'))) : '',
      author_not_in: typeof wrapper.data('author-not-in') !== 'undefined' && wrapper.data('author-not-in') !== undefined ? JSON.parse(JSON.stringify(wrapper.data('author-not-in'))) : '',
      comment_count: typeof wrapper.data('comment-count') !== 'undefined' && wrapper.data('comment-count') !== undefined ? JSON.parse(wrapper.data('comment-count').replace(/\'/g, '"')) : '',
      post_status: typeof wrapper.data('post-status') !== 'undefined' && wrapper.data('post-status') !== undefined ? JSON.parse(wrapper.data('post-status').replace(/\'/g, '"')) : '',
      has_password: wrapper.data('has-password') === 'true' ? true : false,
      post_password: typeof wrapper.data('post-password') !== 'undefined' && wrapper.data('post-password') !== undefined ? wrapper.data('post-password') : '',
      post_mime_type: typeof wrapper.data('post-mime-type') !== 'undefined' && wrapper.data('post-mime-type') !== undefined ? JSON.parse(wrapper.data('post-mime-type')).replace(/\'/g, '"') : '',
      perm: typeof wrapper.data('perm') !== 'undefined' && wrapper.data('perm') !== undefined ? wrapper.data('perm') : '',
      s: typeof wrapper.data('s') !== 'undefined' && wrapper.data('s') !== undefined ? wrapper.data('s') : '',
      exact: wrapper.data('exact') === 'true' ? true : false,
      sentence: wrapper.data('sentence') === 'true' ? true : false,
      post_in: typeof wrapper.data('post-in') !== 'undefined' && wrapper.data('post-in') !== undefined ? JSON.parse(wrapper.data('post-in').replace(/\'/g, '"')) : '',
    };

    // Show loading spinner
    const showLoading = function () {
      wrapper.addClass('loading');
      wrapper.prepend('<div class="spinner spinner-wrapper spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>');
      button.prepend('<span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    };

    // Check if there are more posts on page load
    function checkPosts() {
      jQuery.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'json',
        data: ajaxData,
        success: function(res) {
          if (res.html === '') {
            // No posts, hide the load more button
            button.hide();
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('An error occurred: ' + textStatus, errorThrown);
          console.log('error: ' + jqXHR);
        }
      });
    }

    checkPosts();

    button.on('click', function () {
      showLoading();

      ajaxData.paged = currentPage; // Update paged property value

      jQuery.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'json',
        data: ajaxData,
        success: function (res) {
          wrapper.removeClass('loading');
          wrapper.find('.spinner-wrapper').remove();
          button.find('.spinner').remove();
          // if (res == false) {
          //     // jQuery('#load-more').hide();
          //     console.log('done');
          // } else {
          //     location.append(res);
          // }
          if (res.last === true) {
            location.append(res.html);
            button.hide();
          } else {
            location.append(res.html);
          }
          wrapper.data('paged', currentPage++);
          // wrapper.attr('data-paged', currentPage);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('An error occurred: ' + textStatus, errorThrown);
          console.log('error: ' + jqXHR);
        }
      });
    });
  });

});
