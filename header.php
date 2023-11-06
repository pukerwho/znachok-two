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
  <header id="header" class="header" role="banner">
    <div class="container relative mx-auto px-4 md:px-0 z-10">
      <div class="header_container left-4 lg:left-0 right-4 lg:right-0 flex justify-between items-center bg-white rounded-full shadow-md py-2 px-0 lg:p-2">
        <div class="logo mr-4 lg:mr-0 pl-4">
          <a href="<?php echo home_url(); ?>">
            <?php if (is_page_template("page-catalog.php") || is_page_template("page-cart.php")): ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-green.svg" alt="Лого" class="min-w-[105px] lg:min-w-[160px]">
            <?php else: ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-yellow.svg" alt="Лого" class="min-w-[105px] lg:min-w-[160px]">
            <?php endif; ?>
          </a>
        </div>
        <div class="header_content flex justify-between lg:justify-start items-center">
          <div class="header_menu hidden lg:block">
            <?php wp_nav_menu([
              'theme_location' => 'head_menu',
              'container' => 'ul',
              'menu_class' => 'flex',
            ]); ?>
          </div>
          <div class="header_lang mr-4 lg:mr-20 flex">
            <?php if (function_exists('pll_the_languages')) { 
              pll_the_languages(); 
            } ?>
          </div>
          <div class="header_cart relative mr-5 lg:mr-0">
            <a href="<?php echo get_page_url('page-cart'); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cart.svg" alt="<?php _e('Кошик', 'treba-wp'); ?>" class="header_cart_icon">
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
    <div class="bg-white rounded-2xl px-6 py-8 mx-4">
      <?php wp_nav_menu([
        'theme_location' => 'head_menu',
        'container' => 'ul',
        'menu_class' => 'flex flex-col',
      ]); ?>  
    </div>
    
  </div>
  <section id="content" role="main">