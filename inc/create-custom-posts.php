<?php

function create_post_type() {
  register_post_type( 'products',
    array(
      'labels' => array(
          'name' => __( 'Товари' ),
          'singular_name' => __( 'Товар' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-feedback',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    )
  );

  register_post_type( 'orders',
    array(
      'labels' => array(
          'name' => __( 'Замовлення' ),
          'singular_name' => __( 'Замовлення' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-feedback',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    )
  );
  
}
add_action( 'init', 'create_post_type' );