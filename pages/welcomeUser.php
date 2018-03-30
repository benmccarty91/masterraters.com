<?php
session_start();
  $logged_in = $_SESSION[logged_in];
  if (isset($logged_in)) {
    if (!$logged_in) {
      header("Location: login.php");
      exit;
    }
  } else {
    header("Location: login.php");
    exit;
  }

  $thisPage = "welcomeUser";
  include ("../php/header.php");
  include ("../php/subNav.php");
?>

<?php
  if (isset($_SESSION['errors'])) {
    $errors = ($_SESSION['errors']);
    unset($_SESSION['errors']);
  }
  if (isset($_SESSION['presets'])) {
    $presets = ($_SESSION['presets']);
    unset($_SESSION['presets']);
  }
  // echo("<pre>" . print_r($errors, 1) . "</pre>");
  // echo("<pre>" . print_r($presets, 1) . "</pre>");
 ?>

<main>
  <h1 id="pageTitle">Welcome, <?php echo($_SESSION['user']['name']) ?></h1>
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
        <select name="query_type" required>
          <option value=""></option>
          <option value="actor"
            <?php
              if (isset($presets['query_type']) && $presets['query_type'] == 'actor') {
                echo("selected");
              }
            ?>>
          Actor</option>
          <option value="director"
          <?php
            if (isset($presets['query_type']) && $presets['query_type'] == 'director') {
              echo("selected");
            }
          ?>
          >Director</option>
        </select>
        <?php
          if (isset($errors) && isset($errors['query_type'])) {
            echo('<span class="errorMessage">You must select an option from the dropdown.</span>');
          }
        ?>
      </div>
      <div class="submitQuestionsElement">
        <label>TV or Movie: </label>
        <select name="tv_movie" required>
          <option value=""></option>
          <option value="TV Show"
          <?php
            if (isset($presets['tv_movie']) && $presets['tv_movie'] == 'TV Show') {
              echo("selected");
            }
          ?>
          >TV Show</option>
          <option value="Movie"
          <?php
            if (isset($presets['tv_movie']) && $presets['tv_movie'] == 'Movie') {
              echo("selected");
            }
          ?>
          >Movie</option>
          <option value="Both"
          <?php
            if (isset($presets['tv_movie']) && $presets['tv_movie'] == 'Both') {
              echo("selected");
            }
          ?>
          >Both</option>
        </select>
        <?php
          if (isset($errors) && isset($errors['tv_movie'])) {
            echo('<span class="errorMessage">You must select an option from the dropdown.</span>');
          }
        ?>
      </div>
      <div class="submitQuestionsElement">
        <textarea name="customQuestion" id="customQuestion" placeholder="Your question..." rows="5" cols="50" maxlength="240"><?php if (isset($presets['query'])) {echo($presets['query']);}?></textarea>
        <?php
          if (isset($errors) && isset($errors['query'])) {
            echo('<span class="errorMessage">You must provide data in the space above.</span>');
          }
        ?>
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
