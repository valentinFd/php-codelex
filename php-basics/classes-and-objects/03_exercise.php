<?php

class FuelGauge
{
    private int $fuel;

    public function __construct()
    {
        $this->fuel = 0;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function incrementFuel()
    {
        if ($this->fuel < 70) $this->fuel++;
    }

    public function decrementFuel()
    {
        if ($this->fuel > 0) $this->fuel--;
    }
}

class Odometer
{
    private int $mileage;

    public FuelGauge $fuelGauge;

    public function __construct()
    {
        $this->mileage = 0;
        $this->fuelGauge = new FuelGauge;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage()
    {
        if ($this->mileage === 999999) $this->mileage = 0;
        else $this->mileage++;
        if ($this->mileage % 10 === 0) $this->fuelGauge->decrementFuel();
    }
}

$odometer = new Odometer();
for ($i = 0; $i < 10; $i++)
{
    $odometer->fuelGauge->incrementFuel();
}
while ($odometer->fuelGauge->getFuel() !== 0)
{
    $odometer->incrementMileage();
    echo "Mileage: {$odometer->getMileage()} km. Fuel: {$odometer->fuelGauge->getFuel()} l" . PHP_EOL;
}
