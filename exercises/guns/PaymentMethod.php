<?php
declare(strict_types = 1);

abstract class PaymentMethod
{
    abstract function withdraw(int $amount): void;
}
