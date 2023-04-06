<?php
require __DIR__ . '/../repositories/cartRepository.php';
require_once __DIR__ . '/../models/cart.php';

class CartService
{
  private $repo;
  function __construct()
  {
    $this->repo = new CartRepository();
  }
  
  public function get_all_cart_items(){
    return $this->repo->get_all_cart_items();
  }

  public function get_cart_items_by_id($id){
    return $this->repo->get_cart_items_by_id($id);
  }
}
