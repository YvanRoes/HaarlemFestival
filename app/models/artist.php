<?php
class Artist implements JsonSerializable
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?string $genre = null;
    private ?string $popularSongs = null;
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

    public function get_description(): string
    {
        return $this->description;
    }

    public function __set_description(string $description): self
    {
        $this->description = $description;
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

    public function get_popularSongs(): string
    {
        return $this->popularSongs;
    }

    public function __set_popularSongs(string $popularSongs): self
    {
        $this->popularSongs = $popularSongs;
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
            'description' => $this->description,
            'genre' => $this->genre,
            'popularSongs' => $this->popularSongs,
            'imagePath' => $this->imagePath
        ];
    }
}