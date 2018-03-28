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
?>
<main>
  <h1 id="pageTitle">Play!</h1>
  <div id="gameQuestion">
    <img src="<?php echo($question['image_path']) ?>" />
    <h2><?php echo($question['best_worst_question'] . " " . $question['query'] . " " . $question['tv_movie'] ) ?></h2>
  </div>
  <form action="../php/submitHandler.php" method="POST">
    <ul class="playBoxes">
      <li>
        <div class="playBox">
          <h2>Player 1</h2>
            <input type="text" class="IMDB_searchBox" name="1" placeholder="Search IMDB">
          </div>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 2</h2>
            <input type="text" class="IMDB_searchBox" name="2" placeholder="Search IMDB">
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 3</h2>
            <input type="text" class="IMDB_searchBox" name="3" placeholder="Search IMDB">
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 4</h2>
            <input type="text" class="IMDB_searchBox" name="4" placeholder="Search IMDB">
        </div>
      </li>
      <li>
        <input type="submit" class="submitAnswers" value="Submit Answers" />
      </li>
    </ul>
  </form>
</main>
<?php
  include ("../php/footer.php");
 ?>
