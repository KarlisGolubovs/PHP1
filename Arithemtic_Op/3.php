<?php

$lower_bound = 1;
$upper_bound = 100;


$sum = 0;
for ($i = $lower_bound; $i <= $upper_bound; $i++) {
    $sum += $i;
}
$average = $sum / ($upper_bound - $lower_bound + 1);

echo "The sum of $lower_bound to $upper_bound is $sum\n";
echo "The average is $average";
