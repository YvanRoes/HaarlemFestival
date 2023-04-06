<?php
require_once __DIR__ . '/controller.php';
class UserPanelController extends Controller
{
    public function index()
    {
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

    public function manageAPI()
    {
        if (isset($_SESSION["USER_ROLE"])) {
            if ($_SESSION["USER_ROLE"] == 9) {
                $this->show_API_page();
            } else {
                header("HTTP/1.1 403 Forbidden");
            }
        }
    }

    function show_API_page()
    {
        require __DIR__ . '/../views/api/index.php';
    }
}
