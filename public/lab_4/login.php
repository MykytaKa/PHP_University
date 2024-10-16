<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = md5($password);

    $query = "SELECT * FROM users WHERE username = :username AND password = :hashed_password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":hashed_password", $hashed_password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($result)) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        echo "Невірне ім'я користувача або пароль!";
    }

    $stmt->close();
    $conn->close();
}