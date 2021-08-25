<?php

class SlotMachine
{
    private const SIZE = 3;

    private const WINNING_MULTIPLIERS = [
        10 => 1,
        20 => 2,
        40 => 3,
        80 => 4,
        160 => 5
    ];

    private const ELEMENTS = ["A", "A", "A", "A", "A", "A", "A", "A", "B", "B", "B", "B", "B", "B", "C", "C", "C", "C", "D", "D", "E"];

    private const ELEMENT_SCORES = [
        "A" => 2,
        "B" => 3,
        "C" => 5,
        "D" => 7,
        "E" => 11
    ];

    private const ELEMENT_WIN_AMOUNTS = [
        "A" => 5,
        "B" => 10,
        "C" => 15,
        "D" => 25,
        "E" => 300
    ];

    private int $winnings;

    private array $slotMachine;

    private array $scores;

    public function __construct()
    {
        $this->winnings = 0;
        $this->slotMachine = [];
        for ($i = 0; $i < self::SIZE; $i++)
        {
            $slotMachine[] = array_fill(0, self::SIZE + 1, "");
        }
        $this->scores = array_fill(0, 2 * self::SIZE + 2, 1);
    }

    private function startSlotMachine(int $amount)
    {
        for ($i = 0; $i < self::SIZE; $i++)
        {
            for ($j = 0; $j < self::SIZE; $j++)
            {
                $randomElement = self::ELEMENTS[array_rand(self::ELEMENTS)];
                $this->slotMachine[$i][$j] = $randomElement;

                $this->scores[$i] *= self::ELEMENT_SCORES[$randomElement];
                $this->scores[self::SIZE + $j] *= self::ELEMENT_SCORES[$randomElement];
                if ($i === $j)
                {
                    $this->scores[2 * self::SIZE] *= self::ELEMENT_SCORES[$randomElement];
                }
                if ($i === self::SIZE - 1 - $j)
                {
                    $this->scores[2 * self::SIZE + 1] *= self::ELEMENT_SCORES[$randomElement];
                }
            }
        }
        foreach ($this->scores as $score)
        {
            $value = pow($score, 1 / self::SIZE);
            // if $score is a perfect cube, one line of matrix has one kind of element
            if ((string)$value === (string)round($value))
            {
                $value = (int)(string)$value;
                $this->winnings += (self::ELEMENT_WIN_AMOUNTS[array_search($value, self::ELEMENT_SCORES)]);
            }
        }
        $this->winnings *= self::WINNING_MULTIPLIERS[$amount];
    }

    private function displaySlotMachine()
    {
        for ($i = 0; $i < self::SIZE; $i++)
        {
            echo "--";
        }
        echo PHP_EOL;
        for ($i = 0; $i < self::SIZE; $i++)
        {
            for ($j = 0; $j < self::SIZE; $j++)
            {
                echo "{$this->slotMachine[$i][$j]} ";
            }
            echo PHP_EOL;
        }
        for ($i = 0; $i < self::SIZE; $i++)
        {
            echo "--";
        }
        echo PHP_EOL;
    }

    private function getWinnings(): int
    {
        echo "You won $" . $this->winnings . PHP_EOL;
        return $this->winnings;
    }

    public function printMultipliers()
    {
        echo "-------------" . PHP_EOL;
        echo "Multipliers: " . PHP_EOL;
        foreach (self::WINNING_MULTIPLIERS as $amount => $multiplier)
        {
            echo "$" . $amount . " | {$multiplier}x" . PHP_EOL;
        }
        echo "-------------" . PHP_EOL;
    }

    public function getMultiplierCosts(): array
    {
        return array_keys(self::WINNING_MULTIPLIERS);
    }

    public function startGame(int $amount): int
    {
        $this->startSlotMachine($amount);
        $this->displaySlotMachine();
        return $this->getWinnings();
    }
}

class Person
{
    private int $cash;

    public function __construct()
    {
        $this->cash = 0;
    }

    public function depositCash(int $amount)
    {
        $this->cash += $amount;
    }

    public function withdrawCash(int $amount)
    {
        $this->cash -= $amount;
    }

    public function playSlotMachine()
    {
        do
        {
            $game = new SlotMachine();
            $game->printMultipliers();
            echo "Current amount of money: $" . $this->cash . PHP_EOL;
            do
            {
                $bet = (int)readline("Enter your bet (0 to quit): $");
                if ($bet === 0) return;
                if (!$this->isValidBet($bet, $game->getMultiplierCosts()))
                {
                    echo "Invalid bet" . PHP_EOL;
                }
            } while (!$this->isValidBet($bet, $game->getMultiplierCosts()));
            if ($this->enoughMoney($bet, $game->getMultiplierCosts()))
            {
                $this->withdrawCash($bet);
                $this->depositCash($game->startGame($bet));
                echo "Current amount of money: $" . $this->cash . PHP_EOL;
            }
            else
            {
                echo "Not enough money" . PHP_EOL;
            }
        } while (true);
    }

    private function isValidBet(int $bet, array $multiplierCosts): bool
    {
        return in_array($bet, $multiplierCosts);
    }

    private function enoughMoney(int $bet, array $multiplierCosts): bool
    {
        return $this->cash >= $bet;
    }
}


$person = new Person();
$person->depositCash(100);
$person->playSlotMachine();
