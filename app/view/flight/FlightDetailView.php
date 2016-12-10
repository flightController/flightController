<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Sky Tracker</title>
    <meta name="description" content="Flugtracker ABB Technikerschule">
</head>

<body>
<?php
$flight = $data['flight'];
$cityDescription = $data['cityDescription'];

    echo <<<EOF
<div class="container flightcontainer">
    <div class="row flightdetail">
        <div class="col-lg-12 col-md-12 col-sm-12 flightDetailText">
            <h1>{$flight->getDestination()->getLocation()}</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <p>$cityDescription</p>
                </div>
            </div>
        </div>
            <div class="row-height">
                <div class="col-lg-7 flightdetailmap inside inside-full-height">
                    <h2>Skytracker</h2>
                    <img src="../images/worldmap.png"/>
                </div>
            <div class="col-lg-4 flightdetailweather inside inside-full-height">
                <h2>Weather</h2>
            </div>
        </div>
    </div>
</div>
EOF;
?>
</body>
</html>