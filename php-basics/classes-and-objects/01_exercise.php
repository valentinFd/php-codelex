<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function print(): void
    {
        echo "$this->name, price $this->price, amount $this->amount" . PHP_EOL;
    }
}

$product = new Product("Logitech mouse", 70.00, 14);
$product->print();

$product1 = new Product("iPhone 5s", 999.99, 3);
$product1->print();

$product2 = new Product("Epson EB-U05", 440.46, 1);
$product2->print();

$product->setPrice(40.00);
$product->setAmount(10);
$product->print();
