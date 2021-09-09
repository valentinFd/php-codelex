<?php

require_once("Shop.php");

$shop = new Shop();
$shop->addProduct(new Product("Mouse", 7));
$shop->printProducts();
