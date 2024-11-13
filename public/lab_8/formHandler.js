const apiKey = '';

const departmentsRefs = [
    "6f8c7162-4b72-4b0a-88e5-906948c6a92f",
    "841339c7-591a-42e2-8233-7a0a00f0ed6f",
    "9a68df70-0267-42a8-bb5c-37f427e36ee4"
];

const postomatsRefs = [
    "95dc212d-479c-4ffb-a8ab-8c1b9073d0bc",
    "f9316480-5f2d-425d-bc2c-ac7cd29decf0"
];

function fetchWarehouses(cityRef, deliveryOption) {
    $.ajax({
        url: 'https://api.novaposhta.ua/v2.0/json/',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            "apiKey": apiKey,
            "modelName": "AddressGeneral",
            "calledMethod": "getWarehouses",
            "methodProperties": { "CityRef": cityRef }
        }),
        success: function(response) {
            if (response.success) {
                let filteredBranches = response.data.filter(branch => {
                    if (deliveryOption === 'Відділення') {
                        return departmentsRefs.includes(branch.TypeOfWarehouse); 
                    } else if (deliveryOption === 'Поштомат') {
                        return postomatsRefs.includes(branch.TypeOfWarehouse); 
                    }
                    return false;
                });

                $('#branch').empty();
                filteredBranches.forEach(branch => {
                    $('#branch').append(new Option(branch.Description, branch.Ref));
                });
            }
        }
    });
}

$(document).ready(function() {
    $.ajax({
        url: 'https://api.novaposhta.ua/v2.0/json/',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            "apiKey": apiKey,
            "modelName": "Address",
            "calledMethod": "getCities"
        }),
        success: function(response) {
            if (response.success) {
                response.data.forEach(city => {
                    $('#city').append(new Option(city.Description, city.Ref));
                });
            }
        }
    });

    $('#city').change(function() {
        const cityRef = $(this).val();
        const deliveryOption = $('#deliveryOption').val();
        fetchWarehouses(cityRef, deliveryOption);
    });

    $('#deliveryOption').change(function() {
        const cityRef = $('#city').val();
        const deliveryOption = $(this).val();
        fetchWarehouses(cityRef, deliveryOption);
    });

    $('#orderForm').submit(function(event) {
        event.preventDefault();
        const orderData = {
            orderNumber: $('#orderNumber').val(),
            weight: $('#weight').val(),
            city: $('#city').val(),
            deliveryOption: $('#deliveryOption').val(),
            branch: $('#branch').val()
        };

        if (orderData.weight > 30 && orderData.deliveryOption === 'Поштомат') {
            alert('Вага замовлення перевищує ліміт для поштомату.');
            return;
        }

        $.ajax({
            url: 'save_order.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(orderData),
            success: function(response) {
                alert('Замовлення успішно збережено');
            },
            error: function() {
                alert('Помилка при збереженні замовлення');
            }
        });
    });
});
