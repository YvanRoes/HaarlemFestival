<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/token.php';
class TokenRepository extends Repository{
  
  public function verify_token($token): bool{
    try {
      $stmt = $this->conn->prepare("SELECT id FROM `API_KEYS` where uuid = :token");
      $stmt->execute(array(':token' => htmlspecialchars($token)));
      return $stmt->rowCount() == 1 ? true : false;
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function get_all_tokens(): array{
    try {
      $stmt = $this->conn->prepare("SELECT id, uuid FROM `API_KEYS`");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Token');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
