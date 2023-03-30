<?php

echo "*** Slot machine ***\n";

echo "Enter the number of credits: ";
$credits = intval(fgets(STDIN));

$spinCost = 5;

$gameBoard = array_fill(0, 3, array_fill(0, 4, "_"));

$symbols = [
    "A" => 10,
    "K" => 7,
    "Q" => 5,
    "J" => 3,
    "10" => 1
];

$probabilities = [
    "A" => 10,
    "K" => 15,
    "Q" => 20,
    "J" => 25,
    "10" => 30
];

$randomizedSymbols = [];

foreach ($probabilities as $symbol => $probability) {
    $numSymbols = round(count($symbols) * $probability / 100);
    $symbolArray = array_fill(0, $numSymbols, $symbol);
    $randomizedSymbols = array_merge($randomizedSymbols, $symbolArray);
}
function displayGameBoard($gameBoard)
{
    echo "+----------------+\n";
    foreach ($gameBoard as $row) {
        echo "| ";
        foreach ($row as $slot) {
            printf("%3s", $slot);
        }
        echo "  | " . "\n";
    }
    echo "+----------------+\n";
}

while ($credits >= $spinCost) {
    echo "Press enter to spin the slot machine (cost: $spinCost credits).\n";
    fgets(STDIN);
    $credits -= $spinCost;
    shuffle($randomizedSymbols);
    foreach ($gameBoard as &$row) {
        foreach ($row as &$slot) {
            $slot = $randomizedSymbols[array_rand($randomizedSymbols)];
        }
    }

    displayGameBoard($gameBoard);
    echo "You have $credits credits remaining.\n";

    echo "Do you want to spin again? (y/n): ";
    $answer = strtolower(trim(fgets(STDIN)));

    if ($answer == 'y') {
        if ($credits < $spinCost) {
            echo "Sorry, you don't have enough credits to spin.\n";
            break;
        }
        $credits -= $spinCost;

    } else {
        echo "You have withdrawn $credits credits.\n";
        break;
    }
}
$winningCombinations = [
    [1, 2, 3],
    [3, 4, 5],
    [4, 5, 6],
    [6, 7, 8],
    [7, 8, 9],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [3, 6, 9],
    [4, 7, 10],
    [5, 8, 11],
    [0, 4, 8],
    [1, 5, 9],
    [2, 6, 10],
    [3, 7, 11],
    [2, 4, 6],
    [1, 5, 9],
];

for ($i = 0; $i < 3; $i++) {
    if (count(array_unique($gameBoard[$i])) == 1) {
        $credits += $symbols[$gameBoard[$i][0]];
    }
    if (count(array_unique([$gameBoard[0][$i], $gameBoard[1][$i], $gameBoard[2][$i]])) == 1) {
        $credits += $symbols[$gameBoard[0][$i]];
    }
}
if (count(array_unique([$gameBoard[0][0], $gameBoard[1][1], $gameBoard[2][2]])) == 1) {
    $credits += $symbols[$gameBoard[0][0]];
}
if (count(array_unique([$gameBoard[0][2], $gameBoard[1][1], $gameBoard[2][0]])) == 1) {
    $credits += $symbols[$gameBoard[0][2]];
}

if ($credits > 0) {
    echo "Congratulations! You won $credits credits!\n";
} else {
    echo "Sorry, you didn't win anything.\n";
}
