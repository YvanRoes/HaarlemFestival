<?php
require_once __DIR__ . '/controller.php';

class PaymentController extends Controller
{
    public function index()
    {
        $this->displayView($this);
    }

}