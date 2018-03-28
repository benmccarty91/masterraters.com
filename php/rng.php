<?php
    if (!isset($_SESSION['qDeck'])) {
      $_SESSION['qDeck'] = $dao->getRandomQuestions();
      $_SESSION['totQ'] = count($_SESSION['qDeck']);
      $_SESSION['currQ'] = 0;
    } else {
      $_SESSION['currQ'] += 1;
      if ($_SESSION['currQ'] >= $_SESSION['totQ']) {
        $_SESSION['currQ'] = 0;
        $_SESSION['qDeck'] = $dao->getRandomQuestions();
      }
    }
?>
