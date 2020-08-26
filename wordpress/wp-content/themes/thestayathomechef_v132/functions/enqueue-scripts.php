<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // SLICK SLIDER
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/scripts/slick.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );

    // Featherlight JS
    wp_enqueue_script( 'featherlight-js', get_template_directory_uri() . '/assets/scripts/featherlight.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );

    // Featherlight Gallery JS
    wp_enqueue_script( 'featherlight-js', get_template_directory_uri() . '/assets/scripts/featherlight.gallery.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );

    // WT Scripts JS
    wp_enqueue_script( 'wtScripts-js', get_template_directory_uri() . '/assets/scripts/wt-scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );

    if(is_singular('recipes')) {
        // WT Scripts JS
        wp_enqueue_script( 'scroll-js', get_template_directory_uri() . '/assets/scripts/scroll-to-id.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );
    }

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );

    // SLICK CSS
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/styles/slick.css' );

    // SLICK THEME CSS
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/assets/styles/slick-theme.css' );

    // Featherlight CSS
    wp_enqueue_style( 'featherlight-css', get_stylesheet_directory_uri() . '/assets/styles/featherlight.css' );

    // Featherlight Gallery CSS
    wp_enqueue_style( 'featherlight-gallery-css', get_stylesheet_directory_uri() . '/assets/styles/featherlight.gallery.css' );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);