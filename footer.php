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
          'theme_location' => 'footer_menu',
          'menu_id' => 'footer_menu',
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
        <div class="flex items-center mb-4">
          <input type="text" name="newsletters" placeholder="<?php _e('Ваш email', 'treba-wp'); ?>" class="rounded-l-lg py-3 px-2">
          <div class="bg_yellow text-center rounded-r-lg px-12 py-3">
            <?php _e('Підписатися', 'treba-wp'); ?>
          </div>
        </div>
        <div class="flex items-center">
          <div class="inline-block mr-8">
            <?php $phones = carbon_get_theme_option("crb_contact_phones"); foreach (array_slice($phones, 0, 1) as $phone): ?>
              <a href="tel:<?php echo $phone["crb_contact_phone"]; ?>" class="btn red small fill font-black"><?php echo $phone["crb_contact_phone"]; ?></a>
            <?php endforeach; ?>
          </div>
          <div class="flex items-center text-white">
            <div class="relative mr-4">
              <a href="<?php echo carbon_get_theme_option("crb_contact_tiktok"); ?>" target="_blank" class="w-full h-full absolute left-0 top-0 z-1"></a>
              <svg fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"><path d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z"/></svg>
            </div>
            <div class="relative">
              <a href="<?php echo carbon_get_theme_option("crb_contact_instagram"); ?>" target="_blank" class="w-full h-full absolute left-0 top-0 z-1"></a>
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="currentColor"/><path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z" fill="currentColor"/></svg>
            </div>
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

<div class="modal hidden" data-modal-name="checkout">
  <div class="w-full h-full flex items-center justify-center fixed top-0 left-0 z-10">
    <div class="container">
      <div class="w-full md:w-3/5 bg-white shadow-lg rounded-xl mx-auto p-4">
        <div class="text-xl mb-6">✅ <?php _e("Ваше замовлення сформовано", "treba-wp"); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal-bg"></div>
<?php wp_footer(); ?>

</body>
</html>