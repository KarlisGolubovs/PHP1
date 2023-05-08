<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiRequest
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://rickandmortyapi.com/api/'
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function getCharacters(): array
    {
        $response = $this->client->request('GET', 'character');
        return json_decode($response->getBody(), true)['results'];
    }

    /**
     * @throws GuzzleException
     */
    public function getEpisodes(): array
    {
        $response = $this->client->request('GET', 'episode');
        return json_decode($response->getBody(), true)['results'];
    }

    /**
     * @throws GuzzleException
     */
    public function getLocations(): array
    {
        $response = $this->client->request('GET', 'location');
        return json_decode($response->getBody(), true)['results'];
    }
    public function getEpisode(int $id): array
    {
        $response = $this->client->request('GET', "episode/$id");
        return json_decode($response->getBody(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function getLocation(int $id): array
    {
        $response = $this->client->request('GET', "location/$id");
        return json_decode($response->getBody(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function getCharacter(int $id): array
    {
        $response = $this->client->request('GET', "character/$id");
        return json_decode($response->getBody(), true);
    }
}