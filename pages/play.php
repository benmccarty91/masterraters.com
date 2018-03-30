<?php
session_start();
  require_once '../php/Dao.php';
  $dao = new Dao();
  require_once '../php/rng.php';
  $thisPage = "play";
  include ("../php/header.php");
  $logged_in = $_SESSION['logged_in'];
  if (isset($logged_in) && $logged_in) {
    include ("../php/subNav.php");
  }
  $currQ = $_SESSION['currQ'];
  $question = $_SESSION['qDeck'][$currQ];
  if ($question['tv_movie'] == "Both") {
    $question['tv_movie'] = "Movie OR TV Show";
  }
  $_SESSION['player']['p1']['id'] = 'p1';
  $_SESSION['player']['p2']['id'] = 'p2';
  $_SESSION['player']['p3']['id'] = 'p3';
  $_SESSION['player']['p4']['id'] = 'p4';

  if ($currQ == 0) {
    $_SESSION['player']['p1']['score'] = 0;
    $_SESSION['player']['p2']['score'] = 0;
    $_SESSION['player']['p3']['score'] = 0;
    $_SESSION['player']['p4']['score'] = 0;
  }


?>
<main>
  <h1 id="pageTitle">Play!</h1>
  <div id="gameQuestion">
    <h2>Question <?php echo $currQ+1 ?></h2>
    <img src="<?php echo($question['image_path']) ?>" />
    <h2><?php echo(htmlspecialchars($question['best_worst_question']) . " " . htmlspecialchars($question['query']) . " " . htmlspecialchars($question['tv_movie'])) ?></h2>
  </div>
  <form action="../php/submitHandler.php" method="POST">
    <ul class="playBoxes">
      <li>
        <div class="playBox">
          <h2>Player 1</h2>
          <input type="text" class="IMDB_searchBox" name="1" placeholder="Search TMDB">
          <h3 class="score">Score: <?php echo($_SESSION['player']['p1']['score']) ?></h3>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 2</h2>
          <input type="text" class="IMDB_searchBox" name="2" placeholder="Search TMDB">
          <h3 class="score">Score: <?php echo($_SESSION['player']['p2']['score']) ?></h3>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 3</h2>
          <input type="text" class="IMDB_searchBox" name="3" placeholder="Search TMDB">
          <h3 class="score">Score: <?php echo($_SESSION['player']['p3']['score']) ?></h3>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 4</h2>
          <input type="text" class="IMDB_searchBox" name="4" placeholder="Search TMDB">
          <h3 class="score">Score: <?php echo($_SESSION['player']['p4']['score']) ?></h3>
        </div>
      </li>
      <li id="submitLI">
        <input type="submit" class="submitAnswers" value="Submit Answers" />
      </li>
      <li id="skipQ">
        <a href="play.php?skip=1">Skip Question</a>
        <h4><a href="../php/newGameHandler.php">New Game</a></h4>

      </li>
    </ul>
  </form>
</main>
<?php
  include ("../php/footer.php");
 ?>
