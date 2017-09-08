<?php

//require get_template_directory().'/inc/custom-post-format.php'; //custom post formats - it's kinda categories - so... fuck it :)

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



##  отменим показ выбранного термина наверху в checkbox списке терминов
add_filter( 'wp_terms_checklist_args', 'set_checked_ontop_default', 10 );
function set_checked_ontop_default( $args ) {
    // изменим параметр по умолчанию на false
    if( ! isset($args['checked_ontop']) )
        $args['checked_ontop'] = false;

    return $args;
}

/**
 * Add SVG capabilities
 */
function wpcontent_svg_mime_type( $mimes = array() ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );



## Удаление файлов license.txt и readme.html для защиты
if( is_admin() && ! defined('DOING_AJAX') ){
    $license_file = ABSPATH .'/license.txt';
    $readme_file = ABSPATH .'/readme.html';

    if( file_exists($license_file) && current_user_can('manage_options') ){
        $deleted = unlink($license_file) && unlink($readme_file);

        if( ! $deleted  )
            $GLOBALS['readmedel'] = 'Не удалось удалить файлы: license.txt и readme.html из папки `'. ABSPATH .'`. Удалите их вручную!';
        else
            $GLOBALS['readmedel'] = 'Файлы: license.txt и readme.html удалены из из папки `'. ABSPATH .'`.';

        add_action( 'admin_notices', function(){  echo '<div class="error is-dismissible"><p>'. $GLOBALS['readmedel'] .'</p></div>'; } );
    }
}


 
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}
add_action('after_setup_theme', 'remove_admin_bar');
