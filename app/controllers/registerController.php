<?php 
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../models/user.php';
    require_once __DIR__ . '/../services/userService.php';
    require_once __DIR__ . '/../services/captcha/captcha.php';

    class RegisterController extends Controller{
        public function index(){   
            $this->verifyCaptcha();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->register();
            } 
            $this->displayView($this);
        }

        function register(){
            $userService = new UserService();

            $username = htmlspecialchars($_POST['username']);   
            $email = htmlspecialchars($_POST['email']);        
            $password = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            
            if($this->checkUsernameAndEmail($username, $email) && $this->validatePassword($password, $confirmPassword) && $this->verifyCaptcha()){
                $user = new User();
                $user->__set_Username($username);
                $user->__set_Email($email);
                $user->__set_Password(($password));               
                $userService->insert_User($user);

                $_SESSION['registerMsg'] = 'Registration successful';
            }
        }

        function validatePassword($password, $confirmPassword): bool{
            if($password == $confirmPassword && strlen($password) >= 8 && strlen($password) <= 20){
                return true;
            }
            else{
                $_SESSION['registerMsg'] = 'Password must be between 8 and 20 characters';
                return false;
            }
        }

        function checkUsernameAndEmail($username, $email):bool {
            $userService = new UserService();
            
            $users = $userService->get_AllUsers();
            //is there a better way to do this?

            foreach($users as $user){
                if($user->get_Username() == $username){
                    $_SESSION['registerMsg'] = 'Username already exists';
                    return false;
                }
                elseif ($user->get_Email() == $email) {
                    $_SESSION['registerMsg'] = 'Email already exists';
                    return false;
                }
            }
            return true;
        }
        
        function verifyCaptcha(){
            $filename = session_id();

            if(count($_POST)>0){
                $number = file_get_contents($filename);
                if($_POST['captcha'] == $number)
                {
                    $_SESSION['registerMsg'] = 'captcha is correct';
                    return true;
                }else{
                    $_SESSION['registerMsg'] = 'captcha is not correct';
                    $text = rand(10000,99999);

                    $myimage = create_capacha($text);
                    file_put_contents($filename, $text);
                    return false;
                }
            }else{
                $text = rand(10000,99999);

                $myimage = create_capacha($text);
                file_put_contents($filename, $text);
                return false;
            }
        }
    }
?>