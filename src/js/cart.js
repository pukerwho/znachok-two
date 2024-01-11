var $ = require("jquery");

function openModal(name,string) {
  let modal = document.querySelector(".modal[data-modal-name="+name+"]");
  let modalText = document.querySelector(".modal[data-modal-name="+name+"] .add-to-cart-text-js");
  let bgmodal = document.querySelector(".modal-bg");
  modal.classList.remove("hidden");
  bgmodal.classList.add("show");
  modalText.innerHTML = string;
}

function closeModal(name) {
  let modal = document.querySelector(".modal[data-modal-name="+name+"]");
  let bgmodal = document.querySelector(".modal-bg");
  modal.classList.add("hidden");
  bgmodal.classList.remove("show");
}

function CheckBrowser() {
  if ('localStorage' in window && window['localStorage'] !== null) {
	return true;
  } else {
	return false;
  }
}

function cartCount() {
  let countSpan = document.querySelector("#cart-count-js");
  if (localStorage.getItem('products')) {
    
    products = JSON.parse(localStorage.getItem('products'));
    count = products.length;
    countSpan.classList.remove("opacity-0");
    countSpan.innerHTML = count;
  } else {
    countSpan.classList.add("opacity-0");
  }
}
cartCount();

// Що додаємо?
let addToCartClicks = document.querySelectorAll(".add-to-cart-js");

addToCartClicks.forEach(addToCartClick => {
  addToCartClick.addEventListener("click", () => {
    let product_title = addToCartClick.dataset.productTitle;
    let product_image = addToCartClick.dataset.productImage;
    let product_price = addToCartClick.dataset.productPrice;
    let product_qty = addToCartClick.dataset.productQty;
    addToCart(product_title, product_image, product_price, product_qty);
  })
});


// Додаємо в кошик
function addToCart(productTitle, productImage, productPrice, qty) {
  if (CheckBrowser()) {
    let products = [];
    if (localStorage.getItem('products')) {
      products = JSON.parse(localStorage.getItem('products'));
    } 

    // Находим элемент, который уже есть в корзине
    var rewrite_element = false, rewrite_index;
    if (products.length > 0) {
      for (var i = 0; i < products.length; i++) {
        if (products[i].name === productTitle) {
          rewrite_element = true;
          rewrite_index = i;
        } 
      }  
    } 

    // Если элемент уже есть в корзине - перезаписываем, если нет - добавляем
    if (rewrite_element) {
      products[rewrite_index].image = productImage;
      products[rewrite_index].price = productPrice;
      products[rewrite_index].qty = qty;
      localStorage.setItem('products', JSON.stringify(products));
      
      // Появляется уведомление 
      openModal("add-to-cart", "Ми оновили ваш кошик");
    } else {
      products.push({'name' : productTitle, 'image' : productImage, 'price' : productPrice, 'qty' : qty});
      localStorage.setItem('products', JSON.stringify(products));
      
      // Появляется уведомление 
      openModal("add-to-cart", "Успішно додано в кошик");
      cartCount();
    }
  }
}

// Відправляємо заявку
const addForm = document.querySelector("#checkout_btn");
if (addForm) {
  addForm.addEventListener('click', (e) => {
    const name = document.querySelector('#billing_first_name').value;
    const phone = document.querySelector('#billing_phone').value;
    const city = document.querySelector('#novaposhta_city').value;
    const warehouse = document.querySelector('#novaposhta_cities').value;

    let checkoutProducts = JSON.parse(localStorage.getItem('products'));
    let checkoutTotalSum = 0;
    let checkoutOrders = "<b>Замовлення:</b> \n";
    
    for (order of checkoutProducts) {
      checkoutOrders += "Товар: " + order.name + "; Кількість: " + order.qty + "; Ціна: " + order.price + "\n";
      checkoutTotalSum = checkoutTotalSum + (order.qty*order.price);
    }
    let data = {
      'action': 'telegram_add_action',
      'name': name,
      'phone': phone,
      'city': city,
      'warehouse': warehouse,
      'checkoutOrders': checkoutOrders,
      'checkoutTotalSum': checkoutTotalSum,
    };
    $.ajax({
      url: ajaxurl,
      data: data,
      type: 'POST',
      beforeSend : function(xhr) {
        console.log('Загружаю')
      },
      success : function(data) {
        if (data) {
          console.log("відправили");
          localStorage.removeItem('products');
          $(".checkout_success").removeClass("hidden");
          showProducts();
          cartCount();
        }
      }
    });
    return;
  })
}



function showProducts() {
  if (CheckBrowser()) {
	let item = document.querySelector('#cart');
	item.innerHTML = "";

	getProducts = JSON.parse(localStorage.getItem('products'));
  console.log(getProducts);
	// Проверяем пустая корзина или нет
	if (getProducts != null ) {
    
	  if (getProducts.length === 0) {
      console.log('пусто');
      $('body').removeClass('page_not_empty_cart');
      $('body').addClass('page_empty_cart');
	  } else {
      console.log('ne пусто');
      $('body').removeClass('page_empty_cart');
      $('body').addClass('page_not_empty_cart');
	  }
	} else {
	  console.log('пусто2');
    $('body').removeClass('page_not_empty_cart');
    $('body').addClass('page_empty_cart');
	}

	if (getProducts != null) {  
      var cartTotalSum = 0;
      for (iterator of getProducts) {

        // CartItem 
        let cart_item = document.createElement('div');
        cart_item.className = "cart_item";
        item.append(cart_item);

        // CartItemThumbAndTitle
        let cart_item_thumb_and_title = document.createElement('div');
        cart_item_thumb_and_title.className = "cart_item_thumb_and_title";
        cart_item.append(cart_item_thumb_and_title);
        // CartItemThumb
        let cart_item_thumb = document.createElement('div');
        let cart_item_thumb_img = document.createElement("img");
        cart_item_thumb.className = "cart_item_thumb";
        cart_item_thumb_img.src = iterator.image;
        cart_item_thumb.append(cart_item_thumb_img);
        cart_item_thumb_and_title.append(cart_item_thumb);
        // CartItemTitle
        let cart_item_title = document.createElement('div');
        cart_item_title.className = "cart_item_title";
        cart_item_title.innerHTML = iterator.name;
        cart_item_thumb_and_title.append(cart_item_title);
        
        // cartItemQtyPriceDelete
        let cart_item_qty_price_delete = document.createElement('div');
        cart_item_qty_price_delete.className = "cart_item_qty_price_delete";
        cart_item.append(cart_item_qty_price_delete);

        // CartItemProductQty
        let product_qty = document.createElement('div');
        product_qty.className = "product_qty";
        cart_item_qty_price_delete.append(product_qty);

        let quantity = document.createElement('div');
        quantity.className = "quantity";
        product_qty.append(quantity);
        
        let quantity_down = document.createElement('div');
        quantity_down.className = "quantity-down";
        quantity_down.setAttribute('nameItem', iterator.name);
        quantity.append(quantity_down);

        let qty = document.createElement('div');
        qty.className = "input-text qty text";
        qty.setAttribute('nameItem', iterator.name);
        qty.innerHTML = iterator.qty;
        quantity.append(qty);

        let quantity_up = document.createElement('div');
        quantity_up.className = "quantity-up";
        quantity_up.setAttribute('nameItem', iterator.name);
        // quantity_up.onclick = function () {
        //   iterator.qty = parseInt(iterator.qty) + 1;
        //   console.log(iterator.qty);
        // };
        quantity.append(quantity_up);

        // CartItemPrice
        let cart_item_price = document.createElement('div');
        cart_item_price.className = "cart_item_price";
        cart_item_price.innerHTML = iterator.price;
        cart_item_qty_price_delete.append(cart_item_price);

        // CartItemTrash
        let cart_item_trash = document.createElement('div');
        cart_item_trash.className = "cart_item_trash";
        cart_item_qty_price_delete.append(cart_item_trash);

        let trash_link = document.createElement('div');
        trash_link.className = "trash_link";
        trash_link.setAttribute('nameItem', iterator.name);
        cart_item_trash.append(trash_link);
        
        cartTotalSum = cartTotalSum + (parseFloat(iterator.price) * parseFloat(iterator.qty)); 
      }
      cartTotal();
    }
  }                  
}

function cartTotal() {
  getProducts = JSON.parse(localStorage.getItem('products'));
  if (getProducts != null) {  
    let cartTotalSum = 0;
    for (iterator of getProducts) {
      cartTotalSum = cartTotalSum + ( parseFloat(iterator.price) * parseFloat(iterator.qty) );
    }
    $(".cart_totals span").html(cartTotalSum);
  }
}

document.addEventListener('DOMContentLoaded', function(){
  let is_cart = document.body.classList.contains('page-template-page-cart');
  if (is_cart) {
    showProducts();
  }
});

document.addEventListener('click',function(e){
  // Удаляем элемент из корзины 
  if (e.target && e.target.className == 'trash_link') {
    nameItem = e.target.getAttribute('nameItem')
    if (CheckBrowser()) {

      let products = [];
      if (localStorage.getItem('products')) {
        products = JSON.parse(localStorage.getItem('products'));
      } 
      // Находим элемент в массиве
      var remove_element = false, remove_index;
      if (products.length > 0) {
        for (var i = 0; i < products.length; i++) {
          if (products[i].name === nameItem) {
            remove_element = true;
            remove_index = i;
          } 
        }  
      } 

      // Удаляем нужный элемент из массива
      if (remove_element) {
        products.splice(remove_index, 1); 
        localStorage.setItem('products', JSON.stringify(products));
        showProducts();
        cartCount();
      } 
    }
  }

  // Змінюємо кількість
  if (e.target && e.target.className == 'quantity-up' || e.target && e.target.className == 'quantity-down') {
    var classTarget = e.target.className;
    nameItem = e.target.getAttribute('nameItem')
    if (CheckBrowser()) {

      let products = [];
      if (localStorage.getItem('products')) {
        products = JSON.parse(localStorage.getItem('products'));
      } 
      // Находим элемент в массиве
      var change_element = false, change_index;
      if (products.length > 0) {
        for (var i = 0; i < products.length; i++) {
          if (products[i].name === nameItem) {
            if (classTarget === "quantity-up") {
              products[i].qty = parseInt(products[i].qty) + 1;
            } else {
              products[i].qty = parseInt(products[i].qty) - 1;
            }
            $(".qty[nameitem='"+nameItem+"']").html(products[i].qty);
          } 
        }  
        localStorage.setItem('products', JSON.stringify(products));
        cartTotal();
      }  
    }
  }
});

