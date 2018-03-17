<?php
  require_once 'Dao.php';
  $dao = new Dao($_POST['email']);
  echo "<pre>" . print_r($_POST,1) . "</pre>";
  echo $_POST['email'];

  $foo = $dao->checkUser($_POST['email']);
  if (isset($foo[0])) {
    $foo = array_shift($foo);
    if (password_verify($_POST['password'], $foo['password'])) {
      echo "Success!";
    } else {
      echo "Wrong Password";
    }
  } else {
    echo "That email doesn't exist";
  }

  exit;



 ?>
