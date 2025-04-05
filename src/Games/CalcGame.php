<?php

namespace Php\Project\Games\CalcGame;

use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\getUserResponce;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showCorrectAnswer;
use function Php\Project\Engine\showMessage;
use function Php\Project\Engine\showQueststions;

use const Php\Project\Engine\OPERATIONS_CALC_GAME;
use const Php\Project\Engine\ROUND;

function calcGame(): void
{
    $userName = meetUser();
    $operations = OPERATIONS_CALC_GAME;
    $result = 0;
    $i = 1;
    showMessage('What is the result of the expression?');

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
                showMessage('This mathematical operation is not supported.');
                break;
        }

        $questionText = "{$letfOperand} {$randOperation} {$rightOperand}";
        showQueststions($questionText);
        $answerUser = getUserResponce('Your answer');

        if ((int)$answerUser !== $result) {
            showCorrectAnswer($answerUser, (string)$result, $userName);
            return;
        }

        showMessage('Correct!');
        $i++;
    }

    showMessage("Congratulations, {$userName}!");
}
