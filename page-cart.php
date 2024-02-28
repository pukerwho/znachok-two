<?php
/*
Template Name: Кошик
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

    <div class="cart_empty">
      <div class="checkout_success hidden bg-theme-green rounded mb-6 px-8 py-4">
        <div class="text-white">
          <?php _e("Ми отримали вашу заявку. Скоро з вами зв'яжемося", "treba-wp"); ?>.
        </div>
      </div>
      <div class="bg_dark_gray rounded mb-6 px-8 py-4">
        <div>
          <?php _e('Ваш кошик порожній', 'treba-wp'); ?>
        </div>
      </div>
      <div class="flex">
        <div class="btn red rounded-2xl relative px-8 py-5">
          <a href="<?php echo get_page_url('page-catalog'); ?>" class="w-full h-full absolute top-0 left-0"></a>
          <?php _e('Продовжити покупки', 'treba-wp'); ?>
        </div>
      </div>
    </div>
    
    <div class="cart_content">
      <div id="cart" class="cart mb-12"></div>
      <div class="cart_total cart-collaterals flex justify-end items-center text-xl mb-10">
        <div class="font-bold mr-2">
          <?php _e('Разом', 'treba-wp'); ?>: 
        </div>  
        <div class="price cart_totals font-bold ">
          <span></span> грн.
        </div>
      </div>

      <!-- Контакти -->
      <div class="checkout_box mb-12">
        <h2 class="font-black text-3xl mb-4"><?php _e('Ваші контакти', 'treba-wp'); ?></h2>
        <div class="mb-12">
          <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
            <label for="billing_first_name" class="screen-reader-text"><?php _e("Ім'я", "treba-wp"); ?>&nbsp;
              <abbr class="required" title="обязательно">*</abbr>
            </label>
            <span class="woocommerce-input-wrapper">
              <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="Имя" value="" autocomplete="given-name">
            </span>
          </p>
          <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
            <label for="billing_phone" class="screen-reader-text">Телефон&nbsp;
              <abbr class="required" title="обязательно">*</abbr>
            </label>
            <span class="woocommerce-input-wrapper">
              <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="Телефон" value="" autocomplete="tel">
            </span>
          </p>
        </div>
        <h2 class="font-black text-3xl mb-4"><?php _e('Доставка', 'treba-wp'); ?></h2>
        <div>
          <div class="flex items-center mb-6">
            <div class="mr-2">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/np_logo.svg" alt="Нова пошта" class="w-[24px]">
            </div>
            <div class="text-xl"><?php _e("Новою поштою", "treba-wp"); ?></div>
          </div>
          <div class="novaposhta_cities_list mb-6">
            <div class="text-lg mb-1"><?php _e("Ваше місто", "treba-wp"); ?></div>
            <input id="novaposhta_city" type="text" class="novaposhta_city w-full input-text" placeholder="<?php _e("Наприклад, Київ", "treba-wp"); ?>">
            <div class="novaposhta_cities hidden h-[150px] overflow-y-scroll custom-select"></div>
          </div>
          <div class="novaposhta_cities_warehouses hidden">
            <div class="text-lg mb-1"><?php _e("Виберіть відділення", "treba-wp"); ?></div>
            <input id="novaposhta_warehouse" type="text" class="novaposhta_warehouse w-full input-text" placeholder="<?php _e("Номер відділення", "treba-wp"); ?>">
            <div class="novaposhta_warehouses hidden h-[150px] overflow-y-scroll custom-select"></div>
          </div>
        </div>
        <h2 class="font-black text-3xl mb-4 hidden"><?php _e('Оплата', 'treba-wp'); ?></h2>
        <div class="hidden">
          <div>
            <input type="radio" id="onlinepay" name="paymethod" value="onlinepay-value" checked />
            <label for="onlinepay">Онлайн</label>
          </div>
          <div>
            <input type="radio" id="receiptpay" name="paymethod" value="receiptpay-value" />
            <label for="receiptpay">При отриманні</label>
          </div>
        </div>
      </div>
      <!-- END Контакти -->

      <div class="cart_buttons flex flex-col md:flex-row md:justify-between md:items-center">
        <div class="btn red rounded-2xl text-white relative px-8 py-5 mb-5 md:mb-0" >
          <a href="<?php echo get_page_url( 'page-catalog' ); ?>" class="w-full h-full absolute top-0 left-0"></a>
          <?php _e('Продовжити покупки', 'treba-wp'); ?>
        </div>
        
        <div id="checkout_btn" class="btn red fill rounded-2xl text-white relative px-8 py-5" >
          <?php _e('Оформити замовлення', 'treba-wp'); ?>
        </div>
      </div>
    </div>

  </div>
</div>

<input type="hidden" class="numbercode" value="922ff431a91502810902217ae6edac74">

<?php get_footer(); ?>