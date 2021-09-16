<?php

abstract class Enclosure
{
    protected array $animals;

    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function __construct()
    {
        $this->animals = [];
    }
}
