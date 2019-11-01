<?php

use GuzzleHttp\Client as GuzzleClient;

if (!file_exists('./vendor/autoload.php')) {
    die("Please run 'composer install'");
}

require('./vendor/autoload.php');

session_start();

$videocdn = new wzzirro\videocdn\VideoCdn();

$translations = $videocdn->translations->list();

var_dump($translations);
die();