<?php

namespace Php\Project\Games\CalcGame;

use function cli\line;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\runGame;

function getAnswerAndQuestion(): array | null
{
    $operations = ['+', '-', '*'];
    $letfOperand = getRandomNumber();
    $rightOperand = getRandomNumber();
    $randOperation = $operations[rand(0, count($operations) - 1)];
    $answer = null;

    switch ($randOperation) {
        case '+':
            $answer = $letfOperand + $rightOperand;
            break;
        case '-':
            $answer = $letfOperand - $rightOperand;
            break;
        case '*':
            $answer = $letfOperand * $rightOperand;
            break;
    }

    $question = "{$letfOperand} {$randOperation} {$rightOperand}";
    return [$question, (string)$answer];
}

function startCalcGame(): void
{
    $description = 'What is the result of the expression?';
    runGame('Php\Project\Games\CalcGame\getAnswerAndQuestion', $description);
}
