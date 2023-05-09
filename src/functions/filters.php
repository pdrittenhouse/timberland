<?php

// @link https://wptips.dev/global-var-n-filters-in-timber/

class customFilters extends TimberSite
{

  function __construct()
  {
    add_filter('get_twig', [$this, 'add_to_twig']);
    parent::__construct();
  }

  // Add Custom filter
  function add_to_twig($twig)
  {
    // ...
    return $twig;
  }
}

new customFilters(); // call the class
