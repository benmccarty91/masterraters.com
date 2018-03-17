<?php
session_start();

  echo password_hash("testpassword", PASSWORD_DEFAULT);
  echo "\n\n";
?>
