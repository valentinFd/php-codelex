<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

echo "Original numeric array: " . PHP_EOL;

for ($i = 0; $i < count($numbers); $i++)
{
    if (($i + 1) % 5 !== 0) echo "$numbers[$i] ";
    else echo $numbers[$i] . PHP_EOL;
}

echo PHP_EOL;
echo "Sorted numeric array: " . PHP_EOL;

sort($numbers);

for ($i = 0; $i < count($numbers); $i++)
{
    if (($i + 1) % 5 !== 0) echo "$numbers[$i] ";
    else echo $numbers[$i] . PHP_EOL;
}

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

echo PHP_EOL;
echo "Original string array: " . PHP_EOL;

foreach ($words as $word)
{
    echo "$word; ";
}

echo PHP_EOL;
echo "Sorted string array: " . PHP_EOL;

sort($words);

foreach ($words as $word)
{
    echo "$word; ";
}

echo PHP_EOL;