<?php
require_once '../php/Klogger.php';

$log = new KLogger('./logs/', KLogger::DEBUG);
$log->logDebug("TEST");



 ?>
