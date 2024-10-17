<?php
include 'product.php';

class DiscountedProduct extends Product {
    private $discount;

    function __construct($name, $description, $price, $discount){
        parent::__construct($name, $description, $price);
        $this->discount = $discount;
    }

    function getInfo(){
        return parent::getInfo() . "Знижка: {$this->discount}%<br>";
    }

    function getPriceWithDiscount(){
        return $this->price - ($this->price * ($this->discount / 100));;
    }
}