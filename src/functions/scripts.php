<?php

function dream_enqueue_scripts() {

  //Enqueue Scripts

  /*
   * Use this to include jquery manually
   */
  //wp_deregister_script( 'jquery' );
  //wp_register_script( 'jquery', ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "/wp-content/themes/PDFK/js/libs/jquery/dist/jquery.min.js", false, '3.1.1');
  //wp_enqueue_script( 'jquery' );

  wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/wp/js/dream.bundle.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);

}

if ( !is_admin() ) {
  add_action( 'wp_enqueue_scripts', 'dream_enqueue_scripts' );
}

function dream_enqueue_admin_scripts() {

  //Enqueue Scripts

  wp_enqueue_script( 'admin_script', get_template_directory_uri() . '/dist/wp/js/admin.bundle.js', array ( 'jquery', 'acf-input' ), wp_get_theme()->get( 'Version' ), true);

}

if ( is_admin() ) {
  add_action( 'admin_enqueue_scripts', 'dream_enqueue_admin_scripts' );
}
