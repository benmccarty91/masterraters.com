<?php
  require_once "../php/Dao.php";
  $dao = new Dao();
  $users = $dao->getUsers();

  echo "<pre>" . print_r($users,1) . "</pre>";
 ?>
