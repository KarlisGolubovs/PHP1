<?php

const GRAVITY = 9.81; // m/s^2
const INITIAL_VELOCITY = 0; // m/s
const INITIAL_POSITION = 0; // m
const TIME = 10; // s
$position = INITIAL_POSITION + (INITIAL_VELOCITY * TIME) + (0.5 * GRAVITY * pow(TIME, 2));

echo "The position of the object after falling for 10 seconds is: " . number_format($position, 1) . "m\n";