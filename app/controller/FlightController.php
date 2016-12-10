<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';
include_once '../app/lib/WikipediaJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){
            //$adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            //$flights = $adapter -> getDepartedFlights('LSZH', 5);
            $flights = $this->getTestFLights();



            $wikipediaAdapter = new WikipediaJsonAdapter();
            $cityDescriptions = array();
            foreach ($flights as $flight){
                $cityDescriptions[$flight -> getDestination()-> getLocation()] = $wikipediaAdapter ->getShortCityDescription($flight -> getDestination()-> getLocation());
            }

            $this->view('flight/flightlistview', ['flights' => $flights,'cityDescriptions' => $cityDescriptions]);

        } else{
            //$adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            //$flight = $adapter ->getFlight($identCode);
            $flight = $this->getTestFlight();
            $wikipediaAdapter = new WikipediaJsonAdapter();
            $cityDescription = $wikipediaAdapter ->getShortCityDescription($flight -> getDestination()-> getLocation());

            $this->view('flight/flightdetailview', ['flight' => $flight, 'cityDescription' => $cityDescription]);
        }

    }

public function getTestFlight() {
    $airport = new Airport('BSL', 'Basel', 'Basel');
    $flight = new Flight('penis', 'swiss', $airport, $airport, "", null);
    return $flight;

}

public function getTestFLights() {
    $flights = array();
    for($i = 0; $i<5; $i++){
        $flights[] = $this->getTestFlight();
    }

    return $flights;
}


}