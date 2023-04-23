<?php

use App\EnterpriseFactory, App\Models\ApiClient;

require_once 'vendor/autoload.php';

$client = new ApiClient();
$data = $client->getDataFromApi('ABC123'); // Replace with the desired registration code
$enterprises = EnterpriseFactory::fetchEnterpriseData((array)$data);
