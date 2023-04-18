<?php


namespace Weather;

class WeatherDataParser
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getTemperature()
    {
        return $this->data['main']['temp'];
    }

    public function getWeatherDescription()
    {
        return $this->data['weather'][0]['description'];
    }

    public function getWeatherIconUrl(): string
    {
        return "https://openweathermap.org/img/w/{$this->data['weather'][0]['icon']}.png";
    }
}
