<?php

$a = (int)readline("Enter a number: ");
$n = (int)readline("Enter an exponent: ");
$result = 1;
for ($i = 0; $i < $n; $i++)
{
    $result *= $a;
}
echo "$a ^ $n = $result" . PHP_EOL;
