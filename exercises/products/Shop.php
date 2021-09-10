<?php

class Shop
{
    private array $products;

    public function __construct()
    {
        $this->load();
    }

    private function load(): void
    {
        if (($file = fopen("products.csv", "r")) !== false)
        {
            $this->products = [];
            fgetcsv($file, 1000); // read header
            while (($row = fgetcsv($file, 1000)) !== false)
            {
                $this->products[] = new Product($row[0], (int)$row[1]);
            }
            fclose($file);
        }
    }

    public function addProduct(string $name, string $amount): void
    {
        $amount = (int)$amount > 0 ? (int)$amount : 0;
        $this->products[] = new Product($name, $amount);
        $this->save();
    }

    private function save(): void
    {
        $file = fopen("products.csv", "w");
        fputcsv($file, Product::getPropertyNames()); // write header
        foreach ($this->products as $product)
        {
            fputcsv($file, (array)$product);
        }
        fclose($file);
    }

    public function printProducts(): void
    {
        foreach (Product::getPropertyNames() as $propertyName)
        {
            echo "$propertyName ";
        }
        echo PHP_EOL;
        foreach ($this->products as $product)
        {
            echo $product . PHP_EOL;
        }
    }
}
