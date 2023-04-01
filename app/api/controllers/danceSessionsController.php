<?php
require __DIR__ . '/../../services/danceSessionService.php';


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
  }
}