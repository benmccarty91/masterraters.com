<?php
  session_start();
  $logged_in = $_SESSION[logged_in];
  if (isset($logged_in)) {
    if (!$logged_in) {
      header("Location: login.php");
      exit;
    }
  } else {
    header("Location: login.php");
    exit;
  }
  if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['access_level'] != 0) {
      header("Location: login.php");
      exit;
    }
  } else {
    header("Location: login.php");
    exit;
  }
  require_once "../php/Dao.php";
  $dao = new Dao();
  $id = $_GET['id'];
  $dao->deleteQuestion($id);
  $id+=10;
  header("Location: ../pages/admin.php#questionID" . $id);
  exit;
?>
