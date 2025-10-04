<?php


class importData extends TimberSite {


  function __construct() {
    add_filter( 'timber/context', [$this, 'add_to_context'], 15 );
    parent::__construct();
  }


  // Add Global variable
  function add_to_context( $context ) {

    // SASS Variables


    // Use HTTP
    // Use this in prod
    // $get_sass_data  = file_get_contents(get_template_directory_uri() . '/src/patternlab/source/_data/scssVariables.json');


    // Use this in local dev
    // $arrContextOptions=array(
    //   "ssl"=>array(
    //     "verify_peer"=>false,
    //     "verify_peer_name"=>false,
    //   ),
    // );
    // $get_sass_data  = file_get_contents(get_template_directory_uri() . '/src/patternlab/source/_data/scssVariables.json', false, stream_context_create($arrContextOptions));


    // Add data to context
    // $sass_data = json_decode($get_sass_data,true);
    // $context['sass_data'] = $sass_data;


    // SASS data with optimized caching
    // Uses simple cache key - invalidate manually via cache clear button or on theme update
    $cache_key = 'theme_sass_data';
    $sass_data = get_transient($cache_key);

    if (false === $sass_data) {
      $file_path = get_template_directory() . '/src/patternlab/source/_data/scssVariables.json';

      if (file_exists($file_path)) {
        // Read and decode JSON file
        $get_sass_data = file_get_contents($file_path);
        $sass_data = json_decode($get_sass_data, true);

        if (!is_array($sass_data)) {
          $sass_data = [];
        }

        // Cache for 1 day
        set_transient($cache_key, $sass_data, DAY_IN_SECONDS);
      } else {
        $sass_data = [];
      }
    }

    $context['sass_data'] = $sass_data;


    return $context;
  }


}


new importData(); // call the class
