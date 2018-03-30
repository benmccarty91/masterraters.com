<?php
session_start();
include ("../php/header.php");
$logged_in = $_SESSION['logged_in'];
if (isset($logged_in) && $logged_in) {
  include ("../php/subNav.php");
}

?>
<main>
  <h1 id="pageTitle">Thank you!</h1>
  <p>
    The issue has been reported and will be reviewed by our moderators.
  </p>
  <h3><a href="play.php">Continue Game</a></h3>
</main>
<?php
  include ("../php/footer.php");
 ?>
