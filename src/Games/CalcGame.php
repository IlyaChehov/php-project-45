<?php

namespace Php\Project\Games\CalcGame;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\OPERATIONS_CALC_GAME;
use const Php\Project\Engine\ROUND;

function startCalcGame(): void
{
    $userName = meetUser();
    $operations = OPERATIONS_CALC_GAME;
    $result = 0;
    $i = 1;
    line('What is the result of the expression?');

    while ($i <= ROUND) {
        $randOperation = $operations[rand(0, count($operations) - 1)];
        $letfOperand = getRandomNumber();
        $rightOperand = getRandomNumber();

        switch ($randOperation) {
            case '+':
                $result = $letfOperand + $rightOperand;
                break;
            case '-':
                $result = $letfOperand - $rightOperand;
                break;
            case '*':
                $result = $letfOperand * $rightOperand;
                break;
            default:
                line('This mathematical operation is not supported.');
                break;
        }

        $questionText = "{$letfOperand} {$randOperation} {$rightOperand}";
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
