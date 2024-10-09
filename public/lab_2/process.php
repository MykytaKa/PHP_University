<?php
$webDirectory = '/uploads/';
$uploadDirectory = getcwd() . $webDirectory;
$maxFileSize = 2 * 1024 * 1024;
$allowedFileTypes = ['image/png', 'image/jpg', 'image/jpeg'];

if (isset($_FILES['user_file'])) {
    $file = $_FILES['user_file'];

    $fileName = basename($file['name']);
    $extension = '.' . pathinfo($fileName)['extension'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $uploadPath = $uploadDirectory . $fileName;

    if (!in_array($fileType, $allowedFileTypes)) {
        echo "Помилка: недопустимий тип файлу. Дозволені тільки PNG, JPG, JPEG.";
        exit;
    }

    if ($fileSize > $maxFileSize) {
        echo "Помилка: файл занадто великий. Максимальний розмір 2 МБ.";
        exit;
    }

    $fileIndex = 1;
    while(file_exists($uploadPath)){
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME) . "($fileIndex)" . $extension;
        $uploadPath = $uploadDirectory . $fileName;
        $fileIndex++;
    }

    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        $downloadLink = $webDirectory . $fileName;
        echo "Файл $fileName ($fileSize байта) успішно завантажений та збережений у: " . $uploadPath . "<br>";
        echo "Посилання для скачування: <a href='$downloadLink' download>Скачати файл</a>";
    } else {
        echo "Помилка: не вдалося зберегти файл.";
    }
} else {
    echo "Помилка: файл не був завантажений.";
}