<?php

$people = [
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 20
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 16
    ],
    [
        "name" => "Bob",
        "surname" => "Smith",
        "age" => 25
    ]
];

foreach ($people as $person) {
    isAdult($person);
}