<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/pageService.php';

    class HomeController extends Controller{
        private $service;

        public function index(){
            $this->service = new PageService();
            //add header and footer
            require __DIR__ . '/../views/header.php';
    
            generateHeader('home', 'dark');
    
            //insert html from db
            $page = $this->service->get_PageByName("home");
            if(is_null($page)){
                $this->displayView("404");
            }
            echo $page->get_html();
            
            require __DIR__ . '/../views/footer.php';
        }
    }
?>