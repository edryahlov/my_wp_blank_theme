<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php the_title('<h1>','</h1>');?>
    </header>

    <?php the_content();?>

    <?php
    /* get post content without <p> wrapping
    $query = get_post(get_the_ID());
    echo $query->post_content;
    */
    ?>

    <footer>
        <!-- footer -->
    </footer>
</article>
