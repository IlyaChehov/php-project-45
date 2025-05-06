<?php

namespace Php\Project\Games\CalcGame;

use function Php\Project\Engine\runGame;

function buildRound(): array
{
    $operations = ['+', '-', '*'];
    $letfOperand = rand(1, 20);
    $rightOperand = rand(1, 20);
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
        default:
            throw new \Exception("Unsupported operation: $randOperation");
    }

    $question = "{$letfOperand} {$randOperation} {$rightOperand}";
    return [$question, (string)$answer];
}

function startCalcGame(): void
{
    $description = 'What is the result of the expression?';
    runGame('Php\Project\Games\CalcGame\buildRound', $description);
}
