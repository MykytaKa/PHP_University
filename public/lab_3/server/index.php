<?php
if ($_SERVER['REQUEST_METHOD'] != "POST" && $_SERVER['REQUEST_METHOD'] != "GET")  {
    header("Location: invalid_request.html");  
    exit();
}

echo "<h2>Інформація про сервер та запит</h2>";
echo "<p>IP-адреса клієнта: " . $_SERVER['REMOTE_ADDR'] . "</p>";
echo "<p>Браузер клієнта: " . $_SERVER['HTTP_USER_AGENT'] . "</p>";
echo "<p>Назва скрипта: " . $_SERVER['PHP_SELF'] . "</p>";
echo "<p>Метод запиту: " . $_SERVER['REQUEST_METHOD'] . "</p>";

echo "<p>Шлях до файлу на сервері: " . $_SERVER['SCRIPT_FILENAME'] . "</p>";
