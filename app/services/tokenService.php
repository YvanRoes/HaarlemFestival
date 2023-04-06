<?php
require __DIR__ . '/../repositories/TokenRepository.php';

class TokenService
{
  private $repo;
  function __construct()
  {
    $this->repo = new TokenRepository();
  }
  public function verify_token($token) : bool{
    return $this->repo->verify_token($token);
  }
}
