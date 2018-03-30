<?php
  session_start();
  require_once 'KLogger.php';
  $log = new KLogger('../log/reported_problems/', KLogger::INFO);
  $log->logInfo("User reported a problem with results.  Here is the Session array:\n\n" . print_r($_SESSION,1));
  header("Location: ../pages/reported.php");
  exit;
?>
