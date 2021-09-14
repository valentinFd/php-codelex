<?php

class RockPaperScissors
{
    private string $pcMove;

    private string $playerMove;

    private const MOVES = [
        "R" => "Rock",
        "P" => "Paper",
        "S" => "Scissors"
    ];

    private const WIN_CONDITIONS = [
        "R" => "S",
        "P" => "R",
        "S" => "P"
    ];

    public function getPCMove(): string
    {
        return array_rand(self::MOVES, 1);
    }

    public function displayMoves()
    {
        echo "PC's move: " . self::MOVES[$this->pcMove] . PHP_EOL;
        echo "Your move: " . self::MOVES[$this->playerMove] . PHP_EOL;
    }

    public function startGame()
    {
        do
        {
            $result = 1;
            do
            {
                $this->playerMove = readline("R - Rock, P - Paper, S - Scissors: ");
                if (!$this->isValidMove($this->playerMove))
                {
                    echo "Invalid move." . PHP_EOL;
                }
            } while (!$this->isValidMove($this->playerMove));
            $this->pcMove = $this->getPCMove();
            $this->displayMoves();
            foreach (self::WIN_CONDITIONS as $key => $value)
            {
                if ($this->playerMove === $key && $this->pcMove === $value) $result = 2;
            }
            if ($result !== 2 && $this->playerMove !== $this->pcMove) $result = 0;
            switch ($result)
            {
                case 0:
                    echo "You lost." . PHP_EOL;
                    break;
                case 1:
                    echo "Draw." . PHP_EOL;
                    break;
                case 2:
                    echo "You won." . PHP_EOL;
                    break;
            }
            $repeat = readline("Play again? (y) ");
        } while ($repeat === "y");
    }

    private function isValidMove(string $move): bool
    {
        return array_key_exists($move, self::MOVES);
    }
}

$game = new RockPaperScissors();
$game->startGame();
