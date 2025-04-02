<?php

namespace Php\Project\Games\EvenGame;

use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\showMessage;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\showQueststions;
use function Php\Project\Engine\getUserResponce;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\ROUND;

function evenGame(): void
{
    $userName = meetUser();
    $i = 1;
    showMessage('Answer "yes" if the number is even, otherwise answer "no".');

    while ($i <= ROUND) {
        $randomNumber = getRandomNumber();
        $isEven = $randomNumber % 2 === 0 ? 'yes' : 'no';
        showQueststions($randomNumber);
        $answerUser = getUserResponce('Your answer');

        if ($answerUser !== $isEven) {
            showCorrectAnswer($answerUser, $isEven, $userName);
            return;
        }

        showMessage('Correct!');
        $i++;
    }

    showMessage("Congratulations, {$userName}!");
}
