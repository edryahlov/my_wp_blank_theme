<?php get_header(); ?>

<h1><?php _e('Index page (/index.php)',DOMAIN);?></h1>

<div class="container">
	<div class="row">
        <div class="col"><div class="">1</div></div>
		<div class="col-auto">
            <div class="row">
                <div class="col">sdfsdfs1</div>
                <div class="col text-nowrap">2sdfsdfsdf sdfsdf sdf</div>
                <div class="col text-center">3sdf</div>
                <div class="col">4ffffffffffffffffff</div>
            </div>
        </div>
	</div>
    <div class="row">
        <div class="col-xl-6 col-xxxl-12">xxxxx</div>
    </div>
</div>

<?php
if (have_posts()) {
    while (have_posts()) {the_post();
        get_template_part('template-parts/content',get_post_format());
    }
}
?>

<?php get_footer(); ?>
