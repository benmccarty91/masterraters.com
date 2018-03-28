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
  session_destroy();
  $thisPage = "logout";
  include ("../php/header.php");
?>

<main>
  <h1 id="pageTitle">You have successfully logged out.</h1>



</main>
<?php
  include ("../php/footer.php");
 ?>
