<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../services/captcha/captcha.php';

class RegisterController extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
            if (isset($_POST['g-recaptcha-response'])) {
                $this->register();
            }   
            else {
                $_SESSION['registerMsg'] = 'Captcha Failed';
            }           
        }
        $this->displayView($this);
    }

    function register()
    {
        $userService = new UserService();

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

        if ($this->checkUsernameAndEmail($username, $email) && $this->validatePassword($password, $confirmPassword)) {
            $user = new User();
            $user->__set_Username($username);
            $user->__set_Email($email);
            $user->__set_Password(($password));
            $userService->insert_User($user);

            $_SESSION['registerMsg'] = 'Registration successful';
        }
        return;
    }

    function validatePassword($password, $confirmPassword): bool
    {
        if ($password == $confirmPassword && strlen($password) >= 8 && strlen($password) <= 20) {
            return true;
        } else {
            $_SESSION['registerMsg'] = 'Password must be between 8 and 20 characters';
            return false;
        }
    }

    function checkUsernameAndEmail($username, $email): bool
    {
        $userService = new UserService();

        $users = $userService->get_AllUsers();
        //is there a better way to do this?

        foreach ($users as $user) {
            if ($user->get_Username() == $username) {
                $_SESSION['registerMsg'] = 'Username already exists';
                return false;
            } elseif ($user->get_Email() == $email) {
                $_SESSION['registerMsg'] = 'Email already exists';
                return false;
            }
        }
        return true;
    }
}
?>