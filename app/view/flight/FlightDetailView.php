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
         <div class="col-lg-6 flightdetailmap inside inside-full-height">
            <h2>Skytracker</h2>
            <img src="../images/worldmap.png"/>
         </div>
         <div class="col-lg-5 flightdetailweather inside inside-full-height">
            <h2>Weather</h2>
         </div>
      </div>
      <div class="col-lg-12 flightdetailflight">
         <h2>Flugdetails</h2>
         </br>
         <div class="col-lg-3">
            <h4>Flugnummer: </br></br>
               Ankunftszeit: </br></br>
               Restliche Flugzeit: </br></br>
               Flugzeugtyp: </br>
            </h4>
         </div>
         <div class="col-lg-3">
            <h4>A34B6 </br></br>
               12:46 </br></br>
               3 Std 34 Min </br></br>
               Airbus A380 </br>
            </h4>
         </div>
         <div class="col-lg-6">
         </div>
      </div>
   </div>
</div>
EOF;
?>
</body>
</html>