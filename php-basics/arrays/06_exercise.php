<?php

class Hangman
{
    private const WORDS = ["apple", "computer", "window", "keyboard", "repository", "refrigerator"];

    private array $word;

    private array $wordCopy;

    private array $showCharacter;

    private int $movesLeft;

    public function makeMove(string $guess)
    {
        $key = array_search($guess, $this->wordCopy);
        if ($key !== false)
        {
            $this->showCharacter[$key] = 1;
            $this->wordCopy[$key] = '';
        }
        $this->movesLeft--;
    }

    public function startGame()
    {
        do
        {
            $index = rand(0, count(self::WORDS) - 1);
            $this->word = str_split(self::WORDS[$index]);
            $this->wordCopy = $this->word;
            $this->showCharacter = array_fill(0, count($this->word), 0);
            $this->movesLeft = 20;
            $gameEnd = false;
            $this->displayWord();
            while (!$gameEnd)
            {
                do
                {
                    $guess = strtolower((string)readline("Guess: "));
                    if (!$this->isValid($guess))
                    {
                        $this->display("Invalid input." . PHP_EOL);
                    }
                } while (!$this->isValid($guess));
                $this->makeMove($guess);
                $this->displayWord();
                $countEmpty = array_count_values($this->wordCopy);
                if (isset($countEmpty['']) && $countEmpty[''] === count($this->word))
                {
                    $this->display("YOU GOT IT!" . PHP_EOL);
                    $gameEnd = true;
                }
                else if (!$this->movesLeft)
                {
                    $this->display("Game over. You have no moves left." . PHP_EOL);
                    $gameEnd = true;
                }
                if (!$gameEnd)
                {
                    $this->display("You have $this->movesLeft moves left." . PHP_EOL);
                }
            }
            $repeat = readline("Type \"again\" to play again. ");
        } while ($repeat === "again");
    }

    private function isValid(string $input): bool
    {
        return ctype_alpha($input) && strlen($input) === 1;
    }

    private function displayWord()
    {
        $this->display(PHP_EOL . "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL . PHP_EOL);
        $this->display("Word:    ");
        for ($i = 0; $i < count($this->word); $i++)
        {
            if ($this->showCharacter[$i])
            {
                $this->display("{$this->word[$i]} ");
            }
            else
            {
                $this->display("_ ");
            }
        }
        $this->display(PHP_EOL);
        $this->display(PHP_EOL);
    }

    private function display(string $string)
    {
        echo $string;
    }
}

$game = new Hangman();
$game->startGame();
