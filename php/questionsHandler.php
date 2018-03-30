<?php
session_start();
  require_once 'KLogger.php';
  require_once "../php/Dao.php";
  require_once 'tmdb_api.php';
  $api = new tmdb_api();
  $dao = new Dao();
  $log = new KLogger('../log/', KLogger::DEBUG);
  $query_type = $_POST["query_type"];
  $tv_movie = $_POST["tv_movie"];
  $query = trim($_POST["customQuestion"]);
  $image_path;
  if ($query_type == 'actor' || $query_type == 'director') {
    $image_path = $api->getProfilePhoto($query);
  }
  $presets['query_type'] = $query_type;
  $presets['tv_movie'] = $tv_movie;
  $presets['query'] = $query;
  $valid = true;
  if ($query_type != 'actor' && $query_type != 'director') {
    $valid = false;
    $errors['query_type'] = true;
  }
  if ($tv_movie != 'TV Show' && $tv_movie != 'Movie' && $tv_movie != 'Both') {
    $valid = false;
    $errors['tv_movie'] = true;
  }
  if (strlen($query) < 1) {
    $valid = false;
    $errors['query'] = true;
  }
  if ($valid) {
    $log->logDebug("Submitted Question: " . print_r($_POST,1));
    $dao->addQuestion($_SESSION['user']['user_id'], "Best", $query_type, $tv_movie, $query, $image_path);
    $dao->addQuestion($_SESSION['user']['user_id'], "Worst", $query_type, $tv_movie, $query, $image_path);
    $_SESSION['newQAuth'] = true;
    header("Location: ../pages/newQuestion.php?query=$query&tv_movie=$tv_movie");
    exit;
  } else {
    $_SESSION['presets'] = $presets;
    $_SESSION['errors'] = $errors;
    header("Location: ../pages/welcomeUser.php");
    exit;
  }
?>
