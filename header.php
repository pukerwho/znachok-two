<?php 
  $current_title = wp_get_document_title();
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php echo $current_title; ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <!-- <link rel="stylesheet" href="../css/style.css" inline> -->
  <?php
    wp_head();
  ?>
  <?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>
<body <?php echo body_class(); ?>>
  <header id="header" class="header fixed top-[30px] left-0 right-0 z-10" role="banner">
    <div class="container relative mx-auto px-4 md:px-0 z-10">
      <div class="flex justify-between items-center bg-white rounded-full shadow-md py-2 px-0 lg:p-2">
        <div class="logo mr-4 lg:mr-0 pl-4">
          <a href="<?php echo home_url(); ?>">
            <?php if (is_page_template("page-catalog.php") || is_page_template("page-cart.php")): ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-green.svg" alt="Лого" class="w-[105px] min-w-[105px] lg:w-[160px] lg:min-w-[160px]">
            <?php else: ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-yellow.svg" alt="Лого" class="w-[105px] min-w-[105px] lg:w-[160px] lg:min-w-[160px]">
            <?php endif; ?>
          </a>
        </div>
        <div class="header_content flex justify-between lg:justify-start items-center">
          <div class="header_menu hidden lg:block lg:mr-10">
            <?php wp_nav_menu([
              'theme_location' => 'head_menu',
              'container' => 'ul',
              'menu_class' => 'flex',
            ]); ?>
          </div>
          <div class="hidden lg:block lg:mr-10">
            <?php $phones = carbon_get_theme_option("crb_contact_phones"); foreach (array_slice($phones, 0, 1) as $phone): ?>
              <div class="btn red small fill font-black"><a href="tel:<?php echo $phone("crb_contact_phone"); ?>"><?php echo $phone("crb_contact_phone"); ?></a></div>
            <?php endforeach; ?>
          </div>
          <div class="header_lang mr-2 lg:mr-10 flex">
            <?php if (function_exists('pll_the_languages')) { 
              pll_the_languages(); 
            } ?>
          </div>
          <div class="header_cart w-[40px] h-[40px] lg:w-[60px] lg:h-[60px] relative mr-5 lg:mr-0">
            <a href="<?php echo get_page_url('page-cart'); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cart.svg" alt="<?php _e('Кошик', 'treba-wp'); ?>" class="w-[16px] lg:w-[21px]">
            <span id="cart-count-js" class="cart_count opacity-0"></span>
          </div>
          <div class="header_toggle block lg:hidden relative cursor-pointer mr-5">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="menu_mobile w-full h-full hidden fixed top-32">
    <div class="bg-white rounded-2xl px-6 py-8 mx-4 mb-4">
      <?php wp_nav_menu([
        'theme_location' => 'head_menu',
        'container' => 'ul',
        'menu_class' => 'flex flex-col',
      ]); ?>  
    </div>
    <div class="px-6">
      <div class="btn red small fill font-black"><a href="tel:093-222-20-20">093-222-20-20</a></div>
    </div>
    
  </div>
  <section id="content" role="main">