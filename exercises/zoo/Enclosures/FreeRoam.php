<?php

class FreeRoam
{
    private ?IFreeRoamAnimal $animal;

    public function getAnimal(): ?IFreeRoamAnimal
    {
        return $this->animal;
    }

    public function __construct()
    {
        $this->animal = null;
    }

    public function addAnimal(IFreeRoamAnimal $animal): void
    {
        $this->animal = $animal;
    }
}
