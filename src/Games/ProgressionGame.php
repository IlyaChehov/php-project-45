<?php

namespace Php\Project\Games\ProgressionGame;

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
use function Php\Project\Engine\getProgressionArray;
use function Php\Project\Engine\showQueststions;
use function Php\Project\Engine\getUserResponce;
use function Php\Project\Engine\showCorrectAnswer;

function progressionGame(): void
{
    $userName = meetUser();
    $i = 1;
    showMessage('What number is missing in the progression?');

    while ($i <= ROUND) {
        [$progressionArray, $hiddemElement] = getProgressionArray();
        $progressionArray = implode(' ', $progressionArray);
        showQueststions($progressionArray);
        $answer = getUserResponce('Your answer');
        if ((int)$answer !== $hiddemElement) {
            showCorrectAnswer($answer, $hiddemElement, $userName);
            return;
        }
        showMessage('Correct!');
        $i++;
    }

    showMessage("Congratulations, {$userName}!");
}
