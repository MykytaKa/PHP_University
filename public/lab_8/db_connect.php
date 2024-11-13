<?php
$host = 'postgres';
$dbname = 'laravel-getting-started';
$user = 'laravel-getting-started-user';
$password = 'laravel-getting-started-password';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка з'єднання з базою даних: " . $e->getMessage());
}
