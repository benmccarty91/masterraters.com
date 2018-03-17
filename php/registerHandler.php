<?php
  require_once "Dao.php";
  $dao = new Dao($email);

  $email = $_POST["email"];
  $password = trim($_POST["password"]);
  $repeatPassword = trim($_POST["repeatPassword"]);
  $name = $_POST["name"];

  $foo = $dao->checkUser("ben.mccarty@live.com");
  if (isset($foo[0])) {
    echo("Oops!  An account already exists with that email.");
    exit;
  }

  if ($password!= $repeatPassword) {
    echo("Oops! Password did not match! Try again. ");
    exit;
  }
  if (strlen($password) < 8) {
    echo("your password must be at least 8 characters");
    exit;
  }
  $hashPass = password_hash($password, PASSWORD_DEFAULT);
  $dao->addUser($name, $hashPass, $email);
  header("Location: ../pages/test.php");
?>
