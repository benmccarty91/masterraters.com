<?php

class Dao {
  private $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
  private $host = $url["host"];
  private $db = substr($url["path"],1);
  private $user = $url["user"];
  private $pass = $url["pass"];

  public function getConnection () {
    try {
      return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
    }
  }
  public function getComments () {
     $conn = $this->getConnection();
     $query = $conn->prepare("select * from comments");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     return $query->fetchAll();
  }
  public function saveComment ($name, $comment) {
     $conn = $this->getConnection();
     $query = $conn->prepare("INSERT INTO comments (name, comment) VALUES (:name, :comment)");
     $query->bindParam(':name', $name);
     $query->bindParam(':comment', $comment);
     $query->execute();
  }
  public function deleteComment ($id) {
     $conn = $this->getConnection();
     $query = $conn->prepare("DELETE FROM comments WHERE id = :id");
     $query->bindParam(':id', $id);
     $query->execute();
  }
}
