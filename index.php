<?php

/*
* Example use
* Pass your API endpoint and the method to the apiCall()
* Docs here: https://developers.idxbroker.com/idx-broker-api/
* Thanks to https://www.sitepoint.com/starting-new-php-package-right-way/
* and https://github.com/thephpleague/skeleton
*/

require_once "vendor/autoload.php";

require_once "src/idxApiClass.php";

$class = new idxApiClass();

$apiKey = 'yourApiKeyHere';

// GET, PUT, POST, and DELETE. Not all methods are available
$requestMethod = 'GET';

//available components leads, clients, partners, mls
$apiComponent = 'leads';

$apiMethod = 'lead';

$apiVersion = '1.0.4';


//calling leads/listmethods
echo $class->apiCall($requestMethod, $apiKey, $apiComponent, $apiMethod, $apiVersion);
