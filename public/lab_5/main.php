<?php
include 'discountedProduct.php';
include 'category.php';

$bread = new Product("Хліб", 25, "Хліб, який був зроблений з врожаїв найкращих сортів української пшениці.");
echo $bread->getInfo();

$rotten_bread = new DiscountedProduct("Гнилий хліб", 25, "Має підвищений рівень білка всередині себе.", 90);
echo "Ціна гнилого хліба зі знижкою: " . $rotten_bread->getPriceWithDiscount() . "<br>";
echo $rotten_bread->getInfo();

$fruits = new Category("Фрукти");
$fruits->addProduct(new Product("Банан", 36, "Банан з Африки"));
$fruits->addProduct(new Product("Апельсин", 36, "Апельсин з Південної Америки"));
$fruits->addProduct(new Product("Фрукт дракона", 36, "Фрукт дракона з Азії"));
$fruits->showProductsInfo();

$invalid_product = new Product("", -532, "");
echo "Це не буде виведенно";