<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/tourLocationService.php';
require_once __DIR__ . '/../services/tourSessionService.php';




class TourTicketController extends Controller{
    private $tourLocationService;
    private $tourSessionService;
    public function __construct(){
        $this->tourLocationService = new TourLocationService();
        $this->tourSessionService = new TourSessionService();
    }


    public function index(){
        if (!isset($_SESSION['USER_ID'])){
            header('Location: 404');
            exit();
        }
        require __DIR__ . '/../views/tourTicket/index.php';
    }

    public function overview(){
        if (!isset($_SESSION['USER_ID'])){
            header('Location: 404');
            exit();
        }

        if (isset($_GET['id'])){
            
        }
        require __DIR__ . '/../views/tourTicket/overview.php';
    }
}