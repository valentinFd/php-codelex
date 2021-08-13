<?php

function doubleNumber(int $number): int
{
    return $number * 2;
}

$array = [1, 2, 3, 7.1, "123"];

for ($i = 0; $i < count($array); $i++)
{
    if (gettype($array[$i]) === "integer") echo doubleNumber($array[$i]) . "\n";
}
