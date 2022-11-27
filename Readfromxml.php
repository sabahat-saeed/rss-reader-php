<?php
class ReadFromXml     
{
    private $urls;
    private $sortKey;
    private $sortOrder;

    function __construct($urls, $sortKey = '', $sortOrder = 'asc')      //Constructor with assign by default values of parameters sortkey and sort order
    {
        $this->urls = $urls;
        $this->sortKey =  $sortKey;
        $this->sortOrder =  $sortOrder; 
    }

    function getDataFromXml()         //this function is for get data from xml and return array
    {
        try {
            $items = array();
            if (is_array($this->urls) && count($this->urls) > 0) {
                foreach ($this->urls as $url) {
                    $xml = simplexml_load_file($url);
                    $phpArray = $this->xml2array($xml);
                    if (is_array($phpArray) && isset($phpArray['channel']['item'])) {
                        $items = array_merge($items, $phpArray['channel']['item']);
                    }
                }
            } else {
                throw new Exception("RSS-feeds urls are not providedd");
            }
            if ($this->sortKey && is_array($items) && count($items) > 0) {
                $items = $this->sortArray($items, $this->sortKey);
            }
            return $items;
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    function sortArray($array, $property)   //this function is for set sort array on bases of ( property/order key/ sort key) which provided in this function.
    {
        try {
            $new = array();
            if ($property == 'pubDate') {
                foreach ($array as $value) {
                    $new[] = strtotime($value[$property]);
                }
            } else {
                $new = array_column($array, $property);
            }
            if (count($new) > 0) {
                if (strtolower($this->sortOrder) == 'desc')
                    array_multisort($new, SORT_DESC, $array);
                else
                    array_multisort($new, $array);

                return $array;
            } else {
                throw new Exception($property . " property doesn't exist in items");
            }
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    function xml2array($xml)  //this function covert json to phparray
    {
        return json_decode(json_encode((array)$xml), TRUE);
    }
}
