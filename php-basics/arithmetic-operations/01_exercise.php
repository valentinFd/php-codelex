<?php

$a = (int)readline("First number: ");
$b = (int)readline("Second number: ");

echo (($a === 15 || $b === 15) || ($a + $b === 15 || $a - $b === 15)) ? "true\n" : "false\n";
