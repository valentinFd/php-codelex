<?php

$a = 1;
$b = 100;

$sum = 0;
for ($i = $a; $i <= $b; $i++)
{
    $sum += $i;
}
$average = $sum / $b;

echo("The sum of $a to $b is $sum" . PHP_EOL);
echo("The average is $average" . PHP_EOL);
