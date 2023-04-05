<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];

// Calculate sum of numbers
$sum = array_sum($numbers);

$count = count($numbers);

$average = $sum / $count;

echo "The average value of the numbers is: " . $average;
