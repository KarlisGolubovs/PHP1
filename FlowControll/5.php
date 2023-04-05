<?php
echo "Enter a string: ";
$input = strtoupper(trim(fgets(STDIN)));

$output = "";
$prevDigit = "";
$count = 0;
for ($i = 0; $i < strlen($input); $i++) {
    $char = $input[$i];
    $digit = "";
    switch ($char) {
        case "A":
        case "B":
        case "C":
            $digit = "2";
            break;
        case "D":
        case "E":
        case "F":
            $digit = "3";
            break;
        case "G":
        case "H":
        case "I":
            $digit = "4";
            break;
        case "J":
        case "K":
        case "L":
            $digit = "5";
            break;
        case "M":
        case "N":
        case "O":
            $digit = "6";
            break;
        case "P":
        case "Q":
        case "R":
        case "S":
            $digit = "7";
            break;
        case "T":
        case "U":
        case "V":
            $digit = "8";
            break;
        case "W":
        case "X":
        case "Y":
        case "Z":
            $digit = "9";
            break;
        default:
            $digit = $char;
            break;
    }
    if ($digit == $prevDigit && $digit != " ") {
        $count++;
        $output = substr($output, 0, strlen($output) - 2);
        $output .= str_repeat($digit, $count + 1) . " ";
    } else {
        $count = 0;
        $output .= $digit . "";
    }

    $prevDigit = $digit;
}

echo "Keypad digits: $output\n";

