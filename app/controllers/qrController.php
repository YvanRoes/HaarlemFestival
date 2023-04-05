<?php
require_once __DIR__ . '/controller.php';


class QRController extends Controller
{
    public function index()
    {
        $this->displayView($this);
    }
}