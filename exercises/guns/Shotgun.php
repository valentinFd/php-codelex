<?php
declare(strict_types = 1);

class Shotgun extends Gun
{
    public function __construct(string $name, $price)
    {
        parent::__construct($name, $price);
        $this->licenses[] = "A";
    }

    public function getTrajectory(): int
    {
        return 2 * 4;
    }

    public function __toString(): string
    {
        $licenses = "";
        foreach ($this->licenses as $license)
        {
            $licenses .= "$license ";
        }
        $priceInDollars = round(($this->price / 100), 2);
        return "$this->name | $$priceInDollars | $licenses | {$this->getTrajectory()}";
    }
}
