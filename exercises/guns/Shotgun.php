<?php
declare(strict_types = 1);

class Shotgun extends Gun
{
    public function __construct(string $name, string $license)
    {
        parent::__construct($name, $license);
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
        return "$this->name | $licenses | {$this->getTrajectory()}";
    }
}
