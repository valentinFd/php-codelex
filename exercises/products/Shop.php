<?php

require_once("Product.php");

class Shop
{
    private array $products;

    public function __construct()
    {
        $this->products = [];
        $this->load();
    }

    private function load(): void
    {
        if (($file = fopen("products.csv", "r")) !== false)
        {
            fgetcsv($file, 1000); // header
            while (($row = fgetcsv($file, 1000)) !== false)
            {
                $this->products[] = new Product($row[0], $row[1]);
            }
            fclose($file);
        }
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->save();
    }

    public function save(): void
    {
        if (($file = fopen("products.csv", "w")) !== false)
        {
            fputcsv($file, Product::getPropertyNames());
            foreach ($this->products as $product)
            {
                fputcsv($file, (array)$product);
            }
            fclose($file);
        }
    }

    public function printProducts(): void
    {
        foreach ($this->products as $product)
        {
            echo $product . PHP_EOL;
        }
    }
}
