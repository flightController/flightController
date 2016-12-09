<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';
include_once '../app/lib/WikipediaJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flights = $adapter -> getDepartedFlights('LSZH', 5);
            //$flights = [];

            $wikipediaAdapter = new WikipediaJsonAdapter();
            $cityDescriptions = array();
            foreach ($flights as $flight){
                $cityDescriptions[$flight -> getDestination()-> getLocation()] = $wikipediaAdapter ->getShortCityDescription($flight -> getDestination()-> getLocation());
            }

            $this->view('flight/flightlistview', ['flights' => $flights,'cityDescriptions' => $cityDescriptions]);

        } else{
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flight = $adapter ->getFlight($identCode);

            //$flight = [];
            $this->view('flight/flightdetailview', ['flight' => $flight]);
        }
    }
}