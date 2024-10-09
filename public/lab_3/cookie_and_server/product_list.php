<?php
session_start();

$inactive = 300; 

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactive) {
    session_unset();
    session_destroy();
}

$_SESSION['last_activity'] = time();

$products = [
    ['id' => 1, 'name' => 'Картопля', 'price' => 12.00],
    ['id' => 2, 'name' => 'Хліб', 'price' => 16.00],
    ['id' => 3, 'name' => 'Яблука', 'price' => 26.00],
];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Список товарів</title>
    </head>
    <body>
        <h1>Товари</h1>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <?= $product['name'] ?> - <?= $product['price'] ?> 
                    <a href="add_to_cart.php?id=<?= $product['id'] ?>">Додати в корзинку</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="cart.php">Переглянути корзинку</a>
    </body>
</html>
