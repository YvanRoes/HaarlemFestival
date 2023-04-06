<?php
require_once __DIR__ . '/../../services/cartService.php'; 

class CartController
{
  private $service;

  function __construct()
  {
    $this->service = new CartService();
  }
  public function index()
  {
    header('Content-type: Application/JSON');
    $items = $this->service->get_cart_items_by_id(1);
    
    echo json_encode($items);
  }
}
?>