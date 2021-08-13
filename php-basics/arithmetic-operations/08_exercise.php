<?php

const MAX_HOURS = 60;
const MIN_BASE_PAY = 8.00;
const EXTRA_HOURS_PAY_MULTIPLIER = 1.5;
const MAX_HOURS_BEFORE_EXTRA = 40;

function totalPay(float $basePay, int $hours): string
{
    if (!($basePay < MIN_BASE_PAY || $hours > MAX_HOURS))
    {
        $extraHours = 0;

        if ($hours > MAX_HOURS_BEFORE_EXTRA)
        {
            $extraHours = $hours - MAX_HOURS_BEFORE_EXTRA;
            $hours -= $extraHours;
        }

        $totalPay = $basePay * $hours + $basePay * EXTRA_HOURS_PAY_MULTIPLIER * $extraHours . PHP_EOL;
        return "Total pay: " . $totalPay;
    }

    $error = "";
    if ($basePay < 8) $error .= "Employee cannot have a base pay of less than $8.00." . PHP_EOL;
    if ($hours > 60) $error .= "Employee cannot work more than 60 hours a week." . PHP_EOL;
    return $error;
}

$basePay = (float)readline("Enter base pay: ");
$hours = (int)readline("Enter hours: ");

echo totalPay($basePay, $hours);
