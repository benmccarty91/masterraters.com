<?php
session_start();
  $logged_in = $_SESSION[logged_in];
  if (isset($logged_in)) {
    if (!$logged_in) {
      header("Location: login.php");
    }
  } else {
    header("Location: login.php");
  }

  $thisPage = "welcomeUser";
  include ("../php/header.php");
  include ("../php/subNav.php");
?>

<main>
  <h1 id="pageTitle">Welcome, <?php echo($_SESSION[user][name]) ?></h1>
  <p>
    Help improve the game by submitting your own questions!
  </p>
  <p>
    Both a BEST and WORST version of your question will be created automatically.
  </p>
  <p>
    Please allow a few days for our moderators to approve your submission before it gets added to the deck.
  </p>
<div id="submitForm">
  <form id="submitQuestionsForm" class="submitQuestions" action="../php/questionsHandler.php" method="POST">
      <div class="submitQuestionsElement">
        <label>Please Select: </label>
        <select name="query_type">
          <option value="null"></option>
          <option value="actor">Actor</option>
          <option value="director">Director</option>
          <option value="genre">Genre</option>
          <option value="decade">Decade</option>
        </select>
      </div>
      <div class="submitQuestionsElement">
        <label>TV or Movie: </label>
        <select name="tv_movie">
          <option value="null"></option>
          <option value="TV Show">TV Show</option>
          <option value="Movie">Movie</option>
          <option value="Both">Both</option>
        </select>
      </div>
      <div class="submitQuestionsElement">
        <textarea name="customQuestion" id="customQuestion" placeholder="Your question..." rows="5" cols="50" maxlength="240"></textarea>
      </div>
      <div class="submitQuestionsElement">
        <input type="submit" class="submitLogin" value="Submit Question" />
      </div>
  </form>
</div>
</main>
<?php
  include ("../php/footer.php");
 ?>
