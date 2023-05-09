<?php

// Replace post-template block with custom DOM
add_filter( 'render_block', 'MyPostTemplate' , 10, 2 );

function MyPostTemplate( $block_content, $block )
{

  // bypass if other block
  if ( !is_admin() && (empty($block['attrs']['namespace']) || $block['attrs']['namespace'] !== 'core/query/card') ) return $block_content;

  // do something with $block_content (here we prepend a paragraph to each listed entry)
  $block_content=str_replace("<ul", "<div", $block_content);
  $block_content=str_replace("ul>", "div>", $block_content);
  $block_content=str_replace("<li", "<div", $block_content);
  $block_content=str_replace("li>", "div>", $block_content);

  return $block_content;
}
