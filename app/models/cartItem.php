<?php

class CartItem implements JsonSerializable{
  private ?int $id;
  private ?int $user_id;
  private ?int $item_id;
  private ?string $date_added;


  function jsonSerialize(): mixed
  {
    return[
      'cart_item_id' => $this->id,
      'user_id' => $this->user_id,
      'item_id' => $this->item_id,
      'date_added' => $this->date_added
    ];
  }
}


?>