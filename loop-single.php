<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package Pilcrow
 * @since Pilcrow 1.0
 */

if ( have_posts() ) : while ( have_posts() ) : the_post();

$format = get_post_format();
if ( false === $format )
	$format = 'standard';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( comments_open() ) : ?>
	<div class="jump"><a href="<?php the_permalink(); ?>#comments"><?php _e( '<span class="meta-nav">&darr; </span>Jump to Comments', 'pilcrow' ); ?></a></div>
	<?php endif;

	if ( 'link' != $format ) :
		the_title( '<h1 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark">', '</a></h1>' );
	endif;
	?>

	<div class="entry entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-link">' . __( 'Pages:', 'pilcrow' ),
				'after' => '</div>'
			) );
		?>
	</div><!-- .entry-content -->
</div><!-- #post-## -->

<?php

endwhile; // end of the loop.

endif;
