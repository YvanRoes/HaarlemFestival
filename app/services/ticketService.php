<?php
require __DIR__ . '/../repositories/ticketRepository.php';
require_once __DIR__ . '/../models/ticket.php';

class TicketService
{
    public function get_AllTickets(): array
    {
        $repo = new TicketRepository();
        return $repo->get_AllTickets();
    }

    public function get_TicketsByEventId($id): array
    {
        $repo = new TicketRepository();
        return $repo->get_TicketsByEventId($id);
    }

    public function get_TicketById($id): Ticket
    {
        $repo = new TicketRepository();
        return $repo->get_TicketById($id);
    }
    public function post_Ticket($event)
    {
        $repo = new TicketRepository();
        return $repo->post_Ticket($event);
    }
    public function getAllEventsStroll(): array
    {
        $repo = new TicketRepository();
        return $repo->getAllEventsStroll();
    }


}