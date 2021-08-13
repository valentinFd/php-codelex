<?php

function hasReached18(stdClass $person): bool
{
    return $person->age >= 18;
}

$person = new stdClass;
$person->name = "John";
$person->surname = "Johnson";
$person->age = 17;

echo hasReached18($person) ? "$person->name $person->surname has reached age of 18.\n" : "$person->name $person->surname has not reached age of 18.\n";
