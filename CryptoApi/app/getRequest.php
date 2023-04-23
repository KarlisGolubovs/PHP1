<?php declare(strict_types=1);

namespace App;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

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
     * @throws Exception
     */
    public function get(string $endpoint): string
    {
        try {
            $response = $this->client->get($endpoint, [
                'headers' => [
                    'X-CMC_PRO_API_KEY' => 'c67a4bad-b124-44a3-8e00-42f2b015082e',
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception("API request failed with status code: " . $response->getStatusCode());
            }

            return $response->getBody()->getContents();

        } catch (RequestException $e) {
            throw new Exception("API request failed: " . $e->getMessage());

        } catch (GuzzleException $e) {
            throw new Exception("Guzzle request failed: " . $e->getMessage());
        }
    }
}
