<?php

$context = Timber::get_context();
$site = new TimberSite();

// Enqueue Bootstrap components used in partials/content/searchform.twig
enqueue_bootstrap_component('forms');

Timber::render('partials/content/searchform.twig', $context);
