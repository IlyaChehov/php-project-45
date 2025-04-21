<?php

namespace Php\Project\Games\EvenGame;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\meetUser;
use function Php\Project\Engine\getRandomNumber;
use function Php\Project\Engine\showCorrectAnswer;

use const Php\Project\Engine\ROUND;

function startEvenGame(): void
{
    $userName = meetUser();
    $i = 1;
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($i <= ROUND) {
        $randomNumber = (string)getRandomNumber();
        $isEven = $randomNumber % 2 === 0 ? 'yes' : 'no';
        line("Question: $randomNumber");
        $answerUser = prompt('Your answer');

        if ($answerUser !== $isEven) {
            showCorrectAnswer($answerUser, $isEven, $userName);
            return;
        }

        line('Correct!');
        $i++;
    }

    line("Congratulations, {$userName}!");
}
