<?php

$n = 10;

$result = 1;
for ($i = 2; $i <= $n; $i++)
{
    $result *= $i;
}

echo $result . PHP_EOL;
