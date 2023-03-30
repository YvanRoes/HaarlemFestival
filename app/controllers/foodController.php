<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/restaurantService.php';

    class FoodController extends Controller{
        private $service;

        public function __construct(){
            $this->service = new RestaurantService();
        }

        public function index(){
            $this->echoPage("food");
        }

        public function detailPage(){
            if (isset($_GET['id'])){
                $restaurant = $this->service->get_RestaurantById($_GET['id']);   
                $imageString = $restaurant->get_imagePath();
                $imagePaths = explode(":", $imageString);
            }
            require __DIR__ . '/../views/food/detailPage.php';
        }
    }
?>

<body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>