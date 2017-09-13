<?php
define('CSS_VERSION',time()); //dev css anti-cache - replace time() on production to something more reasonable, like 1.0.1
//define('DOMAIN',''); //uncomment if /translation.php not connected


require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles
require get_template_directory().'/inc/translation.php'; //translation module
require get_template_directory().'/inc/html-on-pages.php'; //adds .html to pages
require get_template_directory().'/inc/theme-support.php';
require get_template_directory().'/inc/nav-menu-walker.php';
require get_template_directory().'/acf.php'; //advanced custom fields

//define( 'ACF_LITE', true ); //To remove all visual interfaces from the Advanced Custom Fields plugin, you can use a constant to enable lite mode.

if (is_admin())
{
    $query = new WP_Query(array(
        'category_name' => 'verstka',
        'posts_per_page' => -1,
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            if (!get_post_meta(get_the_ID(), 'clicks', true)) update_post_meta(get_the_ID(), 'clicks', 0);
//            update_post_meta(get_the_ID(), 'clicks', 0);
        }
    }
    wp_reset_postdata();
}





