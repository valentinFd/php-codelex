<?php

$a = 1;
$b = 100;

if ($a > $b)
{
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}
$sum = 0;
for ($i = $a; $i <= $b; $i++)
{
    $sum += $i;
}
$average = $sum / ($b - $a + 1);

echo("The sum of $a to $b is $sum" . PHP_EOL);
echo("The average is $average" . PHP_EOL);
