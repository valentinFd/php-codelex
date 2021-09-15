<?php
declare(strict_types = 1);

class Customer
{
    private Wallet $wallet;

    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    private PayPal $payPal;

    public function getPayPal(): PayPal
    {
        return $this->payPal;
    }

    private Bank $bank;

    public function getBank(): Bank
    {
        return $this->bank;
    }

    public function __construct(int $walletMoney, int $paypalMoney, int $bankMoney)
    {
        $this->wallet = new Wallet($walletMoney);
        $this->payPal = new Paypal($paypalMoney, "john@gmail.com", "asd");
        $this->bank = new Bank($bankMoney);
    }

    public function printMoney(): void
    {
        $walletDollars = round(($this->wallet->getMoney() / 100), 2);
        $payPalDollars = round(($this->payPal->getMoney() / 100), 2);
        $bankDollars = round(($this->bank->getMoney() / 100), 2);
        echo "Wallet: $$walletDollars | PayPal: $$payPalDollars | Bank: $$bankDollars";
    }
}
