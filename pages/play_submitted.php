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
    <ul class="playBoxes">
      <li>
        <div class="playBox">
          <h2>Player 1</h2>
          </div>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 2</h2>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 3</h2>
        </div>
      </li>
      <li>
        <div class="playBox">
          <h2>Player 4</h2>
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
