<?php
require_once __DIR__ . '/repository.php';
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
}
