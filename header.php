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



<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <nav class="row">
                <?php
                    $nav_menu_args = array(
                        'theme_location'  => 'header_menu_'.LANG,
                        'echo'            => false, //leave it for processing via regexp
                        'container'       => '',
                        'container_class' => '',
                        'items_wrap'      => '%3$s',
                        'depth'           => 0,
                        'walker'          => new Walker_Nav_Menu1
                    );
                    echo wp_nav_menu($nav_menu_args);
                ?>
                <div class="col">
                <?php

                $lang_path = parse_url($_SERVER['REQUEST_URI'])['path'];
                if (strstr($_SERVER['REQUEST_URI'],'_rus.html?lang=rus')) {$lang_path = str_replace('_rus.html','.html',$lang_path);}
                else {
                    $lang_path = str_replace('_rus','',$lang_path); //cleanup
                    $lang_path = str_replace('.html','_rus.html',$lang_path);
                }

                LANG == 'eng' ? $lang_choice = '<a href="'.$lang_path.'?lang=rus"><img src="'.get_template_directory_uri().'/img/flag_rus.svg" class="flag" alt="RUS"></a>' : $lang_choice = '<a href="'.$lang_path.'?lang=eng"><img src="'.get_template_directory_uri().'/img/flag_us.svg" class="flag" ALT="ENG"></a>';
                echo $lang_choice;

                ?>
                </div>
            </nav>
        </div>
    </div>
</div>

<object type="image/svg+xml" data=”your.svg" id=’object’ class=’icon’></object>

<div class="container">
    <div class="row">
        <div class="col">
