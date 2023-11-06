<?php

function register_custom_taxonomy() {
  
  $product_category_args = array (
    'label' => 'Категорії',
    'labels' => array(
      'menu_name' => 'Категорії',
      'name' => 'Категорії',
      'singular_name' => 'Категорія',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true, 
    
    'rewrite' => array(
      // 'slug' => 'city',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'product-category', array( 'products' ), $product_category_args );
}
add_action( 'init', 'register_custom_taxonomy');

?>