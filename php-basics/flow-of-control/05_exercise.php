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
            $result .= "2";
            break;
        case "b":
            $result .= "22";
            break;
        case "c":
            $result .= "222";
            break;
        case "d":
            $result .= "3";
            break;
        case "e":
            $result .= "33";
            break;
        case "f":
            $result .= "333";
            break;
        case "g":
            $result .= "4";
            break;
        case "h":
            $result .= "44";
            break;
        case "i":
            $result .= "444";
            break;
        case "j":
            $result .= "5";
            break;
        case "k":
            $result .= "55";
            break;
        case "l":
            $result .= "555";
            break;
        case "m":
            $result .= "6";
            break;
        case "n":
            $result .= "66";
            break;
        case "o":
            $result .= "666";
            break;
        case "p":
            $result .= "7";
            break;
        case "q":
            $result .= "77";
            break;
        case "r":
            $result .= "777";
            break;
        case "s":
            $result .= "7777";
            break;
        case "t":
            $result .= "8";
            break;
        case "u":
            $result .= "88";
            break;
        case "v":
            $result .= "888";
            break;
        case "w":
            $result .= "9";
            break;
        case "x":
            $result .= "99";
            break;
        case "y":
            $result .= "999";
            break;
        case "z":
            $result .= "9999";
            break;
    }
}
echo $result . PHP_EOL;
