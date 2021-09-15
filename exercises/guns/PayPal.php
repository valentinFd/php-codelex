<?php
declare(strict_types = 1);

class PayPal extends PaymentMethod
{
    private int $money;

    public function getMoney(): int
    {
        return $this->money;
    }

    private string $email;

    private string $password;

    private bool $loggedIn;

    public function createAccount(int $money, string $email, string $password): void
    {
        $this->money = $money;
        $this->email = $email;
        $this->password = $password;
        $this->loggedIn = false;
    }

    public function withdraw(int $amount): void
    {
        $this->logIn();
        if ($this->loggedIn)
        {
            $this->money -= $amount;
        }
    }

    private function logIn(): void
    {
        do
        {
            $email = readline("Email: ");
            $password = readline("Password: ");
            if ($this->isValid($email, $password))
            {
                $this->loggedIn = true;
            }
            else
            {
                echo "Incorrect email or password" . PHP_EOL;
            }
        } while (!$this->isValid($email, $password));
    }

    private function isValid(string $email, string $password): bool
    {
        return $this->email === $email && $this->password === $password;
    }
}
