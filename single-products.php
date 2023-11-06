<?php 
  get_header();
  $title_product = get_the_title(); 
  $image_product = get_the_post_thumbnail_url();
  $price_product = carbon_get_the_post_meta('product_price'); 
?>

<div class="pt-32 lg:pt-48 mb-20">
  <div class="container mx-auto px-4 md:px-0">
    
    <div class="mb-8">
      <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex items-center flex-wrap">
          <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
            <a itemprop="item" href="<?php echo home_url(); ?>">
              <span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <?php 
          $current_term = wp_get_post_terms(  get_the_ID() , 'product-category', array( 'parent' => 0 ) );
          foreach (array_slice($current_term, 0,1) as $myterm); {
          } ?>
          <?php if ($myterm): ?>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'product-category') ?>">
                <span itemprop="name"><?php echo $myterm->name; ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
          <?php endif; ?>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
            <span itemprop="name"><?php the_title(); ?></span>
            <meta itemprop="position" content="3" />
          </li>
        </ul>
      </div>
      <!-- Title -->
      <h1 class="text-3xl lg:text-6xl font-black mb-2"><?php the_title(); ?></h1>
      <!-- END Title -->

      <!-- Артикул -->
      <div class="text-sm color_gray">
        <?php _e('Артикул', 'treba-wp'); ?>: <?php echo carbon_get_the_post_meta('product_articl'); ?>
      </div>
      <!-- END Артикул -->
    </div>

    <div class="flex flex-col lg:flex-row bg-white rounded-r-3xl lg:-mx-4 mb-20">
      <div class="w-full lg:w-7/12 lg:px-4">
        <?php get_template_part('template-parts/product/gallery'); ?>
      </div>
      <div class="w-full lg:w-5/12 lg:px-4 py-4">

        <div class="h-full flex flex-col justify-between">
          <!-- Top -->
          <div>
            <!-- Price -->
            <div>

              <!-- Если есть скидка -->
              <?php if ($sale_price): ?>
                <div class="mb-2">
                  <div class="product_single_price old inline-block">
                    <?php echo carbon_get_the_post_meta('product_price'); ?>
                    <span class="currency"><?php echo carbon_get_theme_option('currency_symbols'); ?></span>
                  </div>
                </div>

                <div class="product_single_price new inline-block px-4 py-2 mb-5">
                  <?php echo carbon_get_the_post_meta('product_price_sale'); ?>
                  <span class="currency"><?php echo carbon_get_theme_option('currency_symbols'); ?></span>
                </div>
              <!-- END Если есть скидка -->

              <!-- Если скидки нет -->
              <?php else: ?>
                <div class="product_single_price new inline-block px-4 py-2 mb-5">
                  <?php echo carbon_get_the_post_meta('product_price'); ?>
                  <span class="currency"><?php echo carbon_get_theme_option('currency_symbols'); ?></span>
                </div>
              <!-- END Если скидки нет -->

              <?php endif; ?>
            </div>
            <!-- END Price -->

            <!-- Short Description -->
            <div class="product_single_description mb-8">
              <?php echo carbon_get_the_post_meta('product_description'); ?>
            </div>
            <!-- END Short Description -->

            <!-- Meta -->
            <div>
              <?php if(carbon_get_the_post_meta('product_info_material')): ?>
              <div class="flex items-center text-sm mb-5">
                <div class="w-2/5 md:w-1/5 font-bold pr-3">
                  <span><?php _e('Матеріал', 'treba-wp'); ?></span>:
                </div>
                <div class="w-3/5 md:w-4/5">
                  <?php echo carbon_get_the_post_meta('product_info_material'); ?>
                </div>
              </div>
              <?php endif; ?> 

              <?php if(carbon_get_the_post_meta('product_info_styajka')): ?>
              <div class="flex items-center text-sm mb-5">
                <div class="w-2/5 md:w-1/5 font-bold pr-3">
                  <span><?php _e('Тип стяжки', 'treba-wp'); ?></span>:
                </div>
                <div class="w-3/5 md:w-4/5">
                  <?php echo carbon_get_the_post_meta('product_info_styajka'); ?>
                </div>
              </div>
              <?php endif; ?> 

              <?php if(carbon_get_the_post_meta('product_info_weight')): ?>
              <div class="flex items-center text-sm mb-5">
                <div class="w-2/5 md:w-1/5 font-bold pr-3">
                  <span><?php _e('Вага', 'treba-wp'); ?></span>:
                </div>
                <div class="w-3/5 md:w-4/5">
                  <?php echo carbon_get_the_post_meta('product_info_weight'); ?>
                </div>
              </div>
              <?php endif; ?> 

              <?php if(carbon_get_the_post_meta('product_info_size')): ?>
              <div class="flex items-center text-sm mb-5">
                <div class="w-2/5 md:w-1/5 font-bold pr-3">
                  <span><?php _e('Розмір', 'treba-wp'); ?></span>:
                </div>
                <div class="w-3/5 md:w-4/5">
                  <?php echo carbon_get_the_post_meta('product_info_size'); ?>
                </div>
              </div>
              <?php endif; ?> 

              <?php if(carbon_get_the_post_meta('product_info_pokritie')): ?>
              <div class="flex items-center text-sm mb-5">
                <div class="w-2/5 md:w-1/5 font-bold pr-3">
                  <span><?php _e('Покриття', 'treba-wp'); ?></span>:
                </div>
                <div class="w-3/5 md:w-4/5">
                  <?php echo carbon_get_the_post_meta('product_info_pokritie'); ?>
                </div>
              </div>
              <?php endif; ?> 
            </div>
            <!-- END Meta -->
          </div>
          <!-- END Top -->

          <!-- Bottom -->
          <div>
            <!-- Qty -->

            <!-- END Qty -->

            <!-- Btn buy -->
            <div class="product_single_buy p-4 cursor-pointer add_to_cart_button product_type_simple add-to-cart-js" data-product-title="<?php echo $title_product; ?>" data-product-image="<?php echo $image_product; ?>" data-product-price="<?php echo $price_product; ?>" data-product-qty="1">
              <?php _e("В кошик", "treba-wp"); ?>
            </div>
            <!-- END Btn buy -->
          </div>
          <!-- END Bottom -->

        </div>
      </div>
    </div>

    <!-- Big Description -->
    <h2 class="text-3xl lg:text-5xl font-black mb-12"><?php _e('Опис', 'treba-wp'); ?></h2>
    <div class="flex flex-col lg:flex-row justify-between lg:-mx-4">
      <div class="w-full lg:w-8/12 lg:px-4 mb-12 lg:mb-0">
        <div class="content">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="w-full lg:w-4/12 lg:px-4 lg:ml-20">
        <div class="bg_dark_gray rounded-3xl px-6 py-10">
          <div class="flex items-center mb-6">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nova_poshta.svg" alt="<?php _e('Нова пошта', 'treba-wp'); ?>" class="mr-3">
            <div class="text-sm">
              <?php _e('Безкоштовна доставка Новою Поштою від 500 грн', 'treba-wp'); ?>
            </div>
          </div>
          <div class="flex items-center mb-6">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/credit.svg" alt="<?php _e('Кредитна карта', 'treba-wp'); ?>" class="mr-3">
            <div class="text-sm">
              <?php _e('Оплата готівкою або карткою', 'treba-wp'); ?>
            </div>
          </div>
          <div class="flex items-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/obmen.svg" alt="<?php _e('Обмін', 'treba-wp'); ?>" class="mr-3">
            <div class="text-sm">
              <?php _e('Обмін та повернення протягом 14 днів', 'treba-wp'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Big Description -->
  </div>
</div>

<?php get_footer(); ?>