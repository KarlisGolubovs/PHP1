<?php

require_once 'vendor/autoload.php';

$city = readline("Enter a location \n");
$code = readline("Enter a country code: ");

$key = "07fe97575280aa70030226ea49b0ed6b";
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city,$code&appid=$key&units=metric";


// Make the API request
$response = file_get_contents($url);
$data = json_decode($response, true);

$temp = $data['main']['temp'];
$description = $data['weather'][0]['description'];
$icon = $data['weather'][0]['icon'];

echo "Current temperature in $city, $code is $temp degrees Celsius.\n";
echo "The weather is $description.\n";
echo "Icon: https://openweathermap.org/img/w/$icon.png\n";
