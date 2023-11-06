var $ = require("jquery");

$(".average-check-value-js").on("change", function () {
  var averageValue = $(".average-check-value-js").val();
  $(".average-check-value-html-js").html(averageValue);
});

$(".filter_button").on("click", function () {
  let min_price = $(".price-min-js").val();
  let max_price = $(".price-max-js").val();
  let categoriesArray = [];
  let categories_id = document.querySelectorAll(".filter_category_checkbox:checked");

  for (category_id of categories_id) {
    let categoryKey = category_id.value;
    categoriesArray.push(categoryKey);
  }
  console.log(categoriesArray);
  $.ajax({
    type: "POST",
    url: "/wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "filter_shop_click_action",
      min_price: min_price,
      max_price: max_price,
      categoriesArray: categoriesArray,
    },
    success: function (res) {
      $("#filter-responce").html(res);
      console.log("вдало");
    },
  });
});
