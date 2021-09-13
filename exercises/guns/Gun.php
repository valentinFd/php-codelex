<?php
declare(strict_types = 1);

class Gun
{
    protected string $name;

    protected array $licenses;

    protected function __construct(string $name, string $license)
    {
        $this->name = $name;
        $this->licenses[] = "Z";
        $this->licenses[] = $license;
    }

    protected function getTrajectory(): int
    {
        return 0;
    }
}
