<?php
$dsn = "pgsql:host=postgres;port=5432;dbname=laravel-getting-started";
$user = "laravel-getting-started-user";
$password = "laravel-getting-started-password";

$conn = new PDO($dsn, $user, $password);