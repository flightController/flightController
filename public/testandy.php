<?php


include_once '../app/lib/OpenWeatherJsonAdapter.php';
include_once '../resources/keys.php';

$weather = new OpenWeatherJsonAdapter(OPENWEATHER_API_KEY);
var_dump($weather->getTemperature('Basel', 'CH'));




