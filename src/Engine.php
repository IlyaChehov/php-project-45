<?php

namespace Php\Project\Engine;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function cli\line;
use function cli\prompt;

const ROUND = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const OPERATIONS_CALC_GAME = ['+', '-', '*'];

function meetUser(): string
{
    \cli\line('Welcome to the Brain Games!');
    $name = \cli\prompt('May I have your name?');
    \cli\line("Hello, %s!", $name);
    return $name;
};

function getRandomNumber(): int
{
    return rand(MIN_NUMBER, MAX_NUMBER);
};

function showMessage(string $message): void
{
    \cli\line("$message");
}

function showQueststions(string $queststions): void
{
    \cli\line("Question: $queststions");
}

function getUserResponce(string $message): string
{
    return \cli\prompt($message);
}

function showCorrectAnswer($wrongAnswer, $correctAnswer, $name): void
{
    \cli\line("'{$wrongAnswer}' is wrong answer ;(. Correct answer was '${correctAnswer}'.\nLet's try again, $name!");
}

function getCalcGCD(int $firstNumber, int $secondNumber): int
{
    if ($firstNumber == 0 || $secondNumber == 0) {
        return max($firstNumber, $secondNumber);
    }
    $var = $firstNumber % $secondNumber;
    return ($var === 0) ? $secondNumber : getCalcGCD($secondNumber, $var);
}