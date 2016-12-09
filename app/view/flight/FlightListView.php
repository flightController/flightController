<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Sky Tracker</title>
    <meta name="description" content="Flugtracker ABB Technikerschule">
</head>

<body>
<?php
$flights = $data['flights'];
$cityDescriptions = $data['cityDescriptions'];
foreach ($flights as $flight){
    echo <<<EOF
<div class="container flightcontainer">
    <div class="row">
        <div class="col-lg-12 flightlist">
            <h1>{$flight->getDestination()->getLocation()}</h1>
            <div class="row">
                <div class="col-lg-9">
                    <p>{$cityDescriptions[$flight->getDestination()->getLocation()]}</p>
                    <div class="row flightweather">
                        <div class="col-lg-3"><button type="button" class="btn btn-primary btn-block"> Mehr Infos </button>
                        </div>
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-3 weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sonnig
                        </div>
                        <div class="col-lg-3 weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 21°
                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <img src="../images/berlinthumbnail.jpg"/>
                </div>
            </div>
        </div>
    </div>
</div>
EOF;
}
?>
</body>
</html>