<?php

class Product
{
    private string $name;

    private int $amount;

    public function __construct(string $name, int $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    public function __toString(): string
    {
        return "$this->name, $this->amount";
    }

    public static function getPropertyNames(): array
    {
        return array_keys(get_class_vars(__CLASS__));
    }
}
