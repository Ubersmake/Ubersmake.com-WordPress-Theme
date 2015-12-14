<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/* Modified from pilcrow/inc/custom-header.php */
function ubersmake_custom_header_setup() {
  $args = array(
    'default-image'          => '%2$s/images/headers/bazaar.jpg',
    'default-text-color'     => '000',
    'width'                  => apply_filters( 'pilcrow_header_image_width', 990 ),
    'height'                 => apply_filters( 'pilcrow_header_image_height', 257 ),
    'wp-head-callback'       => 'pilcrow_header_style',
    'admin-head-callback'    => 'pilcrow_admin_header_style',
    'admin-preview-callback' => 'pilcrow_admin_header_image',
  );

  $options = pilcrow_get_theme_options();
  if ( in_array( $options['theme_layout'], array( 'content-sidebar', 'sidebar-content' ) ) ) {
    $args['width']  = apply_filters( 'pilcrow_header_image_width', 770 );
    $args['height'] = apply_filters( 'pilcrow_header_image_height', 200 );
  }

  add_theme_support( 'custom-header', apply_filters( 'pilcrow_custom_header_args', $args ) );

  // We'll be using post thumbnails for custom header images on posts and pages.
  // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
  set_post_thumbnail_size( get_custom_header()->width, get_custom_header()->height, true );

  // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
  register_default_headers( array(
    'bazaar' => array(
      'url'           => '%2$s/images/headers/bazaar.jpg',
      'thumbnail_url' => '%2$s/images/headers/bazaar-thumbnail.jpg',
      'description'   => _x( 'Bazaar', 'Header image description', 'ubersmake' )
    ),
  ) );
}
add_action( 'after_setup_theme', 'ubersmake_custom_header_setup' );

function ubersmake_remove_pilcrow_custom_header_setup() {
  remove_action( 'after_setup_theme', 'pilcrow_custom_header_setup' );
}
add_action ('after_setup_theme', 'ubersmake_remove_pilcrow_custom_header_setup', 0 );