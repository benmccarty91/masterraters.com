<?php
session_start();
  require_once '../php/Dao.php';
  $dao = new Dao();
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
     <h2>Question <?php echo $currQ+1 ?></h2>
     <img src="<?php echo($question['image_path']) ?>" />
     <h2><?php echo($question['best_worst_question'] . " " . $question['query'] . " " . $question['tv_movie'] ) ?></h2>
   </div>
   <form action="../php/submitHandler.php" method="POST">
     <ul class="playBoxes">
       <li>
         <div class="playBox <?php if (in_array('p1', $_SESSION['game']['winner'])) echo("winningPlayer"); ?>">
           <h2>Player 1</h2>
           <img src="<?php echo($_SESSION['player']['p1']['result']['poster_path']); ?>" class="resultPoster" />
           <h2><?php echo($_SESSION['player']['p1']['result']['vote_average']); ?></h2>
           <h3 class="score">Score: <?php echo($_SESSION['player']['p1']['score']) ?></h3>
         </div>
       </li>
       <li>
         <div class="playBox <?php if (in_array('p2', $_SESSION['game']['winner'])) echo("winningPlayer"); ?>">
           <h2>Player 2</h2>
           <img src="<?php echo($_SESSION['player']['p2']['result']['poster_path']); ?>" class="resultPoster" />
           <h2><?php echo($_SESSION['player']['p2']['result']['vote_average']); ?></h2>
           <h3 class="score">Score: <?php echo($_SESSION['player']['p2']['score']) ?></h3>
         </div>
       </li>
       <li>
         <div class="playBox <?php if (in_array('p3', $_SESSION['game']['winner'])) echo("winningPlayer"); ?>">
           <h2>Player 3</h2>
           <img src="<?php echo($_SESSION['player']['p3']['result']['poster_path']); ?>" class="resultPoster" />
           <h2><?php echo($_SESSION['player']['p3']['result']['vote_average']); ?></h2>
           <h3 class="score">Score: <?php echo($_SESSION['player']['p3']['score']) ?></h3>
         </div>
       </li>
       <li>
         <div class="playBox <?php if (in_array('p4', $_SESSION['game']['winner'])) echo("winningPlayer"); ?>">
           <h2>Player 4</h2>
           <img src="<?php echo($_SESSION['player']['p4']['result']['poster_path']); ?>" class="resultPoster" />
           <h2><?php echo($_SESSION['player']['p4']['result']['vote_average']); ?></h2>
           <h3 class="score">Score: <?php echo($_SESSION['player']['p4']['score']) ?></h3>
         </div>
       </li>
       <li id="submitLI">
         <a href="play.php"><h2>Next Question</h2></a>
       </li>
     </ul>
   </form>
 </main>
<?php
  include ("../php/footer.php");
 ?>
