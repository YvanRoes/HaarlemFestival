<?php
require __DIR__ . '/../../services/artistService.php';
require_once __DIR__ . '/../../models/artist.php';


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

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $body =  file_get_contents('php://input');
      $object = json_decode($body);


      if ($object == null) {
        return;
      }

      switch ($object->post_type) {
        case 'delete':
          $this->artistService->delete_artistById($object->id);
          break;
        case 'edit':
          $this->artistService->edit_artistById($object->id, htmlspecialchars($object->artist_name), htmlspecialchars($object->artist_genres));
          break;
        case 'insert':
          $a = new Artist();
          $a->__set_name(htmlspecialchars($object->artist_name));
          $a->__set_genre(htmlspecialchars($object->artist_genres));
          $a->__set_imagePath('path tbd');
          $this->artistService->insert_Artist($a);
          break;
        default:
          # code...
          break;
      }
    }
  }
}