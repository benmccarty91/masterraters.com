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
  if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['access_level'] != 0) {
      header("Location: login.php");
      exit;
    }
  } else {
    header("Location: login.php");
    exit;
  }
  $thisPage = "admin";
  include ("../php/header.php");
  include ("../php/subNav.php");

  require_once '../php/Dao.php';
  $dao = new Dao();
  $qDeck = $dao->getQuestions();
?>
<main>
  <h1 id="pageTitle">Admin Portal</h1>
  <table id="question_deck_table">
    <tr>
      <th>
        Best/Worst
      </th>
      <th>
        Type
      </th>
      <th>
        TV/Movie
      </th>
      <th>
        Query
      </th>
      <th>
        Photo
      </th>
      <th>
        Delete
      </th>
    </tr>
    <?php
      $count = 0;
      foreach($qDeck as $question) {
        $count++;
        echo("<tr id=\"questionID" . $question['question_id'] . "\">
            <td>
              " . $question['best_worst_question'] . "
            </td>
            <td>
              " . $question['query_type'] . "
            </td>
            <td>
              " . $question['tv_movie'] . "
            </td>
            <td>
              " . $question['query'] . "
            </td>
            <td>
              <img src =\"" . $question['image_path'] . "\" alt=\"Profile Photo\"  height=\"150px\"/>
            </td>
            <td>
             <a href=\"../php/deleteHandler.php?id=" . $question['question_id'] . "\"><img src=\"../img/delete_icon.png\" width=\"25px\"/></a>
            </td>
          </tr>");
      }
    ?>
  </table>
  <?php
    echo "<h3 align=\"center\"> Total: " . $count . "</h3>";
  ?>


</main>
<?php
  include ("../php/footer.php");
 ?>
