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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST["post_type"])){
        switch ($_POST["post_type"]) {
          case 'edit':
            $this->danceLocationService->edit_locationById($_POST["id"], htmlspecialchars($_POST["venue_name"]), htmlspecialchars($_POST["venue_address"]), $_POST["venue_capacity"]);
            break;
          case 'insert':
            $l = new DanceLocation();
            $l->__set_name(htmlspecialchars($_POST["venue_name"]));
            $l->__set_address(htmlspecialchars($_POST["venue_address"]));
            $l->__set_capacity($_POST["venue_capacity"]);
            //file
            $file = $_FILES['picture'];
            $curr = getcwd();
            $img = '/img/';

            //add extension check
            $fileExtensionsAllowed = ['jpeg', 'jpg', 'png'];
            $fileTmpName = $file['tmp_name'];
            $uploadPath = $curr . $img . basename($file['name']);
            move_uploaded_file($fileTmpName, $uploadPath);
            $l->__set_imagePath(('/img/' . $file['name']));
            $this->danceLocationService->insert_location($l);
            break;
          default:
            echo 'sum aint right';
            break;
        }
        return;
      }
      $body =  file_get_contents('php://input');
      $object = json_decode($body);
      if ($object == null) {
        error_log('no object');
      }

      if($object->post_type == "delete"){
        $this->danceLocationService->delete_locationById($object->id);
      }

    }
  }
}