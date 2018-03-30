<div id="subNav">
  <ul>
    <li><a href="admin.php" <?php if ($thisPage=="admin") echo " class=\"currentPage\""; if($_SESSION['user']['access_level']!=0) echo "style=\"display:none;\"" ?>>Admin Portal</a></li>
    <li><a href="welcomeUser.php" <?php if ($thisPage=="welcomeUser") echo " class=\"currentPage\""; ?>>Submit Questions</a></li>
    <li><a href="logout.php" <?php if ($thisPage=="logout") echo " class=\"currentPage\""; ?>>Logout</a></li>
  </ul>
</div>
