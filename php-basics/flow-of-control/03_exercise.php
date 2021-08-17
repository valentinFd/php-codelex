<?php

$number = (int)readline("Enter a number: ");
$count = 0;
if ($number === 0) $count = 1;
while ($number !== 0)
{
    $count++;
    $number = intdiv($number, 10);
}
echo $count . PHP_EOL;
