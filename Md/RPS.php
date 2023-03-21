<?php

echo "Welcome to Rock Paper Scissors\n";
$gameMode = readline("Enter 0 for PvE, 1 for PvP: ");

$weapons = [
    'rock',
    'paper',
    'scissors',
    'lizard',
    'spock'
];
$winningCombos = [
    'rock' => ['scissors', 'lizard'],
    'paper' => ['rock', 'spock'],
    'scissors' => ['paper', 'lizard'],
    'lizard' =>  ['paper', 'spock'],
    'spock' =>  [ 'rock','scissors']
];
if ($gameMode == 1) {
    $player1Choice = null;
    $player2Choice = null;

    for ($i = 1; $i <= 2; $i++) {
        do {
            ${"player{$i}Choice"} = strtolower(readline("Player $i, choose your weapon (" . implode('/', $weapons) . "): "));
        } while (!in_array(${"player{$i}Choice"}, $weapons));
        ${"player{$i}Weapon"} = ${"player{$i}Choice"};
    }
} else {
    $player1Choice = strtolower(readline("Player 1, choose your weapon (" . implode('/', $weapons) . "): "));
    while (!in_array($player1Choice, $weapons)) {
        $player1Choice = strtolower(readline("Invalid choice. Player 1, choose your weapon (" . implode('/', $weapons) . "): "));
    }
    $player2Choice = $weapons[array_rand($weapons)];
    echo "Player 2 (Computer) chose: $player2Choice\n";
}
echo "Player 1 chose: $player1Choice\n";
echo "Player 2 chose: $player2Choice\n";

if ($player1Choice == $player2Choice) {
    echo "It's a tie!";
} else if (in_array($player2Choice, $winningCombos[$player1Choice])) {
    echo "Player 1 won, because they chose $player1Choice!";
} else {
    echo "Player 2 won because they chose $player2Choice!";
}
