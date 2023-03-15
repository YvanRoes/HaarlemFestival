<?php

class Event implements JsonSerializable
{

    private ?int $id = null;
    private ?string $title = null;

    private ?string $description = null;

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

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}