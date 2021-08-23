<?php

class FizzBuzz
{
    public function start()
    {
        $number = (int)readline("Enter a number: ");
        for ($i = 1; $i <= $number; $i++)
        {
            $result = "";
            if ($i % 3 === 0) $result .= "Fizz";
            if ($i % 5 === 0) $result .= "Buzz";
            if (!($i % 3 === 0 || $i % 5 === 0)) $result = $i;

            if ($i % 20 === 0) echo $result . PHP_EOL;
            else echo "$result ";
        }
    }
}

$program = new FizzBuzz;
$program->start();
