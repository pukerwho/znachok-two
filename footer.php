</section>
<footer id="footer" class="footer pb-4 lg:pb-16 pt-20">
  <div class="container mx-auto px-4 lg:px-0">
    <div class="flex">
      <div class="w-full flex flex-col items-end lg:items-start lg:w-4/12">
        <div>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.svg" alt="Лого" width="110" class="block lg:hidden">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-yellow.svg" alt="Лого" width="110" class="hidden lg:block">
        </div>
        <div class="text-white lg:text-black">
          © <?php echo date('Y'); ?>
        </div>
      </div>
      <div class="hidden lg:block w-full lg:w-2/12 text-white">
        <?php wp_nav_menu([
          'theme_location' => 'footer_one_menu',
          'menu_id' => 'footer_one_menu',
          'menu_class' => ''
        ]); ?>
      </div>
      <div class="hidden lg:block w-full lg:w-2/12 text-white">
        <?php wp_nav_menu([
          'theme_location' => 'footer_two_menu',
          'menu_id' => 'footer_two_menu',
          'menu_class' => ''
        ]); ?>
      </div>
      <div class="hidden lg:block w-full lg:w-4/12">
        <div class="text-sm text-white mb-1"><?php _e('Будьте в курсі наших новин', 'treba-wp'); ?></div>
        <div class="flex items-center">
          <input type="text" name="newsletters" placeholder="<?php _e('Ваш email', 'treba-wp'); ?>" class="rounded-l-lg py-3 px-2">
          <div class="bg_yellow text-center rounded-r-lg px-12 py-3">
            <?php _e('Підписатися', 'treba-wp'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal hidden" data-modal-name="add-to-cart">
  <div class="w-full h-full flex items-center justify-center fixed top-0 left-0 z-10">
    <div class="container">
      <div class="w-full md:w-3/5 bg-white shadow-lg rounded-xl mx-auto p-4">
        <div class="text-xl mb-6">✅ <span class="add-to-cart-text-js"></span></div>
        <div class="flex items-center justify-between">
          <div>
            <div class="inline-block border border-theme-red text-center font-bold rounded-3xl cursor-pointer px-8 py-4 modal-close-js" data-modal-name="add-to-cart"><?php _e("Продовжити покупки", "treba-wp"); ?></div>
          </div>
          <div>
            <a href="<?php echo get_page_url('page-cart'); ?>" class="inline-block bg-theme-red text-white text-center font-bold rounded-3xl px-8 py-4"><?php _e("Оформити замовлення", "treba-wp"); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal-bg"></div>
<?php wp_footer(); ?>

</body>
</html>