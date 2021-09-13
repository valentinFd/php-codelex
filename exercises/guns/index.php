<?php
declare(strict_types = 1);

require_once("GunShop.php");
require_once("Gun.php");
require_once("Shotgun.php");
require_once("SniperRifle.php");

$shop = new GunShop();

$shotgun = new Shotgun("M58B", "A");
$sniper = new SniperRifle("SW-04J", "B");

$shop->addGun($shotgun);
$shop->addGun($sniper);
$shop->printGuns();
