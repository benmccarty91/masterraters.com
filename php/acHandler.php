<?php
require_once 'Dao.php';
$dao = new Dao();
$query = $_GET['query'];
$query = "%" . $query . "%";
$results = $dao->acLookupMovie($query);
$suggestions = [];

foreach ($results as $result) {
  $suggestion = $result['title'];
  array_push($suggestions, htmlspecialchars($suggestion));
}

echo ('{"suggestions": ' . json_encode($suggestions) . '}');


 ?>
