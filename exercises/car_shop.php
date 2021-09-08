<?php

class Car
{
    private string $carPlate;

    public function getCarPlate(): string
    {
        return $this->carPlate;
    }

    public function __construct(string $carPlate)
    {
        $this->carPlate = $carPlate;
    }
}

class ShopItem
{
    private Car $car;

    public function getCar(): Car
    {
        return $this->car;
    }

    private int $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function __construct(Car $car, int $price)
    {
        $this->car = $car;
        $this->price = $price;
    }
}

class CarShop
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function buyCar(string $carPlate, int &$cash): void
    {
        $foundItem = null;
        /** @var ShopItem $item */
        foreach ($this->items as $item)
        {
            if ($item->getCar()->getCarPlate() === $carPlate)
            {
                $foundItem = $item;
                break;
            }
        }
        if ($foundItem)
        {
            $carPrice = $foundItem->getPrice();
            if ($cash >= $carPrice)
            {
                $cash -= $carPrice;
                echo "Successfully bought a car with \"{$foundItem->getCar()->getCarPlate()}\" car plate for $$carPrice" . PHP_EOL;
                array_splice($this->items, array_search($foundItem, $this->items), 1);
            }
            else
            {
                echo "Failed to buy a car with \"{$foundItem->getCar()->getCarPlate()}\" car plate for $$carPrice" . PHP_EOL;
                echo "Not enough money" . PHP_EOL;
            }
        }
        else
        {
            echo "Failed to find a car with \"$carPlate\" car plate" . PHP_EOL;
        }
    }
}

$items = [
    new ShopItem(new Car("AB-1234"), 1500),
    new ShopItem(new Car("EX-1000"), 2100),
    new ShopItem(new Car("AS-9527XV"), 2500)
];

$shop = new CarShop($items);
$cash = 4000;
echo "$$cash" . PHP_EOL;
$shop->buyCar("AB-1234", $cash);
echo "$$cash" . PHP_EOL;
$shop->buyCar("EX-1000", $cash);
echo "$$cash" . PHP_EOL;
$shop->buyCar("AS-9527XV", $cash);
echo "$$cash" . PHP_EOL;
