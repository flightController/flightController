<?php


include_once 'lib/FlightAwareJsonAdapter.php';

$adapter = new FlightAwareJsonAdapter('jenzer', 'APIKEY');
$adapter->updateAirportDatabase();
