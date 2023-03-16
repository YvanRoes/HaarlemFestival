<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/location.php';
class LocationRepository extends Repository
{
  public function get_AllLocations()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, address, imagePath, capacity FROM location");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
