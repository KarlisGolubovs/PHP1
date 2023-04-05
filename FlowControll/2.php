<?php

echo 'Input number please:';
$number = trim(fgets(STDIN));

if ($number > 0) {
    echo 'The number is positive'. "\n";
} elseif ($number < 0 ) {
    echo 'The number is negative' . "\n";
} else {
    echo "0";
}
