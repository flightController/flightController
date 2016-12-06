<?php

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){
            $this->view('flight/flightlistview');
        } else{
            $flight = $this -> model('flight');
            $this->view('flight/flightdetailview', ['code' => $identCode]);
        }
    }
}