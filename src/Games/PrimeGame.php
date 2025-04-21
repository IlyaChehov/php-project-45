<?php

namespace Php\Project\Games\PrimeGame;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\ROUND;

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

function startPrimeGame(): void
{
    $userName = meetUser();
    $i = 1;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($i <= ROUND) {
        $randomNumber = getRandomNumber();
        $isPrime = isPrimeNumber($randomNumber) ? 'yes' : 'no';
        line("Question: $randomNumber");
        $answerUser = prompt('Your answer');
        if ($answerUser !== $isPrime) {
            showCorrectAnswer($answerUser, $isPrime, $userName);
            return;
        }

        line('Correct!');
        $i++;
    }

    line("Congratulations, {$userName}!");
}
