<?php
class Ticket_Stroll extends Ticket
{
    
    private Event_tour $stroll;
    
    
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'status' => $this->getStatus(),
            'price' => $this->getPrice(),
            'user_id' => $this->getUserId(),
            'expDate' => $this->getExpDate(),
            'stroll' => $this->stroll
        ];
    }
}
