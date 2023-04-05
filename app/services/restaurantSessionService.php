<?php
require __DIR__ . '/../repositories/restaurantSessionRepository.php';
require_once __DIR__ . '/../models/restaurantSession.php';
class RestaurantSessionService
{
  public function get_AllRestaurantSessionsByRestaurantId($restaurant_id)
  {
    $repo = new RestaurantSessionRepository();
    return $repo->get_AllRestaurantSessionsByRestaurantId($restaurant_id);
  }
}
