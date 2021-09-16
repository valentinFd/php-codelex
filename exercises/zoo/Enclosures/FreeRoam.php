<?php

class FreeRoam extends Enclosure
{
    public function addAnimal(IFreeRoamAnimal $animal): void
    {
        $this->animals[] = $animal;
    }
}
