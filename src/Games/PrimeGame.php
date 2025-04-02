<?php

namespace Php\Project\Games\PrimeGame;

use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showMessage;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\isPrimeNumber;
use function Php\Project\Engine\showQueststions;
use function Php\Project\Engine\showCorrectAnswer;
use function Php\Project\Engine\getUserResponce;

use const Php\Project\Engine\ROUND;

function primeGame(): void
{
    $userName = meetUser();
    $i = 1;
    showMessage('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($i <= ROUND) {
        $randomNumber = getRandomNumber();
        $isPrime = isPrimeNumber($randomNumber) ? 'yes' : 'no';
        showQueststions($randomNumber);
        $answerUser = getUserResponce('Your answer');
        if ($answerUser !== $isPrime) {
            showCorrectAnswer($answerUser, $isPrime, $userName);
            return;
        }

        showMessage('Correct!');
        $i++;
    }

    showMessage("Congratulations, {$userName}!");
}
