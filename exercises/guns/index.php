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

for ($i = 0; $i < 3; $i++)
{
    $name = readline("Enter gun name: ");
    $gun = $shop->searchByName($name);
    $getPaymentMethod = "get" . readline("Enter payment method (Wallet/PayPal/Bank): ");
    $shop->buyGun($gun, $customer->$getPaymentMethod());
    echo PHP_EOL;
    $shop->printGuns();
    $customer->printMoney();
}
