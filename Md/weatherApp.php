<?php

use GuzzleHttp\Exception\GuzzleException;



// Get user input
$city = readline("Enter a location: ");
$code = readline("Enter a country code: ");

// Set up Guzzle client
$client = new GuzzleHttp\Client();
$key = "07fe97575280aa70030226ea49b0ed6b";
$url = "https://api.openweathermap.org/data/2.5/weather?q={$city},{$code}&appid={$key}&units=metric";

try {
    $response = $client->request('GET', $url);
} catch (GuzzleException $e) {
}

// Parse response JSON
$data = json_decode($response->getBody(), true);

// Extract temperature and weather description
$temp = $data['main']['temp'];
$weather = $data['weather'][0]['description'];

// Output results
echo "Current temperature in {$city}, {$code} is {$temp} degrees Celsius.\n";
echo "The weather is {$weather}.\n";
echo "Icon: https://openweathermap.org/img/w/{$data['weather'][0]['icon']}.png\n";
