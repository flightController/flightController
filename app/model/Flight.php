<?php

class Flight
{
    private $ident;
    private $airline;
    private $origin;
    private $destination;
    private $aircraft;
    private $flightstate;
    private $gpsCoordinates;

    /**
     * Flight constructor.
     * @param $ident
     * @param $airline
     * @param $origin
     * @param $destination
     * @param $aircraft
     * @param $flightstate;
     * @param $gpsCoordinates
     */
    public function __construct(string $ident, string $airline, Airport $origin, Airport $destination, string $aircraft, string $flightstate, GPSCoordinates $gpsCoordinates)
    {
        $this->ident = $ident;
        $this->airline = $airline;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->aircraft = $aircraft;
        $this->flightstate = $flightstate;
        $this->gpsCoordinates = $gpsCoordinates;
    }

    /**
     * @return string
     */
    public function getIdent(): string
    {
        return $this->ident;
    }

    /**
     * @return string
     */
    public function getAirline(): string
    {
        return $this->airline;
    }

    /**
     * @return Airport
     */
    public function getOrigin(): Airport
    {
        return $this->origin;
    }

    /**
     * @return Airport
     */
    public function getDestination(): Airport
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getAircraft(): string
    {
        return $this->aircraft;
    }

    /**
     * @return string
     */
    public function getFlightstate(): string
    {
        return $this->flightstate;
    }

    /**
     * @return GPSCoordinates
     */
    public function getGpsCoordinates(): GPSCoordinates
    {
        return $this->gpsCoordinates;
    }





}

