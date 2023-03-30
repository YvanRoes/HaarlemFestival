<?php

class Event_edm extends Event2 
{
    private ?location $venue = null;
    private ?array $artists = null;

    public function get_venue(): location
    {
        return $this->venue;
    }
    public function __set_venue(location $venue): self
    {
        $this->venue = $venue;
        return $this;
    }
    public function get_artists(): array
    {
        return $this->artists;
    }
    public function __set_artists(array $artists): self
    {
        $this->artists = $artists;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'venue' => $this->venue,
            'artists' => $this->artists
        ];
    }
}