<?php

namespace Php\Project\Games\GcdGame;

$autoloadPath1 = __DIR__ . '/../../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use const Php\Project\Engine\ROUND;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showMessage;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\showQueststions;
use function Php\Project\Engine\getUserResponce;
use function Php\Project\Engine\showCorrectAnswer;
use function Php\Project\Engine\getCalcGCD;

function gcdGame(): void
{
    $userName = meetUser();
    $result = 0;
    $i = 0;
    showMessage('Find the greatest common divisor of given numbers.');

    while ($i < ROUND) {
        $letfOperand = getRandomNumber();
        $rightOperand = getRandomNumber();
        $questionText = "{$letfOperand} {$rightOperand}";
        $result = getCalcGCD($letfOperand, $rightOperand);

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
