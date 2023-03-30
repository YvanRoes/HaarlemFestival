<?php
class Ticket_Yummie extends Ticket
{
    private Event_yummie $yummie;
    
    public function __construct(Event_yummie $yummie)
    {
        $this->yummie = $yummie;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'status' => $this->getStatus(),
            'price' => $this->getPrice(),
            'user_id' => $this->getUserId(),
            'expDate' => $this->getExpDate(),
            'yummie' => $this->yummie
        ];
    }
    
}
