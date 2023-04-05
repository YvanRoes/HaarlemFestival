<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurant.php';
class RestaurantRepository extends Repository
{
  public function get_AllRestaurants()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, category, star, michelinStar, description, address, phone_number, capacity, imagePath FROM restaurant");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function get_RestaurantById($id)
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, category, star, michelinStar, description, address, phone_number, capacity, imagePath FROM restaurant WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
      $r = $stmt->fetch();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
