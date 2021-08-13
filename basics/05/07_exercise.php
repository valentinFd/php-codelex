<?php

function canBuyGun(stdClass $person, stdClass $gun): bool
{
    return !(($person->cash < $gun->price) || (!in_array($gun->license, $person->licenses)));
}

$person = new stdClass;
$person->name = "John";
$person->licenses = ["A", "B"];
$person->cash = 1000;

$guns = [];

$gun = new stdClass;
$gun->name = "AK-47";
$gun->price = 1000;
$gun->license = "A";

$guns[] = $gun;

$gun = new stdClass;
$gun->name = "9mm";
$gun->price = 279.99;
$gun->license = "C";

$guns[] = $gun;

echo "$person->name's licenses: ";
foreach ($person->licenses as $license)
{
    echo "$license; ";
}
echo "\n$person->name's cash: $person->cash\n\n";

foreach ($guns as $key => $gun)
{
    echo "$key | $gun->name ($gun->price eur) [$gun->license]\n";
}

$selection = (int)readline("Enter a gun index: ");

if (!isset($guns[$selection]))
{
    echo "Invalid selection\n";
    exit;
}

$selectedGun = $guns[$selection];

echo canBuyGun($person, $selectedGun) ? "$person->name can buy a $selectedGun->name.\n" : "$person->name can't buy a $selectedGun->name.\n";
