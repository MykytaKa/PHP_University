<?php
session_start();

$inactive = 300; 

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactive) {
    session_unset();
    session_destroy();
}

$_SESSION['last_activity'] = time();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productName = '';
    $productPrice = 0;

    $products = [
        ['id' => 1, 'name' => 'Картопля', 'price' => 12.00],
        ['id' => 2, 'name' => 'Хліб', 'price' => 16.00],
        ['id' => 3, 'name' => 'Яблука', 'price' => 26.00],
    ];

    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $productName = $product['name'];
            $productPrice = $product['price'];
            break;
        }
    }

    $_SESSION['cart'][] = ['id' => $productId, 'name' => $productName, 'price' => $productPrice];

    $previousPurchases = isset($_COOKIE['previous_purchases']) ? json_decode($_COOKIE['previous_purchases'], true) : [];
    $previousPurchases[] = ['id' => $productId, 'name' => $productName, 'price' => $productPrice];

    setcookie('previous_purchases', json_encode($previousPurchases), time() + (30 * 86400));

    header('Location: cart.php');
    exit();
}
?>
