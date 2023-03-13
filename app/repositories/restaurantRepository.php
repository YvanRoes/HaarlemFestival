<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurant.php';
class RestaurantRepository extends Repository
{
  public function get_AllRestaurants()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, category, michelin_star FROM restaurant");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
