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
      switch ($code) {
        case 200:
        $code = array(
          $code => 'OK'
          );
        break;
        case 204:
        $code = array(
          $code => 'We all good, nothing to return.'
          ) ;
        break;
        case 400:
        $code = array(
          $code => 'Required parameter missing or invalid. Check the API endpoint used.'
          );
        break;
        case 401:
        $code = array(
          $code => 'accesskey not valid or revoked.'
          );
        break;
        case 403:
        $code = array(
          $code => 'Call not using SSL (HTTPS). This is likey the hosting used to make the call.'
          );
        break;
        case 404:
        $code = array(
          $code => 'The requested URL was not found on this server. Check the API endpoint you used.'
          );
        break;
        case 406:
        $code = array(
          $code => 'No API Key provided.'
          );
        break;
        case 409:
        $code = array(
          $code => 'Invalid API component specified or duplicate unique data detected.'
          );
        break;
        case 412:
        $code = array(
          $code => 'Over Hourly API limit. Wait an hour and re check key in middleware.'
          );
        break;
        case 417:
        $code = array(
          $code => 'Either over 1k in saved links created by API or no title in the saved links PUT request. Check response header for indication.'
          );
        break;
        case 500:
        $code = array(
          $code => 'General error.'
          );
        break;
        case 503:
        $code = array(
          $code=>'Scheduled or emergency API maintenance will result in 503 errors.'
          );
        break;
        case 521:
        $code = array(
          $code => 'Temporary error. There is a possibility that not all API methods are affected.'
          );
        break;
      }

      //create meta data about this API call
      $endpoint = $request->getEffectiveUrl();
      $apiCallsThisHour = $request->getHeader('Hourly-Access-Key-Usage');
      $apiVersionCalled = $request->getHeader('Api-Version');
      $meta = array(
        'code'=>$code,
        'endPoint'=> $endpoint,
        'requestMethod'=>$requestMethod,
        'Hourly-Access-Key-Usage'=> $apiCallsThisHour,
        'version'=> $apiVersionCalled,
        'support'=>'developers@idxbroker.com'
      );
      $meta = json_encode($meta);

      $returnBody = $request->getBody();

      return $meta;


        }

}
