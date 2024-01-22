<!-- Swiper Навигация -->
<div class="popular_arrows relative flex">
  <div class="popular_arrows_prev flex justify-center items-center cursor-pointer mr-3 lg:mr-5">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow_next.svg" >
  </div>
  <div class="popular_arrows_next flex justify-center items-center cursor-pointer">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow_next.svg" >
  </div>
</div>
<!-- END Swiper Навигация -->

<div class="swiper-container swiper-popular-product-container left-container ">
  <div class="swiper-wrapper">
    <?php 
      $query = new WP_Query( array( 
        'post_type' => 'products', 
        'posts_per_page' => 9,
        'order'    => 'DESC',
      ) );
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <!-- КАРТОЧКА ПРОДУКТА -->
      <div class="swiper-slide">
        <div class="product_card relative">
          <a href="<?php echo get_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
          <div class="product_card_img">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" loading="lazy">
          </div>
          <div class="product_card_title px-5">
            <?php the_title(); ?>
          </div>
          <div class="product_card_desc mb-6 px-5">
            Артикул: <?php echo carbon_get_the_post_meta('product_articl'); ?>
          </div>
          <div class="flex justify-between items-center px-5 pb-5">
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
            <div class="product_card_cart big">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cart-blue.svg" alt="<?php _e("Купити", "treba-wp"); ?>">
            </div>
          </div>
        </div>
      </div>
      <!-- END КАРТОЧКА ПРОДУКТА -->
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>