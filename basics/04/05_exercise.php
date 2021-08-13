<?php

$persons = [];

$person = new stdClass;
$person->name = "John";
$person->surname = "Doe";
$person->age = "21";
$person->birthday = "05-09-1999";

$persons[] = $person;

$person = new stdClass;
$person->name = "Jack";
$person->surname = "Jackson";
$person->age = "22";
$person->birthday = "18-11-1998";

$persons[] = $person;

foreach ($persons as $person)
{
    echo "$person->name $person->surname ($person->age / $person->birthday)" . "\n";
}
