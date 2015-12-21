<?php
    if (have_posts()) : while (have_posts()) : the_post();

    $format = get_post_format();
    if (false === $format)
        $format = 'standard';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        if ('link' != $format) :
            the_title('<h1 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h1>');
        endif;
    ?>

    <div class="entry entry-content">
        <?php
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-link">' . __('Pages:', 'pilcrow'),
                'after' => '</div>'
            ));
        ?>
    </div>
</div>

<?php

endwhile;
endif;
