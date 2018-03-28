<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
require_once 'rng.php';

print_r($_SESSION['qDeck']);

?>
