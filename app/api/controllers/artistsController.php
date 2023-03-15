<?php
require __DIR__ . '/../../services/artistService.php';


class ArtistsController
{
  private $artistService;

  function __construct()
  {
    $this->artistService = new ArtistService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $r = $this->artistService->get_AllArtists();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }
  }
}