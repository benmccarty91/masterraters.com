<?php
session_start();
  require_once "../php/Dao.php";
  $dao = new Dao();

  $bestworst = $_POST["best/worst"];
  $question = $_POST["customQuestion"];

  $dao->addQuestion($bestworst, NULL, $question);
  header("Location: ../pages/testQuestion.php");
  exit;
?>
