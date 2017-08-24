<?php

$filename = get_template_directory()."/style.css";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
preg_match('/(Text Domain: )([0-9a-zA-Z_-]{2,20})/', $contents, $text_domain);

define('CSS_VERSION',time()); //dev css anti-cache - replace time() on production to something more reasonable, like 1.0.1
define('DOMAIN',$text_domain[2]); //set domain text for translation - gets from style.css

require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles

//require get_template_directory().'/inc/custom-post-format.php'; //custom post formats - uncomment if needed
function add_post_formats() { //or use default ones
    add_theme_support('post-formats', array('gallery', 'quote', 'video', 'aside', 'image', 'link')); //default post formats delete not needed ones
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption')); //html5 support
}
add_action( 'after_setup_theme', 'add_post_formats', 20 );


//translation
if (strstr($_SERVER['HTTP_ACCEPT_LANGUAGE'],'ru') && in_array('ru_RU',get_available_languages(get_template_directory() . '/languages'))) {
    add_filter('language_attributes',function (){
        return 'lang="ru-RU"';
    });
    add_action('template_redirect', function(){
        load_textdomain('my', get_template_directory() . '/languages/ru_RU.mo' );
    });
}



