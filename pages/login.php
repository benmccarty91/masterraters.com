<?php
session_start();
  $logged_in = $_SESSION['logged_in'];
  if (isset($logged_in) && $logged_in) {
    header("Location: welcomeUser.php");
  }

  $thisPage = "login";
  include ("../php/header.php");
?>
<main>
  <h1 id="pageTitle">Login</h1>
  <p>
    Login to submit your own questions to the game.
  </p>

<?php
  if (isset($_SESSION['presets'])) {
    $presets = $_SESSION['presets'];
    unset($_SESSION['presets']);
  }
  if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
  }
 ?>

  <form method="POST" action="../php/loginHandler.php">
    <div>
      <?php
        if (isset($errors) && isset($errors['invalid_login'])) {
          echo('<span class="errorMessage">Invalid Email or Password.</span>');
        }
      ?>
      <input type="text" class="login_input" name="email" placeholder="email" value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" required>
    </div>
    <div>
      <input type="password" class="login_input" name="password" placeholder="password" required>
    </div>
    <div>
      <input type="submit" class="submitLogin" value="Login" />
      <a href="registerUser.php">Register</a>
    </div>
  </form>




</main>
<?php
  include ("../php/footer.php");
 ?>
