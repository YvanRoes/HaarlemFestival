<?php
require __DIR__ . '/../repositories/TokenRepository.php';
require_once __DIR__ . '/../models/token.php';

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

  public function get_all_tokens(): array{
    return $this->repo->get_all_tokens();
  }
}
