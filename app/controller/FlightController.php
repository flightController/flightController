<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){
            $this->view('flight/flightlistview');
        } else{
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flight = $adapter ->getFlight($identCode);
            $this->view('flight/flightdetailview', ['flight' => $flight]);
        }
    }
}