<?php

namespace Php\Project\Games\ProgressionGame;

use function Php\Project\Engine\runGame;

function buildRound(): array
{
    $progression = [];
    $progressionLength = 10;
    $step = rand(1, 20);
    $start = rand(1, 20);
    $currentElement = null;

    for ($i = 0; $i <= $progressionLength; $i++) {
        $currentElement = $start + $i * $step;
        $progression[] = $currentElement;
    }

    $hiddenIndex = rand(0, count($progression) - 1);
    $hiddemElement = $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';
    $progression = implode(' ', $progression);

    return [$progression, (string)$hiddemElement];
}

function startProgressionGame(): void
{
    $description = 'What number is missing in the progression?';
    runGame('Php\Project\Games\ProgressionGame\buildRound', $description);
}
