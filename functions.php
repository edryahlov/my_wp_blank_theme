<?php

define('CSS_VERSION',time()); //anti-cache

require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts
