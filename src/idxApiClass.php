<?php

//namespace Swader\Diffbot;

class idxApiClass
{

    /**
     * Create a new IDX API package Instance
     */
    public function __construct()
    {
    }

    /**
     * Hi
     *
     * IDX API Docs here: https://developers.idxbroker.com/idx-broker-api/
     * Thanks to https://www.sitepoint.com/starting-new-php-package-right-way/
     * and https://github.com/thephpleague/skeleton
     */
    public function apiCall($requestMethod, $apiKey, $apiComponent, $apiMethod)
    {
      $baseUrl ='https://api.idxbroker.com';

      $endpoint = $baseUrl.'/'.$apiComponent.'/'.$apiMethod;

      $meta = array('endpoint'=>$endpoint,'method'=>$requestMethod);
      $client = new \GuzzleHttp\Client;
      $request = $client->$requestMethod($endpoint,
      array('headers' => array('Content-Type' => 'application/x-www-form-urlencoded',
      'accesskey'=>$apiKey,'outputtype'=>'json')
     ));
      return $request->getBody();

        }
}
