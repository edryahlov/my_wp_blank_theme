<?php

if (!empty($_GET['lang'])) {
    unset($_COOKIE["lang"]);
    $_COOKIE["lang"] = esc_html($_GET['lang']);
}


define('CSS_VERSION',time()); //dev css anti-cache - replace time() on production to something more reasonable, like 1.0.1

require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles

//require get_template_directory().'/inc/custom-post-format.php'; //custom post formats - uncomment if needed
function add_post_formats() { //or use default ones
    add_theme_support('post-formats', array('gallery', 'quote', 'video', 'aside', 'image', 'link')); //default post formats delete not needed ones
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption')); //html5 support
}
add_action( 'after_setup_theme', 'add_post_formats', 20 );


//**************************************************************************/

if (strstr($_SERVER['HTTP_ACCEPT_LANGUAGE'],'ru-RU') && in_array('ru_RU',get_available_languages(get_template_directory() . '/languages'))) {
    if ($_COOKIE['lang'] == 'eng') return;
    add_action('template_redirect', function(){
        load_textdomain('my', get_template_directory() . '/languages/ru_RU.mo' );
    });
}