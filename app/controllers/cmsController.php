<?php
    require_once __DIR__ . '/controller.php';
    require_once __DIR__ . '/../services/pageService.php';

    class CmsController extends Controller{
        public function index(){
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $this->content = $this->pageService->get_PageByName($page);
            }
            $this->displayView($this);
        }
    }

?>