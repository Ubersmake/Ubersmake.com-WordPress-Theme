<?php
    if (!have_posts()) : ?>
        <div id="post-0" class="post error404 not-found">
    
            <h1 class="entry-title"><?php _e('Not Found', 'pilcrow'); ?></h1>
            <div class="entry entry-content">
                <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pilcrow'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
<?php
endif;

while (have_posts()) : the_post();

$format = get_post_format();
if (false === $format)
    $format = 'standard';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-outer"
        <?php if (has_post_thumbnail($post->ID)): ?>
            style="background-size: cover; background-position: center; background-image: url('<?php the_post_thumbnail_url('large'); ?>');"
        <?php endif; ?>>

        <?php
            if ('link' != $format) :
                the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>');
            endif;

            if (has_excerpt($post->ID)) :
        ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
        
            <?php else : ?>
                <div class="entry entry-content">

                <?php
                    if ('image' != $format) :
                        if ('link' == $format) :
                            printf( __( '<h2>'));
                        endif;

                        the_content(__('', 'pilcrow'));

                        if ('link' == $format) :
                            printf( __( '</h2>'));
                        endif;
                    endif;
                ?>

                </div>
            <?php endif; ?>
    </div>
</div>

<?php endwhile;
