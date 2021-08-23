<?php

class RollTwoDice
{
    private int $sum;

    public function start()
    {
        do
        {
            $this->sum = (int)readline("Desired sum: ");
            if (!$this->isValidSum())
            {
                echo "Invalid sum." . PHP_EOL;
            }
        } while (!$this->isValidSum());
        do
        {
            $roll1 = rand(1, 6);
            $roll2 = rand(1, 6);
            $sum = $roll1 + $roll2;
            echo "$roll1 and $roll2 = $sum" . PHP_EOL;
        } while ($sum !== $this->sum);
    }

    private function isValidSum(): bool
    {
        return !($this->sum < 2 || $this->sum > 12);
    }
}

$program = new RollTwoDice;
$program->start();
