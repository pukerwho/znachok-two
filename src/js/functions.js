import Swiper from "./swiper";
var $ = require("jquery");
let windowWidth = $(window).width();
let containerWidth = $('.container').width();
let containerPadding = 0;
containerPadding = (windowWidth - containerWidth)/2;

$('.left-container').css({'margin-left': containerPadding + 'px'});

$('.header_toggle').on('click', function(){
  $(this).toggleClass('open');
  $('body').toggleClass('overflow-hidden');
  $('.modal-bg').toggleClass('show');
  $('.menu_mobile').toggleClass('hidden block z-10');
});

var swiperSliderPerView;
var swiperSpaceBetween;

if (document.body.clientWidth < 768) {
  var swiperSliderPerView = 1;
  var swiperSpaceBetween = 20;
} else {
  var swiperSliderPerView = 3;
  var swiperSpaceBetween = 16;
}

var swiperPopularProduct = new Swiper('.swiper-popular-product-container', {
  slidesPerView: swiperSliderPerView,
  spaceBetween: swiperSpaceBetween,
  loop: true,
  autoplay: {
    delay: 5000,
  },
  navigation: {
    nextEl: '.popular_arrows_next',
    prevEl: '.popular_arrows_prev',
  },
});

let openModalClicks = document.querySelectorAll(".modal-open-js");
let openModalClick;
if (openModalClicks) {
  for (openModalClick of openModalClicks) {
    openModalClick.addEventListener("click", (e) => {
      let name = openModalClick.dataset.modalName;
      console.log(name);
      let modal = document.querySelector(".modal[data-modal-name="+name+"]");
      let bgmodal = document.querySelector(".modal-bg");
      modal.classList.remove("hidden");
      bgmodal.classList.add("show");
    })
  }
}

let closeModalClicks = document.querySelectorAll(".modal-close-js");
let closeModalClick;
if (closeModalClicks) {
  for (closeModalClick of closeModalClicks) {
    closeModalClick.addEventListener("click", (e) => {
      let name = closeModalClick.dataset.modalName;
      let modal = document.querySelector(".modal[data-modal-name="+name+"]");
      let bgmodal = document.querySelector(".modal-bg");
      modal.classList.add("hidden");
      bgmodal.classList.remove("show");
    })
  }
}

