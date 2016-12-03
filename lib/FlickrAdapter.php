<?php

class FlickrAdapter
{
    private $username;
    private $apiKey;
    private static $baseUrl = 'https://www.flickr.com/services/rest/?';

    /**
     * FlickrAdapter constructor.
     * @param $username
     * @param $apiKey
     */
    public function __construct($username, $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
    }

    public function getPicture($city) {

    }
}