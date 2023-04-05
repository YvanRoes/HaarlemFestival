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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['post_type'])) {
        switch ($_POST['post_type']) {
          case 'edit':
            echo $_POST['id'];
            echo $_POST['artist_name'];
            echo $_POST['artist_genre'];
            echo $_POST['artist_description'];
            $this->artistService->edit_artistById($_POST["id"], htmlspecialchars($_POST["artist_name"]), htmlspecialchars($_POST["artist_genre"]), htmlspecialchars($_POST["artist_description"]));
            break;
          case 'insert':
            $a = new Artist();
            $a->__set_name(htmlspecialchars($_POST['artist_name']));
            $a->__set_genre(htmlspecialchars($_POST['artist_genre']));
            $a->__set_description(htmlspecialchars($_POST['artist_genre']));
            $file = $_FILES['picture'];

            $curr = getcwd();
            $img = '/img/';

            //add extension check
            $fileExtensionsAllowed = ['jpeg', 'jpg', 'png'];

            $fileTmpName = $file['tmp_name'];

            $uploadPath = $curr . $img . basename($file['name']);
            move_uploaded_file($fileTmpName, $uploadPath);
            $a->__set_imagePath(('/img/' . $file['name']));
            var_dump($a);
            $this->artistService->insert_Artist($a);
            break;
          default:
            break;
        }
        return;
      }
      $body =  file_get_contents('php://input');
      $object = json_decode($body);


      if ($object == null) {
        return;
      }

      if ($object->post_type == 'delete') {
        $this->artistService->delete_artistById($object->id);
      }
    }
  }
}
