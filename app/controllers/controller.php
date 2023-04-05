<?php
    require_once __DIR__ . '/../services/pageService.php';
    class Controller{
        private $service;

        function displayView($model){
            $directory = substr(get_class($this),0, -10);
            $view = debug_backtrace()[1]['function'];
            require __DIR__ . "/../views/$directory/$view.php";
        }

        public function echoPage($name)
    {
        $this->service = new PageService();
        //add header and footer
        require __DIR__ . '/../views/header.php';

        if ($name == "dance" || $name == "home"){
            generateHeader($name, 'light');
        }
        else{
            
            generateHeader($name, 'dark');
        }
        
        //insert html from db
        $page = $this->service->get_PageByName($name);
        if(is_null($page)){
            $this->displayView("404");
        }
        echo $page->get_html();

        if ($name == "dance"){
            require __DIR__ . '/../views/danceFooter.php';
        } else {
            require __DIR__ . '/../views/footer.php';
        }
    }
    }
?>