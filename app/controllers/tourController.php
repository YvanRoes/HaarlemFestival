<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/tourLocationService.php';

    class TourController extends Controller{
        private $service;
        // public $location;
        // public $name;
        // public $description;
        // public $address;
        // public $imagePath;

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
            // if (isset($_GET['id'])){
            //     $this->location = $this->service->get_TourLocationById(1);
            //     $this->name = $this->location->get_name();
            //     $this->description = $this->location->get_description();
            //     $this->address = $this->location->get_address();
            //     $this->imagePath = $this->location->get_imagePath();
            // }
            // require __DIR__ . '/../views/tour/detailPage.php';

            $this->displayView($this);
        }
    }
?>

    <body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>
