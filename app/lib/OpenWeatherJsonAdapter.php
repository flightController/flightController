<?php

/**
 * Created by PhpStorm.
 * User: andy
 * Date: 10.12.16
 * Time: 14:47
 */
class OpenWeatherJsonAdapter
{
    private $apiKey;
    private $baseUrl = 'http://api.openweathermap.org/data/2.5/weather?q=';
    private $extendUrl = '&units=metric&cnt=7&lang=';
    private $language = 'de';

    /**
     * OpenWeatherJsonAdapter constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    public function getTemperature(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        //Get current Temperature in Celsius
        $temperature = $data['main']['temp'];
        //Get weather condition
        //$weathercondition = $data['weather'][0]['main'];
        //Get cloud percentage
        //$cloud = $data['clouds']['all'];
        //Get wind speed
        //$wind = $data['wind']['speed'];

        return $temperature;
        //return $weathercondition;
        //return $cloud;
        //return $wind;

        // return $data;
    }

    public function getWeathercondition(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get weather condition
        $weathercondition = $data['weather'][0]['description'];
        return $weathercondition;
    }

    public function getCloud(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get cloud percentage
        $cloud = $data['clouds']['all'];
        return $cloud;
    }

    public function getWind(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get wind speed
        $wind = $data['wind']['speed'];
        return $wind;
    }

    public function getIcon(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get weather condition
        $icon = $data['weather'][0]['icon'];
        return $icon;
    }
}