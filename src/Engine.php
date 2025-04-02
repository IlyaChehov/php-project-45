<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUND = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 20;
const OPERATIONS_CALC_GAME = ['+', '-', '*'];
const LENGTH_PROGRESSION = 10;

function meetUser(): string
{
    \cli\line('Welcome to the Brain Games!');
    $name = \cli\prompt('May I have your name?');
    \cli\line("Hello, %s!", $name);
    return $name;
}

function getRandomNumber($a = MIN_NUMBER, $b = MAX_NUMBER): int
{
    return rand($a, $b);
}

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

function getProgressionArray()
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

function isPrimeNumber(int $number): string
{
    if ($number < 2) {
        return false;
    }
    for ($i = 3; $i < $number; $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
