<?php 

function filter_shop() {
  //Получаем данные
  $categories_id = stripslashes_deep($_POST['categoriesArray']);
  $min_price = stripslashes_deep($_POST['min_price']);
  $max_price = stripslashes_deep($_POST['max_price']);
  if(count($categories_id) > 0 ){
    $category_tax[] = array(
      'taxonomy' => 'product-category',
      'terms' => $categories_id,
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    );
  };
  $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
  $ajax_query = new WP_Query( array( 
    'post_type' => 'products', 
    'posts_per_page' => 8,
    'order'    => 'DESC',
    'paged' => $current_page,
    'tax_query' => array(
      $category_tax
    ),
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key' => '_product_price',
        'value' => $min_price,
        'compare' => '>',
        'type'    => 'NUMERIC'
      ),
      array(
        'key' => '_product_price',
        'value' => $max_price,
        'compare' => '<',
        'type'    => 'NUMERIC'
      )
    )
  ) );

  $response = '';

  if($ajax_query->have_posts()) {
    while($ajax_query->have_posts()) : $ajax_query->the_post();
      $response .= get_template_part('template-parts/product/item');
    endwhile;
  } else {
    $response = 'empty';
  }
  
  // echo $response;
  die();
}

add_action('wp_ajax_filter_shop_click_action', 'filter_shop');
add_action('wp_ajax_nopriv_filter_shop_click_action', 'filter_shop');

?>