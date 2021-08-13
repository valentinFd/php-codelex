<?php

// 1

$intNumber = 10;
$stringNumber = '10';

if ($intNumber === $stringNumber)
{
    echo 'True' . "\n";
}
else
{
    echo 'False' . "\n";
}

// 2

$number = 50;

if ($number >= 1 && $number <= 100)
{
    echo 'True' . "\n";
}
else
{
    echo 'False' . "\n";
}

// 3

$string = 'Hello';

if ($string === 'Hello')
{
    echo 'World' . "\n";
}

// 4

$number = 50;

if ($number > 5 && $number < 50 && $number % 2 === 0)
{
    echo 'True' . "\n";
}
else
{
    echo 'False' . "\n";
}

// 5

$y = 5;
$z = 50;

if ($number >= $y && $number <= $z)
{
    echo 'correct' . "\n";
}

// 6

$plateNumber = 'AB-1234';

switch ($plateNumber)
{
    case 'AB-1234':
        echo "It's my car" . "\n";
        break;
    default:
        echo "It's not my car" . "\n";
        break;
}

// 7

$number = 60;

switch (true)
{
    case($number < 50):
        echo 'low' . "\n";
        break;
    case($number >= 50 && $number <= 100):
        echo 'medium' . "\n";
        break;
    case($number > 100):
        echo 'high' . "\n";
        break;
}
