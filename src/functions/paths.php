<?php

add_filter('timber/loader/loader', function($loader){
  // $loader->addPath(dirname(__DIR__, 1) . "/patternlab/source/_patterns/00-protons", "protons");
  // $loader->addPath(dirname(__DIR__, 1) . "/patternlab/source/_patterns/01-atoms", "atoms");
  // $loader->addPath(dirname(__DIR__, 1) . "/patternlab/source/_patterns/02-molecules", "molecules");
  // $loader->addPath(dirname(__DIR__, 1) . "/patternlab/source/_patterns/03-organisms", "organisms");
  // $loader->addPath(dirname(__DIR__, 1) . "/patternlab/source/_patterns/04-templates", "templates");
  // $loader->addPath(dirname(__DIR__, 1) . "/patternlab/source/_patterns/05-pages", "pages");
  // $loader->addPath(dirname(__DIR__, 2) . "/dist/wp", "assets");
  // $loader->addPath(dirname(__DIR__, 2) . "/dist/wp/css", "styles");
  // $loader->addPath(dirname(__DIR__, 2) . "/dist/wp/img", "images");
  // $loader->addPath(dirname(__DIR__, 2) . "/dist/wp/fonts", "fonts");
  // $loader->addPath(dirname(__DIR__, 2) . "/dist/wp/js", "scripts");

  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 1) . "/patternlab/source/_patterns/00-protons"), "protons");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 1) . "/patternlab/source/_patterns/01-atoms"), "atoms");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 1) . "/patternlab/source/_patterns/02-molecules"), "molecules");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 1) . "/patternlab/source/_patterns/03-organisms"), "organisms");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 1) . "/patternlab/source/_patterns/04-templates"), "templates");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 1) . "/patternlab/source/_patterns/05-pages"), "pages");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 2) . "/dist/wp"), "assets");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 2) . "/dist/wp/css"), "styles");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 2) . "/dist/wp/img"), "images");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 2) . "/dist/wp/fonts"), "fonts");
  $loader->addPath(str_replace($_SERVER['SERVER_NAME'], '', dirname(__DIR__, 2) . "/dist/wp/js"), "scripts");
  return $loader;
});
