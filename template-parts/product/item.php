<div class="w-full lg:w-1/3 px-2 mb-4">
  <!-- КАРТОЧКА ПРОДУКТА -->
  <?php 
  $title_product = get_the_title(); 
  $image_product = get_the_post_thumbnail_url();
  $price_product = carbon_get_the_post_meta('product_price');
  ?>
  <div class="product_card relative">
    <a href="<?php echo get_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-1"></a>
    <div class="product_card_img">
      <img src="<?php echo $image_product; ?>" alt="<?php echo $title_product; ?>" loading="lazy">
    </div>
    <div class="product_card_title text-md px-4">
      <?php echo $title_product; ?>
    </div>
    <div class="product_card_desc mb-4 px-4">
      <?php _e('Артикул', 'treba-wp'); ?>: <?php echo carbon_get_the_post_meta('product_articl'); ?>
    </div>
    <div class="flex justify-between items-center px-4 pb-4">
      <div class="product_card_price">
        <!-- Если есть скидка -->
        <?php if ($sale_price): ?>
          <?php echo carbon_get_the_post_meta('product_price'); ?>
          <span class="currency"><?php echo carbon_get_theme_option('currency_symbols'); ?></span>

          <?php echo carbon_get_the_post_meta('product_price_sale'); ?>
          <span class="currency"><?php echo carbon_get_theme_option('currency_symbols'); ?></span>
        <!-- END Если есть скидка -->

        <!-- Если скидки нет -->
        <?php else: ?>
          <?php echo carbon_get_the_post_meta('product_price'); ?>
          <span class="currency"><?php echo carbon_get_theme_option('currency_symbols'); ?></span>
        <!-- END Если скидки нет -->
        <?php endif; ?>
      </div>
      <div class="product_card_cart">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cart-blue.svg" alt="<?php _e("Додати в кошик", "treba-wp"); ?>" class="relative cursor-pointer z-1 add-to-cart-js" data-product-title="<?php echo $title_product; ?>" data-product-image="<?php echo $image_product; ?>" data-product-price="<?php echo $price_product; ?>" data-product-qty="1">
      </div>
    </div>
    <div class="px-4 pb-4">
      <div class="flex items-center">
        <div class="mr-2">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/np_logo.svg" alt="Нова пошта" class="w-[16px]">
        </div>
        <div class="text-theme-red text-sm"><?php _e("Безкоштовна доставка по Україні", "treba-wp"); ?></div>
      </div>
    </div>
  </div>
  <!-- END КАРТОЧКА ПРОДУКТА -->
</div>