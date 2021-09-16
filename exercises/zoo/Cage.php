<?php

class Cage extends Enclosure
{
    public function addAnimal(ICagedAnimal $animal): void
    {
        $this->animals[] = $animal;
    }
}
