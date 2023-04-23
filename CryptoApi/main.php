<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\getClientRequest, App\TopCryptocurrencies;


// Instantiate the getClientRequest class with your API key
$clientRequest = new getClientRequest('c67a4bad-b124-44a3-8e00-42f2b015082e');

// Instantiate the TopCryptocurrencies class with the getClientRequest instance
$topCryptos = new TopCryptocurrencies($clientRequest);

// Fetch the top 10 cryptocurrencies and store the result in $cryptos
try {
    $cryptos = $topCryptos->getTop10();
} catch (Exception $e) {
}

// Display the results
echo "Top 10 Cryptocurrencies by Market Cap:\n\n";
foreach ($cryptos as $crypto) {
    printf("%s (%s): $%.2f\n", $crypto['name'], $crypto['symbol'], $crypto['market_cap']);
}
