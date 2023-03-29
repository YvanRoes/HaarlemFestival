<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tourLocation.php';
class TourLocationRepository extends Repository
{
  public function get_AllTourLocations()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, title, description, address, imagePath FROM stroll_location");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'TourLocation');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }


  public function get_TourLocationById($id)
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, title, description, address, imagePath FROM stroll_location WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'TourLocation');
      $r = $stmt->fetch();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
