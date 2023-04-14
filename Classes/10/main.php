<?php

require_once 'VideoStore.php';
require_once 'Application.php';
require_once 'Video.php';

$store = new VideoStore();
$app = new Application($store);
$app->run();
