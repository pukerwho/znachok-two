<?php
/*
Template Name: Каталог
*/
?>
<?php get_header(); ?>

<div class="pt-32 lg:pt-64 mb-20">
  <div class="container mx-auto px-4 md:px-0">
    
    <div class="mb-0 lg:mb-8">
      <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex items-center flex-wrap">
          <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
            <a itemprop="item" href="<?php echo home_url(); ?>">
              <span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
            <span itemprop="name"><?php the_title(); ?></span>
            <meta itemprop="position" content="2" />
          </li>
        </ul>
      </div>
      <h1 class="text-3xl lg:text-6xl font-black"><?php the_title(); ?></h1>
    </div>

    <div class="flex flex-col md:flex-row">

      <!-- Кнопка вызова фильтра на мобильных -->
      <div class="filter_mobile_toggle flex lg:hidden items-center cursor-pointer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/filter-icon.svg">
      </div>
      <!-- END Кнопка вызова фильтра на мобильных -->

      <!-- Мобильный фильтр OPEN -->
      <div class="filter_mobile_cover flex lg:hidden">
        <div class="container mx-auto">
          <div class="bg-white rounded-lg px-2 py-10">
            <h2 class="text-center text-2xl mb-6"><?php _e('Фільтр', 'treba-wp'); ?></h2>
            <div class="mb-4">
              <div>
                Фільтр
              </div>
            </div>
            <div class="filter_mobile_cover_close text-center px-4 py-2 cursor-pointer">
              <?php _e('Закрити', 'treba-wp'); ?>
            </div>    
          </div>
        </div>
      </div>
      <!-- END Мобильный фильтр OPEN -->

      <!-- Сайдбар на десктопе -->
      <div class="hidden lg:block w-3/12 relative bg-white py-10">
        <div class="filter">
          <div class="filter_price mb-8">
            <div class="filter_title mb-4"><?php _e("Ціна", "treba-wp"); ?>, грн</div>
            <div class="price-input">
              <div class="field">
                <span><?php _e("Мін", "treba-wp"); ?>.</span>
                <input type="number" class="input-min" value="0">
              </div>
              <div class="separator">-</div>
              <div class="field">
                <span><?php _e("Макс", "treba-wp"); ?>.</span>
                <input type="number" class="input-max" value="2000">
              </div>
            </div>
            <div class="slider">
              <div class="progress"></div>
            </div>
            <div class="range-input">
              <input type="range" class="range-min price-min-js" min="0" max="2000" value="0" step="50">
              <input type="range" class="range-max price-max-js" min="0" max="2000" value="2000" step="50">
            </div>
          </div>
          <div class="mb-8">
            <div class="filter_title mb-4"><?php _e("Категорії", "treba-wp"); ?></div>
            <div>
              <?php $product_cats = get_terms( array( 
                'taxonomy' => 'product-category', 
                'hide_empty' => false,
              ));
              foreach ( $product_cats as $product_cat ): ?>
              <div class="mb-2">
                <label class="filter_label">
                  <input type="checkbox" value="<?php echo $product_cat->term_id ?>" class="filter_category_checkbox">
                  <span class="filter_span"><?php echo $product_cat->name ?></span>
                </label>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div>
            <div class="filter_button cursor-pointer"><?php _e("Застосувати", "treba-wp"); ?></div>
          </div>
        </div>
      </div>
      <!-- END Сайдбар на десктопе -->

      <div class="w-full lg:w-9/12 py-10 lg:pl-8">
        <div id="filter-responce" class="products list-products">
          <?php 
            $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
						$query = new WP_Query( array( 
							'post_type' => 'products', 
							'posts_per_page' => 8,
							'order'    => 'DESC',
              'paged' => $current_page,
						) );
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part("template-parts/product/item"); ?>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>