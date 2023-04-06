<?php
require __DIR__ . '/../../services/danceLocationService.php';
require_once __DIR__ . '/../../models/danceLocation.php';


class LocationsController
{
  private $locationService;

  function __construct()
  {
    $this->locationService = new DanceLocationService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->locationService->get_AllDanceLocations();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $body =  file_get_contents('php://input');
      $object = json_decode($body);


      if ($object == null) {
        return;
      }

      switch ($object->post_type) {
        case 'delete':
          $this->locationService->delete_locationById($object->id);
          break;
        case 'edit':
          $this->locationService->edit_locationById($object->id, htmlspecialchars($object->venue_name), htmlspecialchars($object->venue_address), $object->venue_capacity);
          break;
        case 'insert':
          $l = new DanceLocation();
          $l->__set_name(htmlspecialchars($object->venue_name));
          $l->__set_address(htmlspecialchars($object->venue_address));
          $l->__set_capacity($object->venue_capacity);
          $this->locationService->insert_location($l);
          break;
        default:
          echo 'sum aint right';
          break;
      }
    }
  }
}
