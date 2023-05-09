<?php

$context = Timber::get_context();
$site = new TimberSite();

Timber::render('partials/content/searchform.twig', $context);
