<?php

class AsciiFigure
{
    private const SIZE = 5;

    public function draw()
    {
        for ($i = 0; $i < self::SIZE; $i++)
        {
            $row = "";
            for ($j = 0; $j < self::SIZE - 1 - $i; $j++)
            {
                $row .= "////";
            }
            for ($j = 0; $j < $i; $j++)
            {
                $row .= "********";
            }
            for ($j = 0; $j < self::SIZE - 1 - $i; $j++)
            {
                $row .= "\\\\\\\\";
            }
            echo $row . PHP_EOL;
        }
    }
}

$figure = new AsciiFigure;
$figure->draw();
