<?php

function alpha_bootstrapping(){
    // theme textdomain
    load_theme_textdomain( "alpha" );
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( "post-thumbnails" );
    // Let WordPress manage the document title
    add_theme_support( "title-tag" );
}
add_action( "after_setup_theme", "alpha_bootstrapping" );

function alpha_assets(){

    wp_enqueue_style( "bootstrap-css", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( "alpha", get_stylesheet_uri() );

}
add_action( "wp_enqueue_scripts", "alpha_assets" );