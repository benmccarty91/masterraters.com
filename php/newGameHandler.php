<?php
  session_start();
  unset($_SESSION['qDeck']);
  unset($_SESSION['totQ']);
  unset($_SESSION['currQ']);
  unset($_SESSION['player']);
  unset($_SESSION['game']);
  header("Location: ../pages/play.php");
  exit;
?>
