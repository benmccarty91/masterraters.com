<?php
require_once "../php/Dao.php";

$dao = new Dao();

$randomQuestion = $dao->getRandomQuestion();
$toReturn = Array();
$toReturn['actorName'] = $randomQuestion[0]['query'];
$toReturn['imgURL'] = $randomQuestion[0]['image_path'];
echo (json_encode($toReturn));
