<?php

class Account
{
    private string $name;

    private int $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $balanceInt = (int)(round($balance, 2) * 100);
        $this->balance = $balanceInt;
    }

    public function withdraw(float $amount): bool
    {
        if ($amount > 0)
        {
            $amountInt = (int)(round($amount, 2) * 100);
            $this->balance -= $amountInt;
            return true;
        }
        return false;
    }

    public function deposit(float $amount): bool
    {
        if ($amount > 0)
        {
            $amountInt = (int)(round($amount, 2) * 100);
            $this->balance += $amountInt;
            return true;
        }
        return false;
    }

    public function __toString(): string
    {
        return "$this->name, $" . number_format($this->balance / 100, 2);
    }
}

class Bank
{
    public static function transfer(Account $from, Account $to, float $amount): bool
    {
        if ($amount > 0)
        {
            $from->withdraw($amount);
            $to->deposit($amount);
            return true;
        }
        return false;
    }
}

class TestAccount
{
    public function firstAccount(): void
    {
        echo "--First account--" . PHP_EOL;

        $firstAccount = new Account("First account", 100);
        $firstAccount->deposit(20);
        echo $firstAccount . PHP_EOL;
    }

    public function firstTransfer(): void
    {
        echo "--First transfer--" . PHP_EOL;

        $matts = new Account("Matt's account", 1000);
        $my = new Account("My account", 0);
        $matts->withdraw(100);
        $my->deposit(100);
        echo $matts . PHP_EOL;
        echo $my . PHP_EOL;
    }

    public function main(): void
    {
        echo "--Main--" . PHP_EOL;

        $a = new Account("A", 100);
        $b = new Account("B", 0);
        $c = new Account("C", 0);
        Bank::transfer($a, $b, 50);
        Bank::transfer($b, $c, 25);
        echo $a . PHP_EOL;
        echo $b . PHP_EOL;
        echo $c . PHP_EOL;
    }
}

$test = new TestAccount;
$test->firstAccount();
$test->firstTransfer();
$test->main();
