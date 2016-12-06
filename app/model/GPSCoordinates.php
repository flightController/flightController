<?php

class GPSCoordinates
{
    private $latitude;
    private $longitude;
    private $altitude;

    /**
     * GPSCoordinates constructor.
     * @param $latitude
     * @param $longitude
     * @param $altitude
     */
    public function __construct($latitude, $longitude, $altitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
    }


}