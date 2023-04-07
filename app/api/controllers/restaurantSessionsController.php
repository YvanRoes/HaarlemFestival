<?php
require __DIR__ . '/../../services/restaurantSessionService.php';


class RestaurantSessionsController
{
  private $restaurantSessionService;

  function __construct()
  {
    $this->restaurantSessionService = new RestaurantSessionService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->restaurantSessionService->get_AllRestaurantSessions();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}