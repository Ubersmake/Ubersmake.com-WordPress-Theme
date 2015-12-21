<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 7) | (!IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('pilcrow_before'); ?>
<div id="container" class="hfeed">
<?php do_action('before'); ?>
    <div id="page" class="blog">
        <div id="header">
            <?php $heading_tag = (is_home() || is_front_page()) ? 'h1' : 'div'; ?>
            <<?php echo $heading_tag; ?> id="site-title">
                <span>
                    <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                </span>
            </<?php echo $heading_tag; ?>>

            <div id="nav" role="navigation">
                <div class="skip-link screen-reader-text">
                    <a href="#content" title="<?php esc_attr_e('Skip to content', 'pilcrow'); ?>"><?php _e('Skip to content', 'pilcrow'); ?></a>
                </div>
                <?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'primary')); ?>
			</div>

            <div id="pic">
                <a href="<?php echo get_custom_header()->source; ?>" rel="home">
                <?php
					
                    if (is_singular() && has_post_thumbnail() &&
						($image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumbnail')) &&
                        $image[1] >= get_custom_header()->width) :
						the_post_thumbnail();
					elseif (get_header_image()) : ?>
                        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
                <?php endif; ?>
                </a>
            </div>
        </div>

        <div id="content-box">
