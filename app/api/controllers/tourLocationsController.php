<?php
require __DIR__ . '/../../services/tourLocationService.php';


class TourLocationsController
{
  private $tourLocationService;

  function __construct()
  {
    $this->tourLocationService = new TourLocationService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->tourLocationService->get_AllTourLocations();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}