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
  /* Header images: 990 x 257. */
  /* Header thumbnails: 230 x 60. */
  register_default_headers( array(
    'bazaar' => array(
      'url'           => '%2$s/images/headers/bazaar.jpg',
      'thumbnail_url' => '%2$s/images/headers/bazaar-thumbnail.jpg',
      'description'   => _x( 'Bazaar', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/15981309416/'
    ),
    'causeway' => array(
      'url'           => '%2$s/images/headers/causeway.jpg',
      'thumbnail_url' => '%2$s/images/headers/causeway-thumbnail.jpg',
      'description'   => _x( 'Causeway', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/14975660961/'
    ),
    'cafe' => array(
      'url'           => '%2$s/images/headers/cafe.jpg',
      'thumbnail_url' => '%2$s/images/headers/cafe-thumbnail.jpg',
      'description'   => _x( 'Cafe', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/15836437415/'
    ),
    'atrium' => array(
      'url'           => '%2$s/images/headers/atrium.jpg',
      'thumbnail_url' => '%2$s/images/headers/atrium-thumbnail.jpg',
      'description'   => _x( 'Atrium', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/15836437415/'
    ),
    'buddha' => array(
      'url'           => '%2$s/images/headers/buddha.jpg',
      'thumbnail_url' => '%2$s/images/headers/buddha-thumbnail.jpg',
      'description'   => _x( 'Buddha', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/16491809956/'
    ),
    'edinburgh' => array(
      'url'           => '%2$s/images/headers/edinburgh.jpg',
      'thumbnail_url' => '%2$s/images/headers/edinburgh-thumbnail.jpg',
      'description'   => _x( 'edinburgh', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/15062454096/'
    ),
    'georgetown' => array(
      'url'           => '%2$s/images/headers/georgetown.jpg',
      'thumbnail_url' => '%2$s/images/headers/georgetown-thumbnail.jpg',
      'description'   => _x( 'George Town', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/19892541354/'
    ),
    'siamreap' => array(
      'url'           => '%2$s/images/headers/siamreap.jpg',
      'thumbnail_url' => '%2$s/images/headers/siamreap-thumbnail.jpg',
      'description'   => _x( 'Siam Reap', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/20400291183/'
    ),
    'busan' => array(
      'url'           => '%2$s/images/headers/busan.jpg',
      'thumbnail_url' => '%2$s/images/headers/busan-thumbnail.jpg',
      'description'   => _x( 'Busan', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/16465448569/'
    ),
    'paris' => array(
      'url'           => '%2$s/images/headers/paris.jpg',
      'thumbnail_url' => '%2$s/images/headers/paris-thumbnail.jpg',
      'description'   => _x( 'Paris', 'Header image description', 'ubersmake' ),
      'source'        => 'https://www.flickr.com/photos/ubersmake/15174505258/'
    ),
  ) );
}
add_action( 'after_setup_theme', 'ubersmake_custom_header_setup' );

function ubersmake_remove_pilcrow_custom_header_setup() {
  remove_action( 'after_setup_theme', 'pilcrow_custom_header_setup' );
}
add_action ('after_setup_theme', 'ubersmake_remove_pilcrow_custom_header_setup', 0 );