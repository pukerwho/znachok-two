<?php
//Meta e
function meta_e($post_id, $meta, $value) {
  if ( metadata_exists( 'e', $post_id, $meta ) ) {
    $site_meta = get_post_meta( $post_id, $meta, true );
    return $site_meta;
  } else {
    add_post_meta( $post_id, $meta, $value, true );
    $site_meta = get_post_meta( $post_id, $meta, true );
    return $site_meta;
  }
}

//rating 
function get_rating($post_id, $meta) {
  if ( metadata_exists( 'post', $post_id, $meta ) ) {
    $get_rating = get_post_meta( $post_id, $meta, true );
    return $get_rating;
  } else {
    $rand_rating = mt_rand(1, 7);
    $rand_rating = "4.".$rand_rating;
    add_post_meta( $post_id, $meta, $rand_rating, true );
    $get_rating = get_post_meta( $post_id, $meta, true );
    return $get_rating;
  }
}