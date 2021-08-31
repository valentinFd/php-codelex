<?php

class Product
{
    private string $name;

    private int $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    public int $amount;

    public function __construct(string $name, int $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function __toString(): string
    {
        return "$this->name | $$this->price | $this->amount";
    }
}

class Shop
{
    private array $products;

    private array $cart;

    public function __construct(array $products)
    {
        $this->products = $products;
        $this->cart = [];
    }

    public function addToCart(int $productId, int $amount)
    {
        if (!($this->products[$productId]->amount < $amount))
        {
            $productCopy = clone $this->products[$productId];
            $productCopy->amount = $amount;
            $this->cart[] = $productCopy;
            $this->products[$productId]->amount -= $amount;
        }
    }

    private function cartTotalCost(): int
    {
        $totalCost = 0;
        foreach ($this->cart as $product)
        {
            $totalCost += $product->getPrice() * $product->amount;
        }
        return $totalCost;
    }

    public function checkOut(Customer $customer): bool
    {
        if (!($customer->getMoney() < $this->cartTotalCost()))
        {
            $customer->withdrawMoney($this->cartTotalCost());
            echo "Total Cost: " . $this->cartTotalCost() . PHP_EOL;
            $this->cart = [];
            return true;
        }
        return false;
    }

    public function printCart()
    {
        echo "Cart items:" . PHP_EOL;
        foreach ($this->cart as $product)
        {
            echo $product . PHP_EOL;
        }
    }

    public function printProducts()
    {
        echo "Shop items:" . PHP_EOL;
        foreach ($this->products as $key => $product)
        {
            echo "$key | $product" . PHP_EOL;
        }
    }
}

class Customer
{
    private int $money;

    public function getMoney(): int
    {
        return $this->money;
    }

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function withdrawMoney(int $amount)
    {
        $this->money -= $amount;
    }
}

$p = new Product("Keyboard", 140, 20);
$products = [$p];
$shop = new Shop($products);
$shop->printProducts();
$c = new Customer(1400);
echo "Customer's money: " . $c->getMoney() . PHP_EOL;
$shop->addToCart(0, 5);
$shop->printCart();
if (!$shop->checkOut($c)) echo "Not enough money" . PHP_EOL;
echo "Customer's money: " . $c->getMoney() . PHP_EOL;
