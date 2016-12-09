<?php
include_once '../app/model/Flight.php';
include_once '../app/model/GPSCoordinates.php';
include_once '../app/model/Airport.php';

class FlightAwareJsonAdapter
{
    private $username;
    private $apiKey;
    private static $baseUrl = 'http://flightxml.flightaware.com/json/FlightXML2/';

    public function __construct($username, $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
    }

    private function get(string $endpoint, array $params)
    {
        $ch = curl_init(self::$baseUrl . $endpoint . '?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'FlightAware REST PHP Library 0.1');
        $output = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($responseCode === 401) {
            throw new RuntimeException('Authentication failed; use your FlightAware username and API key.', 401);
        } else if ($responseCode !== 200) {
            throw new RuntimeException($output, $responseCode);
        }
        curl_close($ch);
        $result = json_decode($output);
        if (isset($result->error)) {
            if ($result->error === 'no data available') {
                throw new InvalidArgumentException('no data available', 404);
            }
            throw new RuntimeException($result->error, 400);
        }
        return $result;
    }


    private function getInFlightInfo($ident)
    {
        $result = $this->get('InFlightInfo', array('ident' => $ident))->InFlightInfoResult;
        if (!strlen($result->faFlightID)) {
            return null;
        }
        $waypoints = array();
        $currentWaypoint = array();
        foreach (explode(' ', $result->waypoints) as $coordinate) {
            if (isset($currentWaypoint['latitude'])) {
                $currentWaypoint['longitude'] = $coordinate;
                $waypoints[] = $currentWaypoint;
                $currentWaypoint = array();
            } else {
                $currentWaypoint['latitude'] = $coordinate;
            }
        }
        $result->waypoints = $waypoints;
        return $result;
    }

    public function getAllAirportName (): array
    {
        $dataArray = array('data' => '');
        $airportShortcuts = $this->get('AllAirports', $dataArray)->AllAirportsResult->data;
     $airportInfo = array();
        $airportNames = array ();
        foreach ($airportShortcuts as $airportShortcut) {
            $params = array('airportCode' => $airportShortcut);
            $airportNames[] = array($airportShortcut => $this->get('AirportInfo', $params)->AirportInfoResult->name);
            break;
        }

        return $airportNames;
    }

    public function getAirportInfo($airportCode){
        $params = array('airportCode' => $airportCode);
        return $this -> get('AirportInfo', $params)->AirportInfoResult;
    }

    private function getDepartedInfo(string $airport, int $howMany, string $filter, int $offset)
    {
        $params = array('airport' => $airport,
                        'howMany' => $howMany,
                        'filter' => $filter,
                        'offset' => $offset,
        );
        return $this -> get('Departed', $params);
    }


    public function getFlight(string $ident) : Flight
    {
        $flightInfo = $this->getInFlightInfo($ident);
        if(empty($flightInfo)) {
            return null;
        }

        $gpsCoordinates = new GPSCoordinates($flightInfo -> latitude, $flightInfo -> longitude, $flightInfo ->altitude);
        $destinationInfo = $this->getAirportInfo($flightInfo -> destination);
        $destination = new Airport($flightInfo -> destination, $destinationInfo -> name, $destinationInfo -> location);
        $originInfo = $this->getAirportInfo($flightInfo -> origin);
        $origin = new Airport($flightInfo -> origin, $originInfo -> name, $originInfo -> location);

        $flight = new Flight($ident,"", $origin, $destination, $flightInfo -> type, $gpsCoordinates);
        return $flight;
    }

    public function getDepartedFlights(string $originAirportCode, $howMany) : array
    {
        $departedResult = $this->getDepartedInfo($originAirportCode, $howMany, 'airline', 0);
        $flights = array();

        $departedResult = $departedResult -> DepartedResult;
        $departures = $departedResult -> departures;

        foreach ($departures as $departedInfo){
            $destinationInfo = $this->getAirportInfo($departedInfo -> destination);
            $destination = new Airport($departedInfo -> destination, $destinationInfo -> name, $destinationInfo -> location);

            $originInfo = $this->getAirportInfo($departedInfo -> origin);
            $origin = new Airport($departedInfo -> origin, $originInfo -> name, $originInfo -> location);

            $flights[] = new Flight($departedInfo -> ident,"", $origin, $destination, "", null);
        }
        return $flights;
    }
}