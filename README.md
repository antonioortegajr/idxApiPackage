# IDX API package

[![Latest Stable Version](https://poser.pugx.org/antonioortegajr/idx-broker-api/v/stable)](https://packagist.org/packages/antonioortegajr/idx-broker-api)
[![Latest Unstable Version](https://poser.pugx.org/antonioortegajr/idx-broker-api/v/unstable)](https://packagist.org/packages/antonioortegajr/idx-broker-api)
[![License](https://poser.pugx.org/antonioortegajr/idx-broker-api/license)](https://packagist.org/packages/antonioortegajr/idx-broker-api)
[![Total Downloads](https://poser.pugx.org/antonioortegajr/idx-broker-api/downloads)](https://packagist.org/packages/antonioortegajr/idx-broker-api)

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
