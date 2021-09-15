<?php
declare(strict_types = 1);

class GunShop
{
    private array $guns;

    public function __construct()
    {
        $this->guns = [];
    }

    public function addGun(Gun $gun): void
    {
        $this->guns[] = $gun;
    }

    public function buyGun(Gun $gun, PaymentMethod $paymentMethod): void
    {
        array_splice($this->guns, array_search($gun, $this->guns), 1);
        $paymentMethod->withdraw($gun->getPrice());
    }

    public function searchByName(string $name): ?Gun
    {
        /** @var Gun $gun */
        foreach ($this->guns as $gun)
        {
            if ($gun->getName() === $name)
            {
                return $gun;
            }
        }
        return null;
    }

    public function printGuns(): void
    {
        foreach ($this->guns as $gun)
        {
            echo $gun . PHP_EOL;
        }
    }
}
