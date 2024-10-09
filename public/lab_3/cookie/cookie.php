<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    setcookie("username", $name, time() + (60 * 60 * 24 * 7), "/"); 
    header("Location: " . $_SERVER["PHP_SELF"]);  
    exit();
}

if (isset($_POST["delete_cookie"])) {
    setcookie("username", "", time() - 3600, "/");  
    header("Location: " . $_SERVER["PHP_SELF"]); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Привітання користувача</title>
    </head>
    <body>
        <?php
        if (isset($_COOKIE["username"])) {
            echo "<h1>Привіт, " . htmlspecialchars($_COOKIE["username"]) . "!</h1>";
        } else {
            echo "<h1>Введіть ваше ім"я:</h1>";
        }
        ?>

        <?php if (!isset($_COOKIE["username"])): ?>
            <form method="POST" action="">
                <label for="name">Ваше ім"я:</label>
                <input type="text" id="name" name="name" required>
                <input type="submit" value="Відправити">
            </form>
        <?php endif; ?>

        <?php if (isset($_COOKIE["username"])): ?>
            <form method="POST" action="">
                <input type="submit" name="delete_cookie" value="Видалити cookie">
            </form>
        <?php endif; ?>

    </body>
</html>