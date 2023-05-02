<?php

class Event_edm extends Event2 
{
    private ?DanceLocation $venue = null;
    private ?Artist $artists = null;
    private ?DateTime $date = null;
    private ?DateTime $duration = null;

    public function get_venue(): DanceLocation
    {
        return $this->venue;
    }
    public function __set_venue(DanceLocation $venue): self
    {
        $this->venue = $venue;
        return $this;
    }
    public function get_artists(): Artist
    {
        return $this->artists;
    }
    public function __set_artists( $artists): self
    {
        $this->artists = $artists;
        return $this;
    }
    public function get_date(): DateTime
    {
        return $this->date;
    }
    public function __set_date(DateTime $date): self
    {
        $this->date = $date;
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
    public function get_duration(): DateTime
    {
        return $this->duration;
    }
    public function __set_duration(DateTime $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'venue' => $this->venue,
            'artists' => $this->artists,
            'date' => $this->date,
            'price' => $this->price,
            'duration' => $this->duration,
        ];
    }
}