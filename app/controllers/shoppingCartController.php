<?php
use Ramsey\Collection\Tool\ValueToStringTrait;
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/shoppingCartService.php';
require_once __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../services/ticketService.php';
require_once __DIR__ . '/../services/mailService.php';
require_once __DIR__ . '/../services/eventService.php';

class ShoppingCartController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: /login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['selectedTicket'])) {
                $this->assignTicketToUser();
            }
            if (isset($_POST['removePendingTicket'])) {
                $this->removePendingTicket($_POST['removePendingTicket']);
            }   
        }
        $this->getPendingUserTickets();
        $this->setAllAvailableTickets();
        $this->displayView('shoppingCart');
    }

    public function addTicket()
    {
        $ticketService = new TicketService();
        $ticket = $ticketService->get_TicketById($_POST['ticketId']);
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->addTicket($ticket);
    }
    public function assignTicketToUser()
    { //this method is a mess but hey it workd.
        try{
            $ticketService = new TicketService();
            $eventService = new EventService();
            $result = $ticketService->get_TicketById($_POST['selectedTicket']);
            $ticket = new Ticket();
            $ticket->setId($result[0]->uuid);
            $ticket->setEvent($result[0]->event_id);
            $ticket->setStatus('pending');
            $ticket->setUser($_SESSION['USER_ID']);
            $event= $eventService->get_Event2ById($ticket->getEvent());
            $ticket->setPrice($event->get_price());
            $date = date_create('now');
            date_add($date, date_interval_create_from_date_string('1 day'));
            $ticket->setExpDate($date);
            $ticketService->update_Ticket($ticket);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function removeTicket()
    {
        $ticketService = new TicketService();
        $ticket = $ticketService->get_TicketById($_POST['ticketId']);
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->removeTicket($ticket);
    }
    private function setAllAvailableTickets(){
        $ticketService = new TicketService();
        //i hate doing it like this i had one method which would get me all the avaialble tickets with a parameter but it kept giving errors so this is what you get, sorry.
        $_SESSION['edmTickets'] = $ticketService->get_AvailableEventEdmTickets();
        $_SESSION['yummieTickets'] = $ticketService->get_AvailableEventYummieTickets();
        $_SESSION['strollTickets'] = $ticketService->get_AvailableEventStrollTickets();
    }
    public function getPendingUserTickets(){
        try{
            $ticketService = new TicketService();
            $tickets = $ticketService->get_TicketsByUserIdAndStatus($_SESSION['USER_ID'], 'pending');
            $_SESSION['pendingTickets'] = $tickets;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function removePendingTicket($uuid){// also a mess of a method, sorry.
        try{
            $ticketService = new TicketService();
            $result = $ticketService->get_TicketById($_POST['removePendingTicket']);
            $ticket = new Ticket();
            $ticket->setId($result[0]->uuid);
            $ticket->setEvent($result[0]->event_id);
            $ticket->setStatus('available');
            $ticket->setUser(null);
            $ticket->setPrice(null);
            $ticket->setExpDate(null);
            $ticketService->update_Ticket($ticket);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function checkout()
    {
        $shoppingCartService = new ShoppingCartService();
        $shoppingCartService->checkout();
    }
}