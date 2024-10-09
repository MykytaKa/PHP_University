<?php
session_start();

$inactive = 300;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactive) {
    session_unset();
    session_destroy();
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Корзинка</title>
    </head>
    <body>
        <h1>Ваша корзинка</h1>
        <ul>
            <?php if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0): ?>
                <?php foreach ($_SESSION["cart"] as $item): ?>
                    <li><?= $item["name"] ?> - <?= $item["price"] ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Ваша корзинка пуста.</li>
            <?php endif; ?>
        </ul>

        <h2>Попередні покупки</h2>
        <ul>
            <?php
            $previousPurchases = isset($_COOKIE["previous_purchases"]) ? json_decode($_COOKIE["previous_purchases"], true) : [];
            if (count($previousPurchases) > 0):
                foreach ($previousPurchases as $item):
            ?>
                <li><?= $item["name"] ?> - <?= $item["price"] ?></li>
            <?php
                endforeach;
            else:
            ?>
                <li>Немає попередніх покупок</li>
            <?php endif; ?>
        </ul>

        <a href="product_list.php">До продуктів</a>
    </body>
</html>
