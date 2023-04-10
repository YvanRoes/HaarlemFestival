<?php

class Event2 implements JsonSerializable
{

    protected ?int $id = null;
    protected ?float $price = null;
    public function get_id(): int
    {
      return $this->id;
    }
    public function __set_id(int $id): self
    {
      $this->id  = $id;
      return $this;
    }
    public function get_price(): float
    {
      return $this->price;
    }
    public function __set_price(float $price): self
    {
      $this->price  = $price;
      return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
        ];
    }
}