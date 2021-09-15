<?php
declare(strict_types = 1);

require_once("PaymentMethod.php");
require_once("Wallet.php");
require_once("PayPal.php");
require_once("Bank.php");
require_once("Gun.php");
require_once("Shotgun.php");
require_once("SniperRifle.php");
require_once("GunShop.php");
require_once("Customer.php");

$shop = new GunShop();

$shotgun = new Shotgun("M58B", 2000);
$shotgun2 = new Shotgun("CM350M", 2000);
$sniper = new SniperRifle("SW-04J", 2000);

$shop->addGun($shotgun);
$shop->addGun($shotgun2);
$shop->addGun($sniper);
$shop->printGuns();

$customer = new Customer(10000, 10000, "john@gmail.com", "asd", 10000);
echo $customer->printMoney() . PHP_EOL;
$shop->buyGun("M58B", "Wallet", $customer);
$shop->buyGun("CM350M", "PayPal", $customer);
$shop->buyGun("SW-04J", "Bank", $customer);
echo $customer->printMoney() . PHP_EOL;
