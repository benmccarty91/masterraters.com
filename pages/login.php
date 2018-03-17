<?php
$thisPage = "login";
include ("../php/header.php");
 ?>
<main>
  <h1 id="pageTitle">Login</h1>
  <p>
    Login to submit your own questions to the game.
  </p>

  <form method="POST" action="../php/loginHandler.php">
    <input type="text" class="login_input" name="email" placeholder="email">
    <input type="password" class="login_input" name="password" placeholder="password">
    <p>
      DO NOT ENTER YOUR REAL PASSWORD HERE!  It is still unsecured.
    </p>
    <div>
      <input type="submit" class="submitLogin" value="Login" />
      <a href="registerUser.php">Register</a>
    </div>
  </form>




</main>
<?php
  include ("../php/footer.php");
 ?>
