<?php

class Cage
{
    private ?ICagedAnimal $animal;

    public function getAnimal(): ?ICagedAnimal
    {
        return $this->animal;
    }

    public function __construct()
    {
        $this->animal = null;
    }

    public function addAnimal(ICagedAnimal $animal): void
    {
        $this->animal = $animal;
    }
}
