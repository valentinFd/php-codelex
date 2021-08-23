<?php

class Survey
{
    public const SURVEYED = 12467;

    public const PURCHASED_ENERGY_DRINKS = 0.14;

    public const PREFER_CITRUS_DRINKS = 0.64;

    public function calculate_energy_drinkers(): int
    {
        return self::SURVEYED * self::PURCHASED_ENERGY_DRINKS;
    }

    public function calculate_prefer_citrus(): int
    {
        return self::SURVEYED * self::PREFER_CITRUS_DRINKS;
    }
}

$survey = new Survey();
echo "Total number of people surveyed: " . $survey::SURVEYED . PHP_EOL;
echo "Approximately " . $survey->calculate_energy_drinkers() . " bought at least one energy drink" . PHP_EOL;
echo $survey->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
