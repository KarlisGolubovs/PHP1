<?php declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client,GuzzleHttp\Exception\GuzzleException;

class ApiClient
{
    /**
     * @throws GuzzleException
     */
    public function getDataFromApi(): string
    {
        $client = new Client();
        $response = $client->request('GET', 'https://data.gov.lv/dati/lv/api/3/action/datastore_search');
        return $response->getBody()->getContents();
    }
}
