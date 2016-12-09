<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flights = $adapter -> getDepartedFlights('LSZH', 5);
            //$flights = [];

            $this->view('flight/flightlistview', ['flights' => $flights]);

        } else{
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            //$flight = $adapter ->getFlight($identCode);
            $flight = [];
            $this->view('flight/flightdetailview', ['flight' => $flight]);
        }
    }
}