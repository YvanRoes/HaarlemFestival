<?php
require __DIR__ . '/../../services/danceLocationService.php';


class DanceLocationsController
{
  private $danceLocationService;

  function __construct()
  {
    $this->danceLocationService = new DanceLocationService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->danceLocationService->get_AllDanceLocations();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}