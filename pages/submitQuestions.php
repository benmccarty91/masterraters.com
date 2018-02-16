<?php
$thisPage = "submitQuestions";
include ("../php/header.php");
include ("../php/subNav.php");
 ?>

<main>
  <h1 id="pageTitle">Submit Questions</h1>
  <p>
    Help improve the game by submitting your own questions!  Please follow the format of Best/Worst actor/director/genre.  Please allow a few days for our moderators to approve your submission before it gets added to the deck.
  </p>

  <form id="submitQuestionsForm" class="submitQuestions" action="../php/questionsHandler.php" method="POST">
      <div class="submitQuestionsElement">
        <input type="radio" name="best/worst" value="best" id="bestButton"/><label for="bestButton"> Best</label>
      </div>
      <div class="submitQuestionsElement">
        <input type="radio" name="best/worst" value="worst" id="worstButton" /><label for="worstButton"> Worst</label>
      </div>
      <div class="submitQuestionsElement">
        <textarea name="customQuestion" placeholder="Your question..." rows="5" cols="50" maxlength="240"></textarea>
      </div>
      <div class="submitQuestionsElement">
        <input type="submit" class="submitLogin" value="Submit Question" />
      </div>
  </form>
</main>
<?php
  include ("../php/footer.php");
 ?>
