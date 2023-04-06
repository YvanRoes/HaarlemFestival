<?php
require __DIR__ . '/../../services/tokenService.php';
require_once __DIR__ . '/../../models/token.php';



class Api_TokensController
{
  private $tokenService;

  function __construct()
  {
    $this->tokenService = new TokenService();
  }

  public function index()
  {
    if($_SERVER["REQUEST_METHOD"] == "GET"){

      //avoid direct and unauthorised get requests
      // if ($_SERVER['HTTP_REFERER'] !== 'localhost/userPanel/manageAPI/') {
      //   die('Unauthorized access');
      // }
      $r = $this->tokenService->get_all_tokens();
      header('Content-type: Application/JSON');
      echo json_encode($r);
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $body = file_get_contents("php://input");
      $object = json_decode($body);


      if(isset($object->post_type)){
        if($object->post_type == 'delete'){
          $this->tokenService->delete_token($object->id);
        }
        if($object->post_type == 'create'){
          $this->tokenService->create_token();
        }
      }
      if (isset($object->token)) {
        if ($this->tokenService->verify_token($object->token)) {
          echo "success";
          return;
        }
        echo "fail";
      }
    }
  }
}
