<?php

function plusCodelex(string $string): string
{
    return $string . "codelex" . "\n";
}

echo plusCodelex("asd ");
