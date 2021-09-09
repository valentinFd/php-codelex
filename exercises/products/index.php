<?php

require_once("Shop.php");
require_once("Product.php");

$shop = new Shop();
$shop->addProduct(new Product("Mouse", 7));
$shop->printProducts();
