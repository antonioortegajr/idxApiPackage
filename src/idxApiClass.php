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

      //Combine the component and API method
      $endpoint = $apiComponent.'/'.$apiMethod;

      //create meta data about API call
      $meta = array('endpoint'=>$endpoint,'method'=>$requestMethod);


      //Use Guzzle for API call and return json
      $client = new GuzzleHttp\Client(['base_url' => 'https://api.idxbroker.com']);

      $request = $client->$requestMethod(
        $endpoint,
        [
          'headers' => [
              'Content-Type' => 'application/x-www-form-urlencoded',
              'accesskey'=>$apiKey,
              'outputtype'=>'json'
            ],
            'exceptions' => false
        ]
      );
      //http code return from above API call
      $code = $request->getStatusCode();


      $returnBody = $request->getBody();

      return $code;





        }

}
