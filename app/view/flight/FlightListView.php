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
        <div class="col-lg-12 col-md-12 col-sm-12 flightlist">
            <h1>{$flight->getDestination()->getLocation()}</h1>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 flightlistblock">
                    <p>{$cityDescriptions[$flight->getDestination()->getLocation()]}</p>
                    <div class="row flightweather">
                        <div class="hidelarge col-md-4 col-sm-0">
                            <img src="../images/berlinthumbnail.jpg"/>
                        </div>
                        </div>
                        <div class="hidelarge col-md-4 col-sm-6 weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sonnig
                        </div>
                        <div class="hidelarge col-md-4 col-sm-6 weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 21°
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12"><button type="button" class="btn btn-primary btn-block"> Mehr Infos </button>
                        </div>
                        <div class="col-lg-1 hidemediumsmall">
                        </div>
                        <div class="col-lg-3 hidemediumsmall weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sonnig
                        </div>
                        <div class="col-lg-3 hidemediumsmall weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 21°
                        </div>
                        <div class="col-lg-2 hidemediumsmall">
                        </div>
                    </div>
                    <div class="col-lg-3 hidemediumsmall">
                    <img src="../images/berlinthumbnail.jpg"/>
                </div>
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