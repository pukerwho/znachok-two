<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package G-Info
 */


// Меняем поля в форме комментиривания
add_filter( 'comment_form_default_fields', 'truemisha_change_labels', 25 );
function truemisha_change_labels( $fields ){
  // можно подсмотреть исходный HTML через:
  // print_r( $fields );
  $fields[ 'author' ] = '<div class="mb-4"><input id="author" name="author" type="text" value="" size="30" maxlength="245" placeholder="'. __("What is your name?", "treba-wp") . '" class="w-full border border-gray-300 px-4 py-2" required></div>';
  $fields[ 'email'] = '<div class="mb-4"><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" placeholder="'. __("Your email (will be hidden)", "treba-wp") . '" class="w-full border border-gray-300 px-4 py-2" required></div>';
  
  return $fields;
}

add_action( 'comment_form_logged_in_after', 'add_rating_comment' );
add_action( 'comment_form_after_fields', 'add_rating_comment' );

function add_rating_comment() { ?>
  <div class="comment-place-rating-block flex items-end mb-4">
    <div class="text-lg opacity-75 mr-2"><?php _e("Rating", "treba-wp"); ?>: </div>
    <div class="comment-place-rating flex justify-end flex-row-reverse">
      <input type="radio" id="star5" name="rating" value="5" />
      <label class="star" for="star5" title="<?php _e("Great", "treba-wp"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star4" name="rating" value="4" />
      <label class="star" for="star4" title="<?php _e("Good", "treba-wp"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star3" name="rating" value="3" />
      <label class="star" for="star3" title="<?php _e("Ok", "treba-wp"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star2" name="rating" value="2" />
      <label class="star" for="star2" title="<?php _e("Bad", "treba-wp"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star1" name="rating" value="1" />
      <label class="star" for="star1" title="<?php _e("Terrible", "treba-wp"); ?>" aria-hidden="true"></label>
    </div>
  </div>
<?php } ?>

<?php
// Save the comment meta data along with comment
add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ) {
  if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != ’) )
  $rating = wp_filter_nohtml_kses($_POST['rating']);
  add_comment_meta( $comment_id, '_crb_comment_rating', $rating );
}

// Удаляем поля из формы комментирования
add_filter( 'comment_form_default_fields', 'truemisha_remove_url_field', 25 );
 
function truemisha_remove_url_field( $fields ) {
  unset( $fields[ 'url' ] );
  unset( $fields[ 'cookies' ] );
  return $fields;
}

// Меняем textarea в форме комментариования
add_filter( 'comment_form_defaults', 'my_comment_form_defaults' );
add_action( 'comment_form_top', 'add_textarea' );

// дефолтна textarea
function my_comment_form_defaults($defaults) {
  $defaults['comment_field'] = '';
  return $defaults;
}

//Нова форма
function add_textarea() {
  echo '<div class="comment-form-comment mb-2"><textarea id="comment" name="comment" rows="4" placeholder="'. __("Your comment", "treba-wp") . '" class="w-full border border-gray-300 px-4 py-2" ></textarea></div>';
}

//Дозволити порожне поле коментар
add_filter('allow_empty_comment', '__return_true');

//Удаляем нотис перед формой комментирования
add_filter( 'comment_form_defaults', 'sp_add_comment_form_before' );
function sp_add_comment_form_before( $defaults ) {
  $defaults['comment_notes_before'] = '';
  return $defaults;
}

//Повідомлення про успішну відправку
add_action( 'set_comment_cookies', function( $comment, $user ) {
    setcookie( 'ta_comment_wait_approval', '1', 0, '/' );
}, 10, 2 );

add_action( 'init', function() {
  if( isset( $_COOKIE['ta_comment_wait_approval'] ) && $_COOKIE['ta_comment_wait_approval'] === '1' ) {
    setcookie( 'ta_comment_wait_approval', '0', 0, '/' );
    add_action( 'comment_form_before', function() {
      echo "<p id='wait_approval' style='padding-top: 20px;'><strong>". __('Ваш комментарий ожидает проверки', 'tarakan').".</strong></p>";
    });
  }
});

add_filter( 'comment_post_redirect', function( $location, $comment ) {
  $location = get_permalink( $comment->comment_post_ID ) . '#wait_approval';
  return $location;
}, 10, 2 );