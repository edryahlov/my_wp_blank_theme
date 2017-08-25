<?php

/*
========================
ADMIN ENQUEUE FUNCTIONS
========================
*/
function my_load_admin_scripts(){
    wp_enqueue_style('roboto','//fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic');
    wp_enqueue_style('my_admin',get_template_directory_uri().'/css/my.admin.min.css',array(),CSS_VERSION,'all');
    wp_enqueue_script('my-admin-script',get_template_directory_uri().'/js/my.admin.js',array('jquery'),'1.0.0',true);
}
add_action('admin_enqueue_scripts','my_load_admin_scripts');

/*
========================
FRONT-END ENQUEUE FUNCTIONS
========================
*/
function my_load_scripts(){
    wp_enqueue_style('roboto','//fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic');
    //wp_enqueue_style('bootstrap4beta','//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css',false,'4.0.0b');
    wp_enqueue_style('bootstrap4beta',get_template_directory_uri().'/css/bootstrap4beta.min.css',false,CSS_VERSION);//'4.0.0b'
    wp_enqueue_style('my',get_template_directory_uri().'/css/my.min.css',false,CSS_VERSION);

    wp_deregister_script( 'jquery' ); //remove default jquery from top
    wp_enqueue_script('jquery','//code.jquery.com/jquery-3.2.1.slim.min.js',false,'3.2.1',true);
    wp_enqueue_script('my-script',get_template_directory_uri().'/js/my.admin.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script('popper','//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',array('jquery'),'1.11.0',true);
    wp_enqueue_script('bootstrap4b','//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js',array('jquery'),'4.0.0b',true);
}
add_action( 'wp_enqueue_scripts', 'my_load_scripts');
