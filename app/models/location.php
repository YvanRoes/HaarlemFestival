<?php
class Location implements JsonSerializable
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $address = null;
    private ?string $imagePath = null;
    private ?int $capacity = null;


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

    public function get_capacity(): int
    {
        return $this->capacity;
    }

    public function __set_capacity(int $capacity): self
    {
        $this->capacity = $capacity;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'imagePath' => $this->imagePath,
            'capacity' => $this->capacity
        ];
    }
}