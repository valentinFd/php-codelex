<?php

class BankAccount
{
    private string $user;

    private float $balance;

    public function __construct(string $user, float $balance)
    {
        $this->user = $user;
        $this->balance = round($balance, 2);
    }

    public function show_user_name_and_balance(): string
    {
        if ($this->balance < 0)
        {
            return "$this->user, -$" . number_format($this->balance * -1, 2);
        }
        return "$this->user, $" . number_format($this->balance, 2);
    }
}

$account = new BankAccount("Benson", -17.5);
echo $account->show_user_name_and_balance() . PHP_EOL;
