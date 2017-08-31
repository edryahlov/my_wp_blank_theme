<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

    $lang_path = parse_url($_SERVER['REQUEST_URI'])['path'];
    if (strstr($_SERVER['REQUEST_URI'],'_rus.html?lang=rus')) {$lang_path = str_replace('_rus.html','.html',$lang_path);}
    else {$lang_path = str_replace('.html','_rus.html',$lang_path);}

    LANG == 'eng' ? $lang_choice = '<a href="'.$lang_path.'?lang=rus">RUS</a>' : $lang_choice = '<a href="'.$lang_path.'?lang=eng">ENG</a>';
    echo $lang_choice;

?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <?php
                $nav_menu_args = array(
                    'theme_location'  => 'header_menu_'.LANG,
                    'echo'            => false, //leave it for processing via regexp
                    'container'       => 'nav',
                    'container_class' => 'row',
//                    'before'          => '<div class="col text-nowrap">',
//                    'after'           => '</div>',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => new Walker_Nav_Menu1
                );
                echo wp_nav_menu($nav_menu_args);
                ?>
        </div>
    </div>
</div>
