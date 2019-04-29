<?php
require_once "../php/Dao.php";
require_once 'tmdb_api.php';

$dao = new Dao();
$api = new tmdb_api();


$gameId = $_GET['gameId'];
$userId = $_GET['userId'];
$questionId = $_GET['questionId'];
$submission = $_GET['submission'];

$result = $api->getMovie($submission);
$toReturn = Array();
$toReturn['gameId'] = $gameId;
$toReturn['questionId'] = $questionId;
$toReturn['userId'] = $userId;
$toReturn['score'] = number_format(round($result['vote_average'], 1, PHP_ROUND_HALF_UP),1);
$toReturn['poster_path'] = $result['poster_path'];
$toReturn['title'] = $result['title'];
$toReturn['winner'] = true;
// sleep(5);
echo (json_encode($toReturn));
