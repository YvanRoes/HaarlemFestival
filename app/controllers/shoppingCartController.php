<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/shoppingCartService.php';
require_once __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../services/ticketService.php';
require_once __DIR__ . '/../services/mailService.php';

class ShoppingCartController extends Controller
{

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_POST['addTicket'])) {
                $this->addTicket();
            } else if (isset($_POST['removeTicket'])) {
                $this->removeTicket();
            }
            // else if(isset($_POST['removeAllTickets'])){
            //     $this->removeAllTickets();
            // }
            // // else if(isset($_POST['buyTickets'])){
            // //     $this->buyTickets();
            // // }
        }

        $this->displayView($this);
    }

    public function addTicket()
    {
        $ticketService = new TicketService();
        $ticket = $ticketService->get_TicketById($_POST['ticketId']);
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->addTicket($ticket);
    }

    public function removeTicket()
    {
        $ticketService = new TicketService();
        $ticket = $ticketService->get_TicketById($_POST['ticketId']);
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->removeTicket($ticket);
    }

    public function checkout()
    {
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->checkout();
    }
}