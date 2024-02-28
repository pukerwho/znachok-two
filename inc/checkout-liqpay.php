<?php 

function liqpayGo($getPrice) {
  $liqpay = new LiqPay("sandbox_i8771228754", "sandbox_nCNCFKzNzgVrcAEZxsCWdCs78TMhrJYDe0oFTwAh");

  $html = $liqpay->cnb_form(array(
    'action'         => 'pay',
    'amount'         => $getPrice,
    'currency'       => 'UAH',
    'description'    => 'Оплата замовлення на сайті znachok.ua',
    'order_id'       => 'order_id_1',
    'version'        => '3'
  ));
  return $html;
  wp_die();
}

add_action('wp_ajax_payLiqpay_action', 'liqpayGo');
add_action('wp_ajax_nopriv_payLiqpay_action', 'liqpayGo');
?>