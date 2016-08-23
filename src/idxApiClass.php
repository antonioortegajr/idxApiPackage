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

      //IDX Broker API base url
      $baseUrl ='https://api.idxbroker.com';

      //Combine the base url and component and API method
      $endpoint = $baseUrl.'/'.$apiComponent.'/'.$apiMethod;

      //create meta data about API call
      $meta = array('endpoint'=>$endpoint,'method'=>$requestMethod);

      //Use Guzzle for API call
      $client = new \GuzzleHttp\Client;
      $request = $client->$requestMethod($endpoint,
      array('headers' => array('Content-Type' => 'application/x-www-form-urlencoded',
      'accesskey'=>$apiKey,'outputtype'=>'json')
      ));

      //http code return from above API call
      $code = $request->getStatusCode();

      // Get all of the response headers
      foreach ($response->getHeaders() as $name => $values) {
        echo $name . ': ' . implode(', ', $values) . "\r\n";
      }

      //$returnBody = $request->getBody();
      $returnMeta = $meta;

      return $code;

        }
}
