<?php

require_once("Animals/IAnimal.php");
require_once("Animals/ICagedAnimal.php");
require_once("Animals/IFreeRoamAnimal.php");
require_once("Animals/ICagedFreeRoamAnimal.php");
require_once("Animals/Animal.php");
require_once("Animals/CagedAnimal.php");
require_once("Animals/FreeRoamAnimal.php");
require_once("Animals/CagedFreeRoamAnimal.php");
require_once("Animals/Monkey.php");
require_once("Animals/Giraffe.php");
require_once("Animals/Rabbit.php");
require_once("Enclosures/Enclosure.php");
require_once("Enclosures/Cage.php");
require_once("Enclosures/FreeRoam.php");

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
