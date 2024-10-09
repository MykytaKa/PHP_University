<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text"])) {
    $f = fopen("log.txt", "a");
    if (!$f) {
        echo "Помилка відкриття файлу";
        exit;
    }
    fwrite($f, $_POST["text"] . PHP_EOL);
    fclose($f);
}

if (file_exists("log.txt")) {
    $f = fopen("log.txt", "r");
    if (!$f) {
        echo "Помилка відкриття файлу";
        exit;
    }
    $fileContent = fread($f, filesize("log.txt"));
    fclose($f);
    
    echo !empty($fileContent) ? nl2br(htmlspecialchars($fileContent)) : "Файл пустий";
} else {
    echo "Файл log.txt відсутній!";
}
