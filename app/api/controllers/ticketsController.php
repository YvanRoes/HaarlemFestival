<?php
require __DIR__ . '/../../services/ticketService.php';

class TicketsController
{
    private $ticketService;

    function __construct()
    {
        $this->ticketService = new TicketService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $result = $this->ticketService->get_AllTickets();
            header('Content-type: Application/JSON');
            echo json_encode($result);
        }
    }
}