<?php

declare(strict_types=1);

namespace App;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class TopCryptocurrencies
{
    private getClientRequest $clientRequest;

    public function __construct(getClientRequest $clientRequest)
    {
        $this->clientRequest = $clientRequest;
    }

    /**
     * Fetches the top 10 cryptocurrencies by market cap.
     *
     * @return array An array of associative arrays containing the data for each cryptocurrency.
     * @throws Exception If an error occurs while sending the HTTP request.
     */
    public function getTop10(): array
    {
        $response = $this->clientRequest->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=10&convert=USD');
        $data = json_decode($response, true);
        $top10 = $data['data'];
        $result = [];
        foreach ($top10 as $crypto) {
            $result[] = [
                'name' => $crypto['name'],
                'symbol' => $crypto['symbol'],
                'market_cap' => $crypto['quote']['USD']['market_cap'],
            ];
        }
        return $result;
    }
}
