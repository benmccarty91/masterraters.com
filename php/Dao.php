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
  public function addQuestion($entered_by, $bestworst, $query_type, $tv_movie, $question, $image_path) {
    $this->log->logDebug("addQuestion function called with params: " . $entered_by . $bestworst . $query_type . $tv_movie . $question . $image_path);
    $conn = $this->getConnection();
    $query = $conn->prepare("INSERT INTO question_deck (approved, entered_by_user, best_worst_question, query_type, tv_movie, query, image_path)
      values (0, :entered_by_user, :bestworst, :query_type, :tv_movie, :question, :image);");
    $query->bindParam(':bestworst', $bestworst);
    $query->bindParam(':entered_by_user', $entered_by);
    $query->bindParam(':query_type', $query_type);
    $query->bindParam(':tv_movie', $tv_movie);
    $query->bindParam(':question', $question);
    $query->bindParam(':image', $image_path);
    $query->execute();
    $this->log->logDebug("addQuestion Executed");
  }
  public function getNumQuestions() {
    $conn = $this->getConnection();
    $query = $conn->prepare("select count(*) from question_deck");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    return $query->fetchAll();
  }

  public function getRandomQuestions() {
    $conn = $this->getConnection();
    $query = $conn->prepare("select * from question_deck where approved = '1' order by rand() limit 10;");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    return $query->fetchAll();
  }

  public function deleteQuestion($id) {
    $conn = $this->getConnection();
    $query = $conn->prepare("DELETE FROM question_deck WHERE question_id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
  }
}
