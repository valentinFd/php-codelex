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
        $this->products = [];
        if (($file = fopen("products.csv", "r")) !== false)
        {
            fgetcsv($file, 1000); // read header
            while (($row = fgetcsv($file, 1000, )) !== false)
            {
                $this->products[] = new Product($row[0], (int)$row[1]);
            }
            fclose($file);
        }
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->save();
    }

    private function save(): void
    {
        $file = fopen("products.csv", "w");
        fputcsv($file, Product::getPropertyNames(), ); // write header
        foreach ($this->products as $product)
        {
            fputcsv($file, (array)$product, );
        }
        fclose($file);
    }

    public function printProducts(): void
    {
        foreach ($this->products as $product)
        {
            echo $product . PHP_EOL;
        }
    }
}
