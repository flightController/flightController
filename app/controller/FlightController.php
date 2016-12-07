<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){

        } else{
            $adapter = new FlightAwareJsonAdapter('jenzer', '');
            $adapter ->getFlight($identCode);
            $this->view('flight/flightdetailview', ['code' => $identCode]);
        }
    }
}