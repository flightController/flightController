<!DOCTYPE html>
<?php


include_once '../app/lib/OpenWeatherJsonAdapter.php';
include_once '../resources/keys.php';

$weather = new OpenWeatherJsonAdapter(OPENWEATHER_API_KEY);
$temperature = ($weather->getTemperature('Basel', 'CH'));
$cloud = ($weather->getCloud('Basel', 'CH'));
$wind = ($weather->getWind('Basel', 'CH'));
$weathercondition = ($weather->getWeathercondition('Basel', 'CH'));
$icon = ($weather->getIcon('Basel', 'CH'));

?>

<html>

<head>
    <title>SkyTracker</title>
    <meta name="description" content="SkyTracker Semesterarbeit 5. Semester der ABBTS in Baden">
 
</head>
<body>

Temperaturen: <?php echo $temperature ?> <br>
Wolken: <?php echo $cloud ?> <br>
Wind: <?php echo $wind ?> <br>
Wetter Konditionen: <?php echo $weathercondition ?> <br>

<img src="images/icon/<?php echo $icon ?>.png" alt="ICON">

</body>

</html>

