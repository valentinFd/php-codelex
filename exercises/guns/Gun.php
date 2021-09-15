<?php
declare(strict_types = 1);

abstract class Gun
{
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    protected int $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    protected array $licenses;

    protected function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->licenses[] = "Z";
    }

    abstract function getTrajectory(): int;
}
