<?php
require __DIR__ . '/../../services/userservice.php';
require_once __DIR__ . '/../../models/user.php';


class UsersController
{
  private $userService;

  function __construct()
  {
    $this->userService = new UserService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $users = $this->userService->get_AllUsers();
      header('Content-type: Application/JSON');
      echo json_encode($users);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $body = file_get_contents('php://input');
      $object = json_decode($body);

      if ($object == null) {
        return;
      }
      switch ($object->post_type) {
        case "delete":
          $this->userService->delete_UserById($object->id);
          break;
        case "edit":
          $this->userService->edit_UserById($object->id, htmlspecialchars($object->username), htmlspecialchars($object->email));
          echo $object->id;
          break;
        case "insert":
          $user = new User();
          $user->__set_Username(htmlspecialchars($object->username));
          $user->__set_Email(htmlspecialchars($object->email));
          $user->__set_Password(htmlspecialchars($object->password));
          $user->__set_role($object->role);
          $this->userService->insert_UserWithRole($user);
          break;
      }
    }
  }
}
