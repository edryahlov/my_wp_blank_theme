<?php

if (isset($_COOKIE['lang']) && !isset($_GET['lang'])) {
    //get language from cookie
    define('LANG',$_COOKIE['lang']);
} else {
    //get language
    strstr($_SERVER['HTTP_ACCEPT_LANGUAGE'],'ru') ? $flag='rus' : $flag='eng';
    $_GET['lang'] == 'rus' ? $flag='rus' :  false;
    $_GET['lang'] == 'eng' ? $flag='eng' :  false;

    //final check - is language pack available?
    ($flag=='rus' && in_array('ru_RU',get_available_languages(get_template_directory() . '/languages')))  ? $flag='rus' :  $flag='eng';

    //set language
    define('LANG',$flag);
    setcookie('lang',$flag,time()+86400*10);
}

define('DOMAIN',wp_get_theme()->get('TextDomain')); //set domain text for translation - gets from style.css

if (LANG == 'rus') {
    add_filter('language_attributes', function ($e) {
        return str_replace('en-US', 'ru-RU', $e);
    });
    add_action('template_redirect', function () {
        load_textdomain(DOMAIN, get_template_directory() . '/languages/ru_RU.mo');
    });
}
