<?php

$persons = [
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 30,
        "birthday" => "1992-05-15"
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 25,
        "birthday" => "1996-08-10"
    ],
    [
        "name" => "Bob",
        "surname" => "Smith",
        "age" => 45,
        "birthday" => "1977-02-22"
    ]
];

foreach($persons as $person) {
    echo "Name: " . $person["name"] . "\n";
    echo "Surname: " . $person["surname"] . "\n";
    echo "Age: " . $person["age"] . "\n";
    echo "Birthday: " . $person["birthday"] . "\n\n";
}

