<?php

class Geometry
{
    public static function circleArea(float $radius)
    {
        $result = false;
        if ($radius >= 0) $result = round(pi() * pow($radius, 2), 8);
        return $result;
    }

    public static function rectangleArea(float $length, float $width)
    {
        $result = false;
        if (!($length < 0 || $width < 0)) $result = round($length * $width, 8);
        return $result;
    }

    public static function triangleArea(float $baseLength, float $height)
    {
        $result = false;
        if (!($baseLength < 0 || $height < 0)) $result = round($baseLength * $height * 0.5, 8);
        return $result;
    }
}

echo "Geometry calculator: " . PHP_EOL . PHP_EOL;
echo "Calculate the Area of a Circle" . PHP_EOL;
echo "Calculate the Area of a Rectangle" . PHP_EOL;
echo "Calculate the Are of a Triangle" . PHP_EOL;
echo "Quit" . PHP_EOL . PHP_EOL;

$choice = readline("Enter your choice (1-4): ");

echo PHP_EOL;

switch ($choice)
{
    case 1:
        echo "Calculate the Area of a Circle" . PHP_EOL;

        $radius = (float)readline("Enter a radius: ");

        if (Geometry::circleArea($radius))
        {
            echo Geometry::circleArea($radius) . PHP_EOL;
        }
        else
        {
            echo("Radius cannot be less than 0." . PHP_EOL);
        }

        break;
    case 2:
        echo "Calculate the Area of a Rectangle" . PHP_EOL;

        $length = (float)readline("Enter a length: ");
        $width = (float)readline("Enter a width: ");

        if (Geometry::rectangleArea($length, $width))
        {
            echo Geometry::rectangleArea($length, $width) . PHP_EOL;
        }
        else
        {
            $error = "";

            if ($length < 0) $error .= "Length cannot be less than 0." . PHP_EOL;
            if ($width < 0) $error .= "Width cannot be less than 0." . PHP_EOL;

            echo $error;
        }

        break;
    case 3:
        echo "Calculate the Area of a Triangle" . PHP_EOL;

        $baseLength = (float)readline("Enter a base length: ");
        $height = (float)readline("Enter a height: ");

        if (Geometry::triangleArea($baseLength, $height))
        {
            echo Geometry::triangleArea($baseLength, $height) . PHP_EOL;
        }
        else
        {
            $error = "";

            if ($baseLength < 0) $error .= "Base length cannot be less than 0." . PHP_EOL;
            if ($height < 0) $error .= "Height cannot be less than 0." . PHP_EOL;

            echo $error;
        }

        break;
    case 4:
        exit;

    default:
        echo "Enter number is outside of range (1-4)." . PHP_EOL;
        break;
}
