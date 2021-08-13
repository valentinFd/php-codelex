<?php

function over10Kg(array $fruit): bool
{
    return $fruit['weight'] > 10;
}

$fruits = [
    [
        "name" => "Apple",
        "weight" => 0.1
    ],
    [
        "name" => "Banana",
        "weight" => 11
    ]
];

$shippingCosts = [
    "<=10" => 1,
    ">10" => 2
];

foreach ($fruits as $fruit)
{
    if (over10Kg($fruit))
    {
        echo "{$fruit['name']} can be shipped for {$shippingCosts['>10']} eur.\n";
    }
    else
    {
        echo "{$fruit['name']} can be shipped for {$shippingCosts['<=10']} eur.\n";
    }
}
