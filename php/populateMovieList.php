<?php
  require_once 'Dao.php';
  require_once 'tmdb_api.php';
  $dao = new Dao();
  $api = new tmdb_api();

  for ($i=1; $i<=1000; $i++) {
    echo("\nadding page " . $i);
    // usleep(500000);
    $movies = $api->getAllMovies($i);
    echo("\nwere there results?");
    if (isset($movies)) {
      echo(" YES\n");
      foreach ($movies as $movie) {
        $check = array_shift($dao->checkMovie($movie['id']));
        echo("\ndoes " . $movie['title'] . " already exist? ");
        if (!isset($check)) {
          echo("NO\n");
          echo ('inserting: ' . $movie['title'] . "\n\n");
          $dao->addMovie($movie['title'], $movie['id'], $movie['poster_path']);
        } else {
          echo ("YES\n");
        }
      }
    } else {
      echo("NO\n");
    }

  }
 ?>
