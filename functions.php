<?php

define('CSS_VERSION',time()); //dev anti-cache - replace time() on production to something more reasonable, like 1.0.1

require get_template_directory().'/inc/cleanup.php'; //cleanup WP version in metas for security reasons
require get_template_directory().'/inc/enqueue.php'; //enqueueing the scripts and styles
