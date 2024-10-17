<?php
class Product{
    public $name;
    protected $price;
    public $description;

    function __construct($name, $price, $description){
        if($price < 0){
            die("Ціна товару повинна бути більше нуля!<br>");
        }

        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    function getInfo(){
        return "Назва: $this->name" . 
        "<br>Ціна: $this->price" . 
        "<br>Опис: $this->description<br>";
    }
}
