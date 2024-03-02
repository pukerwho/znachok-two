<?php
/*
Template Name: Оплата
*/
get_header(); 
// $count_orders = wp_count_posts();
// if ( $count_orders ) {
// 	$orders = $count_orders->private;
// }
// $post_name = $orders + '00n';
$user_name = $_POST['billing_first_name'];
$user_phone = $_POST['billing_phone'];
$np_city = $_POST['np_city'];
$np_warehouse = $_POST['np_warehouse'];
$total_price = $_POST['total_price'];
$products_list = $_POST['products_list'];
$products_list_qty = $_POST['products_list_qty'];

// $my_post = array(
//   'post_title'    => $post_name,
//   'post_name' => $post_name,
//   'post_status'   => 'private',
//   'post_type' => 'orders',
//   'post_author'   => 1,
  
// );
// if ( get_page_by_title( $my_post['name'] ) == null & $total_price != null ) {
//   wp_insert_post( $my_post );
// }
?>

<div class="pt-32 lg:pt-64 mb-20">
  <div class="container mx-auto px-4 md:px-0">
    <div class="flex flex-wrap">
      <div class="w-full xl:w-8/12 mx-auto">
        
        <h1 class="text-2xl mb-4"><?php _e("Ваше замовлення успішно сформовано, залишилося тільки сплатити", "treba-wp"); ?>:</h1>
        <div class="mb-6">
          <?php 
          $publ_key = carbon_get_theme_option("crb_publ_liq_key");
          $privt_key = carbon_get_theme_option("crb_privt_liq_key");
          $liqpay = new LiqPay($publ_key, $privt_key);
          if ($total_price) {
            $html = $liqpay->cnb_form(array(
              'action'         => 'pay',
              'amount'         => $total_price,
              'currency'       => 'UAH',
              'description'    => 'Оплата замовлення на сайті znachok.ua',
              'order_id'       => 'order_id_1',
              'version'        => '3',
              'language'        => 'uk',
            ));
            echo $html;
          }
          ?>
        </div>
        <div class="bg-gray-200 rounded p-4">
          <div class="text-xl font-bold mb-2"><?php _e("Ваше замовлення", "treba-wp"); ?></div>
          <div class="mb-2">
            <?php echo $products_list; ?>
          </div>
          <div>
            <div><span class="font-bold"><?php _e("ПІБ", "treba-wp"); ?></span>: <?php echo $user_name; ?></div>
            <div><span class="font-bold"><?php _e("Телефон", "treba-wp"); ?></span>: <?php echo $user_phone; ?></div>
            <div class="mb-4"><span class="font-bold"><?php _e("Нова пошта", "treba-wp"); ?></span>: <?php echo $np_city; ?>, <?php echo $np_warehouse; ?></div>
            <div><span class="font-bold"><?php _e("Загальна сума", "treba-wp"); ?></span>: <?php echo $total_price; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>