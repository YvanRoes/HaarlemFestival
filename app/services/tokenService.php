<?php
require __DIR__ . '/../repositories/tokenRepository.php';
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
  public function delete_token($id){
    return $this->repo->delete_token($id);
  }

  public function create_token(){
      $token = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
      $this->repo->create_token($token);
  }
}
