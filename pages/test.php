<?php
private $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  echo "<pre>" . print_r($url,1) . "</pre>";
 ?>
