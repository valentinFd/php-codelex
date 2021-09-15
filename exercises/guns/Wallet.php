<?php
declare(strict_types = 1);

class Wallet extends PaymentMethod
{
    public function __construct(int $money)
    {
        parent::__construct($money);
    }

    public function withdraw(int $amount): void
    {
        $this->money -= $amount;
    }
}
