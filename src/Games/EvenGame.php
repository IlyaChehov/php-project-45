<?php

namespace Php\Project\Games\EvenGame;

use function Php\Project\Engine\runGame;

function buildRound(): array
{
    $randomNumber = rand(1, 20);
    $answer = $randomNumber % 2 === 0 ? 'yes' : 'no';

    return [(string)$randomNumber, $answer];
}

function startEvenGame(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    runGame('Php\Project\Games\EvenGame\buildRound', $description);
}
