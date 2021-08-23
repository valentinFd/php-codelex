<?php

class Piglet
{
    private int $totalScore;

    public function __construct()
    {
        $this->totalScore = 0;
    }

    private function roll(): int
    {
        $roll = rand(1, 6);
        $this->totalScore += $roll;
        return $roll;
    }

    public function startGame()
    {
        echo "Welcome to Piglet!" . PHP_EOL;
        $repeat = "y";
        while ($repeat === "y")
        {
            $roll = $this->roll();
            echo "You rolled a $roll!" . PHP_EOL;
            if ($roll !== 1)
            {
                $repeat = readline("Roll again? (y) ");
            }
            else
            {
                $this->totalScore = 0;
                $repeat = "n";
            }
        }
        echo "You got $this->totalScore points." . PHP_EOL;
    }
}

$game = new Piglet;
$game->startGame();
