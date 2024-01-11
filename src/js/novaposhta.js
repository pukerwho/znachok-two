var $ = require("jquery");

let numberCode = $(".numbercode").val();
$('.novaposhta_city').on('keyup', function (e) {
  city = $(".novaposhta_city").val();
  if (city.length > 0) {
    $.ajax({
      url: 'https://api.novaposhta.ua/v2.0/json/',
      data: JSON.stringify({ 
        "apiKey": numberCode,
        "modelName": "Address",
        "calledMethod": "searchSettlements",
        "methodProperties": {
          "CityName" : city,
      } }),
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      success : function(response) {
        if (response) {
          addresses = response.data[0].Addresses;
          $(".js-novaposhta-city-item").remove();
          $.each(addresses, function(key, city) {
            $('.novaposhta_cities').removeClass("hidden");
            $('.novaposhta_cities').append('<div class="js-novaposhta-city-item" data-ref="'+ city.DeliveryCity +'">' + city.Present + '</div>'); 
          });
        }
      }
    });
  } else {
    $('.novaposhta_cities').addClass("hidden");
  }
});

$('.novaposhta_cities').on('click', '.js-novaposhta-city-item', function() {
  this_city = $(this).text();
  this_cityRef = $(this).data("ref");
  $('.novaposhta_city').val(this_city);
  $('.novaposhta_city').data("ref", this_cityRef);
  $('.novaposhta_cities').addClass("hidden");
  $('.novaposhta_cities_warehouses').removeClass("hidden");
});

$('body').on('focus keyup', '.novaposhta_cities_warehouses', function() {
  cityRef = $(".novaposhta_city").data("ref");
  warehouses = $(".novaposhta_warehouse").val();
  $.ajax({
    url: 'https://api.novaposhta.ua/v2.0/json/',
    data: JSON.stringify({ 
      "apiKey": numberCode,
      "modelName": "Address",
      "calledMethod": "getWarehouses",
      "methodProperties": {
        "WarehouseId" : warehouses,
        "CityRef" : cityRef,
        "Limit" : "50",
    } }),
    type: 'POST',
    contentType: "application/json",
    dataType: "json",
    success : function(response) {
      if (response) {
        data = response.data;
        $(".js-novaposhta-warehouse-item").remove();
        $.each(data, function(key, warehouse) {
          $('.novaposhta_warehouses').removeClass("hidden");
          $('.novaposhta_warehouses').append('<div class="js-novaposhta-warehouse-item" data="'+ warehouse.Ref +'">' + warehouse.Description + '</div>'); 
        });
      }
    }
  });
});

$('.novaposhta_warehouses').on('click', '.js-novaposhta-warehouse-item', function() {
  this_warehouse = $(this).text();
  $('.novaposhta_warehouse').val(this_warehouse);
  $('.novaposhta_warehouses').addClass("hidden");
});
