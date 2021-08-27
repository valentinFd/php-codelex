<?php

class SlotMachine
{
    // number of columns >= number of rows.
    // number of rows and columns can be changed.
    private const ROWS = 3;

    private const COLS = 4;

    // slot machine's elements that get randomly chosen.
    private const ELEMENTS = ["A", "B", "C", "D", "E"];

    // used to determine whether a line consists of the same element. Each element is represented by a prime number.
    private const ELEMENT_SCORES = [
        "A" => 2,
        "B" => 3,
        "C" => 5,
        "D" => 7,
        "E" => 11,
    ];

    // winning amounts for one line consisting of the same element.
    private const ELEMENT_WIN_AMOUNTS = [
        "A" => 5,
        "B" => 10,
        "C" => 15,
        "D" => 25,
        "E" => 50,
    ];

    private const WINNING_MULTIPLIERS = [
        10 => 1,
        20 => 2,
        40 => 3,
        80 => 4,
        160 => 5
    ];

    private int $winnings;

    private array $slotMachine;

    // used to determine whether a line consists of the same element.
    private array $scores;

    public function __construct()
    {
        $this->winnings = 0;
        $this->slotMachine = [];
        // creating an array that stores scores of all rows, columns and diagonals.
        // size of array is sum of: number of rows, number of columns and number of diagonals.
        // number of rows is ROWS, number of columns is COLS, number of diagonals is 2 + 2 * (COLS - ROWS).
        $this->scores = array_fill(0, self::ROWS + self::COLS + 2 + 2 * (self::COLS - self::ROWS), 1);
    }

    private function startSlotMachine(int $amount)
    {
        for ($i = 0; $i < self::ROWS; $i++)
        {
            for ($j = 0; $j < self::COLS; $j++)
            {
                $randomElement = self::ELEMENTS[array_rand(self::ELEMENTS)];
                $this->slotMachine[$i][] = $randomElement;

                $this->scores[$i] *= self::ELEMENT_SCORES[$randomElement]; // $i row's score.
                $this->scores[self::ROWS + $j] *= self::ELEMENT_SCORES[$randomElement]; // $j column's score.
                for ($k = 0; $k <= self::COLS - self::ROWS; $k++)
                {
                    // $k is an index of a diagonal that goes either from top left to bottom right or from top right to
                    // bottom left.
                    // scores of all diagonals that go from top left to bottom right.
                    if ($j - $i === $k || ($i === 0 && $j < $k) || ($i === self::ROWS - 1 && $j > self::ROWS - 1 + $k))
                    {
                        $this->scores[self::ROWS + self::COLS + $k] *= self::ELEMENT_SCORES[$randomElement];
                    }
                    // scores of all diagonals that go from top right to bottom left.
                    if ($i === self::COLS - 1 - $j - $k
                        || ($i === 0 && $j > self::COLS - 1 - $k)
                        || ($i === self::ROWS - 1 && $j < self::COLS - self::ROWS - $k))
                    {
                        // $this->scores[self::ROWS + self::COLS + self::COLS - self::ROWS + 1 + $k]...
                        $this->scores[2 * self::COLS + 1 + $k] *= self::ELEMENT_SCORES[$randomElement];
                    }
                }
            }
        }
        // check each row's score.
        for ($i = 0; $i < self::ROWS; $i++)
        {
            // if $score is a perfect power of COLS (number of columns), $i row consists of the same element.
            // number of columns is equal to number of elements in one row.
            // element is determined by calculating pow($score, 1 / COLS), and checking the resulting value's key
            // in ELEMENT_SCORES.
            $score = $this->scores[$i];
            $value = pow($score, 1 / self::COLS);
            if ((string)$value === (string)round($value))
            {
                $value = (int)(string)$value;
                $this->winnings += (self::ELEMENT_WIN_AMOUNTS[array_search($value, self::ELEMENT_SCORES)]);
            }
        }
        // check each column's score.
        for ($i = self::ROWS; $i < self::ROWS + self::COLS; $i++)
        {
            // if $score is a perfect power of ROWS (number of rows), ($i - ROWS) column consists of the same element.
            // number of rows is equal to number of elements in one column.
            // element is determined by calculating pow($score, 1 / ROWS), and checking the resulting value's key
            // in ELEMENT_SCORES.
            $score = $this->scores[$i];
            $value = pow($score, 1 / self::ROWS);
            if ((string)$value === (string)round($value))
            {
                $value = (int)(string)$value;
                $this->winnings += (self::ELEMENT_WIN_AMOUNTS[array_search($value, self::ELEMENT_SCORES)]);
            }
        }
        // check each diagonal's score.
        // ...; $i < self::ROWS + self::COLS + 2 + 2 * (self::COLS - self::ROWS);...
        for ($i = self::ROWS + self::COLS; $i < 3 * self::COLS - self::ROWS + 2; $i++)
        {
            // if $score is a perfect power of COLS (number of columns), ($i - ROWS - COLS) diagonal consists of the same
            // element. Number of columns is equal to number of elements in one diagonal.
            // element is determined by calculating pow($score, 1 / COLS), and checking the resulting value's key
            // in ELEMENT_SCORES.
            $score = $this->scores[$i];
            $value = pow($score, 1 / self::COLS);
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
        for ($i = 0; $i < self::COLS; $i++)
        {
            echo "--";
        }
        echo PHP_EOL;
        for ($i = 0; $i < self::ROWS; $i++)
        {
            for ($j = 0; $j < self::COLS; $j++)
            {
                echo "{$this->slotMachine[$i][$j]} ";
            }
            echo PHP_EOL;
        }
        for ($i = 0; $i < self::COLS; $i++)
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

    public function startGame(int $amount): int
    {
        $this->startSlotMachine($amount);
        $this->displaySlotMachine();
        return $this->getWinnings();
    }

    public function isValidBet(int $bet): bool
    {
        return in_array($bet, array_keys(self::WINNING_MULTIPLIERS));
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
                if (!$game->isValidBet($bet))
                {
                    echo "Invalid bet" . PHP_EOL;
                }
                else if (!$this->hasEnoughMoney($bet))
                {
                    echo "Not enough money" . PHP_EOL;
                }
            } while (!($game->isValidBet($bet) && $this->hasEnoughMoney($bet)));
            $this->withdrawCash($bet);
            $this->depositCash($game->startGame($bet)); // start the game and deposit the returned amount of money.
        } while (true);
    }

    private function hasEnoughMoney(int $amount): bool
    {
        return $this->cash >= $amount;
    }
}

$person = new Person();
$person->depositCash(100);
$person->playSlotMachine();
