<?php

// Allow SVG
add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  global $wp_version;
  if ($wp_version !== '4' ) {
    return $data;
  }
  $filetype = wp_check_filetype($filename, $mimes );
  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];
}, 10, 4 );
function cc_mime_types($mimes){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

// Fix to add width and height metadata to svg to prevent woocommerce regenerate images error
function update_svg_metadata()
{
  // Get all attachments of 'image/svg+xml' MIME type
  $args = array(
    'post_type' => 'attachment',
    'post_mime_type' => 'image/svg+xml',
    'posts_per_page' => -1,
  );
  $attachments = get_posts($args);

  // Loop through each SVG attachment
  foreach ($attachments as $attachment) {
    // Get the attachment ID
    $attachment_id = $attachment->ID;

    // Get the path to the SVG file
    $file_path = get_attached_file($attachment_id);

    // Get the SVG dimensions using SimpleXML
    $svg = simplexml_load_file($file_path);
    $attributes = $svg->attributes();
    $width = (int)$attributes['width'];
    $height = (int)$attributes['height'];

    // Update the attachment metadata
    $metadata = array(
      'width' => $width,
      'height' => $height,
    );
    wp_update_attachment_metadata($attachment_id, $metadata);
  }
}
add_action('init', 'update_svg_metadata');
