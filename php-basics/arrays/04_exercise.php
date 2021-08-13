<?php

$array = [];

for ($i = 0; $i < 10; $i++)
{
    $array[] = rand(1, 100);
}

$arrayCopy = $array;

$array[count($array) - 1] = -7;

foreach ($array as $value)
{
    echo "$value ";
}

echo PHP_EOL;

foreach ($arrayCopy as $value)
{
    echo "$value ";
}

echo PHP_EOL;
