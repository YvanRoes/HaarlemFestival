<?php
require __DIR__ . '/../repositories/restaurantSessionRepository.php';
require_once __DIR__ . '/../models/restaurantSession.php';
class RestaurantSessionService
{
  private $repo;
  function __construct()
  {
    $this->repo = new RestaurantSessionRepository();
  }

  public function get_AllRestaurantSessionsByRestaurantId($restaurant_id)
  {
    return $this->repo->get_AllRestaurantSessionsByRestaurantId($restaurant_id);
  }

  public function get_AllRestaurantSessions()
  {
    return $this->repo->get_AllRestaurantSessions();
  }

  public function edit_RestaurantSession($id, $restaurant_id, $adult_Price, $kids_Price, $session_startTime, $session_endTime, $session_date)
  {
    $this->repo->edit_RestaurantSession($id, $restaurant_id, $adult_Price, $kids_Price, $session_startTime, $session_endTime, $session_date);
  }

  public function insert_RestaurantSession(RestaurantSession $restaurantSession)
  {
    $this->repo->insert_RestaurantSession($restaurantSession);
  }

  public function delete_RestaurantSession($id)
  {
    $this->repo->delete_RestaurantSession($id);
  }
}
