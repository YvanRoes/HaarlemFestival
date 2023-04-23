<?php

class Page implements JsonSerializable
{
  private ?int $id = null;
  private ?string $path = null;
  private ?string $title = null;
  private ?string $html = null;

  public function get_id(): int
  {
    return $this->id;
  }
  public function __set_id(int $id): self
  {
    $this->id  = $id;
    return $this;
  }

  public function get_path(): string
  {
    return $this->path;
  }

  public function __set_path(string $path): self
  {
    $this->path = $path;
    return $this;
  }

  public function get_title(): string
  {
    return $this->title;
  }

  public function __set_title(string $title): self
  {
    $this->title = $title;
    return $this;
  }

  public function get_html(): string
  {
    return $this->html;
  }
  public function __set_html(string $html): self
  {
    $this->html = $html;
    return $this;
  }

  public function jsonSerialize(): mixed
  {
    //$images = [new Image(1, "d", "g"), new Image(2, "y", "s")];
    return [
      'id' => $this->id,
      'path' => $this->path,
      'title' => $this->title,
      'html' => $this->html,
    ];
  }
}
