<?php

class Olympics
{
    private const CHARS = ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+"];

    private array $players;

    private array $tracks;

    private array $finishers;

    public function __construct()
    {
        $this->players = [];
        $this->tracks = [];
        $this->finishers = [];
    }

    private function createTracks(int $numberOfTracks)
    {
        $charsCopy = self::CHARS;
        for ($i = 0; $i < $numberOfTracks; $i++)
        {
            $this->tracks[$i] = array_fill(0, 6, "_");
            $player = $charsCopy[array_rand($charsCopy)];
            $this->tracks[$i][0] = $player;
            $this->players[] = $player;
            array_splice($charsCopy, array_search($player, $charsCopy), 1);
        }
    }

    private function displayTracks()
    {
        foreach ($this->tracks as $track)
        {
            foreach ($track as $item)
            {
                echo "$item ";
            }
            echo PHP_EOL;
        }
    }

    private function displayFinishers()
    {
        foreach ($this->finishers as $key => $finisher)
        {
            $place = $key + 1;
            echo "$place. $finisher" . PHP_EOL;
        }
    }

    public function start()
    {
        do
        {
            $charCount = count(self::CHARS);
            $n = readline("Enter number of players (1 - $charCount): ");
            if ($n > $charCount || $n < 1)
            {
                echo "Invalid number" . PHP_EOL;
            }
        } while ($n > $charCount || $n < 1);
        $this->createTracks($n);
        $this->displayTracks();
        echo PHP_EOL;
        $round = 1;
        while (count($this->finishers) !== count($this->players))
        {
            for ($i = 0; $i < count($this->tracks); $i++)
            {
                $step = rand(1, 2);
                $currentPos = array_search($this->players[$i], $this->tracks[$i]);
                if ($currentPos + $step < count($this->tracks[$i]))
                {
                    $nextPos = $currentPos + $step;
                }
                else
                {
                    $nextPos = count($this->tracks[$i]) - 1;
                }
                if ($this->tracks[$i][count($this->tracks[$i]) - 1] !== $this->players[$i])
                {
                    $this->tracks[$i][$currentPos] = "_";
                    $this->tracks[$i][$nextPos] = $this->players[$i];
                }
                if ($this->tracks[$i][count($this->tracks[$i]) - 1] === $this->players[$i] && !in_array($this->players[$i], $this->finishers))
                {
                    $this->finishers[] = $this->players[$i];
                }
            }
            echo "$round." . PHP_EOL;
            $this->displayTracks();
            echo PHP_EOL;
            $round++;
            sleep(1);
        }
        $this->displayFinishers();
    }
}

$olympics = new Olympics();
$olympics->start();
