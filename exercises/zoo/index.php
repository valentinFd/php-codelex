<?php

require_once("IAnimal.php");
require_once("ICagedAnimal.php");
require_once("IFreeRoamAnimal.php");
require_once("ICagedFreeRoamAnimal.php");
require_once("Animal.php");
require_once("CagedAnimal.php");
require_once("FreeRoamAnimal.php");
require_once("CagedFreeRoamAnimal.php");
require_once("Enclosure.php");
require_once("Cage.php");
require_once("FreeRoam.php");
require_once("Monkey.php");
require_once("Giraffe.php");
require_once("Rabbit.php");

$cage = new Cage();
$cage->addAnimal(new Rabbit("Rabbit"));
$cage->addAnimal(new Monkey("Monkey"));
echo "Animals in cage:" . PHP_EOL;
foreach ($cage->getAnimals() as $animal)
{
    echo $animal->getName() . PHP_EOL;
}

$freeRoam = new FreeRoam();
$freeRoam->addAnimal(new Rabbit("Rabbit"));
$freeRoam->addAnimal(new Giraffe("Giraffe"));
echo "Animals in free roam:" . PHP_EOL;
foreach ($freeRoam->getAnimals() as $animal)
{
    echo $animal->getName() . PHP_EOL;
}
