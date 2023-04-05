<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/paymentService.php';

class PaymentController extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['checkout'])) {
                $this->checkout();
            } else {
                $_SESSION['registerMsg'] = 'Captcha Failed';
            }
        }
        $this->displayView($this);
    }

    function checkout()
    {
        $payment = new PaymentService();
        $payment->checkout();

    }

}