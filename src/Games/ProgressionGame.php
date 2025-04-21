<?php

namespace Php\Project\Games\ProgressionGame;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\ROUND;

function getProgressionArray(): array
{
    $progressionArray = [];
    $lengthArray = 10;
    $step = getRandomNumber();
    $start = getRandomNumber();
    $currentElement = null;

    for ($i = 0; $i <= $lengthArray; $i++) {
        $currentElement = $start + $i * $step;
        $progressionArray[] = $currentElement;
    }

    $hiddenIndex =  rand(0, count($progressionArray) - 1);
    $hiddemElement = $progressionArray[$hiddenIndex];
    $progressionArray[$hiddenIndex] = '..';

    return [$progressionArray, $hiddemElement];
}

function startProgressionGame(): void
{
    $userName = meetUser();
    $i = 1;
    line('What number is missing in the progression?');

    while ($i <= ROUND) {
        [$progressionArray, $hiddemElement] = getProgressionArray();
        $progressionArray = implode(' ', $progressionArray);
        line("Question: $progressionArray");
        $answer = prompt('Your answer');
        if ((int)$answer !== $hiddemElement) {
            showCorrectAnswer($answer, (string)$hiddemElement, $userName);
            return;
        }
        line('Correct!');
        $i++;
    }

    line("Congratulations, {$userName}!");
}
