<?php

require_once("UI.php");

$monkey = UI::createAnimal("Monkey");
$giraffe = UI::createAnimal("Giraffe");
$rabbit = UI::createAnimal("Rabbit");
$rabbit2 = UI::createAnimal("Rabbit");

$cage = UI::createEnclosure("Cage");
$cage2 = UI::createEnclosure("Cage");

$freeRoam = UI::createEnclosure("FreeRoam");
$freeRoam2 = UI::createEnclosure("FreeRoam");

UI::toCage($monkey, $cage);
UI::toCage($rabbit, $cage2);

UI::toFreeRoam($giraffe, $freeRoam);
UI::toFreeRoam($rabbit2, $freeRoam2);

UI::printCage($cage);
UI::printCage($cage2);
UI::printFreeRoam($freeRoam);
UI::printFreeRoam($freeRoam2);

$cage3 = UI::createEnclosure("Cage");
UI::printCage($cage3);

$rabbit3 = UI::createAnimal("Rabbit");
UI::toCage($rabbit3, $cage2);
