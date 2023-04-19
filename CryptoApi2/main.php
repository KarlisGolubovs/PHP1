<?php

use App\Models\getClientRequest;

require_once 'vendor/autoload.php';

// Replace YOUR_API_KEY with your actual API key
$apiKey = 'c67a4bad-b124-44a3-8e00-42f2b015082e';

// Create a new instance of the getClientRequest class with your API key
$clientRequest = new getClientRequest($apiKey);

// Make a test call to the CoinMarketCap API
$endpoint = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?limit=1';
$response = $clientRequest->get($endpoint);

// Output the response to the console
echo $response;
