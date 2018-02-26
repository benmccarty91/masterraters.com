<?php
  require_once "../php/Dao.php";
  $dao = new Dao();
  $questions = $dao->getQuestions();

  echo "<pre>" . print_r($questions,1) . "</pre>";
 ?>
