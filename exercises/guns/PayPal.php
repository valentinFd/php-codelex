<?php
declare(strict_types = 1);

class PayPal extends PaymentMethod
{
    private string $email;

    private string $password;

    private bool $loggedIn;

    public function __construct(int $money, string $email, string $password)
    {
        parent::__construct($money);
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
