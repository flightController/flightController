<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){

        } else{
            $adapter = new FlightAwareJsonAdapter('jenzer', 'APIKEY');
            $flight = $adapter ->getFlight($identCode);
            $this->view('flight/flightdetailview', ['flight' => $flight]);
        }
    }
}