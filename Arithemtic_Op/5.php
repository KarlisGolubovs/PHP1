<?php


$number = rand(1, 100);

echo "Guess a number between 1 and 100: ";
$guess = trim(fgets(STDIN));


if ($guess == $number) {
    echo "Congratulations, you guessed the number!";
} elseif ($guess < $number) {
    echo "Too low.";
} elseif ($guess > $number) {
    echo "Too high.";
}
