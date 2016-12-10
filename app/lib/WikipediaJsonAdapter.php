<?php

class WikipediaJsonAdapter
{
    private function get($what)
    {
        $url = 'http://de.wikipedia.org/w/api.php';
        $url .= '?action=query&format=json&prop=extracts&generator=search';
        $url .= '&utf8=1&exsentences=1&exlimit=max&exintro=1&explaintext=1';
        $url .= '&gsrnamespace=0&gsrlimit=10&gsrsearch=' . urlencode($what);

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_USERAGENT      => $_SERVER['HTTP_USER_AGENT'], // name of client
            CURLOPT_SSL_VERIFYPEER => false,
        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        if ($response === false) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $response;
    }


    public function getCityDescription($cityName) : string
    {
        $wikiInformation = $this->get($cityName);
        $wikiInformation = json_decode($wikiInformation);
        $pages = $wikiInformation -> query -> pages;

        $objectvars = get_object_vars($pages);
        $text ="";
        $i=0;
        foreach($objectvars as $key => $value){
            $i += 1;
            if($i >= 3){
                $page = $pages -> $key;
                $text .= $page -> extract;
            }
            }
        return $text;
    }

    public function getShortCityDescription($cityName) : string
    {
        $text = "";
        $text = $this->getCityDescription($cityName);
        return(substr($text,0,550).'...');
    }
}