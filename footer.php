</div>
    <div id="footer" role="contentinfo">
        <div id="colophon">
            <?php get_sidebar('footer'); ?>
            <div id="site-info">
                <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a> is <a href="mailto:paul@ubersmake.com" target="_blank">Paul Morales</a>
            </div>
            <div id="site-generator">
                <a href="https://github.com/Ubersmake/Ubersmake.com-WordPress-Theme" target="_blank">Custom Theme on GitHub</a>
                &middot;
                <?php printf(__('Original Theme: %1$s by %2$s.', 'pilcrow'), 'Pilcrow', '<a href="http://automattic.com/" target="_blank" rel="designer">Automattic</a>'); ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php
    do_action('pilcrow_after');
    wp_footer();
?>

</body>
</html>
