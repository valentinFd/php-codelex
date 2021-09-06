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

    public function incrementFuel(): void
    {
        $this->fuel++;
    }

    public function decrementFuel(): void
    {
        $this->fuel--;
    }
}

class Odometer
{
    private int $mileage;

    public function __construct()
    {
        $this->mileage = 0;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): void
    {
        if ($this->mileage === 999999) $this->mileage = 0;
        else $this->mileage++;
    }
}

class Car
{
    public FuelGauge $fuelGauge;

    public Odometer $odometer;

    public function __construct()
    {
        $this->fuelGauge = new FuelGauge();
        $this->odometer = new Odometer();
    }

    public function addFuel(int $amount): bool
    {
        if ($amount > 0)
        {
            if ($this->fuelGauge->getFuel() + $amount > 70) $amount = 70 - $this->fuelGauge->getFuel();
            for ($i = 0; $i < $amount; $i++)
            {
                $this->fuelGauge->incrementFuel();
            }
            return true;
        }
        return false;
    }

    public function drive(): bool
    {
        if ($this->fuelGauge->getFuel() === 0) return false;
        $this->odometer->incrementMileage();
        if ($this->odometer->getMileage() % 10 === 0)
        {
            $this->fuelGauge->decrementFuel();
        }
        return true;
    }
}

$car = new Car();
$car->addFuel(10);
while ($car->drive())
{
    echo "Mileage: {$car->odometer->getMileage()} km. Fuel: {$car->fuelGauge->getFuel()} l" . PHP_EOL;
}
