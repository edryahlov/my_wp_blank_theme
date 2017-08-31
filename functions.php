<?php
define('CSS_VERSION',time()); //dev css anti-cache - replace time() on production to something more reasonable, like 1.0.1
//define('DOMAIN',''); //uncomment if /translation.php not connected


require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles
require get_template_directory().'/inc/translation.php'; //translation module
require get_template_directory().'/inc/html-on-pages.php'; //adds .html to pages
require get_template_directory().'/inc/theme-support.php';
require get_template_directory().'/inc/nav-menu-walker.php';


