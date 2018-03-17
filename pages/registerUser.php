<?php
session_start();
$thisPage = "login";
include ("../php/header.php");
 ?>
<main>
  <h1 id="pageTitle">Sign Up</h1>
  <p>
    Register as a user to submit your own questions to the game.
  </p>

  <?php
    if (isset($_SESSION['errors'])) {
      $errors = array_shift($_SESSION['errors']);
      unset($_SESSION['errors']);
    }
    if (isset($_SESSION['presets'])) {
      $presets = array_shift($_SESSION['presets']);
      unset($_SESSION['presets']);
    }
    // echo("<pre>" . print_r($errors, 1) . "</pre>");
    // echo("<pre>" . print_r($presets, 1) . "</pre>");
   ?>



  <form class="registerUser" action="../php/registerHandler.php" method="POST">
    <p class="registerElement">
      <label class="registerLabel">Email</label>
      <input type="text" class="registerUserInput" name="email" placeholder="Enter Email" required value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>">
      <?php
        if (isset($errors) && isset($errors['email'])) {
          echo('<span class="errorMessage">An account already exists with this email.</span>');
        }
      ?>
    </p>
    <p class="registerElement">
      <label class="registerLabel">Password</label>
      <input type="password" class="registerUserInput" name="password" placeholder="Enter Password" required>
      <?php
        if (isset($errors) && isset($errors['password_length'])) {
          echo('<span class="errorMessage">Your password must be at least 8 characters long.</span>');
        }
      ?>
    </p>
    <p class="registerElement">
      <label class="registerLabel">Repeat Password</label>
      <input type="password" class="registerUserInput" name="repeatPassword" placeholder="Repeat Password" required>
      <?php
        if (isset($errors) && isset($errors['password_match'])) {
          echo('<span class="errorMessage">Your passwords did not match.</span>');
        }
      ?>
    </p>
    <p class="registerElement">
      <label class="registerLabel">Name</label>
      <input type="text" class="registerUserInput" name="name" placeholder="Enter Name" required value="<?php echo isset($presets['name']) ? $presets['name'] : ''; ?>">
    </p>
    <p class="registerElement">
      <input type="submit" class="submitLogin" value="Sign Up" />
    </p>
  </form>
</main>
<?php
  include ("../php/footer.php");
 ?>
