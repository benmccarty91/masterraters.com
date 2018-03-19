<?php
session_start();
  require_once 'KLogger.php';
  require_once "../php/Dao.php";
  $dao = new Dao();
  $log = new KLogger('../log/', KLogger::DEBUG);

  $query_type = $_POST["query_type"];
  $tv_movie = $_POST["tv_movie"];
  $query = $_POST["customQuestion"];
  $image_path = "test.jpg";

  $log->logDebug("Submitted Question: " . print_r($_POST,1));
  $dao->addQuestion($_SESSION['user']['user_id'], "Best", $query_type, $tv_movie, $query, $image_path);
  header("Location: ../pages/testQuestion.php");
  exit;
?>
