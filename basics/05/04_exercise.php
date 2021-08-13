<?php

function hasReached18(stdClass $person): bool
{
    return $person->age >= 18;
}

$persons = [];

$person = new stdClass;
$person->name = "John";
$person->surname = "Johnson";
$person->age = 17;

$persons[] = $person;

$person = new stdClass;
$person->name = "James";
$person->surname = "Charles";
$person->age = 34;

$persons[] = $person;

foreach ($persons as $person)
{
    echo hasReached18($person) ? "$person->name $person->surname has reached age of 18.\n" : "$person->name $person->surname has not reached age of 18.\n";
}
