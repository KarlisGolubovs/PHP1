<?php

function calcBmi($weight, $height)
{
    $bmi  = $weight / ($height * $height);
     return $bmi;
}

function checkWeight($bmi)
{
    if ($bmi > 18.5) {
        echo "You are underweight.\n";
    } elseif ($bmi >= 18.5 && $bmi <= 25) {
        echo "Your weight is optimal.\n";
    } else {
        echo "You are overweight.\n";
    }
}
$weight = readline("Enter your weight in kilograms: ");
$height = readline("Enter your height in meters: ");

$bmi = calcBmi($weight, $height);
echo 'Your BMI is: ' . round($bmi, 2) . "\n";
checkWeight($bmi);