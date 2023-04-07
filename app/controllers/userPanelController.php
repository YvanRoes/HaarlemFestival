<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/ticket.php';
require_once __DIR__ . '/../services/ticketService.php';
class UserPanelController extends Controller
{
    public function index()
    {
        if (isset($_POST['event_id'])) {
            echo $_POST['event_id'];
            echo $_POST['quantity'];
            echo $_POST['price'];
            foreach ($_POST['quantity'] as $num) {
                $this->postTickets();
            }
        }
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: /home');
            return;
        }
        //$this->displayView($this);
        $userRole = $_SESSION['USER_ROLE'];
        switch ($userRole) {
            case 0:
                require __DIR__ . '/../views/userPanel/customerPanel.php';
                break;
            case 1:
                echo "employee";
                break;
            case 9:
                require __DIR__ . '/../views/userPanel/adminPanel.php';
                break;
            default:
                echo "unknown";
                break;
        }

    }
    private function postTickets()
    {
        $ticketService = new TicketService();
        $this->$ticketService->postTicket($_POST['price'], $_POST['event_id']);
    }
}

?>