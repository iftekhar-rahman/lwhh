<?php

// if Attachments exists
if ( class_exists( 'Attachments' ) ) {
    require_once "lib/attachments.php";
}


// to change the version number automaticaly
if( site_url() == "http://localhost/lwhh"){
    define( "VERSION", time() );
} else{
    define( "VERSION", wp_get_theme()->get("Version") );
}

function alpha_bootstrapping(){
    // theme textdomain
    load_theme_textdomain( "alpha" );
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( "post-thumbnails" );
    // html5 support
    add_theme_support( 'html5', array( 'search-form' ) );
    // custom header details
    $alpha_custom_logo_defaults = array(
        "width"     => "100",
        "height"    => "100",
    );
    add_theme_support( "custom-logo", $alpha_custom_logo_defaults );
    $alpha_custom_header_details = array(
        "header-text"           => true,
        "default-text-color"    => "#222",
        "width"                 => "1200",
        "height"                => "600",
        "flex-height"           => true,

    );
    add_theme_support( "custom-header", $alpha_custom_header_details );
    add_theme_support( "custom-background" );
    // Let WordPress manage the document title
    add_theme_support( "title-tag" );
    // menu registering
    register_nav_menu( "topmenu", __("Top Menu", "alpha") );
    register_nav_menu( "footermenu", __("Footer Menu", "alpha") );

    add_theme_support( "post-formats", array( "audio", "video", "quote", "link" ) );

    // custom image size
    // add_image_size( "alpha-square", 400,400,true ); // true means center center
    // add_image_size( "alpha-portrait", 400,9999 );
    // add_image_size( "alpha-landscape", 9999,400 );
    // add_image_size( "alpha-landscape-hard-cropped", 600,400 );

     // custom image size
    add_image_size( "alpha-square", 400,400,true ); // true means center center
    add_image_size( "alpha-square-new1", 401,401, array("left","top")); 
    add_image_size( "alpha-square-new2", 500,500, array("center","center")); 
    add_image_size( "alpha-square-new3", 600,600, array("right","center")); 



    // changing cropped image position
    add_image_size( "alpha-square-tow", 400,400, array( "left","top" ));
    add_image_size( "alpha-square-three", 400,400, array( "center","center" ));

}
add_action( "after_setup_theme", "alpha_bootstrapping" );

function alpha_assets(){

    wp_enqueue_style( "bootstrap-css", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( "featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" );
    wp_enqueue_style( "tinyslider-css", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css" );
    wp_enqueue_style( "dashicons" );
    wp_enqueue_style( "alpha", get_stylesheet_uri(), null, VERSION );

    wp_enqueue_style( "alpha-style", get_template_directory_uri()."/assets/css/alpha.css" );

    wp_enqueue_script( "featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.1", true );
    wp_enqueue_script( "tinyslider-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", null, "0.1", true );

    wp_enqueue_script( "alpha-main", get_theme_file_uri("/assets/js/main.js"), array("jquery", "featherlight-js") ,VERSION,true );

}
add_action( "wp_enqueue_scripts", "alpha_assets" );

// widgetized sections
function alpha_sidebar(){
    register_sidebar(
        array(
            'name'           => __( 'Single post sidebar', 'alpha' ),
            'id'             => "sidebar-1",
            'description'    => __( 'Right sidebar', 'alpha' ),
            'before_widget'  => '<div id="%1$s" class="widget %2$s">',
            'after_widget'   => '</div>',
            'before_title'   => '<h3 class="widget-title">',
            'after_title'    => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer left sidebar', 'alpha' ),
            'id'            => "footer-left",
            'description'   => __( 'Footer left sidebar', 'alpha' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer right sidebar', 'alpha' ),
            'id'            => "footer-right",
            'description'   => __( 'Footer right sidebar', 'alpha' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}
add_action( "widgets_init", "alpha_sidebar" );

// to make any post password protected
function alpha_the_excerpt($excerpt){
    if( !post_password_required() ){
        return $excerpt;
    } else{
        echo get_the_password_form();
    }
}
add_filter( "the_excerpt", "alpha_the_excerpt" );

// To change the "Protected title" from the post title
function alpha_protected_title_change(){
    return "Locked    : %s";
}
add_filter( "protected_title_format", "alpha_protected_title_change" );

// To add class to all "li" item
function alpha_menu_item_class( $classes, $items ){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter( "nav_menu_css_class", "alpha_menu_item_class", 10, 2 );

if(!function_exists("alpha_about_page_template_banner")){
    function alpha_about_page_template_banner(){
        if(is_page()) {
            $alpha_feat_image = get_the_post_thumbnail_url(null, "large");
            ?>
            <style>
                .page-header{
                    background-image: url(<?php echo $alpha_feat_image; ?>);
                }
            </style>
            <?php
        }
    
        if(is_front_page()) {
            if( current_theme_supports( "custom-header" ) ){
                ?>
                <style>
                .header{
                    background-image: url(<?php echo header_image(); ?>);
                    background-size: cover;
                    background-position: center;
                    background-color: #ddd;
                    padding: 50px 0;
                    margin-bottom: 30px;
                }
    
                .header h1 a, .header h3.tagline{
                    color: #<?php echo get_header_textcolor(); ?>;
    
                    <?php 
                    if(!display_header_text()){
                        echo "display: none";
                    }
                    ?>
                }
    
                </style>
                <?php
            }
        }
    }
    add_action("wp_head","alpha_about_page_template_banner",11);
}

if(!function_exists("alpha_todays_date")){
    function alpha_todays_date(){
        echo date( "d/m/y" );
    }
}




$defaults = array(
    'before'           => '<p>' . __( 'Pages:', 'alpha' ),
    'after'            => '</p>',
    'link_before'      => '',
    'link_after'       => '',
    'next_or_number'   => 'number',
    'separator'        => ' ',
    'nextpagelink'     => __( 'Next page', 'alpha'),
    'previouspagelink' => __( 'Previous page', 'alpha' ),
    'pagelink'         => '%',
    'echo'             => 1
);
wp_link_pages( $defaults );

function alpha_body_class($classes){
    unset( $classes[array_search("custom-background", $classes)]);
    unset( $classes[array_search("single-format-audio", $classes)]);
    $classes [] = "newclasses";
    return $classes;
}
add_filter( "body_class", "alpha_body_class" );

function alpha_post_class($classes){
    unset( $classes[array_search("tag-weather", $classes)]);
    return $classes;
}
add_filter( "post_class", "alpha_post_class" );


function alpha_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter( "the_content", "alpha_highlight_search_results" );
add_filter( "the_excerpt", "alpha_highlight_search_results" );
add_filter( "the_title", "alpha_highlight_search_results" );

function alpha_image_srcset(){
    return null;
}
add_filter( "wp_calculate_image_srcset", "alpha_image_srcset" );