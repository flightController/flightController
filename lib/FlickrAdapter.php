<?php

class FlickrAdapter
{
    private $username;
    private $apiKey;
    private static $baseUrl = 'https://www.flickr.com/services/rest/?';
    private $method = 'flickr.photos.search';
    private $format = 'json';
    private $tags;
    private $content_type = '1';
    private $pages = '1';

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

    public function getPicture($city, $number) {

    }
}