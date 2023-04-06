<?php
require __DIR__ . '/../../services/tokenService.php';


class Api_TokensController
{
  private $tokenService;

  function __construct()
  {
    $this->tokenService = new TokenService();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $body = file_get_contents("php://input");
      $object = json_decode($body);

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
