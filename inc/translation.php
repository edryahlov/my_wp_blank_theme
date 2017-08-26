<?php

define('DOMAIN',wp_get_theme()->get('TextDomain')); //set domain text for translation - gets from style.css

if (strstr($_SERVER['HTTP_ACCEPT_LANGUAGE'],'ru') && in_array('ru_RU',get_available_languages(get_template_directory() . '/languages'))) {
    add_filter('language_attributes',function ($e){
        return str_replace('en-US','ru-RU',$e);
    });
    add_action('template_redirect', function(){
        load_textdomain(DOMAIN, get_template_directory() . '/languages/ru_RU.mo' );
    });
}
