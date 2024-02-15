<?php

function serve_gzipped_assets($file, $type) {
    if (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
        $file_gz = $file . '.gz';
        if (file_exists($file_gz)) {
            header('Content-Encoding: gzip');
            header('Content-Type: ' . $type);
            readfile($file_gz);
            exit();
        }
    }
    return $file;
}

add_filter('stylesheet_uri', function ($file) {
    return serve_gzipped_assets($file, 'text/css');
}, 99);

add_filter('script_loader_src', function ($file) {
    return serve_gzipped_assets($file, 'text/javascript');
}, 99);
