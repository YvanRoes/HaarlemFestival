<?php
require __DIR__ . '/../../services/restaurantService.php';


class RestaurantsController
{
  private $restaurantService;

  function __construct()
  {
    $this->restaurantService = new RestaurantService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->restaurantService->get_AllRestaurants();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}
