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
                $imageString = $location->get_imagePath();
                $titleString = $location->get_title();
                $descriptionString = $location->get_description();
                $imagePaths = explode(":", $imageString);
                $titles = explode(":", $titleString);
                $descriptions = explode(":", $descriptionString);
            }
            require __DIR__ . '/../views/tour/detailPage.php';
        }
    }
?>

    <body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>
