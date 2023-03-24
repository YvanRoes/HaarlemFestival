<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/pageService.php';

    class CmsController extends Controller{
        private $pageService;
        public function index(){
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $content = $this->pageService->get_PageByName('dance');
            }
            //$this->displayView($this);
            require __DIR__ . '/../views/cms/index.php';
        }
    }

    function __contruct(){
        $this->pageService = new PageService();
    }

?>