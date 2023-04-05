<?php

$numbers1 = array();

// Fill the array with ten random numbers (1-100)
for ($i = 0; $i < 10; $i++) {
    $numbers1[$i] = rand(1, 100);
}

// Copy the array into another array of the same capacity
$numbers2 = $numbers1;

// Change the last value in the first array to a -7
$numbers1[9] = -7;

// Display the contents of both arrays
echo "Array 1: ";
foreach ($numbers1 as $number) {
    echo $number . " ";
}
echo PHP_EOL;

echo "Array 2: ";
foreach ($numbers2 as $number) {
    echo $number . " ";
}