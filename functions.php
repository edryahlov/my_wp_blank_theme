<?php
define('CSS_VERSION',time()); //dev css anti-cache - replace time() on production to something more reasonable, like 1.0.1
//define('DOMAIN',''); //uncomment if /translation.php not connected


require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles
require get_template_directory().'/inc/translation.php'; //translation module
require get_template_directory().'/inc/html-on-pages.php'; //adds .html to pages



//require get_template_directory().'/inc/custom-post-format.php'; //custom post formats - uncomment if needed
function add_post_formats() { //or use default ones
    add_theme_support('post-formats', array('gallery', 'quote', 'video', 'aside', 'image', 'link')); //default post formats delete not needed ones
}
add_action( 'after_setup_theme', 'add_post_formats', 20 );


function add_some_theme_support() {
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption')); //html5 support
    register_nav_menus( array(
        'header_menu_eng' => 'Header menu ENG',
        'header_menu_rus' => 'Header menu RUS'
    ) );
}
add_action( 'after_setup_theme', 'add_some_theme_support', 20 );



// add tag support to pages
function tags_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
}
// ensure all tags are included in queries
function tags_support_query($wp_query) {
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}
// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');