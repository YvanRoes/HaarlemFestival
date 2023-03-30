<?php
class Ticket_Edm extends Ticket
{
    private Event_edm $edm;

    
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'status' => $this->getStatus(),
            'price' => $this->getPrice(),
            'user_id' => $this->getUserId(),
            'expDate' => $this->getExpDate(),
            'edm' => $this->edm
        ];
    }
}
