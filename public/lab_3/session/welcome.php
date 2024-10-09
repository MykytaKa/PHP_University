<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h2>Привіт, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
        <p>Ви увійшли в систему.</p>
        <form method="POST" action="logout.php">
            <input type="submit" value="Вийти">
        </form>
    </body>
</html>