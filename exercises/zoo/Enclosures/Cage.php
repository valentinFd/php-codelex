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

    public function addAnimal(ICagedAnimal &$animal): bool
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
