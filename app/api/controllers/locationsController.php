<?php
require __DIR__ . '/../../services/locationService.php';


class LocationsController
{
  private $locationService;

  function __construct()
  {
    $this->locationService = new LocationService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->locationService->get_AllLocations();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}