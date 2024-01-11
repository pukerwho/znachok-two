<?php 
function telegramMessage() {
  $name = stripslashes_deep($_POST['name']);
  $phone = stripslashes_deep($_POST['phone']);
  $city = stripslashes_deep($_POST['city']);
  $warehouse = stripslashes_deep($_POST['warehouse']);
  $checkoutOrders = stripslashes_deep($_POST['checkoutOrders']);
  $checkoutTotalSum = stripslashes_deep($_POST['checkoutTotalSum']);

  $chatID = carbon_get_theme_option("crb_telegram_chat_id");
  $apiToken = carbon_get_theme_option("crb_telegram_api");
  $content = "";
  $content .= "<b>Ім'я</b>: $name\n";
  $content .= "<b>Телефон</b>: $phone\n";
  $content .= "<b>Місто</b>: $city\n";
  $content .= "<b>Відділення</b>: $warehouse\n";
  $content .= "$checkoutOrders\n";
  $content .= "<b>Разом</b>: $checkoutTotalSum\n";

  $data = [
    'chat_id' => $chatID, 
    'text' => $content,
    'parse_mode' => 'HTML'
  ];
  $response = file_get_contents("https://api.telegram.org/bot".$apiToken."/sendMessage?" . http_build_query($data) );  
  echo $response;
  wp_die();
}

add_action('wp_ajax_telegram_add_action', 'telegramMessage');
add_action('wp_ajax_nopriv_telegram_add_action', 'telegramMessage');
?>