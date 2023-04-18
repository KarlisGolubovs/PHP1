<?php


require_once 'vendor/autoload.php';

use Weather\WeatherApiClient;
use Weather\WeatherDataParser;

// Get user input
$city = readline("Enter a location: ");
$code = readline("Enter a country code: ");

// Use WeatherApiClient to get weather data
$client = new WeatherApiClient();
$data = $client->getWeatherData($city, $code);

// Use WeatherDataParser to extract temperature and weather description
if ($data) {
    $parser = new WeatherDataParser($data);
    $temp = $parser->getTemperature();
    $weather = $parser->getWeatherDescription();
    $iconUrl = $parser->getWeatherIconUrl();

    // Output results
    echo "Current temperature in {$city}, {$code} is {$temp} degrees Celsius.\n";
    echo "The weather is {$weather}.\n";
    echo "Icon: {$iconUrl}\n";
} else {
    echo "Error retrieving weather data.\n";
}
