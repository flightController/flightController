<?php
    require_once '../app/init.php';

include_once 'lib/FlightAwareJsonAdapter.php';

$adapter = new FlightAwareJsonAdapter('jenzer', 'APIKEY');
$adapter->updateAirportDatabase();
