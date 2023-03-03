<?php 
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/userService.php';
    require_once __DIR__ . '/../models/user.php';
    class LoginController extends Controller{
        public function index(){

            if(isset($_SESSION['USER_ID'])){
                session_destroy();
                header('refresh:0;url=/home');
                return;
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->handlePost();
                return;
            }
            
            $this->displayView($this);
        }

        function handlePost(){
            $email = $_POST['mail'];
            $passwd = md5($_POST['passwd']);


            $userService = new UserService();
            if($userService->verify_UserCredentials($email, $passwd)){
                $_SESSION['USER_ID'] = $userService->get_UserByEmail($email)->get_uid();
                header('refresh:0;url=/home');
                return;
            }
            else{
                $_SESSION['msg'] = 'incorrect credentials';
                require __DIR__ . '/../views/login/index.php';
            }
        }
    }

    ?>