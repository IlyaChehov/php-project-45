<?php

namespace Php\Project\Games\GcdGame;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\ROUND;

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
    $userName = meetUser();
    $result = 0;
    $i = 0;
    line('Find the greatest common divisor of given numbers.');

    while ($i < ROUND) {
        $letfOperand = getRandomNumber();
        $rightOperand = getRandomNumber();
        $questionText = "{$letfOperand} {$rightOperand}";
        $result = getCalcGCD($letfOperand, $rightOperand);

        line("Question: $questionText");
        $answerUser = prompt('Your answer');

        if ((int)$answerUser !== $result) {
            showCorrectAnswer($answerUser, (string)$result, $userName);
            return;
        }

        line('Correct!');
        $i++;
    }

    line("Congratulations, {$userName}!");
}
