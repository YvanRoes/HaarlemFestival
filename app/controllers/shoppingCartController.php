<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/shoppingCartService.php';
require_once __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../services/ticketService.php';
require_once __DIR__ . '/../services/mailService.php';

class ShoppingCartController extends Controller
{
    private $ticketService;
    private $shoppingCartService;
    function __construct()
    {
        $this->ticketService = new TicketService();
        $this->shoppingCartService = new ShoppingCartService();


    }

    public function index()
    {
        if ($_SESSION['user'] == null) {
            header('Location: /login');
        } else {
            $this->displayView($this);
        }

    }

    public function addTicket()
    {
        $ticket = $this->ticketService->get_TicketById($_POST['ticketId']);
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->addTicket($ticket);
    }

    public function removeTicket()
    {
        $ticket = $this->ticketService->get_TicketById($_POST['ticketId']);
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->removeTicket($ticket);
    }

    public function checkout()
    {
        $this->shoppingCartService->checkout();
    }
}