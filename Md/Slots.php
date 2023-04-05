<?php
echo "Enter the number of credits: ";
$credits = intval(fgets(STDIN));

$spinCost = 10;

$gameBoard = array_fill(0, 3, array_fill(0, 4, "_"));

$symbols = [
    "A" => 30,
    "K" => 21,
    "Q" => 15,
    "J" => 9,
    "10" => 3
];

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
    foreach ($gameBoard as &$row) {
        foreach ($row as &$slot) {
            $slot = array_rand($symbols);
        }
    }

    displayGameBoard($gameBoard);
    echo "You have $credits credits remaining.\n";

    $winAmount = 0;
    $winningCombinations = [
        [0, 1, 2],
        [1, 2, 3],
        [4, 5, 6],
        [5, 6, 7],
        [8, 9, 10],
        [0, 4, 8],
        [1, 5, 9],
        [2, 6, 10],
        [3, 7, 11],
        [0, 5, 10],
        [3, 6, 9],
        [1, 6, 11],
        [2, 5, 8]
    ];

    foreach ($winningCombinations as $combo) {
        $symbolsInCombo = [
            $gameBoard[intdiv($combo[0], 4)][$combo[0] % 4],
            $gameBoard[intdiv($combo[1], 4)][$combo[1] % 4],
            $gameBoard[intdiv($combo[2], 4)][$combo[2] % 4],
        ];
        if (count(array_unique($symbolsInCombo)) == 1) {
            $winAmount += $symbols[$symbolsInCombo[0]];
        }
    }

    if ($winAmount > 0) {
        $credits += $winAmount;
        echo "Congratulations! You won $winAmount credits!\n";
    } else {
        echo "Sorry, you didn't win anything.\n";
    }

    echo "\nDo you want to spin again? (y/n): ";
    $answer = strtolower(trim(fgets(STDIN)));

    if ($answer == 'n') {
        break;
    }
}

echo "Thanks for playing!\n";
echo "Congratulations! You withdrew $credits credits!\n";
