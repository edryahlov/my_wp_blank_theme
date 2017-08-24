<?php get_header(); ?>

<h1>Single page (/single.php)</h1>

<?php
if (have_posts()) {
    while (have_posts()) {the_post();
        get_template_part('template-parts/single',get_post_format());
    }
}
?>

<?php get_footer(); ?>
