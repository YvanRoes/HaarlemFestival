<?php
require __DIR__ . '/../repositories/restaurantRepository.php';
require_once __DIR__ . '/../models/restaurant.php';
class RestaurantService
{
  public function get_AllRestaurants(): array
  {
    $repo = new RestaurantRepository();
    return $repo->get_AllRestaurants();
  }
}
