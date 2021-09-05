<?php

class HorseRace
{
    private const CHARS_MULTIPLIERS = [
        "!" => 1,
        "@" => 1.5,
        "#" => 2,
        "$" => 2.5,
        "%" => 3,
        "^" => 3.5,
        "&" => 4,
        "*" => 4.5,
        "(" => 5,
        ")" => 5.5,
        "-" => 6,
        "+" => 6.5
    ];

    private array $horses;

    private array $tracks;

    private array $finishers;

    private array $bets;

    private float $winnings;

    public function __construct()
    {
        $this->horses = [];
        $this->tracks = [];
        $this->finishers = [];
        $this->winnings = 0;
    }

    private function createTracks(int $numberOfTracks)
    {
        $chars = array_keys(self::CHARS_MULTIPLIERS);
        for ($i = 0; $i < $numberOfTracks; $i++)
        {
            $this->tracks[$i] = array_fill(0, 6, "_");
            $horse = $chars[array_rand($chars)];
            $this->tracks[$i][0] = $horse;
            $this->horses[] = $horse;
            array_splice($chars, array_search($horse, $chars), 1);
        }
    }

    private function setBets()
    {
        foreach ($this->horses as $horse)
        {
            $this->bets[$horse] = (float)readline("Enter your bet for $horse: $");
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
            $charCount = count(self::CHARS_MULTIPLIERS);
            $n = readline("Enter number of horses (1 - $charCount): ");
            if ($n > $charCount || $n < 1)
            {
                echo "Invalid number" . PHP_EOL;
            }
        } while ($n > $charCount || $n < 1);
        $this->createTracks($n);
        $this->displayTracks();
        echo PHP_EOL;
        $this->setBets();
        $round = 1;
        while (count($this->finishers) !== count($this->horses))
        {
            for ($i = 0; $i < count($this->tracks); $i++)
            {
                $step = rand(1, 2);
                $currentPos = array_search($this->horses[$i], $this->tracks[$i]);
                if ($currentPos + $step < count($this->tracks[$i]))
                {
                    $nextPos = $currentPos + $step;
                }
                else
                {
                    $nextPos = count($this->tracks[$i]) - 1;
                }
                if ($this->tracks[$i][count($this->tracks[$i]) - 1] !== $this->horses[$i])
                {
                    $this->tracks[$i][$currentPos] = "_";
                    $this->tracks[$i][$nextPos] = $this->horses[$i];
                }
                else if (!in_array($this->horses[$i], $this->finishers))
                {
                    $this->finishers[] = $this->horses[$i];
                }
            }
            echo "$round." . PHP_EOL;
            $this->displayTracks();
            echo PHP_EOL;
            $round++;
            sleep(1);
        }
        $this->displayFinishers();
        if (in_array($this->finishers[0], array_keys($this->bets)))
        {
            $this->winnings += $this->bets[$this->finishers[0]] * self::CHARS_MULTIPLIERS[$this->finishers[0]];
        }
        echo "You won $$this->winnings" . PHP_EOL;
    }
}

$race = new HorseRace();
$race->start();
