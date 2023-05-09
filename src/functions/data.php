<?php

class importData extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    parent::__construct();
  }

  // Add Global variable
  function add_to_context( $context ) {

    // SASS Variables
    // Use this in prod
    // $get_sass_data  = file_get_contents(get_template_directory_uri() . '/src/patternlab/source/_data/scssVariables.json');

    // Use this in local dev
    $arrContextOptions=array(
      "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
      ),
    );
    $get_sass_data  = file_get_contents(get_template_directory_uri() . '/src/patternlab/source/_data/scssVariables.json', false, stream_context_create($arrContextOptions));

    $sass_data = json_decode($get_sass_data,true);
    $context['sass_data'] = $sass_data;

    return $context;
  }

}

new importData(); // call the class
