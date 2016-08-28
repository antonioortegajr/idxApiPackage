# IDX API package

<a href="https://packagist.org/packages/antonioortegajr/idx-broker-api" target="_blank">
    <img src="https://img.shields.io/packagist/v/antonioortegajr/idx-broker-api.svg?style=flat-square" alt="Current version" />
</a>

Package for calling the IDX Broker API.

## Contributing

Only IDX peeps at this time.


## Install

Via Composer
``` bash
$ composer require antonioortegajr/idx-broker-api
```


#Usage

Example:
```php
<?php

/*
* Example use
* Pass your API endpoint and the method to the apiCall()
*/

require_once "vendor/antonioortegajr/idx-broker-api/vendor/autoload.php";
require_once "vendor/antonioortegajr/idx-broker-api/src/idxApiClass.php";

use \antonioortegajr\idxAPI as idxCall;

$apiKey = 'yourApiKeyHere';

// GET Not all methods are available in this version
$requestMethod = 'GET';

//available components leads, clients, partners, mls
$apiComponent = 'leads';

$apiMethod = 'lead';

$apiVersion = '1.0.4';

$apiClass = new idxCall\idxApiClass();

echo $apiClass::apiCall($requestMethod, $apiKey, $apiComponent, $apiMethod, $apiVersion);


This package based on the work of https://github.com/thephpleague/skeleton
