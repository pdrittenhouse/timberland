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
  // Check global flag first - if set, skip entirely
  if (get_option('svg_metadata_updated')) {
    return;
  }

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

    // Check if this SVG already has metadata (individual check)
    $existing_metadata = wp_get_attachment_metadata($attachment_id);
    if (!empty($existing_metadata['width']) && !empty($existing_metadata['height'])) {
      // This SVG already has metadata, skip it
      continue;
    }

    // Get the path to the SVG file
    $file_path = get_attached_file($attachment_id);
    if (file_exists($file_path)) {
      // Get the SVG dimensions using SimpleXML
      $svg = simplexml_load_file($file_path);
      if ($svg !== false) {
        $attributes = $svg->attributes();
        $width = (int)$attributes['width'];
        $height = (int)$attributes['height'];

        // Only update if we got valid dimensions
        if ($width > 0 && $height > 0) {
          // Update the attachment metadata
          $metadata = array(
            'width' => $width,
            'height' => $height,
          );
          wp_update_attachment_metadata($attachment_id, $metadata);
        }
      }
    }
  }

  // Set flag after processing to prevent running again
  update_option('svg_metadata_updated', true);
}
add_action('init', 'update_svg_metadata');

// Clear flag when new SVG is uploaded
add_action('add_attachment', function($attachment_id) {
  if (get_post_mime_type($attachment_id) === 'image/svg+xml') {
    delete_option('svg_metadata_updated');
  }
});

// Clear flag when SVG is updated/replaced
add_action('attachment_updated', function($attachment_id) {
  if (get_post_mime_type($attachment_id) === 'image/svg+xml') {
    delete_option('svg_metadata_updated');
  }
});