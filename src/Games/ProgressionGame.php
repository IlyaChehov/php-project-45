<?php

namespace Php\Project\Games\ProgressionGame;

use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\runGame;

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

function getAnswerAndQuestion(): array
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
    $progressionArray = implode(' ', $progressionArray);

    return [$progressionArray, (string)$hiddemElement];
}

function startProgressionGame(): void
{
    $description = 'What number is missing in the progression?';
    runGame('Php\Project\Games\ProgressionGame\getAnswerAndQuestion', $description);
}
