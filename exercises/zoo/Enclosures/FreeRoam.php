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

    public function addAnimal(IFreeRoamAnimal &$animal): bool
    {
        if ($this->isEmpty())
        {
            $this->animal = $animal;
            $animal = null;
            return true;
        }
        return false;
    }

    private function isEmpty(): bool
    {
        return $this->animal === null;
    }
}
