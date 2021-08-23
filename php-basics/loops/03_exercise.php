<?php

$firstWord = readline("Enter first word: ");
$secondWord = readline("Enter second word: ");
$dotsCount = 30 - strlen($firstWord) - strlen($secondWord);
$result = "";
$result .= $firstWord;
for ($i = 0; $i < $dotsCount; $i++)
{
    $result .= ".";
}
$result .= $secondWord;
echo $result . PHP_EOL;
