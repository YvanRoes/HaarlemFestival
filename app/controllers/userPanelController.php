<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/ticket.php';
require_once __DIR__ . '/../services/ticketService.php';

require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../services/mailService.php';  
class UserPanelController extends Controller
{
    private $service;

    public function __construct(){
        $this->service = new UserService();
    }
    
    public function index()
    {
        error_reporting(E_ERROR | E_PARSE);
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: /home');
            return;
        }

        $userID = $_SESSION['USER_ID'];
        $user = $this->service->get_UserById($userID);

        //$this->displayView($this);
        $userRole = $_SESSION['USER_ROLE'];
        switch ($userRole) {
            case 0:
                require __DIR__ . '/../views/userPanel/customerPanel.php';
                break;
            case 1:
                require __DIR__ . '/../views/userPanel/employeePanel.php';
                break;
            case 9:
                require __DIR__ . '/../views/userPanel/adminPanel.php';
                break;
            default:
                echo "unknown";
                break;
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){ 
            $this->updateUser();

            $_SESSION['editMsg'] = 'Account updated successfully';
            return;
        }
    }

    public function manageAPI()
    {
        if (isset($_SESSION["USER_ROLE"])) {
            if ($_SESSION["USER_ROLE"] == 9) {
                $this->show_API_page();
            } else {
                header("HTTP/1.1 403 Forbidden");
        if (isset($_POST['event_id'])) {
            for ($i = 0; $i < (int)$_POST['quantity']; $i++) {
                $this->post_Tickets();
            }
            $_POST['event_id'] = null;

            if($_SERVER['REQUEST_METHOD'] == "POST"){ 
                $this->updateUser();

                $_SESSION['editMsg'] = 'Account updated successfully';
                return;
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
    private function post_Tickets()
    {
        $ticketService = new TicketService();
        $ticketService->post_Ticket($_POST['event_id']);
    }
}

    public function updateUser(){
        $userID = $_SESSION['USER_ID'];
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);

        //send confirmation email
        sendMail($_SESSION['USER_MAIL'], 'Account updated', 'Your account has been updated. <br> If this is not you please change your password. <br> <a href="http://localhost/home">Change Password</a>', 'Your account has been updated');
        $this->service->update_UsernameAndEmail($userID, $username, $email);  
    }
  

    function show_API_page()
    {
        require __DIR__ . '/../views/api/index.php';
    }
}
