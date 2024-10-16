<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ласкаво просимо</title>
</head>
<body>
    <h2>Ласкаво просимо, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Вийти</a>
</body>
</html>
