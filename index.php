<?php

/*
* Example use
* Pass your API endpoint and the method to the api_call()
* Docs here: https://developers.idxbroker.com/idx-broker-api/
* Thanks to https://www.sitepoint.com/starting-new-php-package-right-way/
* and https://github.com/thephpleague/skeleton
*/

require_once "vendor/autoload.php";

require_once "src/idxApiClass.php";

$class = new idxApiClass();

$apiKey = 'WE6R46Aq8D6dd3jHuWExuo';

// GET, PUT, POST, and DELETE not all methods are available
$requestMethod = 'GET';

//available components leads, clients, partners, mls
$apiComponent = 'leads';

$apiMethod = 'listmethods';


//calling leads/listmethods
echo $class->apiCall($requestMethod, $apiKey, $apiComponent, $apiMethod);
