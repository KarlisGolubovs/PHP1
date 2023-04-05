<?php

$numbers = [];

for ($i = 1; $i <= 3; $i++) {
    echo "Input number $i: ";
    $number = trim(fgets(STDIN));
    $numbers[] = $number;
}

$max = max($numbers);
echo "The largest number is: $max\n";