<?php

$fruits = [
    "apple" => 5,
    "banana" => 12,
    "orange" => 7,
    "watermelon" => 25
];

$shippingCosts = [
    "over10kg" => 2,
    "under10kg" => 1
];

function calculateShippingCost($fruitWeight, $shippingCosts) {
    if ($fruitWeight > 10) {
        return $shippingCosts["over10kg"];
    } else {
        return $shippingCosts["under10"];
    }
}

foreach ($fruits as $fruit => $weight) {
    echo "The $fruit weighs $weight kg and the shipping cost is " . calculateShippingCost($weight, $shippingCosts) . " euro(s)." . PHP_EOL;
}