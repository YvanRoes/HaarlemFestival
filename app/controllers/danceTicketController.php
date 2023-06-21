<?php
require_once __DIR__ . '/controller.php';





class DanceTicketController extends Controller{
    public function index(){
        if (!isset($_SESSION['USER_ID'])){
            header('Location: 404');
            exit();
        }
        require __DIR__ . '/../views/danceTicket/index.php';
    }

    public function overview(){
        if (!isset($_SESSION['USER_ID'])){
            header('Location: 404');
            exit();
        }

        if (isset($_GET['id'])){
            
        }
        require __DIR__ . '/../views/danceTicket/overview.php';
    }
}