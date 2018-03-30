<?php
session_start();
  $thisPage = "how";
  include ("../php/header.php");
  $logged_in = $_SESSION['logged_in'];
  if (isset($logged_in) && $logged_in) {
    include ("../php/subNav.php");
  }
?>
<main>
  <h1 id="pageTitle">How to Play</h1>
  <ul id="howList">
    <li>So you think you know movies, but do you know more than your friends?  This game will decide the biggest movie buff once and for all.</li>
    <li>Gameplay is simple.  You are proposed a question, such as: Best Matt Damon Movie.  You goal isn't to discover Matt's best movie, but rather to pick a movie that is better than your friend's pick.</li>
    <li>You and your friends simply enter in what you think the best answer is and hit submit.  The player that chose the highest ranked movie gains a point.</li>
    <li>Each individual "game" consists of 10 questions.  At the end of 10 questions, whoever has the most points wins.  You may skip questions, if the majority of players agree to do so, however, it still uses up one of the 10 possible questions in the deck.</li>
    <li>After 10 questions, the deck is shuffled and 10 more questions are chosen.</li>
    <li>If you have any ideas for questions, log in to your account and submit your request.  Your submission will be reviewed by our moderators.</li>
  </ul>
</main>
<?php
  include ("../php/footer.php");
 ?>
