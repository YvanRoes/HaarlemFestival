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

  public function insert_location(DanceLocation $location)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO `dance_location`(`name`, `address`, `imagePath`, `capacity`) VALUES (:name,:address,:path, :cap)");
      $stmt->execute(array(':name' => $location->get_name(), ':address' => $location->get_address(), ':cap' => $location->get_capacity(), ':path' => $location->get_imagePath()));
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function delete_locationById($id)
  {
    try {
      $stmt = $this->conn->prepare("DELETE FROM dance_location WHERE id = :id ");
      $stmt->execute(array(':id' => $id));
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function edit_locationById($id, $name, $address, $cap)
  {
    try {
      $stmt = $this->conn->prepare("UPDATE `dance_location` SET `name`=:name,`address`=:address, `capacity`=:cap WHERE id = :id;");
      $stmt->execute(array(':id' => $id, ':name' => $name, ':address' => $address, 'cap' => $cap));
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
