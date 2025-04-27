<?php

namespace Php\Project\Games\GcdGame;

use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\runGame;

function getAnswerAndQuestion(): array
{
    $letfOperand = getRandomNumber();
    $rightOperand = getRandomNumber();
    $question = "{$letfOperand} {$rightOperand}";
    $answer = getCalcGCD($letfOperand, $rightOperand);

    return [$question, (string)$answer];
}


function getCalcGCD(int $firstNumber, int $secondNumber): int
{
    if ($firstNumber === 0 || $secondNumber === 0) {
        return max($firstNumber, $secondNumber);
    }
    $var = $firstNumber % $secondNumber;
    return ($var === 0) ? $secondNumber : getCalcGCD($secondNumber, $var);
}

function startGcdGame(): void
{
    $description = 'Find the greatest common divisor of given numbers.';
    runGame('Php\Project\Games\GcdGame\getAnswerAndQuestion', $description);
}