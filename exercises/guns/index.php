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

$shop->addGun(new Shotgun("M58B", 2000));
$shop->addGun(new Shotgun("CM350M", 2000));
$shop->addGun(new SniperRifle("SW-04J", 2000));
$shop->printGuns();

$customer = new Customer(10000, 10000, 10000);
echo $customer->printMoney() . PHP_EOL;

$gun1 = $shop->searchByName("M58B");
$gun2 = $shop->searchByName("CM350M");
$gun3 = $shop->searchByName("SW-04J");

$shop->buyGun($gun1, $customer->getWallet());
$shop->buyGun($gun2, $customer->getPayPal());
$shop->buyGun($gun3, $customer->getBank());

echo $customer->printMoney() . PHP_EOL;
