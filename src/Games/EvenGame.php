<?php

namespace Php\Project\Games\EvenGame;

use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\isEven;
use function Php\Project\Engine\runGame;

function getAnswerAndQuestion(): array
{
    $randomNumber = getRandomNumber();
    $answer = isEven($randomNumber) ? 'yes' : 'no';

    return [(string)$randomNumber, $answer];
}

function startEvenGame(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    runGame('Php\Project\Games\EvenGame\getAnswerAndQuestion', $description);
}
