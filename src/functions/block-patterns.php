<?php

//register_block_pattern(
//  'core/query/card',
//  array(
//    'title'       => __( 'Block Pattern Title'),
//    'description' => _x( 'Block pattern description' ),
//    'content'     => '',
//  )
//);

register_block_pattern(
  'core/query/card',
  array(
    'title'       => __( 'Query Cards'),
    'description' => _x( 'Render queried content in a card', 'Block pattern description' ),
    'content'     => '<!-- wp:query {"queryId":16,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":3},"namespace":"core/query/card"} --><div class="wp-block-query"><!-- wp:post-template {"className":"card-query"} --><!-- wp:acf/card {"name":"acf/card","mode":"preview","alignText":"left","alignContent":"top"} --><!-- wp:post-featured-image {"className":"card-image"} /--><!-- wp:post-date {"className":"card-label"} /--><!-- wp:post-title {"className":"card-title"} /--><!-- wp:post-excerpt {"className":"card-text"} /--><!-- /wp:acf/card --><!-- /wp:post-template --><!-- wp:query-pagination --><!-- wp:query-pagination-previous /--><!-- wp:query-pagination-numbers /--><!-- wp:query-pagination-next /--><!-- /wp:query-pagination --><!-- wp:query-no-results --><!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} --><p></p><!-- /wp:paragraph --><!-- /wp:query-no-results --></div><!-- /wp:query -->',
    'blockTypes'  => array('core/query/card')
  )
);
