<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: welcome.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "password") {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Невірний логін або пароль";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Вхід</h2>
        <?php if (isset($error)) { 
                echo '<p style="color:red;">$error</p>'; 
            } 
        ?>
        <form method="POST" action="login.php">
            <label for="username">Логін:</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required><br><br>
            <input type="submit" value="Увійти">
        </form>
    </body>
</html>