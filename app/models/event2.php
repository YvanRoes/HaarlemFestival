<?php

class Event2 implements JsonSerializable
{

    protected ?int $id = null;
    public function __construct(?int $id)
    {
      $this->id = $id;
    }
    public function get_id(): int
    {
      return $this->id;
    }
    public function __set_id(int $id): self
    {
      $this->id  = $id;
      return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id
        ];
    }
}