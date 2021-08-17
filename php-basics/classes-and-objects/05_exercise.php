<?php

class Date
{
    private int $month;

    private int $day;

    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day)
    {
        $this->day = $day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year)
    {
        $this->year = $year;
    }

    public function displayDate()
    {
        echo "$this->month/$this->day/$this->year";
    }
}

$date = new Date(8, 17, 2021);
echo $date->displayDate() . PHP_EOL;

echo $date->getMonth() . PHP_EOL;

echo $date->getDay() . PHP_EOL;

echo $date->getYear() . PHP_EOL;

$date->setMonth(9);
$date->setDay(18);
$date->setYear(2022);
echo $date->displayDate() . PHP_EOL;
