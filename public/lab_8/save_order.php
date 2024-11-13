<?php
include 'db_connect.php';  

$data = json_decode(file_get_contents("php://input"), true);

$orderNumber = $data['orderNumber'];
$weight = $data['weight'];
$city = $data['city'];
$deliveryOption = $data['deliveryOption'];
$branch = $data['branch'];

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM orders WHERE order_number = :orderNumber");
    $stmt->bindParam(':orderNumber', $orderNumber);
    $stmt->execute();
    $existingOrderCount = $stmt->fetchColumn();

    if ($existingOrderCount > 0) {
        echo json_encode(["error" => "Замовлення з таким номером вже існує."]);
        http_response_code(400);
        exit;
    }

    if ($weight > 30 && $deliveryOption == 'поштомат') {
        echo json_encode(["error" => "Вага замовлення перевищує ліміт для поштомату."]);
        http_response_code(400);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO orders (order_number, weight, city, delivery_option, branch) VALUES (:orderNumber, :weight, :city, :deliveryOption, :branch)");
    $stmt->bindParam(':orderNumber', $orderNumber);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':deliveryOption', $deliveryOption);
    $stmt->bindParam(':branch', $branch);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Замовлення успішно збережено."]);
        http_response_code(201);
    } else {
        echo json_encode(["error" => "Не вдалося зберегти замовлення."]);
        http_response_code(500);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Помилка: " . $e->getMessage()]);
}


