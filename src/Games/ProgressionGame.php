<?php

namespace Php\Project\Games\ProgressionGame;

use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showMessage;
use function Php\Project\Engine\getProgressionArray;
use function Php\Project\Engine\showQueststions;
use function Php\Project\Engine\getUserResponce;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\ROUND;

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
