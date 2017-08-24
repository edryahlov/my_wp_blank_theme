<?php

$filename = get_template_directory()."/style.css";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
preg_match('/Text Domain: ([0-9a-zA-Z_-]{2,20})/', $contents, $text_domain);
define('DOMAIN',$text_domain[1]); //set domain text for translation - gets from style.css

if (strstr($_SERVER['HTTP_ACCEPT_LANGUAGE'],'ru') && in_array('ru_RU',get_available_languages(get_template_directory() . '/languages'))) {
//    echo $text_domain;
add_filter('language_attributes',function (){
return 'lang="ru-RU"';
});
add_action('template_redirect', function(){
load_textdomain(DOMAIN, get_template_directory() . '/languages/ru_RU.mo' );
});
}