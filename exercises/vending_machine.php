<?php

class VendingMachine
{
    private const COINS = [1, 2, 5, 10, 20, 50, 100, 200];

    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function buyProduct(int $id, array $coins): array
    {
        if (array_Key_exists($id, $this->products))
        {
            $coinSum = 0;
            foreach ($coins as $coin => $amount)
            {
                $coinSum += $coin * $amount;
            }
            if ($coinSum >= $this->products[$id]->getPrice())
            {
                $coinSum -= $this->products[$id]->getPrice();
                $change = [];
                foreach (array_reverse(self::COINS) as $coin)
                {
                    $change[$coin] = 0;
                    $quantity = intdiv($coinSum, $coin);
                    $change[$coin] += $quantity;
                    $coinSum -= $coin * $quantity;
                }
                echo "Successfully bought {$this->products[$id]->getName()}!" . PHP_EOL;
                array_splice($this->products, $id, 1);
                return $change;
            }
        }
    }

    public function printProducts()
    {
        foreach ($this->products as $id => $product)
        {
            echo "$id | $product" . PHP_EOL;
        }
    }
}

class Product
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    private int $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function __toString(): string
    {
        return "$this->name | $this->price";
    }
}

class Person
{
    private array $wallet;

    public function __construct(array $wallet)
    {
        $this->wallet = $wallet;
    }

    public function withdraw(array $amount)
    {

    }
}

$wallet = [
    1 => 6,
    2 => 3,
    5 => 5,
    10 => 5,
    20 => 10,
    50 => 5,
    100 => 2,
    200 => 1
];
$person = new Person($wallet);

$p = new Product("Hot water", 25);
$p1 = new Product("Hot milk", 40);
$p2 = new Product("Fresh bean coffee", 80);
$products = [$p, $p1, $p2];

$vending = new VendingMachine($products);
$vending->printProducts();
$coins = [
    100 => 1
];
$change = ($vending->buyProduct(1, $coins));
echo "Change: " . PHP_EOL;
foreach ($change as $key => $item)
{
    if ($item > 0) echo "$key | $item" . PHP_EOL;
}
