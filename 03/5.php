<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$names = "";

foreach ($items[0] as $item) {
    $names .= $item["name"] . " & " . $item["surname"] . "'s ";
}

echo $names;