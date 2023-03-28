<?php

class Event implements JsonSerializable
{

    private ?int $id = null;
    private ?string $title = null;

    private ?string $description = null;

    private ?string $small_title = null;

    private ?string $imagePath = null;

    public function get_small_title(): string
    {
        return $this->small_title;
    }

    public function __set_small_title(string $small_title): self
    {
        $this->small_title = $small_title;
        return $this;
    }

    public function get_id(): int
    {
        return $this->id;
    }

    public function __set_id(int $id): self
    {
        $this->id = $id;
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

    public function get_description(): string
    {
        return $this->description;
    }

    public function __set_description(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function get_imagePath(): string
    {
        return $this->imagePath;
    }

    public function __set_imagePath(string $imagePath): self
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'small_title' => $this->small_title,
            'imagePath' => $this->imagePath
        ];
    }
}