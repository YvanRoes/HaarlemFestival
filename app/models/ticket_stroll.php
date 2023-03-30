<?php
class Ticket_Stroll extends Ticket
{
    
    private Event_tour $stroll;
    
    public function __construct(Event_tour $stroll)
    {
        $this->stroll = $stroll;
    }
    
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
