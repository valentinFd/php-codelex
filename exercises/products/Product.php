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
        $result = "";
        foreach (get_object_vars($this) as $objectVar)
        {
            $result .= "$objectVar ";
        }
        return $result;
    }

    public static function getPropertyNames(): array
    {
        return array_keys(get_class_vars(__CLASS__));
    }
}
