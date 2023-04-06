<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../models/user.php';
    require_once __DIR__ . '/../services/userService.php';
    require_once __DIR__ . '/../services/mailService.php';  

    class UserPanelController extends Controller{
        private $service;

        public function __construct(){
            $this->service = new UserService();
        }

        public function index(){
            error_reporting(E_ERROR | E_PARSE);
            if(!isset($_SESSION['USER_ID'])){
                header('Location: /home');
                return;
            }

            $userID = $_SESSION['USER_ID'];
            $user = $this->service->get_UserById($userID);

            $userRole = $_SESSION['USER_ROLE'];
            switch($userRole){
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

            if($_SERVER['REQUEST_METHOD'] == "POST"){ 
                $this->updateUser();

                $_SESSION['editMsg'] = 'Account updated successfully';
                return;
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
    }

?>