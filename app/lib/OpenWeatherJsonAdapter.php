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
        $url = ($this->baseUrl.$city.",".$country.$this->extendUrl.$this->language.'&appid='.$this->apiKey . '&mode=json');
        return $url;
        
    }

}