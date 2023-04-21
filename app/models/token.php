<?php

class Token implements JsonSerializable
{
  private ?int $id;
  private ?string $uuid;

  function __set_id($id)
  {
    $this->id = $id;
    return $this;
  }

  function get_id(): int
  {
    return $this->id;
  }

  function __set_uuid($uuid)
  {
    $this->id = $uuid;
    return $this;
  }

  function get_uuid(): string
  {
    return $this->uuid;
  }

  function jsonSerialize(): mixed
  {
    return[
    'id' => $this->id,
    'uuid' => $this->uuid
    ];
  }
}
