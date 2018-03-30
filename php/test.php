<?php
session_start();
require_once 'Dao.php';
require_once 'tmdb_api.php';
$api = new tmdb_api();
$dao = new Dao();

print_r($api->getMovie("The Wrestler"));
?>
