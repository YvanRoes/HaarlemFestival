<?php
class Artist implements JsonSerializable
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $genre = null;

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

    public function get_genre(): string
    {
        return $this->genre;
    }
    public function __set_genre(string $genre): self
    {
        $this->genre = $genre;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'genre' => $this->genre
        ];
    }
}