<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/danceLocation.php';
class DanceLocationRepository extends Repository
{
  public function get_AllDanceLocations()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, address, imagePath, capacity FROM dance_location");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceLocation');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function get_DanceLocationById($id)
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, address, imagePath, capacity FROM dance_location WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceLocation');
      $r = $stmt->fetch();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
