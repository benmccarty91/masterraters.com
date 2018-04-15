<?php
session_start();
require_once 'Dao.php';
require_once 'tmdb_api.php';
$api = new tmdb_api();
$dao = new Dao();
$input = "T";
$input = $input . "%";
$output = $dao->acLookupMovie($input);
echo(print_r($output));
?>
