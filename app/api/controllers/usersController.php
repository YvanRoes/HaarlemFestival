<?php
require __DIR__ . '/../../services/userservice.php';


class UsersController{
  private $userService;

  function __construct(){
    $this->userService = new UserService();
  }

  public function index(){
    if($_SERVER["REQUEST_METHOD"] == "GET"){
      $users = $this->userService->get_AllUsers();
      header('Content-type: Application/JSON');
      echo json_encode($users);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $body = file_get_contents('php://input');
      $object = json_decode($body);

      if($object == null){
        return;
      }

      if ($object->post_type == "delete") {
        $this->userService->delete_UserById($object->id);
      }
    }
  }
}
