<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurantSession.php';
class RestaurantSessionRepository extends Repository
{
  public function get_AllRestaurantSessionsByRestaurantId($restaurant_id)
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, restaurant_id, adult_Price, kids_Price, session_startTime, session_endTime FROM event_yummie WHERE restaurant_id = :restaurant_id");
      $stmt->bindParam(':restaurant_id', $restaurant_id);
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'RestaurantSession');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function get_AllRestaurantSessions()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, restaurant_id, adult_Price, kids_Price, session_startTime, session_endTime FROM event_yummie");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'RestaurantSession');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
  
}