<?php

class Hangman
{
    private const WORDS = ["apple", "computer", "window", "keyboard", "repository", "refrigerator"];

    private const BLANK = "";

    private string $word;

    private array $wordCopy;

    private array $showCharacter;

    private int $triesLeft;

    private int $movesToGuess;

    private int $gameStatus;

    private bool $showTries;

    public function __construct()
    {
        $index = rand(0, count(self::WORDS) - 1);
        $this->word = self::WORDS[$index];
        $this->wordCopy = str_split($this->word);
        $this->showCharacter = array_fill(0, strlen($this->word), 0);
        $this->triesLeft = 15;
        $this->movesToGuess = strlen($this->word);
        $this->gameStatus = 1;
        $this->showTries = false;
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
        else
        {
            $this->triesLeft--;
            $this->showTries = true;
        }
    }

    private function updateGameStatus()
    {
        if (!$this->triesLeft)
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
                return "Game over. You have no tries left." . PHP_EOL . "Correct answer: $this->word" . PHP_EOL;
            case 1:
                if ($this->showTries)
                {
                    $this->showTries = false;
                    $tries = "tries";
                    // if number of tries ends with 1 and is not 11 then write "try" else write "tries"
                    if ($this->triesLeft % 10 === 1 && $this->triesLeft !== 11) $tries = "try";
                    return "Wrong. You have $this->triesLeft $tries left." . PHP_EOL;
                }
                return "";
            case 2:
                return "YOU GOT IT!" . PHP_EOL;
        }
        return "";
    }

    public function startGame()
    {
        do
        {
            self::__construct();
            $this->displayWord();
            $this->display("You have $this->triesLeft tries left." . PHP_EOL);
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
        $wordArray = str_split($this->word);
        $this->display(PHP_EOL . "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL . PHP_EOL);
        $this->display("Word:    ");
        for ($i = 0; $i < strlen($this->word); $i++)
        {
            if ($this->showCharacter[$i])
            {
                $this->display("{$wordArray[$i]} ");
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
