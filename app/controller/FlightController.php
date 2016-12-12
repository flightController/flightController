<?php

include_once '../app/lib/FlightAwareJsonAdapter.php';
include_once '../app/lib/WikipediaJsonAdapter.php';
include_once '../app/lib/FlickrJsonAdapter.php';

class FlightController extends controller
{
    public function index($identCode = '')
    {

        if (empty($identCode)) {
            //$adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            //$flights = $adapter -> getDepartedFlights('LSZH', 5);
            $flights = $this->getTestFlights();
            $cityDescriptions = $this->getWikiTexts($flights);
            $cityPictures = $this->getListViewCityPictures($flights);

            $this->view('flight/flightlistview', ['flights' => $flights, 'cityDescriptions' => $cityDescriptions, 'cityPictures' => $cityPictures]);

        } else {
            //$adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            //$flight = $adapter ->getFlight($identCode);
            $flight = $this->getTestFlight();
            $cityDescription = $this->getWikiText($flight);
            $cityPictures = $this->getDetailViewCityPictures($flight);

            $this->view('flight/flightdetailview', ['flight' => $flight, 'cityDescription' => $cityDescription, 'cityPictures' => $cityPictures]);
        }
    }

    private function getTestFlight()
    {
        $airport = new Airport('BSL', 'Basel', 'Basel');
        $flight = new Flight('BSL1337', 'swiss', $airport, $airport, "", null);
        return $flight;

    }

    private function getTestFlights()
    {
        $flights = array();
        for ($i = 0; $i < 5; $i++) {
            $flights[] = $this->getTestFlight();
        }

        return $flights;
    }

    private function getWikiText(Flight $flight): string
    {
        $wikipediaAdapter = new WikipediaJsonAdapter();
        return $wikipediaAdapter->getShortCityDescription($flight->getDestination()->getLocation());
    }

    private function getWikiTexts(array $flights): array
    {
        $wikipediaAdapter = new WikipediaJsonAdapter();
        $cityDescriptions = array();
        foreach ($flights as $flight) {
            $cityDescriptions[$flight->getDestination()->getLocation()] = $wikipediaAdapter->getShortCityDescription($flight->getDestination()->getLocation());
        }
        return $cityDescriptions;
    }

    private function getListViewCityPictures(array $flights): array
    {
        $flickJsonAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);
        $cityPictures = array();

        foreach ($flights as $flight) {
            $city = $flight->getDestination()->getLocation();
            $cityPicture = $flickJsonAdapter->getSmallPictures($city, 1);
            $cityPictures[$city] = $cityPicture[0] ? $cityPicture[0] : "";
        }
        return $cityPictures;
    }

    private function getDetailViewCityPictures(Flight $flight): array
    {
        $flickJsonAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);
        $cityPictures = array();

        $city = $flight->getDestination()->getLocation();
        $cityPicture = $flickJsonAdapter->getFullPictures($city, 8);
        $cityPicture[$city] = $cityPicture;

        return $cityPictures;
    }
}