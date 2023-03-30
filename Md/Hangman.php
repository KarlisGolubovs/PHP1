<?php

echo "Welcome to Hangman\n";

$guesses = [];
$words = [
    "bohr",
    "plank",
    "boltzmann",
    "feynman",
    "sagan"
];

$wordChoice = $words[array_rand($words)];
$hiddenWord = str_repeat("_ ", strlen($wordChoice));
echo $hiddenWord . "\n";


$lives = 3;
$wrongGuesses = 0;
while ($wrongGuesses < $lives) {
    $guess = strtolower(readline("Guess a letter: "));
    if (!ctype_alpha($guess) || strlen($guess) != 1 || in_array($guess, $guesses)) {
        echo "Invalid guess. Please try again.\n";
        continue;
    }

    $guesses[] = $guess;

    $correctGuess = false;
    for ($i = 0; $i < strlen($wordChoice); $i++) {
        if ($wordChoice[$i] == $guess) {
            $hiddenWord[$i * 2] = $guess;
            $correctGuess = true;
        }
    }

    if (!$correctGuess) {
        $wrongGuesses++;
    }
    echo $hiddenWord . "\n";
    echo "Guesses: " . implode(", ", $guesses) . "\n";

    if (str_replace(' ', '', str_replace('_', '', $hiddenWord)) == $wordChoice) {
        echo "Congratulations, you guessed the word!\n";
        break;
    }
}
if ($wrongGuesses == $lives) {
    echo "Sorry, you ran out of lives. The word was '$wordChoice'.\n";
}