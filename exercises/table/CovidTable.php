<?php
declare(strict_types = 1);

use LucidFrame\Console\ConsoleTable;

class CovidTable
{
    private const FILE = "https://data.gov.lv/dati/dataset/5d0c9a64-b7b2-494e-b77d-22d48225791b/resource/8ea0ee31-1bea-4336-bbe4-2e66ccdadd1b/download/covid_19_valstu_saslimstibas_raditaji.csv";

    private array $data;

    public function getData(): array
    {
        return $this->data;
    }

    public function __construct()
    {
        $this->data = [];
    }

    public function load(): void
    {
        if (($file = fopen(self::FILE, "r")) !== false)
        {
            $this->data = [];
            fgetcsv($file, 1000, ";");
            while (($row = fgetcsv($file, 1000, ";")) !== false)
            {
                $this->data[] = new CountryCovidDataRow(...$row);
            }
            fclose($file);
        }
    }

    public function search(string $input, string $column): array
    {
        $searchResults = [];
        if (in_array($column, CountryCovidDataRow::getPropertyNames()))
        {
            $getProperty = "get" . $column;
            foreach ($this->data as $row)
            {
                if (strtoupper($input) === strtoupper($row->$getProperty()))
                {
                    $searchResults[] = $row;
                }
            }
        }
        return $searchResults;
    }

    public function print(array $data): void
    {
        $table = new ConsoleTable();
        foreach (CountryCovidDataRow::getPropertyNames() as $propertyName)
        {
            $propertyName = strlen($propertyName) > 18 ? substr($propertyName, 0, 16) . ".." : $propertyName;
            $table->addHeader($propertyName);
        }
        foreach ($data as $row)
        {
            if (is_a($row, "CountryCovidDataRow"))
            {
                $table->addRow();
                foreach ((array)$row as $element)
                {
                    $element = strlen($element) > 18 ? substr($element, 0, 16) . ".." : $element;
                    $table->addColumn($element);
                }
            }
        }
        $table->display();
    }
}
