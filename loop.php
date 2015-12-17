<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package Pilcrow
 * @since Pilcrow 1.0
 */

/* Display navigation to next/previous pages when applicable */

if ( $wp_query->max_num_pages > 1 ) :
?>
<div id="nav-above" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pilcrow' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pilcrow' ) ); ?></div>
</div><!-- #nav-above -->
<?php
endif;

/* If there are no posts to display, such as an empty archive page */
if ( ! have_posts() ) : ?>
<div id="post-0" class="post error404 not-found">
    <h1 class="entry-title"><?php _e( 'Not Found', 'pilcrow' ); ?></h1>
    <div class="entry entry-content">
        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pilcrow' ); ?></p>
        <?php get_search_form(); ?>
    </div><!-- .entry-content -->
</div><!-- #post-0 -->
<?php
endif;

/* Start the Loop.
 *
 * In Pilcrow we use the same loop in multiple contexts.
 * It is broken into three main parts: when we're displaying
 * posts that are in the gallery category, when we're displaying
 * posts in the asides category, and finally all other posts.
 *
 * Additionally, we sometimes check for whether we are on an
 * archive page, a search page, etc., allowing for small differences
 * in the loop on each template without actually duplicating
 * the rest of the loop that is shared.
 *
 * Without further ado, the loop:
 */
while ( have_posts() ) : the_post();

$format = get_post_format();
if ( false === $format )
    $format = 'standard';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Surround any content with a div for layout manipulation. -->
    <div class="entry-outer"
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
            style="background-size: cover; background-position: center; background-image: url('<?php the_post_thumbnail_url( 'medium' ); ?>');"
        <?php endif; ?>>

        <?php
            if ( 'link' != $format ) :
                the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( is_search() ) : // Only display excerpts in search.
        ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry entry-content">

            <?php
            /* No content for image posts */
            if ( 'image' != $format) :
                if ( 'link' == $format ) :
                    printf( __( '<h2>'));
                endif;

                the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pilcrow' ) );
                
                if ( 'link' == $format ) :
                    printf( __( '</h2>'));
                endif;
            endif;
            ?>

            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'pilcrow' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
        <?php endif; // is_search ?>
    </div>
</div><!-- #post-## -->

<?php comments_template(); ?>

<?php endwhile; // End the loop. Whew.

/* Display navigation to next/previous pages when applicable */
if ( $wp_query->max_num_pages > 1 ) :
?>
<div id="nav-below" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pilcrow' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pilcrow' ) ); ?></div>
</div><!-- #nav-below -->
<?php
endif;
