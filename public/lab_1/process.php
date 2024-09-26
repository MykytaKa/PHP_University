<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));

    if(!empty($name) && !empty($surname)){
        echo "Ваше ім'я - $name<br>" ;
        echo "Ваше прізвище - $surname";
    }
    elseif(empty($name) xor empty($surname)){
        echo "<h1>Введіть дані у обидва поля</h1><br><a href=\"index.html\">Повернутися до форми</a>";
    }
    else{
        echo "<h1>Заповніть поля данними!</h1><br><a href=\"index.html\">Повернутися до форми</a>";
    }
}