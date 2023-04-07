<?php

class danceSession implements JsonSerializable
{
    private ?int $id = null;
    private ?int $venue = null;
    private ?int $artist_id = null;
    private ?string $date  = null;
    private ?string $session = null;
    private ?int $duration = null;
    private ?int $ticketsAmount = null;
    private $price = null;


    public function get_id(): int
    {
        return $this->id;
    }
    public function __set_id(int $id): self
    {
        $this->id  = $id;
        return $this;
    }

    public function get_venue(): int
    {
        return $this->venue;
    }

    public function __set_venue(int $venue): self
    {
        $this->venue = $venue;
        return $this;
    }

    public function get_artist_id(): int
    {
        return $this->artist_id;
    }

    public function __set_artist_id(int $artist_id): self
    {
        $this->artist_id = $artist_id;
        return $this;
    }

    public function get_date(): string
    {
        return $this->date;
    }

    public function __set_date(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function get_session(): string
    {
        return $this->session;
    }

    public function __set_session(string $session): self
    {
        $this->session = $session;
        return $this;
    }

    public function get_duration(): int
    {
        return $this->duration;
    }

    public function __set_duration(int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function get_ticketsAmount(): int
    {
        return $this->ticketsAmount;
    }

    public function __set_ticketsAmount(int $ticketsAmount): self
    {
        $this->ticketsAmount = $ticketsAmount;
        return $this;
    }

    public function get_price(): float
    {
        return $this->price;
    }

    public function __set_price(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'venue' => $this->venue,
            'artist_id' => $this->artist_id,
            'date' => $this->date,
            'session' => $this->session,
            'duration' => $this->duration,
            'ticketsAmount' => $this->ticketsAmount,
            'price' => $this->price
        ];
    }
}
