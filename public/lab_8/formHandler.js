function fetchWarehouses(cityRef, deliveryOption) {
  $.ajax({
    url: "get_warehouses.php",
    method: "POST",
    contentType: "application/x-www-form-urlencoded",
    data: {
      cityRef: cityRef,
      deliveryOption: deliveryOption,
    },
    success: function (response) {
      const data = JSON.parse(response);
      if (data.success) {
        $("#branch").empty();
        data.data.forEach((branch) => {
          $("#branch").append(new Option(branch.Description, branch.Ref));
        });
      }
    },
  });
}

$(document).ready(function () {
  $.ajax({
    url: "get_cities.php",
    method: "POST",
    contentType: "application/x-www-form-urlencoded",
    success: function (response) {
      const data = JSON.parse(response);
      if (data.success) {
        data.data.forEach((city) => {
          $("#city").append(new Option(city.Description, city.Ref));
        });
      }
    },
  });

  $("#city").change(function () {
    const cityRef = $(this).val();
    const deliveryOption = $("#deliveryOption").val();
    fetchWarehouses(cityRef, deliveryOption);
  });

  $("#deliveryOption").change(function () {
    const cityRef = $("#city").val();
    const deliveryOption = $(this).val();
    fetchWarehouses(cityRef, deliveryOption);
  });

  $("#orderForm").submit(function (event) {
    event.preventDefault();
    const orderData = {
      orderNumber: $("#orderNumber").val(),
      weight: $("#weight").val(),
      city: $("#city").val(),
      deliveryOption: $("#deliveryOption").val(),
      branch: $("#branch").val(),
    };

    if (orderData.weight > 30 && orderData.deliveryOption === "Поштомат") {
      alert("Вага замовлення перевищує ліміт для поштомату.");
      return;
    }

    $.ajax({
      url: "save_order.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify(orderData),
      success: function (response) {
        alert("Замовлення успішно збережено");
      },
      error: function () {
        alert("Помилка при збереженні замовлення");
      },
    });
  });
});
