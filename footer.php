<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package Pilcrow
 * @since Pilcrow 1.0
 */
?>

		</div><!-- #content-box -->

		<div id="footer" role="contentinfo">
			<div id="colophon">

				<?php
					/* A sidebar in the footer? Yep. You can can customize
					 * your footer with two columns of widgets.
					 */
					get_sidebar( 'footer' );
				?>

				<div id="site-info">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> by <a href="mailto:paul@ubersmake.com" target="_blank">Paul Morales</a>
				</div><!-- #site-info -->

				<div id="site-generator">
					<a href="https://github.com/Ubersmake/Ubersmake.com-WordPress-Theme" target="_blank">Custom Theme on GitHub</a>
					&middot;
					<?php printf( __( 'Original Theme: %1$s by %2$s.', 'pilcrow' ), 'Pilcrow', '<a href="http://automattic.com/" target="_blank" rel="designer">Automattic</a>' ); ?>
				</div><!-- #site-generator -->

			</div><!-- #colophon -->
		</div><!-- #footer -->

	</div><!-- #page .blog -->
</div><!-- #container -->

<?php
do_action( 'pilcrow_after' );

/* Always have wp_footer() just before the closing </body>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to reference JavaScript files.
 */
wp_footer();
?>
</body>
</html>
