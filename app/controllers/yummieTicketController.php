<?php
require_once __DIR__ . '/controller.php';

class YummieTicketController extends Controller{
    public function index(){
        require __DIR__ . '/../views/yummieTicket/index.php';
    }
}