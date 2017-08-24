<?php
define('CSS_VERSION',time()); //dev css anti-cache - replace time() on production to something more reasonable, like 1.0.1



require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles
require get_template_directory().'/inc/translation.php'; //translation module

//require get_template_directory().'/inc/custom-post-format.php'; //custom post formats - uncomment if needed
function add_post_formats() { //or use default ones
    add_theme_support('post-formats', array('gallery', 'quote', 'video', 'aside', 'image', 'link')); //default post formats delete not needed ones
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption')); //html5 support
}
add_action( 'after_setup_theme', 'add_post_formats', 20 );



