<?php

if (!file_exists('./vendor/autoload.php')) {
    die("Please run 'composer install'");
}

require('./vendor/autoload.php');

session_start();

$videocdn = new wzzirro\videocdn\VideoCdn();

$translations = $videocdn->animes->list();

var_dump($translations);
die();