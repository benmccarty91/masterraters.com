<?php
require_once "../php/Dao.php";
$dao = new Dao();

$gameId = $_GET['gameId'];

$randomQuestion = $dao->getRandomQuestion();
$toReturn = Array();
$toReturn['gameId'] = $gameId;
$toReturn['questionId'] = $randomQuestion[0]['question_id'];
$toReturn['actorName'] = $randomQuestion[0]['query'];
$toReturn['imgURL'] = $randomQuestion[0]['image_path'];
echo (json_encode($toReturn));
