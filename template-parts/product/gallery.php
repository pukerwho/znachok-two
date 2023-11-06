<div>
  <div class="product_gallery flex flex-col-reverse lg:flex-row lg:-m-5">
    <div class="product_gallery_list flex flex-row lg:flex-col p-2 lg:p-5">
      <!-- Показываем остальные -->
      <?php 
      $photos = carbon_get_the_post_meta('product_photos');
      foreach ( $photos as $photo ): ?>
        <?php 
          $photo_src_large = wp_get_attachment_image_src($photo, 'large'); 
          $photo_src_medium = wp_get_attachment_image_src($photo, 'medium'); 
        ?>
        <div class="product_gallery_list_single">
          <a href="<?php echo $photo_src_large[0]; ?>" data-lightbox="product-lightbox" data-title="<?php the_title(); ?>">
            <img src="<?php echo $photo_src_medium[0]; ?>" alt="">
          </a>
        </div>
      <?php endforeach; ?>
      <!-- END Показываем остальные -->
    </div>
    <div class="product_gallery_item p-2 lg:py-5 lg:pl-0 lg:pr-5">
      <!-- Показываем первую фотку -->
      <div class="product_gallery_item_main">
        <a href="<?php echo get_the_post_thumbnail_url(); ?>" data-lightbox="product-lightbox" data-title="<?php the_title(); ?>">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
        </a>
      </div>
      <!-- END Показываем первую фотку -->
    </div>
  </div>
</div>