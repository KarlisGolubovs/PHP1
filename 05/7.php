<?php

$person = [
    "name" => "John Doe",
    "licenses" => ["A","B"],
    "cash" => 2000
];

$guns = [
    [
        "name" => "AK-47",
        "price" => 2000,
        "license" => "A"
    ],
    [
        "name" => "Glock 19",
        "price" => 800,
        "license" => "B"
    ],
    [
        "name" => "M4A1",
        "price" => 3000,
        "license" => "A"
    ]
];

function canBuyGun($person, $gun): bool
{
    if (in_array($gun["license"], $person["licenses"]) && $person["cash"] >= $gun["price"]) {
        return true;
    } else {
        return false;
    }
}

foreach ($guns as $gun) {
    if (canBuyGun($person, $gun)) {
        echo $person["name"] . " can buy " . $gun["name"] . " for " . $gun["price"] . " dollars." . PHP_EOL;
    } else {
        echo $person["name"] . " cannot buy " . $gun["name"] . " for " . $gun["price"] . " dollars." . PHP_EOL;
    }
}