<?php

namespace Php\Project\Games\PrimeGame;

use function Php\Project\Engine\runGame;

function isPrimeNumber(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    if ($number === 2) {
        return true;
    }
    if ($number % 2 === 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function buildRound(): array
{
    $randomNumber = rand(1, 20);
    $answer = isPrimeNumber($randomNumber) ? 'yes' : 'no';

    return [(string)$randomNumber, $answer];
}

function startPrimeGame(): void
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    runGame('Php\Project\Games\PrimeGame\buildRound', $description);
}
