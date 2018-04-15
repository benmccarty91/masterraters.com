<?php
session_start();
  require_once 'Dao.php';

  $errors = array();
  $presets = array();
  $presets['email'] = $_POST['email'];
  $valid = true;

  $dao = new Dao($_POST['email']);
  $foo = $dao->checkUser($_POST['email']);
  if (isset($foo[0])) {
    $foo = array_shift($foo);
    $pass = $_POST['password'] . $_POST['email'];
    if (password_verify($pass, $foo['password'])) {
      $_SESSION['user'] = array_shift($dao->checkUser($_POST['email']));
      $_SESSION['logged_in'] = true;
    } else {
      $valid = false;
      $errors['invalid_login'] = true;
    }
  } else {
    $valid = false;
    $errors['invalid_login'] = true;
  }

  if ($valid) {
    header("Location: ../pages/welcomeUser.php");
    exit;
  } else {
    $_SESSION['presets'] = $presets;
    $_SESSION['errors'] = $errors;
    header("Location: ../pages/login.php");
    exit;
  }
 ?>
