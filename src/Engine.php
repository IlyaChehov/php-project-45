<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUND = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const LENGTH_PROGRESSION = 10;

function getRandomNumber(int $a = MIN_NUMBER, int $b = MAX_NUMBER): int
{
    return rand($a, $b);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function runGame(callable $fn, string $description)
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($description);

    for ($i = 0; $i < ROUND; $i++) {
        [$question, $correntAnswer] = $fn();
        line("Question: $question");
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correntAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correntAnswer}'.\nLet's try again, $userName!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, {$userName}!");
}