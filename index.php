<?php get_header(); ?>

<div class="main-page">
	<div class="top-corner-img">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top-corner-img.svg" alt="<?php _e('Значки', 'treba-wp'); ?>" class="hidden lg:block">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top-corner-img-mobile.svg" alt="<?php _e('Значки', 'treba-wp'); ?>" class="block lg:hidden">
	</div>
	<div class="left-side-img hidden lg:block">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/left-side-img.svg" alt="<?php _e('Значки', 'treba-wp'); ?>">
	</div>

	<!-- WELCOME BLOCK -->
	<div class="welcome lg:h-screen pt-36 lg:pt-48 mb-20 lg:mb-48">
		<div class="container mx-auto px-4 md:px-0">
			<div class="w-full lg:w-6/12 welcome_content ">
				<h1 class="text-3xl lg:text-6xl font-black lg:leading-tight mb-6"><?php _e('Авторські значки та фурнітура', 'treba-wp'); ?></h1>
				<div class="text-lg mb-10">
					<?php echo crb_get_i18n_theme_option('crb_main_description'); ?>
				</div>
				<div class="inline-block">
					<div class="btn red big fill font-black">
						<?php _e('Замовити', 'treba-wp'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WELCOME BLOCK -->

	<!-- ПОПУЛЯРНЫЕ ТОВАРЫ НА ГЛАВНОЙ -->
	<div class="popular lg:mb-64">
		<div class="container mx-auto px-4 md:px-0">
			<div class="w-full flex items-center justify-between mb-12">
				<h2 class="text-2xl lg:text-6xl font-black leading-none"><?php _e('Каталог', 'treba-wp'); ?></h2>
			</div>
      <div class="products list-products mb-12">
        <?php 
          $query = new WP_Query( array( 
            'post_type' => 'products', 
            'posts_per_page' => 9,
            'order'    => 'DESC',
          ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <?php get_template_part("template-parts/product/item"); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="flex justify-center">
        <a href="<?php echo get_page_url("page-catalog"); ?>" class="btn red big fill font-black"><?php _e('Дивитися всі товари', 'treba-wp'); ?></a>
      </div>

		</div>

		
		
	</div>
	<!-- END ПОПУЛЯРНЫЕ ТОВАРЫ НА ГЛАВНОЙ -->

	<!-- БЛОК О НАС НА ГЛАВНОЙ -->
	<div class="about bg_yellow relative py-48 lg:mb-20">
		<!-- IMAGES (ICONS) -->
		<div class="about-top-left hidden lg:block">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-top-left.png">
		</div>
		<div class="about-top-center hidden lg:block">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-top-center.svg">
		</div>
		<div class="about-top-right hidden lg:block">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-top-right.png">
		</div>
		<div class="about-bottom-left hidden lg:block">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-bottom-left.png">
		</div>
		<div class="about-bottom-right hidden lg:block">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-bottom-right.png">
		</div>
		<!-- END IMAGES (ICONS) -->
		<h2 class="text-4xl lg:text-6xl font-black leading-none text-center mb-16"><?php _e('Про нас', 'treba-wp'); ?></h2>
		<div class="container mx-auto px-4 md:px-0">
			<div class="w-full content lg:w-1/2 mx-auto">
				<?php $main_text = crb_get_i18n_theme_option( 'crb_main_text' ); ?>
				<?php echo apply_filters( 'the_content', $main_text  ); ?>	
			</div>
		</div>
	</div>
	<!-- END БЛОК О НАС НА ГЛАВНОЙ -->

	<!-- КЛИЕНТЫ НА ГЛАВНОЙ -->
	<div class="clients mb-20">
		<div class="container mx-auto px-4 lg:px-0">
			<h2 class="text-4xl lg:text-6xl font-black leading-none text-center mb-16"><?php _e('Кліенти', 'treba-wp'); ?></h2>
			<div class="flex flex-wrap -mx-2">
				<?php 
					$clients = carbon_get_theme_option('crb_clients');
					foreach ( $clients as $client ): ?>
					<div class="clients_logo w-1/2 lg:w-2/12 px-2 mb-4">
						<div class="rounded-2xl border border-gray-300 ">
							<?php $photo_src = wp_get_attachment_image_src($client, 'large'); ?>
							<img src="<?php echo $photo_src[0]; ?>" loading="lazy" class="h-20 object-contain px-6 py-3 mx-auto">	
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- END КЛИЕНТЫ НА ГЛАВНОЙ -->

	<!-- НОВОСТИ НА ГЛАВНОЙ -->
	<div class="news">
		<div class="container mx-auto px-4 lg:px-0 mb-16 lg:mb-32">
			<h2 class="text-4xl lg:text-6xl font-black leading-none text-center mb-24 lg:mb-48"><?php _e('Новини', 'treba-wp'); ?></h2>
			<div class="flex flex-wrap lg:-mx-2">
				<?php 
					$news_query = new WP_Query( array( 
						'post_type' => 'post', 
						'posts_per_page' => 3,
						'order'    => 'DESC',
					) );
				if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post(); ?>
					<!-- НОВОСТЬ -->
					<div class="news_item w-full lg:w-1/3 lg:px-2 mb-24 lg:mb-0">
						<div class="news_card relative px-4 lg:px-8 pb-20 pt-20 lg:pt-32">
							<div class="news_card_img">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="news_card_date mb-2">
								<?php echo get_the_date('d.m.Y'); ?>
							</div>
							<div class="news_card_title mb-4">
								<?php the_title(); ?>
							</div>
							<div class="news_card_desc">
								<?php 
									$content_text = wp_strip_all_tags( get_the_content() );
									echo mb_strimwidth($content_text, 0, 105, '...');
								?>
							</div>
						</div>
					</div>
					<!-- END НОВОСТЬ -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<!-- END НОВОСТИ НА ГЛАВНОЙ -->

	<!-- КОНТАКТЫ НА ГЛАВНОЙ -->
	<div class="contacts relative">
		<div class="container mx-auto px-4 lg:px-0 mb-6 lg:mb-20">
			<div class="flex flex-wrap items-center justify-between lg:-mx-2">
				<div class="w-full lg:w-8/12 lg:px-2">
					<div class="contacts_block">
						<div class="text-center">
							<h2 class="inline-flex relative -left-9 z-10 text-4xl lg:text-6xl font-black text-center bg-white transform -translate-y-1/2  leading-none px-4 mb-4 lg:mb-16">
								<?php _e('Контакти', 'treba-wp'); ?>
							</h2>	
						</div>
						
						<div class="flex items-center justify-center px-4 lg:px-16 mb-6 lg:mb-16">
							<div class="text-xl lg:text-2xl font-bold mr-8 lg:mr-20">
								<?php _e('Завжди будемо раді відповісти на ваші запитання', 'treba-wp'); ?>
							</div>
							<div class="hidden lg:block">
								<div class="btn red big fill font-black relative transform translate-x-1/2 z-10">
									<?php _e("Зв'язатися", 'treba-wp'); ?>
								</div>
							</div>
						</div>
						<div class="flex flex-col lg:flex-row lg:items-center -mx-1 pb-6 lg:pb-32 px-4 lg:px-16">
							<!-- EMAIL -->
							<div class="w-full lg:w-1/3 flex items-center px-1 mb-4 lg:mb-0">
								<div class="mr-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/email.svg">
								</div>
								<div>
									info@znachok.com.ua
								</div>
							</div>
							<!-- PHONE -->
							<div class="w-full lg:w-1/3 flex items-center px-1 mb-4 lg:mb-0">
								<div class="mr-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone.svg">
								</div>
								<div>
									+380 63 622 35 55
								</div>
							</div>
							<!-- LOCATION -->
							<div class="w-full lg:w-1/3 flex items-center px-1 mb-4 lg:mb-0">
								<div class="mr-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/location.svg">
								</div>
								<div>
									Берестейская 39, Киев	
								</div>
							</div>
						</div>
						<div class="flex justify-center lg:hidden pb-6">
							<div class="btn red big fill font-black relative">
								<?php _e("Зв'язатися", 'treba-wp'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="contacts_icon w-full lg:w-4/12 flex items-center justify-end lg:px-2">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-dog.svg">
				</div>
			</div>
		</div>
	</div>

	<!-- END КОНТАКТЫ НА ГЛАВНОЙ -->
</div>
<?php get_footer(); ?>