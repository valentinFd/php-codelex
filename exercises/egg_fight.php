<?php

class Egg
{
    private string $name;

    private int $power;

    public function getPower(): int
    {
        return $this->power;
    }

    public function __construct(string $name, int $power)
    {
        $this->name = $name;
        $this->power = $power;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}

class EggFight
{
    private array $playerEggs;

    private array $pcEggs;

    private Egg $playerEgg;

    private Egg $pcEgg;

    public function __construct(array $eggs)
    {
        while ($eggs)
        {
            $egg = $eggs[array_rand($eggs)];
            $this->playerEggs[] = $egg;
            array_splice($eggs, array_search($egg, $eggs), 1);

            $egg = $eggs[array_rand($eggs)];
            $this->pcEggs[] = $egg;
            array_splice($eggs, array_search($egg, $eggs), 1);
        }
    }

    private function displayEggs(array $eggs)
    {
        foreach ($eggs as $egg)
        {
            echo "$egg ";
        }
    }

    public function start()
    {
        $round = 1;
        while ($this->playerEggs && $this->pcEggs)
        {
            if (!isset($this->playerEgg))
            {
                $this->playerEgg = $this->playerEggs[array_rand($this->playerEggs)];
            }
            if (!isset($this->pcEgg))
            {
                $this->pcEgg = $this->pcEggs[array_rand($this->pcEggs)];
            }
            echo "Player eggs: ";
            $this->displayEggs($this->playerEggs);
            echo PHP_EOL;
            echo "Pc eggs: ";
            $this->displayEggs($this->pcEggs);
            echo PHP_EOL;
            echo "Round $round" . PHP_EOL;
            echo "$this->playerEgg vs $this->pcEgg" . PHP_EOL;
            $totalPower = $this->playerEgg->getPower() + $this->pcEgg->getPower();
            $result = rand(0, $totalPower);
            if (0 < $result && $result <= $this->playerEgg->getPower())
            {
                echo "$this->playerEgg won" . PHP_EOL;
                $this->playerEggs[] = $this->pcEgg;
                array_splice($this->pcEggs, array_search($this->pcEgg, $this->pcEggs), 1);
                unset($this->pcEgg);
            }
            if ($result >= $this->playerEgg->getPower() + 1)
            {
                echo "$this->pcEgg won" . PHP_EOL;
                $this->pcEggs[] = $this->playerEgg;
                array_splice($this->playerEggs, array_search($this->playerEgg, $this->playerEggs), 1);
                unset($this->playerEgg);
            }
            if ($result === 0)
            {
                echo "Tie" . PHP_EOL;
                array_splice($this->playerEggs, array_search($this->playerEgg, $this->playerEggs), 1);
                array_splice($this->pcEggs, array_search($this->pcEgg, $this->pcEggs), 1);
                unset($this->playerEgg);
                unset($this->pcEgg);
            }
            echo PHP_EOL;
            $round++;
        }
        if (!$this->playerEggs)
        {
            echo "Pc eggs: ";
            $this->displayEggs($this->pcEggs);
            echo PHP_EOL;
            echo "Player is out of eggs" . PHP_EOL;
        }
        if (!$this->pcEggs)
        {
            echo "Player eggs: ";
            $this->displayEggs($this->playerEggs);
            echo PHP_EOL;
            echo "Pc is out of eggs" . PHP_EOL;
        }
    }
}

$eggs = [];
$eggs[] = new Egg("A", 10);
$eggs[] = new Egg("B", 20);
$eggs[] = new Egg("C", 30);
$eggs[] = new Egg("D", 40);
$eggs[] = new Egg("E", 50);
$eggs[] = new Egg("F", 60);
$eggs[] = new Egg("G", 70);
$eggs[] = new Egg("H", 80);
$eggs[] = new Egg("I", 90);
$eggs[] = new Egg("J", 100);

$game = new EggFight($eggs);
$game->start();
