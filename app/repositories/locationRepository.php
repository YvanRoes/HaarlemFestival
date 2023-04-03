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

  public function insert_location(Location $location)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO `location`(`name`, `address`, `imagePath`, `capacity`) VALUES (:name,:address,'path', :cap)");
      $stmt->execute(array(':name' => $location->get_name(), ':address' => $location->get_address(), ':cap' => $location->get_capacity()));
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function delete_locationById($id){
    try {
      $stmt = $this->conn->prepare("DELETE FROM location WHERE id = :id ");
      $stmt->execute(array(':id' => $id));
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function edit_locationById($id, $name, $address, $cap){
    try {
      $stmt = $this->conn->prepare("UPDATE `location` SET `name`=:name,`address`=:address, `capacity`=:cap WHERE id = :id;");
      $stmt->execute(array(':id' => $id, ':name' => $name, ':address' => $address, 'cap' => $cap));
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
