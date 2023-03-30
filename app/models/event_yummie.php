<?php

class Event_yummie extends Event2 
{
    private ?Restaurant $restaurant = null;
    private ?DateTime $datetime = null;

    public function get_restaurant(): Restaurant
    {
        return $this->restaurant;
    }
    public function __set_restaurant(Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;
        return $this;
    }
    public function get_datetime(): DateTime
    {
        return $this->datetime;
    }
    public function __set_datetime(DateTime $datetime): self
    {
        $this->datetime = $datetime;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'restaurant' => $this->restaurant,
            'datetime' => $this->datetime
        ];
    }
}