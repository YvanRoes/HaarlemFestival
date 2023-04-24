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

  public function edit_RestaurantSession($id, $restaurant_id, $adult_Price, $kids_Price, $session_startTime, $session_endTime)
  {
    try {
      $stmt = $this->conn->prepare("UPDATE event_yummie SET restaurant_id = :restaurant_id, adult_Price = :adult_Price, kids_Price = :kids_Price, session_startTime = :session_startTime, session_endTime = :session_endTime WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':restaurant_id', $restaurant_id);
      $stmt->bindParam(':adult_Price', $adult_Price);
      $stmt->bindParam(':kids_Price', $kids_Price);
      $stmt->bindParam(':session_startTime', $session_startTime);
      $stmt->bindParam(':session_endTime', $session_endTime);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function insert_RestaurantSession(RestaurantSession $restaurantSession)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO event_yummie (restaurant_id, adult_Price, kids_Price, session_startTime, session_endTime) VALUES (:restaurant_id, :adult_Price, :kids_Price, :session_startTime, :session_endTime)");
      $stmt->bindParam(':restaurant_id', $restaurantSession->get_restaurant_id());
      $stmt->bindParam(':adult_Price', $restaurantSession->get_adult_Price());
      $stmt->bindParam(':kids_Price', $restaurantSession->get_kids_Price());
      $stmt->bindParam(':session_startTime', $restaurantSession->get_session_startTime());
      $stmt->bindParam(':session_endTime', $restaurantSession->get_session_endTime());
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function delete_RestaurantSession($id)
  {
    try {
      $stmt = $this->conn->prepare("DELETE FROM event_yummie WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
    }
  }
  
}