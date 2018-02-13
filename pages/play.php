<?php
$thisPage = "play";
include ("../php/header.php");
 ?>
<main>
  <h1 id="pageTitle">Play!</h1>
  <div id="gameQuestion">
    <!--THIS IS ONLY AN EXAMPLE QUESTION-->
    <img src="../img/matt.jpg" />
    <h2>Best Matt Damon Movie</h2>
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
