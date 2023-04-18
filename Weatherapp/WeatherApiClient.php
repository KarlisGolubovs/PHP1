<?php


namespace Weather;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class WeatherApiClient
{
    private Client $client;
    private string $key;

    public function __construct()
    {
        $this->client = new Client();
        $this->key = "07fe97575280aa70030226ea49b0ed6b";
    }

    public function getWeatherData($city, $code)
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city},{$code}&appid={$this->key}&units=metric";
        try {
            $response = $this->client->request('GET', $url);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return null;
        } catch (GuzzleException $e) {
        }
    }
}
