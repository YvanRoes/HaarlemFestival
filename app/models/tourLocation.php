<?php
class TourLocation implements JsonSerializable
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?string $address = null;
    private ?string $imagePath = null;


    public function get_id(): int
    {
        return $this->id;
    }
    public function __set_id(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function get_name(): string
    {
        return $this->name;
    }
    public function __set_name(string $name): self
    {
        $this->name = $name;
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

    public function get_address(): string
    {
        return $this->address;
    }
    public function __set_address(string $address): self
    {
        $this->address = $address;
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
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'imagePath' => $this->imagePath
        ];
    }
}