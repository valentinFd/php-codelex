<?php

function CheckOddEven(int $number): string
{
    if ($number % 2 !== 0) return "Odd Number";
    return "Even Number";
}

$number = (int)readline("Enter a number: ");
echo CheckOddEven($number) . PHP_EOL;
echo "bye!" . PHP_EOL;
