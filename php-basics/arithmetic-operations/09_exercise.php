<?php

function BMI(float $weight, float $height): float
{
    $weight = round($weight * 2.20462262, 2);
    $height = round($height * 39.3700787, 2);

    return round(($weight * 703 / pow($height, 2)) * 10000, 1);
}

$weight = readline("Enter weight(kg): ");
$height = readline("Enter height(cm): ");

$BMI = BMI($weight, $height);
echo PHP_EOL . "BMI: " . $BMI . PHP_EOL;
switch (true)
{
    case $BMI < 18.5:
        echo "underweight" . PHP_EOL;
        break;
    case $BMI > 25:
        echo "overweight" . PHP_EOL;
        break;
    default:
        echo "optimal weight" . PHP_EOL;
        break;
}
