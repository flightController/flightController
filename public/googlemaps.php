<!DOCTYPE html>
<?php


include_once '../app/lib/GoogleMapsJsonAdapter.php';
include_once '../resources/keys.php';

$maps = new GoogleMapsJsonAdapter(GOOGLEMAPS_API_KEY);
var_dump($maps->getDistance('Basel', 'Sissach'));
// $distance = ($maps->getDistance('Basel', 'Sissach'));

?>
<!--
<html>

<head>
    <title>SkyTracker</title>
    <meta name="description" content="SkyTracker Semesterarbeit 5. Semester der ABBTS in Baden">

</head>
<body>

Distanz der Reise: <?php echo $distance ?> <br>

</body>

</html>

