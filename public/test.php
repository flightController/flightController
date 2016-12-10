<?php


include_once '../app/lib/FlightAwareJsonAdapter.php';
include_once '../app/lib/FlickrJsonAdapter.php';
include_once '../resources/keys.php';

/*$adapter = new FlightAwareJsonAdapter('jenzer', 'APIKEY');
$adapter->getAllAirportName();*/
$flickr = new FlickrJsonAdapter(FLICKR_API_KEY);
var_dump($flickr->getFullPictures('HongKong','5'));