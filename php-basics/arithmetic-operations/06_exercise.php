<?php

$output = "";
for ($i = 1; $i <= 110; $i++)
{
    if ($i % 3 === 0) $output = "Coza";
    if ($i % 5 === 0) $output = "Loza";
    if ($i % 7 === 0) $output = "Woza";

    if (!($i % 3 === 0 || $i % 5 === 0 || $i % 7 === 0)) $output = "$i";

    if ($i % 11 !== 0) echo "$output ";
    else echo "$output\n";
}
echo "\n";
