<?php
  session_start();
  require_once 'tmdb_api.php';
  $api = new tmdb_api();
  $_SESSION['game']['winner'] = array();
  $_SESSION['game']['winningRating'] = 0;
  $_SESSION['player']['p1']['answer'] = $_POST[1];
  $_SESSION['player']['p2']['answer'] = $_POST[2];
  $_SESSION['player']['p3']['answer'] = $_POST[3];
  $_SESSION['player']['p4']['answer'] = $_POST[4];
  $_SESSION['player']['p1']['result'] = $api->getMovie($_SESSION['player']['p1']['answer']);
  $_SESSION['player']['p2']['result'] = $api->getMovie($_SESSION['player']['p2']['answer']);
  $_SESSION['player']['p3']['result'] = $api->getMovie($_SESSION['player']['p3']['answer']);
  $_SESSION['player']['p4']['result'] = $api->getMovie($_SESSION['player']['p4']['answer']);
  if (count($_SESSION['player']['p1']['result']) < 1) {
    unset($_SESSION['player']['p1']['result']);
  }
  if (count($_SESSION['player']['p2']['result']) < 1) {
    unset($_SESSION['player']['p2']['result']);
  }
  if (count($_SESSION['player']['p3']['result']) < 1) {
    unset($_SESSION['player']['p3']['result']);
  }
  if (count($_SESSION['player']['p4']['result']) < 1) {
    unset($_SESSION['player']['p4']['result']);
  }
  foreach($_SESSION['player'] as $player) {
    if ($player['result']['vote_average'] > $_SESSION['game']['winningRating']) {
      $_SESSION['game']['winningRating'] = $player['result']['vote_average'];
      $_SESSION['game']['winner'] = array();
      array_push($_SESSION['game']['winner'], $player['id']);
    } else if ($player['result']['vote_average'] == $_SESSION['game']['winningRating']) {
      array_push($_SESSION['game']['winner'], $player['id']);
    }
  }
  foreach ($_SESSION['game']['winner'] as $winner) {
    $_SESSION['player'][$winner]['score']++;
  }
  header("Location: ../pages/play_submitted.php");
  exit;
 ?>
