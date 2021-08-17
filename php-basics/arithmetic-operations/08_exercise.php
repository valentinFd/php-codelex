<?php

const MAX_HOURS = 60;
const MIN_BASE_PAY = 8.00;
const EXTRA_HOURS_PAY_MULTIPLIER = 1.5;
const MAX_HOURS_BEFORE_EXTRA = 40;

function totalPay(stdClass $employee): float
{
    if (!($employee->basePay < MIN_BASE_PAY || $employee->hours > MAX_HOURS))
    {
        $baseHours = $employee->hours;
        $extraHours = 0;

        if ($employee->hours > MAX_HOURS_BEFORE_EXTRA)
        {
            $extraHours = $employee->hours - MAX_HOURS_BEFORE_EXTRA;
            $baseHours -= $extraHours;
        }

        return $employee->basePay * $baseHours + $employee->basePay * EXTRA_HOURS_PAY_MULTIPLIER * $extraHours;
    }
    return -1;
}

function main()
{
    $employee1 = new stdClass();
    $employee1->basePay = 7.50;
    $employee1->hours = 35;

    $employee2 = new stdClass();
    $employee2->basePay = 8.20;
    $employee2->hours = 47;

    $employee3 = new stdClass();
    $employee3->basePay = 10.00;
    $employee3->hours = 73;

    $employees = [$employee1, $employee2, $employee3];

    foreach ($employees as $employee)
    {
        if (totalPay($employee) < 0) echo "Invalid input." . PHP_EOL;
        else echo "Total pay: " . totalPay($employee) . "$" . PHP_EOL;
    }
}

main();
