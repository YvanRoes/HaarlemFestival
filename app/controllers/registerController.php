<?php 
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../models/user.php';
    require_once __DIR__ . '/../services/userService.php';

    class RegisterController extends Controller{
        public function index(){   
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->register();
            } 
            else {
                $this->displayView($this);
            }
        }

        function register(){
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

            if($this->validatePassword($password, $confirmPassword)){
                $user = new User();
                $user->__set_Username($username);
                $user->__set_Email($email);
                $user->__set_Password($password);
                $userService = new UserService();
                $userService->insert_User($user);
            }
            else{
                $this->displayView($this);
            }
        }

        function validatePassword($password, $confirmPassword): bool{
            if($password == $confirmPassword){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>