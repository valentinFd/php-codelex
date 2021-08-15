<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString()
    {
        return "($this->x, $this->y)" . PHP_EOL;
    }
}

function swap_points(Point &$p1, Point &$p2)
{
    $tmp = $p1;
    $p1 = $p2;
    $p2 = $tmp;
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
swap_points($p1, $p2);
echo $p1;
echo $p2;
