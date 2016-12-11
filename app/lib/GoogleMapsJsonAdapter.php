<?php

/**
 * Created by PhpStorm.
 * User: andy
 * Date: 11.12.16
 * Time: 19:12
 */

class GoogleMapsJsonAdapter
{
    private $apiKey;
    private $baseUrl = 'https://maps.googleapis.com/maps/api/directions/json?origin=';
    private $extendUrl = '&destination=';

    /**
     * OpenWeatherJsonAdapter constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    public function getDistance(string $origin, string $destination)
    {
        $url = ($this->baseUrl . $origin . $this->extendUrl . $destination . '&key=' . $this->apiKey);
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        // $distance = $data['routes']['legs']['distance']['text'];

        return $data;
    }
}