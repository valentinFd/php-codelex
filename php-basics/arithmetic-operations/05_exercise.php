<?php

$number = rand(1, 100);

echo "I'm thinking of a number between 1-100. Try to guess it." . PHP_EOL;
$input = (int)readline();

switch (true)
{
    case $input < $number:
        echo "Too low. $number" . PHP_EOL;
        break;
    case $input > $number:
        echo "Too high. $number" . PHP_EOL;
        break;
    default:
        echo "Correct. $number" . PHP_EOL;
        break;
}
