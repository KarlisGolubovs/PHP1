<?php

declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class getClientRequest
{
    protected Client $client;
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->client = new Client();
        $this->apiKey = $apiKey;
    }

    /**
     * @throws GuzzleException
     */
    public function get($endpoint): string
    {
        $response = $this->client->get($endpoint, [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}