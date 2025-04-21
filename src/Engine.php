<?php

namespace Php\Project\Engine;

use function cli\line;

const ROUND = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const OPERATIONS_CALC_GAME = ['+', '-', '*'];
const LENGTH_PROGRESSION = 10;

function meetUser(): string
{
    line('Welcome to the Brain Games!');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getRandomNumber(int $a = MIN_NUMBER, int $b = MAX_NUMBER): int
{
    return rand($a, $b);
}

function showCorrectAnswer(string $wrongAnswer, string $correctAnswer, string $name): void
{
    line("'{$wrongAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.\nLet's try again, $name!");
}
