<?php
declare(strict_types = 1);

class Gun
{
    protected string $name;

    protected array $licenses;

    protected function __construct(string $name)
    {
        $this->name = $name;
        $this->licenses[] = "Z";
    }

    protected function getTrajectory(): int
    {
        return 0;
    }
}
