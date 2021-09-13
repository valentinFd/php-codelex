<?php
declare(strict_types = 1);

class GunShop
{
    private array $guns;

    public function __construct()
    {
        $this->guns = [];
    }

    public function addGun(Gun $gun)
    {
        $this->guns[] = $gun;
    }

    public function printGuns()
    {
        foreach ($this->guns as $gun)
        {
            echo $gun . PHP_EOL;
        }
    }
}
