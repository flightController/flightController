<?php

class FlickrJsonAdapter
{
    private $apiKey;
    private static $baseUrl = 'https://www.flickr.com/services/rest/?';
    private $method = '&method=flickr.photos.search';
    private $format = '&format=json';
    private $tags = '&tags=';
    private $content_type = '&content_type=1';
    private $pages = '&content_type=1';
    private $per_page = '&per_page=';

    /**
     * FlickrJsonAdapter constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    
    
   private function getPictures(string $city, string $howmany, string $size, string $format)
   {
       $photo_url_array = array();
       $url = (self::$baseUrl . $this->method . $this->tags . $city . $this->format . $this->content_type . $this->per_page . $howmany . '&api_key=' . $this->apiKey . '&nojsoncallback=1');
       $response = json_decode(file_get_contents($url));

       if($response == null){
           $photo_url_array[] = "";
           return $photo_url_array;
       }

       $photo_array = $response->photos->photo;

       foreach ($photo_array as $single_photo) {
           $farm_id = $single_photo->farm;
           $server_id = $single_photo->server;
           $photo_id = $single_photo->id;
           $secret_id = $single_photo->secret;

           $photo_url = 'http://farm' . $farm_id . '.staticflickr.com/' . $server_id . '/' . $photo_id . '_' . $secret_id . $size . '.' . $format;;
           $photo_url_array[] = $photo_url;
       }
       return $photo_url_array;

   }
    public function getSmallPictures(string $city, string $howmany) {
        return $this->getPictures($city, $howmany, '_m', 'jpg');
       }

       public function getFullPictures(string $city, string $howmany) {
        return $this->getPictures($city, $howmany, '', 'jpg');
       }

}