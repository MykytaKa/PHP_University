<?php
$directory = 'uploads';

if (is_dir($directory)) {
    $files = scandir($directory);

    echo "<h1>Список файлів для завантаження</h1>";
    echo "<ul>";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<li><a href='$directory/$file' download>$file</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "Директорія не знайдена.";
}

