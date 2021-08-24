<?php

class SavingsAccount
{
    private float $balance;

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function __construct(float $balance)
    {
        $this->balance = $balance;
        $this->roundBalance();
    }

    public function withdraw(float $amount): bool
    {
        if ($this->balance < $amount) return false;
        $this->balance -= $amount;
        $this->roundBalance();
        return true;
    }

    public function deposit(float $amount): bool
    {
        $this->balance += $amount;
        $this->roundBalance();
        return true;
    }

    public function addMonthlyInterest(float $interest): bool
    {
        if ($interest < 0) return false;
        $this->balance += $this->balance * $interest;
        $this->roundBalance();
        return true;
    }

    private function roundBalance()
    {
        $this->balance = round($this->balance, 2);
    }
}

class Test
{
    public function main()
    {
        $amount = (float)readline("Enter the amount of money on the account: ");
        $interest = (float)readline("Enter the annual interest rate: ");
        $months = (int)readline("Enter the amount of months the account has been open for: ");

        $account = new SavingsAccount($amount);

        $totalDeposited = 0;
        $totalWithdrawn = 0;
        $interestEarned = 0;

        for ($i = 1; $i <= $months; $i++)
        {
            $deposited = (float)readline("Enter amount deposited for month $i: ");
            $withdrawn = (float)readline("Enter amount withdrawn for month $i: ");

            $account->deposit($deposited);
            $account->withdraw($withdrawn);

            $interestEarned += $account->getBalance() * ($interest / 12);

            $account->addMonthlyInterest($interest / 12);

            $totalDeposited += $deposited;
            $totalWithdrawn += $withdrawn;
        }
        $interestEarned = round($interestEarned, 2);

        echo "Total deposited: $" . number_format($totalDeposited, 2) . PHP_EOL;
        echo "Total withdrawn: $" . number_format($totalWithdrawn, 2) . PHP_EOL;
        echo "Interest earned: $" . number_format($interestEarned, 2) . PHP_EOL;
        echo "Ending balance: $" . number_format($account->getBalance(), 2) . PHP_EOL;
    }
}

$test = new Test;
$test->main();
