<?php

class NumberSquare
{
    private int $min;

    private int $max;

    public function start()
    {
        $this->min = (int)readline("Min: ");
        $this->max = (int)readline("Max: ");
        for ($i = $this->min; $i <= $this->max; $i++)
        {
            $row = "";
            for ($j = $i; $j <= $this->max; $j++)
            {
                $row .= $j;
            }
            for ($k = $this->min; $k < $i; $k++)
            {
                $row .= $k;
            }
            echo $row . PHP_EOL;
        }
    }
}

$program = new NumberSquare;
$program->start();
