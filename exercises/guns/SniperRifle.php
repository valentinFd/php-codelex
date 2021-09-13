<?php
declare(strict_types = 1);

class SniperRifle extends Gun
{
    public function __construct(string $name)
    {
        parent::__construct($name);
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
        return "$this->name | $licenses | {$this->getTrajectory()}";
    }
}
