<?php
declare(strict_types = 1);

class Wallet extends PaymentMethod
{
    private int $money;

    public function getMoney(): int
    {
        return $this->money;
    }

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function withdraw(int $amount): void
    {
        $this->money -= $amount;
    }
}
