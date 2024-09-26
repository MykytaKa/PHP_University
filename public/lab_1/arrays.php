<?php

$student = array(
    'first_name' => 'Mykyta',
    'surname' => 'Kaliuzhnyi',
    'age' => 19,
    'proffesion' => 'programmer'
);

echo 'Unchanged array <br>';
foreach($student as $key => $value){
    echo $value . '<br>';
}

$student['avarage_score'] = 90.5;

echo 'Changed array <br>';
foreach($student as $key => $value){
    echo $value . '<br>';
}
