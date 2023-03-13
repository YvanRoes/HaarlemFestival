<?php
class Restaurant implements JsonSerializable
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $category = null;
    private  $michelin_star = null;

    public function get_id(): int
    {
        return $this->id;
    }
    public function __set_id(int $id): self
    {
        $this->id  = $id;
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

    public function get_category(): string
    {
        return $this->category;
    }
    public function __set_category(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function get_stars(): float
    {
        return $this->michelin_star;
    }
    public function __set_stars(string $stars): self
    {
        $this->michelin_star = $stars;
        return $this;
    }


    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'michelin_star' => $this->michelin_star,
        ];
    }
}
