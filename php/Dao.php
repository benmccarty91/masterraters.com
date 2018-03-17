<?php
require_once 'KLogger.php';

class Dao {
  private $host = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_2d2a1c265c5f4e6";
  private $user = "b84fa35945b84e";
  private $pass = "578bc6dc";
  private $log;
  private $whoami;

  public function __construct($whoami = 'n/a') {
    $this->log = new KLogger('../log/', KLogger::DEBUG);
    $this->whoami = $whoami;
  }

  private function getConnection () {
    try {
      $foo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      $this->log->logDebug("Established a DB connection by " . $this->whoami . ".");
      return $foo;
    } catch (Exception $e) {
      $this->log->logFatal("Connection to DB failed!");
      echo "connection failed: " . $e->getMessage();
    }
  }
  public function getUsers () {
     $conn = $this->getConnection();
     $query = $conn->prepare("select * from user");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     return $query->fetchAll();
  }

  public function checkUser($email) {
    $conn = $this->getConnection();
    $query = $conn->prepare("select * from user where email=:email");
    $query->bindParam(':email', $email);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    return $query->fetchAll();
  }

  public function getQuestions() {
    $conn = $this->getConnection();
    $query = $conn->prepare("select * from question_deck");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    return $query->fetchAll();
  }
  public function getQuestion($id) {
    $conn = $this->getConnection();
    $query = $conn->prepare("select $id from question_deck");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    return $query->fetchAll();
  }
  public function addUser ($name, $password, $email) {
     $conn = $this->getConnection();
     $query = $conn->prepare("INSERT INTO user (email, password, name) values (:email, :password, :name)");
     $query->bindParam(':email', $email);
     $query->bindParam(':name', $name);
     $query->bindParam(':password', $password);
     $query->execute();
  }
  public function addQuestion($bestworst, $name, $question) {
    $conn = $this->getConnection();
    $query = $conn->prepare("INSERT INTO question_deck (best_worst_question, person, question) values (:best_worst_question, :person, :question)");
    $query->bindParam(':best_worst_question', $bestworst);
    $query->bindParam(':person', $person);
    $query->bindParam(':question', $question);
    $query->execute();
  }
}