<?php

echo 'Enter a number!';

$int1 = trim(fgets(STDIN));

if ($int1 % 2 == 0) {
    echo "Even Number\n";
} else {
    echo "Odd Number\n";
}

echo "bye!";