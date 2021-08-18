<?php

$dayNumber = (int)readline("Enter a day number: ");
switch ($dayNumber)
{
    case 0:
        echo "Monday";
        break;
    case 1:
        echo "Tuesday";
        break;
    case 2:
        echo "Wednesday";
        break;
    case 3:
        echo "Thursday";
        break;
    case 4:
        echo "Friday";
        break;
    case 5:
        echo "Saturday";
        break;
    case 6:
        echo "Sunday";
        break;
    default:
        echo "Not a valid day";
        break;
}
echo PHP_EOL;
