<?php get_header(); ?>

<h1><?php _e('Index page (/index.php)',DOMAIN);?></h1>

<?php
if (have_posts()) {
    while (have_posts()) {the_post();
        get_template_part('template-parts/content',get_post_format());
    }
}
?>

<?php get_footer(); ?>
