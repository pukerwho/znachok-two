<?php

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
	function crb_post_theme_options() {
		Container::make( 'post_meta', 'Данные о продукте' )
	    ->where( 'post_type', '=', 'products' )
	  	->add_tab( __('Додаткова інформація'), array(
        Field::make( 'media_gallery', 'product_photos', 'Фотографії' )->set_type( array( 'image' ) ),
        Field::make( 'complex', 'product_videos', 'Відео' )
          ->add_fields( array(
            Field::make( 'text', 'product_videos_url', 'ID відео' ),
        ) ),
        Field::make( 'text', 'product_price', 'Ціна' ),
        Field::make( 'text', 'product_price_sale', 'Ціна розпродажу' ),
        Field::make( 'text', 'product_articl', 'Арктікул' ),
        Field::make( 'textarea', 'product_description', 'Короткий опис' ),
	      Field::make( 'text', 'product_info_material', 'Матеріал' ),
	      Field::make( 'text', 'product_info_styajka', 'Тип стяжки' ),
	      Field::make( 'text', 'product_info_weight', 'Вага' ),
	      Field::make( 'text', 'product_info_size', 'Розмір' ),
	      Field::make( 'text', 'product_info_pokritie', 'Покриття' ),
	  ) );
    Container::make( 'post_meta', 'More' )
      ->where( 'post_type', '=', 'orders' )
      ->add_fields( array(
        Field::make( 'multiselect', 'crb_orders_status', 'Статус' )
        ->add_options( array(
          'Очікує підтвердження' => 'Очікує підтвердження',
          'Не сплачено' => 'Не сплачено',
          'Сплачено' => 'Сплачено',
          'Відправлено' => 'Відправлено',
        ) ),
        Field::make( 'text', 'crb_orders_username', 'ПІБ'),
        Field::make( 'text', 'crb_orders_userphone', 'Телефон'),
        Field::make( 'text', 'crb_orders_np_city', 'НП - Місто'),
        Field::make( 'text', 'crb_orders_np_warehouse', 'НП - Відділеня'),
        Field::make( 'text', 'crb_orders_totalprice', 'Сума'),
    ) );
	}

?>