# IDX API package

Package for calling the IDX Broker API.

## Contributing

Only IDX peeps at this time.


#Usage

Example:
`<?php

/*
* Example use
* Pass your API endpoint and the method to the apiCall()
*/

require_once "vendor/autoload.php";
require_once "src/idxApiClass.php";

use \antonioortegajr\idxAPI as idxCall;

$apiKey = 'yourApiKeyHere';

// GET, PUT, POST, and DELETE. Not all methods are available
$requestMethod = 'GET';

//available components leads, clients, partners, mls
$apiComponent = 'leads';

$apiMethod = 'lead';

$apiVersion = '1.0.4';

$apiClass = new idxCall\idxApiClass();

echo $apiClass::apiCall($requestMethod, $apiKey, $apiComponent, $apiMethod, $apiVersion);
`


## Credits

- [antonioortegajr](https://github.com/:antonioortegajr)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

This package based on the work of https://github.com/thephpleague/skeleton
