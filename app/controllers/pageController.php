<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/pageService.php';

    class PageController extends Controller{
        private $service;

        public function __construct(){
            $this->service = new PageService();
        }

        public function index(){

        }
    }
?>

    <body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>
