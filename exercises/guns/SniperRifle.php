<?php
declare(strict_types = 1);

class SniperRifle extends Gun
{
    public function __construct(string $name, int $price)
    {
        parent::__construct($name, $price);
        $this->licenses[] = "B";
    }

    public function getTrajectory(): int
    {
        return 5 * 6;
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
