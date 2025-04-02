<?php

namespace Php\Project\Games\CalcGame;

$autoloadPath1 = __DIR__ . '/../../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use const Php\Project\Engine\ROUND;
use const Php\Project\Engine\OPERATIONS_CALC_GAME;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showMessage;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\showQueststions;
use function Php\Project\Engine\getUserResponce;
use function Php\Project\Engine\showCorrectAnswer;

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
            showCorrectAnswer($answerUser, $result, $userName);
            return;
        }

        showMessage('Correct!');
        $i++;
    }

    showMessage("Congratulations, {$userName}!");
}
