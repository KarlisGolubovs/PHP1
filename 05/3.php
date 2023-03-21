<?php

$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 20
];

function isAdult($person) {
    if ($person["age"] >= 18) {
        echo "{$person["name"]} is an adult.";
    } else {
        echo "{$person["name"]} is not an adult yet.";
    }
}
