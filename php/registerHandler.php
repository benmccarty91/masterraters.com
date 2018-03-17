<?php
session_start();
  require_once "Dao.php";

  $email = $_POST["email"];
  $password = trim($_POST["password"]);
  $repeatPassword = trim($_POST["repeatPassword"]);
  $name = $_POST["name"];
  $errors;
  $presets;
  $valid = true;

  $presets['email'] = $email;
  $presets['name'] = $name;

  $dao = new Dao($email);

  $foo = $dao->checkUser($email);
  if (isset($foo[0])) {
    $valid = false;
    $errors['email'] = true;
  }
  if ($password!= $repeatPassword) {
    $valid = false;
    $errors['password_match'] = true;
  }
  if (strlen($password) < 8) {
    $valid = false;
    $errors['password_length'] = true;
  }
  if ($valid) {
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $dao->addUser($name, $hashPass, $email);
    $_SESSION['user'] = array_shift($dao->checkUser($email));
    $_SESSION['logged_in'] = true;
    header("Location: ../pages/wecomeUser.php");
    exit;
  } else {
    $_SESSION['presets'] = array($presets);
    $_SESSION['errors'] = array($errors);
    header("Location: ../pages/registerUser.php");
    exit;
  }
?>
