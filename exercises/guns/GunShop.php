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

    public function buyGun(string $name, string $paymentMethod, Customer $customer): void
    {
        if (($gun = $this->searchByName($name)) !== null && $this->isValidPaymentMethod($paymentMethod))
        {
            $getPayMethod = "get" . $paymentMethod;
            $customer->$getPayMethod()->withdraw($gun->getPrice());
            array_splice($this->guns, array_search($gun, $this->guns), 1);
        }
    }

    private function searchByName(string $name): ?Gun
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

    private function isValidPaymentMethod(string $paymentMethod): bool
    {
        return $paymentMethod === "Wallet" || $paymentMethod === "PayPal" || $paymentMethod === "Bank";
    }

    public function printGuns(): void
    {
        foreach ($this->guns as $gun)
        {
            echo $gun . PHP_EOL;
        }
    }
}
