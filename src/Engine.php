<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(callable $fn, string $description): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($description);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correntAnswer] = $fn();
        line("Question: $question");
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correntAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correntAnswer}'.");
            line("Let's try again, $userName!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, {$userName}!");
}
