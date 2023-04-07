<?php

class Event_edm extends Event2 
{
    private ?DanceLocation $venue = null;
    private ?array $artists = null;

    public function get_venue(): DanceLocation
    {
        return $this->venue;
    }
    public function __set_venue(DanceLocation $venue): self
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