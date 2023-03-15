<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';
class ArtistRepository extends Repository
{
  public function get_AllArtists()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, genre FROM artist");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Artist');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
