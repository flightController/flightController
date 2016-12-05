<?php

class FlightController extends controller
{
    public function index($identCode = ''){

        if(empty($identCode)){
            echo 'Flight List';
        } else{
            echo 'Flight Detail of Flight: ' . $identCode;
        }
    }
}