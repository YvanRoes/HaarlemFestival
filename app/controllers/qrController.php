<?php
require_once __DIR__ . '/controller.php';


class QRController extends Controller
{
    public function index()
    {
        $this->displayView($this);
    }

    public function invoice()
    {
        require __DIR__ . '/../views/qr/invoice.php';
    }

    public function scanner()
    {
        require __DIR__ . '/../views/qr/scanner.php';
    }
}