<?php
require __DIR__ . '/../../services/danceSessionService.php';
require_once __DIR__ . '/../../models/danceSession.php';


class DanceSessionsController
{
  private $danceSessionService;

  function __construct()
  {
    $this->danceSessionService = new DanceSessionService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->danceSessionService->get_AllDanceSessions();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $body =  file_get_contents('php://input');
      $object = json_decode($body);

      if ($object == null) {
        return;
      }

      switch ($object->post_type) {
        case 'insert':
          $session = new DanceSession();
          $session->__set_date(htmlspecialchars($object->session_date));
          $session->__set_venue(htmlspecialchars($object->session_venue_id));
          $session->__set_artist_id(htmlspecialchars($object->session_artist_id));
          $session->__set_session(htmlspecialchars($object->session_type));
          $session->__set_ticketsAmount(htmlspecialchars($object->session_ticket_amount));
          $session->__set_duration(htmlspecialchars($object->session_duration));
          $session->__set_price(htmlspecialchars($object->session_price));
          var_dump($session);
          $this->danceSessionService->insert_NewSession($session);
          break;
        case 'edit':
          var_dump($body);
          $this->danceSessionService->edit_SessionById(htmlspecialchars($object->id), htmlspecialchars($object->session_date), htmlspecialchars($object->session_venue_id), htmlspecialchars($object->session_artist_id), htmlspecialchars($object->session_type), htmlspecialchars($object->session_ticket_amount), htmlspecialchars($object->session_duration), htmlspecialchars($object->session_price));
          break;
        case 'delete':
          $this->danceSessionService->delete_SessionById(htmlspecialchars($object->id));
        default:
          # code...
          break;
      }
    }
  }
}