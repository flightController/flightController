<!DOCTYPE html>

<html>
<head>
    <title>SkyTracker</title>


</head>

<body>
<div class="content">
    <ul>
        </ul>
</div>
<?php
include_once 'lib/FlightAwareJsonAdapter.php';

$adapter = new FlightAwareJsonAdapter('jenzer', 'APIKEY');
$adapter->updateAirportDatabase();

?>

</body>
</html>