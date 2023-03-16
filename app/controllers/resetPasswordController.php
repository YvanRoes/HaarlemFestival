<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/mailService.php';
require_once __DIR__ . '/../services/userService.php';
class ResetPasswordController extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['newPassword'])) {
                $password = $_POST['newPassword'];
                $userService = new UserService();
                $userService->update_Password($_SESSION['USER_ID'], $password);
                $_SESSION['passwordVerified'] = null;
                $_SESSION['passwordNumber'] = null;
                header('Location: /userPanel');
            } 
            else if (isset($_POST['send-code']))
            {
                $this->setNumber();
                $this->sendPasswordMail();
                $_POST['send-code'] = null;
                $this->displayView($this);
            }
            else if (isset($_POST['passwordNumber'])) {
                if ($this->verifyNumber()) {
                    $_SESSION['passwordVerified'] = true;
                    $this->displayView($this);
                    echo 'Code verified';
                } else {
                    $this->displayView($this);
                    echo 'Code not verified';
                }
            }
            else
            {
                $this->displayView($this);
                echo 'Something went wrong';
            }

        } else {
            $this->displayView($this);
            echo 'start';
        }

    }
    public function sendPasswordMail()
    {
        $email = $_SESSION['USER_MAIL'];
        $subject = 'Reset Password';
        $htmlBody = 'This is your code to reset your password: ' . $_SESSION['passwordNumber'];
        $plainBody = 'This is your code to reset your password: ' . $_SESSION['passwordNumber'];
        sendMail($email, $subject, $htmlBody, $plainBody);
    }
    public function setNumber()
    {
        $number = rand(0, 9999);
        $_SESSION['passwordNumber'] = $number;
    }

    public function verifyNumber()
    {
        $number = $_SESSION['passwordNumber'];
        $input = htmlspecialchars($_POST['passwordNumber']);
        if ($number == $input) {
            return true;
        } else {
            return false;
        }
    }


}
?>