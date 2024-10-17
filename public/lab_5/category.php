<?php
class Category{
    private $name;
    private $products = array();

    function __construct($name){
        $this->name = $name;
    }

    function addProduct($product){
        $this->products[] = $product;
    }

    function showProductsInfo(){
        foreach($this->products as $product){
            echo $product->getInfo();
        }
    }
}