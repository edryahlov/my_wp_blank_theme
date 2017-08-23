<?php

/*
========================
ADMIN ENQUEUE FUNCTIONS
========================
*/
function my_load_admin_scripts(){
    wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic' );
    wp_enqueue_style( 'my_admin', get_template_directory_uri() . '/css/my.admin.css', array(), CSS_VERSION, 'all' );
    wp_enqueue_script( 'my-admin-script', get_template_directory_uri() . '/js/my.admin.js', array('jquery'), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'my_load_admin_scripts' );

/*
========================
FRONT-END ENQUEUE FUNCTIONS
========================
*/
function my_load_scripts(){
    wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic' );
    wp_enqueue_style( 'my', get_template_directory_uri() . '/css/my.css', array(), CSS_VERSION, 'all' );
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/my.admin.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_load_scripts' );
