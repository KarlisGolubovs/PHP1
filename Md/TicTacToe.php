<?php

echo "Welcome to TicTacToe!\n";

$board = array_fill(0, 3, array_fill(0, 3, '_'));
$player1 = 'X';
$player2 = 'O';
$currentPlayer = $player1;

while (true) {
    echo "   0   1   2\n";
    for ($i = 0; $i < 3; $i++) {
        echo $i . '  ';
        for ($j = 0; $j < 3; $j++) {
            echo $board[$i][$j] . ' | ';
        }
        echo "\n  ---|---|---\n";
    }

    while (true) {
        list($row, $col) = explode(" ", readline("Player $currentPlayer, enter row and column (separated by space): "));

        if ($board[$row][$col] != '_') {
            echo "Error: Cell is already occupied!\n";
        } else {
            $board[$row][$col] = $currentPlayer;
            break;
        }
    }

    echo "Player $currentPlayer placed $currentPlayer at ($row, $col).\n";

    $winner = false;
    for ($i = 0; $i < 3; $i++) {
        if ($board[$i][0] == $board[$i][1] && $board[$i][1] == $board[$i][2] && $board[$i][0] != '_') {
            $winner = true;
            break;
        }
        if ($board[0][$i] == $board[1][$i] && $board[1][$i] == $board[2][$i] && $board[0][$i] != '_') {
            $winner = true;
            break;
        }
    }
    if (($board[0][0] == $board[1][1] && $board[1][1] == $board[2][2] || $board[0][2] == $board[1][1] && $board[1][1] == $board[2][0]) && $board[1][1] != '_') {
        $winner = true;
    }

    if ($winner) {
        echo "Player $currentPlayer wins!\n";
        break;
    }
    if (!in_array('_', array_merge(...$board))) {
        echo "Game over! It's a tie.\n";
        break;
    }

    if ($currentPlayer == $player1) {
        $currentPlayer = $player2;
    } else {
        $currentPlayer = $player1;
    }
}
