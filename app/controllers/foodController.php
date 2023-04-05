<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/restaurantService.php';
    require_once __DIR__ . '/../services/restaurantSessionService.php';

    class FoodController extends Controller{
        private $restaurantService;
        private $restaurantSessionService;

        public function __construct(){
            $this->restaurantService = new RestaurantService();
            $this->restaurantSessionService = new RestaurantSessionService();
        }

        public function index(){
            $this->echoPage("food");
        }

        public function detailPage(){
            if (isset($_GET['id'])){
                $restaurant = $this->restaurantService->get_RestaurantById($_GET['id']);   
                $restaurantSessions = $this->restaurantSessionService->get_AllRestaurantSessionsByRestaurantId($_GET['id']);
                $imageString = $restaurant->get_imagePath();
                $imagePaths = explode(":", $imageString);
            }
            require __DIR__ . '/../views/food/detailPage.php';
        }
    }
?>

<body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>