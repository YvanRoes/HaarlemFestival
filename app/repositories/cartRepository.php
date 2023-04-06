<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/cartItem.php';
class CartRepository extends Repository
{

  public function get_all_cart_items()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, user_id, item_id, date_added FROM `cart`");
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'CartItem');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }


  public function get_cart_items_by_id($id){
    try {
      $stmt = $this->conn->prepare("SELECT id, user_id, item_id, date_added FROM `cart` WHERE user_id =:id");
      $stmt->execute(array(':id' => htmlspecialchars($id)));
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'CartItem');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
