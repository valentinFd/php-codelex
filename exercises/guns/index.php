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

$shop->addGun(new Shotgun("M58B", 1000));
$shop->addGun(new Shotgun("CM350M", 3000));
$shop->addGun(new SniperRifle("SW-04J", 6000));
$shop->printGuns();

$customer = new Customer(10000, 10000, 10000);
$customer->printMoney();

$name = readline("Enter gun name: ");
$gun1 = $shop->searchByName("M58B");
$paymentMethod = "get" . readline("Enter payment method (Wallet/PayPal/Bank): ");
$shop->buyGun($gun1, $customer->$paymentMethod());
echo PHP_EOL;
$shop->printGuns();
$customer->printMoney();

$name = readline("Enter gun name: ");
$gun2 = $shop->searchByName("CM350M");
$paymentMethod = "get" . readline("Enter payment method (Wallet/PayPal/Bank): ");
$shop->buyGun($gun2, $customer->$paymentMethod());
echo PHP_EOL;
$shop->printGuns();
$customer->printMoney();

$name = readline("Enter gun name: ");
$gun3 = $shop->searchByName("SW-04J");
$paymentMethod = "get" . readline("Enter payment method (Wallet/PayPal/Bank): ");
$shop->buyGun($gun3, $customer->$paymentMethod());
echo PHP_EOL;
$shop->printGuns();
$customer->printMoney();
