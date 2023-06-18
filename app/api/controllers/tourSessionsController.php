<?php
require_once __DIR__ . '/../../services/tourSessionService.php';


class TourSessionsController
{
  private $tourSessionService;

  function __construct()
  {
    $this->tourSessionService = new TourSessionService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

      $body = file_get_contents('php://input');
      $object = json_decode($body);
      if ($object == null)
        return;

      switch ($object->get_type) {
        case 'all':
          $r = $this->tourSessionService->get_AllTourSessions();
          break;
        case 'event_id':

          //use this one to get the tickets in shopping cart with the user_id of the user and status pending. or paid.

          $r = $this->tourSessionService->get_TourSessionsByEventId($object->event_id);
          break;
      }
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}