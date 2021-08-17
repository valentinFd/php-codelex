<?php

$keypad = [
    "abc" => 2,
    "def" => 3,
    "ghi" => 4,
    "jkl" => 5,
    "mno" => 6,
    "pqrs" => 7,
    "tuv" => 8,
    "wxyz" => 9
];

do
{
    $string = strtolower((string)readline("Enter a string: "));
    if (!ctype_alpha($string)) echo "The string must only contain alphabetic characters." . PHP_EOL;
} while (!ctype_alpha($string));
$result = "";
$stringArray = str_split($string);
foreach ($stringArray as $char)
{
    foreach ($keypad as $key => $value)
    {
        $pos = strpos($key, $char);
        if ($pos !== false)
        {
            $result .= str_repeat($value, $pos + 1);
        }
    }
}
echo $result . PHP_EOL;
