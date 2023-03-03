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
  }
}
?>