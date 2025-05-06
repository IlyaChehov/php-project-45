<?php

namespace Php\Project\Games\GcdGame;

use function Php\Project\Engine\runGame;

function buildRound(): array
{
    $letfOperand = rand(1, 20);
    $rightOperand = rand(1, 20);
    $question = "{$letfOperand} {$rightOperand}";
    $answer = getGCD($letfOperand, $rightOperand);

    return [$question, (string)$answer];
}


function getGCD(int $firstNumber, int $secondNumber): int
{
    if ($firstNumber === 0 || $secondNumber === 0) {
        return max($firstNumber, $secondNumber);
    }
    $var = $firstNumber % $secondNumber;
    return ($var === 0) ? $secondNumber : getGCD($secondNumber, $var);
}

function startGcdGame(): void
{
    $description = 'Find the greatest common divisor of given numbers.';
    runGame('Php\Project\Games\GcdGame\buildRound', $description);
}
