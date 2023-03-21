<?php

$numbers = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30];

foreach($numbers as $number) {
    if($number % 3 == 0) {
        echo $number . ' ';
    }
}