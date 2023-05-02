<?php

class Event_yummie extends Event2 
{
    private ?Restaurant $restaurant = null;
    private ?DateTime $session_startTime = null;
    private ?DateTime $session_endTime = null;


    public function get_restaurant(): Restaurant
    {
        return $this->restaurant;
    }
    public function __set_restaurant(Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;
        return $this;
    }
    public function get_adult_Price(): float
    {
        return $this->adult_Price;
    }
    public function __set_adult_Price(float $adult_Price): self
    {
        $this->adult_Price = $adult_Price;
        return $this;
    }
    public function get_kids_Price(): float
    {
        return $this->kids_Price;
    }
    public function __set_kids_Price(float $kids_Price): self
    {
        $this->kids_Price = $kids_Price;
        return $this;
    }
    public function get_session_startTime(): DateTime
    {
        return $this->session_startTime;
    }
    public function __set_session_startTime(DateTime $session_startTime): self
    {
        $this->session_startTime = $session_startTime;
        return $this;
    }
    public function get_session_endTime(): DateTime
    {
        return $this->session_endTime;
    }
    public function __set_session_endTime(DateTime $session_endTime): self
    {
        $this->session_endTime = $session_endTime;
        return $this;
    }
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'restaurant' => $this->restaurant,
            'adult_Price' => $this->adult_Price,
            'kids_Price' => $this->kids_Price,
            'session_startTime' => $this->session_startTime,
            'session_endTime' => $this->session_endTime,
        ];
    }
}