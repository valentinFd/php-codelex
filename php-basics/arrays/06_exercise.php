<?php

class Hangman
{
    private const WORDS = ["apple", "computer", "window", "keyboard", "repository", "refrigerator"];

    private const BLANK = "";

    private array $word;

    private array $wordCopy;

    private array $showCharacter;

    private int $movesLeft;

    private int $movesToGuess;

    private int $gameStatus;

    private function __constructor()
    {
        $index = rand(0, count(self::WORDS) - 1);
        $this->word = str_split(self::WORDS[$index]);
        $this->wordCopy = $this->word;
        $this->showCharacter = array_fill(0, count($this->word), 0);
        $this->movesLeft = 20;
        $this->movesToGuess = count($this->word);
        $this->gameStatus = 1;
    }

    private function makeMove(string $guess)
    {
        $key = array_search($guess, $this->wordCopy);
        if ($key !== false)
        {
            $this->showCharacter[$key] = 1;
            $this->wordCopy[$key] = self::BLANK;
            $this->movesToGuess--;
        }
        $this->movesLeft--;
    }

    private function updateGameStatus()
    {
        if (!$this->movesLeft)
        {
            $this->gameStatus = 0;
        }
        if (!$this->movesToGuess)
        {
            $this->gameStatus = 2;
        }
    }

    private function moveEndMessage(): string
    {
        switch ($this->gameStatus)
        {
            case 0:
                return ("Game over. You have no moves left." . PHP_EOL);
            case 1:
                return ("You have $this->movesLeft moves left." . PHP_EOL);
            case 2:
                return ("YOU GOT IT!" . PHP_EOL);
        }
        return "";
    }

    public function startGame()
    {
        do
        {
            self::__constructor();
            $this->displayWord();
            while ($this->gameStatus === 1)
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
                $this->updateGameStatus();
                $this->display($this->moveEndMessage());
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
