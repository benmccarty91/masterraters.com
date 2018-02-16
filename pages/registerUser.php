<?php
$thisPage = "login";
include ("../php/header.php");
 ?>
<main>
  <h1 id="pageTitle">Sign Up</h1>
  <p>
    Register as a user to submit your own questions to the game.
  </p>

  <form class="registerUser" action="../php/registerHandler.php" method="POST">
    <p class="registerElement">
      <label class="registerLabel">Email</label>
      <input type="text" class="registerUserInput" name="email" placeholder="Enter Email" required>
    </p>
    <p class="registerElement">
      <label class="registerLabel">Password</label>
      <input type="password" class="registerUserInput" name="password" placeholder="Enter Password" required>
    </p>
    <p class="registerElement">
      <label class="registerLabel">Repeat Password</label>
      <input type="password" class="registerUserInput" name="repeatPassword" placeholder="Repeat Password" required>
    </p>
    <p class="registerElement">
      <label class="registerLabel">Name</label>
      <input type="text" class="registerUserInput" name="name" placeholder="Enter Name" required>
    </p>
    <p class="registerElement">
      <input type="submit" class="submitLogin" value="Sign Up" />
    </p>
  </form>
</main>
<?php
  include ("../php/footer.php");
 ?>
