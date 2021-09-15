<?php
declare(strict_types = 1);

abstract class PaymentMethod
{
    protected int $money;

    public function getMoney(): int
    {
        return $this->money;
    }

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    abstract function withdraw(int $amount): void;
}
