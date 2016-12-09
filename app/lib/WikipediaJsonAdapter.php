<?php

class WikipediaJsonAdapter
{
    private static $baseUrl = 'https://de.wikipedia.org/w/api.php?';

    private function get(array $params)
    {

        $url = self::$baseUrl . http_build_query($params);
        $content = file_get_contents($url);
        return json_decode($content);
    }

    private function buildParams($searchString){
        $params = array(
            'action' => 'query',
            'titles' => $searchString,
            'prop' => 'revisions',
            'rvprop' => 'content',
            'format' => 'json',
            'rvsection'=> 0,
        );
        return $params;
    }

    public function getCityDescription($cityName){
        $wikiInformation = $this->get($this->buildParams($cityName));
        $pages =  $wikiInformation -> query -> pages;
        $objectvars = get_object_vars($pages);
        foreach ($objectvars as $key => $value) {
            $revisions = $pages->$key->revisions[0];
            $objectvars = get_object_vars($revisions);
            foreach ($objectvars as $key => $value) {
                if ($key = "*") {
                    $wikitext = $revisions->$key;
                    $wikitext = preg_replace('/\[(.*?)\]/',"",$wikitext);
                    $wikitext = preg_replace('/{(.*?)}/',"",$wikitext);
                    $wikitext = preg_replace('/\((.*?)\)/',"",$wikitext);
                    return $wikitext;
                }
            }
        }
    }
}