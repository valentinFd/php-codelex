<?php

class TicTacToe
{
    private const PLAYER1 = "X";
    private const PLAYER1_POINT = 1;

    private const PLAYER2 = "O";
    private const PLAYER2_POINT = -1;

    private const GRID_SIZE = 3;

    private const BLANK = "";

    private string $currentPlayer;

    private array $grid;

    private array $score;

    private int $movesLeft;

    public function __construct()
    {
        $this->grid = [];
        for ($i = 0; $i < self::GRID_SIZE; $i++)
        {
            $this->grid[$i] = array_fill(0, self::GRID_SIZE, self::BLANK);
        }
        $this->score = array_fill(0, 2 * self::GRID_SIZE + 2, 0);
        $this->movesLeft = self::GRID_SIZE * self::GRID_SIZE;
    }

    private function displayGrid()
    {
        for ($i = 0; $i < self::GRID_SIZE; $i++)
        {
            $this->display("--");
        }
        $this->display(PHP_EOL);
        for ($i = 0; $i < self::GRID_SIZE; $i++)
        {
            for ($j = 0; $j < self::GRID_SIZE; $j++)
            {
                if ($this->grid[$i][$j] !== self::BLANK)
                {
                    $this->display("{$this->grid[$i][$j]} ");
                }
                else
                {
                    $this->display("  ");
                }
            }
            $this->display(PHP_EOL);
        }
        for ($i = 0; $i < self::GRID_SIZE; $i++)
        {
            $this->display("--");
        }
        $this->display(PHP_EOL);
    }

    private function makeMove(int $row, int $col)
    {
        $this->grid[$row][$col] = $this->currentPlayer;
        $point = $this->currentPlayer === self::PLAYER1 ? self::PLAYER1_POINT : self::PLAYER2_POINT;
        $this->score[$row] += $point;
        $this->score[self::GRID_SIZE + $col] += $point;
        if ($row === $col)
        {
            $this->score[self::GRID_SIZE * 2] += $point;
        }
        if ($row === self::GRID_SIZE - 1 - $col)
        {
            $this->score[self::GRID_SIZE * 2 + 1] += $point;
        }
        $this->movesLeft--;
    }

    private function checkScore(): bool
    {
        if (in_array($this->player1TargetScore(), $this->score))
        {
            $this->display("'" . self::PLAYER1 . "' won." . PHP_EOL);
            return true;
        }
        if (in_array($this->player2TargetScore(), $this->score))
        {
            $this->display("'" . self::PLAYER2 . "' won." . PHP_EOL);
            return true;
        }
        if (!$this->movesLeft)
        {
            $this->display("The game is a tie." . PHP_EOL);
            return true;
        }
        return false;
    }

    public function startGame()
    {
        $done = false;
        $this->currentPlayer = self::PLAYER1;
        $this->displayGrid();
        while (!$done)
        {
            $this->display("'$this->currentPlayer', choose your location." . PHP_EOL);
            do
            {
                $row = readline("Row: ");
                $col = readline("Col: ");
                if (!$this->isValidMove($row, $col))
                {
                    $this->display("Invalid input." . PHP_EOL);
                }
                else
                {
                    $row = (int)$row;
                    $col = (int)$col;
                }
            } while (!$this->isValidMove($row, $col));
            $this->makeMove($row, $col);
            $this->displayGrid();
            $this->currentPlayer === self::PLAYER1 ? $this->currentPlayer = self::PLAYER2 : $this->currentPlayer = self::PLAYER1;
            $done = $this->checkScore();
        }
    }

    private function isValidMove(string $row, string $col): bool
    {
        return (is_numeric($row) && is_numeric($col) && $row >= 0 && $row < self::GRID_SIZE && $col >= 0 && $col < self::GRID_SIZE && $this->grid[$row][$col] === self::BLANK);
    }

    private function player1TargetScore(): int
    {
        return self::PLAYER1_POINT * self::GRID_SIZE;
    }

    private function player2TargetScore(): int
    {
        return self::PLAYER2_POINT * self::GRID_SIZE;
    }

    private function display(string $string)
    {
        echo $string;
    }
}

$game = new TicTacToe();

$game->startGame();
