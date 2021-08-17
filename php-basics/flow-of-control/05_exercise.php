<?php

do
{
    $string = strtolower((string)readline("Enter a string: "));
    if (!ctype_alpha($string)) echo "The string must only contain alphabetic characters." . PHP_EOL;
} while (!ctype_alpha($string));
$result = "";
$stringArray = str_split($string);
foreach ($stringArray as $char)
{
    switch ($char)
    {
        case "a":
        case "b":
        case "c":
            $result .= "2";
            break;
        case "d":
        case "e":
        case "f":
            $result .= "3";
            break;
        case "g":
        case "h":
        case "i":
            $result .= "4";
            break;
        case "j":
        case "k":
        case "l":
            $result .= "5";
            break;
        case "m":
        case "n":
        case "o":
            $result .= "6";
            break;
        case "p":
        case "q":
        case "r":
        case "s":
            $result .= "7";
            break;
        case "t":
        case "u":
        case "v":
            $result .= "8";
            break;
        case "w":
        case "x":
        case "y":
        case "z":
            $result .= "9";
            break;
    }
}
echo $result . PHP_EOL;
