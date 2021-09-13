<?php
declare(strict_types = 1);

class Shotgun extends Gun
{
    public function __construct(string $name)
    {
        parent::__construct($name);
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
        return "$this->name | $licenses | {$this->getTrajectory()}";
    }
}
