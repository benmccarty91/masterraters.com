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
  if (isset($_SESSION['newQAuth'])) {
    if (!$_SESSION['newQAuth']) {
      header("Location: login.php");
      exit;
    }
  } else {
    header("Location: login.php");
    exit;
  }
  unset($_SESSION['newQAuth']);
  $thisPage = "welcomeUser";
  include ("../php/header.php");
  include ("../php/subNav.php");

  require_once '../php/tmdb_api.php';
  $api = new tmdb_api();

  $query = $_GET['query'];
  $tv_movie = $_GET['tv_movie'];
  if ($tv_movie == "Both") {
    $tv_movie = "TV/Movie";
  }
?>
<main>
  <h1 id="pageTitle">Thank You!</h1>
  <h3 id="newQuestionHeader">Your question has been submitted and is awaiting review.</h3>
  <h3 id="newQuestionHeader">Click Here to Add Another</h3>
  <div id="gameQuestion">
    <img src="<?php echo($api->getProfilePhoto($query)) ?>" alt = "profile photo (if undisplayed, our mods will resolve)"/>
    <h2>Best/Worst <?php echo($query . " " . $tv_movie)?></h2>
  </div>
</main>
<?php
  include ("../php/footer.php");
 ?>
