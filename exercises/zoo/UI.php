<?php

require_once("Animals/ICagedAnimal.php");
require_once("Animals/IFreeRoamAnimal.php");
require_once("Animals/Animal.php");
require_once("Animals/CagedAnimal.php");
require_once("Animals/FreeRoamAnimal.php");
require_once("Animals/CagedFreeRoamAnimal.php");
require_once("Animals/AllTypeAnimal.php");
require_once("Animals/Monkey.php");
require_once("Animals/Giraffe.php");
require_once("Animals/Rabbit.php");
require_once("Enclosures/Cage.php");
require_once("Enclosures/FreeRoam.php");

class UI
{
    private const ANIMALS = ["Monkey", "Giraffe", "Rabbit"];

    private const ENCLOSURES = ["Cage", "FreeRoam"];

    public static function createAnimal(string $animal)
    {
        if (self::isValidAnimal($animal))
        {
            return new $animal($animal);
        }
        else
        {
            echo "Invalid animal" . PHP_EOL;
        }
    }

    public static function createEnclosure(string $enclosure)
    {
        if (self::isValidEnclosure($enclosure))
        {
            return new $enclosure();
        }
        else
        {
            echo "Invalid enclosure" . PHP_EOL;
        }
    }

    public static function toCage(ICagedAnimal $animal, Cage $cage)
    {
        $cage->addAnimal($animal);
    }

    public static function toFreeRoam(IFreeRoamAnimal $animal, FreeRoam $freeRoam)
    {
        $freeRoam->addAnimal($animal);
    }

    public static function printCage(Cage $cage): void
    {
        if ($cage->getAnimal() != null)
        {
            echo $cage->getAnimal()->getName() . PHP_EOL;
        }
        else
        {
            echo "Empty enclosure" . PHP_EOL;
        }
    }

    public static function printFreeRoam(FreeRoam $freeRoam): void
    {
        if ($freeRoam->getAnimal() !== null)
        {
            echo $freeRoam->getAnimal()->getName() . PHP_EOL;
        }
        else
        {
            echo "Empty enclosure" . PHP_EOL;
        }
    }

    private static function isValidAnimal(string $animal): bool
    {
        return in_array($animal, self::ANIMALS);
    }

    private static function isValidEnclosure(string $enclosure): bool
    {
        return in_array($enclosure, self::ENCLOSURES);
    }
}
