<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/tourLocationService.php';

    class TourController extends Controller{
        private $service;

        public function __construct(){
            $this->service = new TourLocationService();
        }

        public function index(){
            $this->echoPage("tour");
        }

        public function tourOverview(){
            $this->echoPage(__FUNCTION__);
        }

        public function detailPage(){
            if (isset($_GET['id'])){
                $location = $this->service->get_TourLocationById($_GET['id']);
                $string = $location->get_imagePath();
                $imagePaths = explode(":", $string);
            }
            require __DIR__ . '/../views/tour/detailPage.php';

            // $this->displayView($this);
        }
    }
?>

    <body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>
