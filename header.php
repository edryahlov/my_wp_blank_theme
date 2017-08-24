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

<a href="<?php $_SERVER['REQUEST_URI']?>?lang=ru">RU</a> | <a href="<?php $_SERVER['REQUEST_URI']?>?lang=eng">ENG</a>

<?php echo $_COOKIE["lang"] ?>