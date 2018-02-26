<?php
  if ($_POST['password']!= $_POST['repeatPassword'])
   {
       echo("Oops! Password did not match! Try again. ");
       exit;
   }

  require_once "../php/Dao.php";
  $dao = new Dao();

  $email = $_POST["email"];
  $password = $_POST["password"];
  $repeatPassword = $_POST["repeatPassword"];
  $name = $_POST["name"];

  $dao->addUser($name, $password, $email);
  header("Location: ../pages/test.php");
 ?>
